<?php
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
} ?>
<form action="<?php echo _WEB.'/xu-li-thanh-toan' ?>" method="get">
    <div class="container-sm my-2 border border-1 p-3 checkout-wrapper">
        <h5 style="text-align: center;">THANH TOÁN</h5>
        <div class="row">
            <div class="col-xxl-4 col-sm-11 d-flex flex-column gap-3 mb-3">
                <div class="checkout-info border border-1 d-flex flex-column py-3 px-3 gap-2">
                    <p>THÔNG TIN GIAO HÀNG</p>
                    <input type="text" name="name" class="border border-1 form-control rounded-0" placeholder="Họ và tên:" required oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên')">
                    <input type="text" name="phone" class="border border-1 form-control rounded-0" placeholder="Số điện thoại:" required oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại liên lạc')">
                    <input type="email" name="email" class="border border-1 form-control rounded-0" placeholder="Email (nếu có):">
                </div>
                <div class="checkout-info border border-1 d-flex flex-column py-3 px-3 gap-2">
                    <p>ĐỊA CHỈ GIAO HÀNG</p>
                    <input type="text" name="address" class="border border-1 form-control rounded-0" placeholder="Địa chỉ:">
                    <select name="district" id="dist" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng chọn tỉnh/thành phố!')">
                        <option value="">-- Chọn tỉnh/thành phố --</option>
                    </select>
                </div>
            </div>
            <div class="col-xxl-7 col-sm-12 d-flex flex-column">
                <div class="payment-method d-flex flex-wrap ps-3 pe-2 py-2 border border-1 mb-3">
                    <div class="col-xxl-5 col-sm-7 d-flex flex-column mb-3 me-2">
                        <p>PHƯƠNG THỨC GIAO HÀNG</p>
                        <div class="mb-3 d-flex gap-2 align-items-center">
                            <i class="fa-solid fa-truck"></i>
                            <input type="radio" name="delivery" value="1" id="delivery" checked>
                            <p class="m-0">Miễn phí giao hàng - 0₫</p>
                        </div>
                        <div class="mb-3 d-flex gap-2 align-items-center">
                            <i class="fa-solid fa-truck-fast text-success"></i>
                            <input type="radio" name="delivery" value="2" id="delivery">
                            <p class="m-0">Giao hàng nhanh - 25,000₫</p>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-sm-7 d-flex flex-column mb-3 me-2">
                        <p>PHƯƠNG THỨC THANH TOÁN</p>
                        <div class="mb-3 d-flex gap-2 align-items-center">
                            <i class="fa-brands fa-cc-paypal"></i>
                            <input type="radio" name="payment" value="1" id="payment" checked>
                            <p class="m-0">Thanh toán vnPay</p>
                        </div>
                        <div class="mb-3 d-flex gap-2 align-items-center">
                            <i class="fa-solid fa-truck-ramp-box"></i>
                            <input type="radio" name="payment" value="2" id="payment">
                            <p class="m-0">Thanh toán khi nhận hàng</p>
                        </div>
                    </div>
                </div>
                <div class="cart-page-wrapper p-4 border border-1 mb-3">
                    <div class="cart-page table-responsive">
                        <table class="table table align-middle p-1 border border-1 border-gray">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap fw-normal">Hình ảnh</th>
                                    <th scope="col" class="text-nowrap fw-normal">Tên sản phẩm</th>
                                    <th scope="col" class="text-nowrap fw-normal">Số lượng</th>
                                    <th scope="col" class="text-nowrap fw-normal">Đơn giá</th>
                                    <th scope="col" class="text-nowrap fw-normal">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                $price = 0;
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    extract($value);
                                    if ($_isSale) {
                                        $_price = $_salePrice;
                                    }
                                    $price = $_price * $quantity;
                                    $total += $price;
                                ?>
                                    <tr class="">
                                        <td scope="row">
                                            <img width="70px" height="70px" src="<?php echo _WEB . '/public/assets/images/products/nike-air-force-1-07-trang/1.jpg' ?>" alt="1">
                                        </td>
                                        <td class="text-nowrap"><?php echo $_nameVN ?></td>
                                        <td>
                                            <div class="quantity-wrapper d-flex align-items-center">
                                                <div class="quantity d-flex">
                                                    <label for="product-quantity" class="d-none">Số lượng</label>
                                                    <input type="text" name="quantity" id="product-quantity" value="<?php echo $quantity ?>">
                                                    <input type="hidden" name="_id" id="_id" value="<?php echo $_id ?>">
                                                    <span class="d-flex flex-column justify-content-center align-items-center h-100 stepper">
                                                        <i class="fa fa-angle-up pt-1"></i>
                                                        <i class="fa fa-angle-down pt-1"></i>
                                                    </span>
                                                </div>
                                                <div class="cart-update tool d-flex justify-content-center align-items-center h-100">
                                                    <i class="fa-solid fa-rotate-right"></i>
                                                </div>
                                                <div class="cart-delete tool d-flex justify-content-center align-items-center h-100">
                                                    <i class="fa-solid fa-trash"></i>
                                                </div>
                                            </div>

                                        </td>
                                        <td><?php echo number_format($_price, 0, '', ','); ?><span>₫</span></td>
                                        <td><?php echo number_format($_price * $quantity, 0, '', ','); ?><span>₫</span></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="checkout-price table-responsive">
                        <table class="table">
                            <tbody>
                                <tr class="border border-1">
                                    <td colspan="2" class="text-end">Thành tiền:</td>
                                    <td><?php echo number_format($total, 0, '', ',') ?><span>₫</span></td>
                                </tr>
                                <tr class="border border-1">
                                    <td colspan="2" class="text-end">Phí vận chuyển:</td>
                                    <td>0₫</td>
                                </tr>
                                <tr class="border border-1">
                                    <td colspan="2" class="text-end">Giảm giá:</td>
                                    <td><?php echo number_format($total * $discount, 0, '', ',') ?><span>₫</span></td>
                                </tr>
                                <tr class="border border-1">
                                    <td colspan="2" class="text-end">Tổng cộng:</td>
                                    <td><?php echo number_format($total - ($total * $discount), 0, '', ',') ?><span>₫</span></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="purchase-btn-wrapper border border-1 p-2 d-flex justify-content-center justify-content-xxl-end">
                    <button type="submit" name="redirect" value="1" class="btn btn-success me-xxl-3 m-0">Thanh toán <i class="fa-solid fa-store"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        let dist = document.querySelector("#dist");
        $.get("https://provinces.open-api.vn/api/?depth=1", function(data, status) {
            data.forEach(value => {
                dist.innerHTML += '<option value="' + value.code + '">' + value.name + '</option>';
            });
        });
    });
</script>