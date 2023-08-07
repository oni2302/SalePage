<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require _ROOT . '/plugins/phpmailer/vendor/autoload.php';
class Mailer
{
    private static $mail;
    public function __construct()
    {
        if(self::$mail==null){ 
            self::$mail = new PHPMailer();
        }
    }
    public function SendOTP($otp, $title, $email)
    {
        try {
            self::$mail->isSMTP();                                            //Send using SMTP
            // self::$mail->Host       = 'cp03hn.emailserver.net.vn';   
            self::$mail->Host       = 'cp03hn.emailserver.net.vn';                    //Set the SMTP server to send through
            self::$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            self::$mail->Username   = 'oni@oni2302.id.vn';              //SMTP username
            self::$mail->Password   = 'P@ssd2302';                               //SMTP password
            self::$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            self::$mail->Port       = 465;
            self::$mail ->CharSet = "UTF-8"; 
            self::$mail->setLanguage('vi', '/optional/path/to/language/directory/');
            self::$mail->setFrom('shop@oni2302.id.vn', 'ONI Shop');
            self::$mail->addAddress('phuongtky2003@gmail.com', 'USER');
            self::$mail->addReplyTo('oni@oni2302.id.vn', 'Information');

            self::$mail->isHTML(true);
            self::$mail->Subject = "Mã OTP $title.";
            self::$mail->Body    = "<p style=\"padding:10px 20px;border:1.5px dashed gray;border-radius:10px;width:max-content;\">Mã OTP của bạn là: <b>$otp.</b></p>";
            self::$mail->AltBody = "Mã OTP của bạn là: $otp";

            self::$mail->send();
            echo 'Đã gửi';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {" . self::$mail->ErrorInfo . "}";
        }
    }
}
