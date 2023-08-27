<?php
class Payment extends BaseController
{
    public $model;
    private $data = [];
    public function __construct()
    {
        $this->model = $this->getModel('PaymentModel');
    }
    public function cart()
    {
        $this->data['content'] = 'Payment/cart';
        $this->data['sub_content'] = [];
        $this->data['title'] = 'Giỏ hàng';
        $this->renderView('layouts/client_layout', $this->data);
    }
    public function paymentHandle()
    {
        $insertField = "";
        if (isset($_SESSION['user'])) {
            $insertField .= "";
        } else {
            $request = new Request();
            $get = $request->getField();
            extract($get);
            $cart_check = false;
            $discount = 0;
            if (isset($_SESSION['cart'])) {
                if (!empty($_SESSION['cart'])) {
                    $cart_check = true;
                }
                if (isset($_SESSION['voucher'])) {
                    $voucher = $_SESSION['voucher'];
                    $discount = $voucher['discount'];
                    unset($_SESSION['voucher']);
                }
            }
            $total = 0;
            $price = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                extract($value);
                if ($_isSale) {
                    $_price = $_salePrice;
                }
                $price = $_price * $quantity;
                $total += $price;
            }
            $sql = "insert into 
            receipt(_customer_name,_customer_phone,_customer_email,
            _customer_address,_customer_district,_delivery_method,
            _payment_method,_voucher_used,_purchase_status,_price,_discount,_delivery_fee,_total) 
            values('$name','$phone','$email','$address',$district,$delivery,$payment,null,1,$price,$discount,0,$total)";
            $this->model->execute($sql);
            $receipt_id = $this->model->execute("SELECT LAST_INSERT_ID() as `last`")->fetch(PDO::FETCH_ASSOC)['last'];
            $isRedirect = isset($redirect);
            $mail = new Mailer();
            $mail->OrderNotify($receipt_id,$total);
            if ($payment == 1) {
                $this->vnPay($receipt_id,$total,$isRedirect);
            }
        }
    }
    public function info()
    {
    }

    public function vnPay($id,$total,$isRedirect)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_TmnCode = "G421CTS3"; //Mã website tại VNPAY 
        $vnp_HashSecret = "QBEBZUMOAJNSGCUPTMGQEHBTFRGJREOI"; //Chuỗi bí mật

        $vnp_TxnRef = $id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_Amount = $total * 100;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $expireDate = date('YmdHis', strtotime('+15 minute'));
        //Add Params of 2.0.1 Version
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => 'vn',
            "vnp_OrderInfo" => "thanh toan vn pay",
            "vnp_OrderType" => 'other',
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expireDate
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if ($isRedirect) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function checkOut()
    {
        $this->data['content'] = 'Payment/checkout';
        $this->data['sub_content'] = [];
        $this->data['title'] = 'Thanh toán';
        $this->renderView('layouts/client_layout', $this->data);
    }
    public function createReceipt()
    {
        if (isset($_SESSION['user'])) {
        } else {
            $total = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $total += $value['_salePrice'] * $value['quantity'];
            }
            echo $total;
        }
    }
}
