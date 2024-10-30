 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
 require 'path/to/PHPMailer/src/Exception.php';
 require 'path/to/PHPMailer/src/PHPMailer.php';
 require 'path/to/PHPMailer/src/SMTP.php';
 
 $mail = new PHPMailer(true);
 try {
     $mail->isSMTP();
     $mail->Host = ''; // Replace with SMTP server
     $mail->SMTPAuth = true;
     $mail->Username = 'wargame00101@gmail.com';
     $mail->Password = 'your_password';
     $mail->SMTPSecure = 'tls';
     $mail->Port = 587;
 
     $mail->setFrom('your_email@example.com', 'Your Name');
     $mail->addAddress($email); // Add recipient's email from the form data
 
     $mail->Subject = "Verify Your Account";
     $mail->Body = "Hello $name,\n\nPlease click the link below to verify your account:\n$verification_link";
 
     $mail->send();
     echo "Verification email sent!";
 } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }
 
