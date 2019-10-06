<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    function sendMail($username, $token) {

        $mail = new PHPMailer();
        
        try {
            
            $mail->isSMTP();  
            
            $mail->SMTPAuth = true;    
                
            $mail->SMTPsecure = false;              
            $mail->SMTPAutoTLS = false;
            $mail->SMTPDebug = 2;              
            $mail->Host = 'smtp.wp.pl';        
            $mail->Port = "587";       
            
            $mail->isHTML();                                        
            $mail->Username = 'korepetycje138@wp.pl';                    
            $mail->Password = 'password1234';                                     
            $mail->setFrom('korepetycje138@wp.pl');  
                                            
            $mail->Subject = 'Account activation link';
            $mail->Body = <<<EMAIL
            Hello $username, here is your account activation link!<br/><br/>
            
            Please activate your account by clicking the following activation <a href='localhost/Calendar/activate.php?token=$token' target='_blank' alt='account activation link'>link</a>
EMAIL;
            $mail->addAddress('kamil.wan05@gmail.com');  
        

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>