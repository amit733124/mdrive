<?php
require 'mailer/PHPMailerAutoload.php';
    if(isset($_POST['email'])){

        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;  //465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "mdrivestorage2019@gmail.com";
        $mail->Password = "Amit@123";
        $mail->SetFrom("mdrivestorage2019@gmail.com");


        $mail->Subject = "mDrive";
        $mail->Body = $_POST['body'];
        //$mail->addAttachment('C:\Users\Bappa\Downloads\zenit_retro_camera_photos_map_107245_1600x1200.jpg');



        $mail->AddAddress($_POST['email']);

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
    }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
 <body>
     <form action="" method="post">
     <input type="email" name="email" id=""><br>
     <textarea name="body" id="" cols="30" rows="10"></textarea>
     <button type="submit">send mail</button>
     </form>
 </body>
 </html>