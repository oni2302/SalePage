<?php

//Load Composer's autoloader
require _ROOT . '/plugins/phpmailer/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require _ROOT . '/plugins/PHPMailer-master/src/Exception.php';
require _ROOT . '/plugins/PHPMailer-master/src/PHPMailer.php';
require _ROOT . '/plugins/PHPMailer-master/src/SMTP.php';

class Mailer
{
    public function OrderNotify($id,$total){
        try {
            $mail = new PHPMailer();
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'cp03hn.emailserver.net.vn';  
            // $mail->Host       = 'mail.oni2302.id.vn';                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '_mainaccount@oni2302.id.vn';              //SMTP username
            $mail->Password   = 'P@ssd2302';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;
            $mail ->CharSet = "UTF-8"; 
            $mail->setLanguage('vi', '/optional/path/to/language/directory/');
            $mail->setFrom('shop@oni2302.id.vn', 'ONI Shop');
            $mail->addAddress('phuongtky2003@gmail.com', 'USER');
            $mail->addReplyTo('oni@oni2302.id.vn', 'Information');

            $mail->isHTML(true);
            $mail->Subject = "Có đơn hàng mới";
            $mail->Body    = "<p style=\"padding:10px 20px;border:1.5px dashed gray;border-radius:10px;width:max-content;\">Bạn có đơn hàng mới: <b>Mã: $id, Tổng: $total.</b></p>";
            $mail->AltBody = "Bạn có đơn hàng mới: Mã: $id, Tổng: $total.";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {" . $mail->ErrorInfo . "}";
        }
    }
    public function PurchaseNotify($id,$total){
        try {
            $mail = new PHPMailer();
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'cp03hn.emailserver.net.vn';  
            // $mail->Host       = 'mail.oni2302.id.vn';                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '_mainaccount@oni2302.id.vn';              //SMTP username
            $mail->Password   = 'P@ssd2302';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;
            $mail ->CharSet = "UTF-8"; 
            $mail->setLanguage('vi', '/optional/path/to/language/directory/');
            $mail->setFrom('shop@oni2302.id.vn', 'ONI Shop');
            $mail->addAddress('phuongtky2003@gmail.com', 'USER');
            $mail->addReplyTo('oni@oni2302.id.vn', 'Information');

            $mail->isHTML(true);
            $mail->Subject = "Có đơn hàng được thanh toán";
            $mail->Body    = "<p style=\"padding:10px 20px;border:1.5px dashed gray;border-radius:10px;width:max-content;\">Một đơn hàng đã được thanh toán: <b>Mã: $id, Tổng: $total.</b></p>";
            $mail->AltBody = "Một đơn hàng đã được thanh toán: Mã: $id, Tổng: $total.";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {" . $mail->ErrorInfo . "}";
        }
    }
    public function SendOTP($otp, $title, $email)
    {
        try {
            $mail = new PHPMailer();
            $mail->isSMTP();                                            //Send using SMTP
            // $mail->Host       = 'cp03hn.emailserver.net.vn';   
            $mail->Host       = 'mail.oni2302.id.vn';                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '_mainaccount@oni2302.id.vn';              //SMTP username
            $mail->Password   = 'P@ssd2302';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;
            $mail ->CharSet = "UTF-8"; 
            $mail->setLanguage('vi', '/optional/path/to/language/directory/');
            $mail->setFrom('shop@oni2302.id.vn', 'ONI Shop');
            $mail->addAddress('phuongtky2003@gmail.com', 'USER');
            $mail->addReplyTo('oni@oni2302.id.vn', 'Information');

            $mail->isHTML(true);
            $mail->Subject = "Mã OTP $title.";
            $mail->Body    = "<p style=\"padding:10px 20px;border:1.5px dashed gray;border-radius:10px;width:max-content;\">Mã OTP của bạn là: <b>$otp.</b></p>";
            $mail->AltBody = "Mã OTP của bạn là: $otp";

            $mail->send();
            echo 'Đã gửi';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {" . $mail->ErrorInfo . "}";
        }
    }
}
