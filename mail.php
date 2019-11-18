<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    function sendMail($username, $token = NULL, $address, $html, $subject) {

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

            $mail->Username = '**************';                    
            $mail->Password = '************';                                     
            $mail->setFrom('****************');  
            $mail->AddEmbeddedImage('img/calendar-alt-solid.svg', 'calendar-logo');

                                            
            $mail->Subject = $subject;
            $mail->Body = $html;

            $mail->addAddress($address);  

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>
