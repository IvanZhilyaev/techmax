<?php
    use  PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CHarSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setFrom('info@example.com', 'TechMax');
    $mail->addAdress ('ivan_zhilyaev@icloud.com');
    $mail->Subject = 'TechMax technology';

    $body = '<h1>Новое сообщение</h1>';

    if(trim(!empty($_POST['name']))){
        $body.= '<p><strong>Name:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.= '<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['phone']))){
        $body.= '<p><strong>Phone:</strong> '.$_POST['phone'].'</p>';
    }
    if(trim(!empty($_POST['message']))){
        $body.= '<p><strong>Message:</strong> '.$_POST['message'].'</p>';
    }

    $mail -> Body = $body;

    if (!$mail -> send()) {
        $message = 'Error';
    } else {
        $message = 'Successfully sent';
    }

    $response = ['message => $message'];

    header('Content-Type: application/json');
    echo json_encode($response);
?>