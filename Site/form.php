<?php
use PHPMailer/PHPMailer/PHPMailer;

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$massege = $_POST['massage'];

require_once "Mailer/PHPMailer.php";
require_once "Mailer/SMTP.php";
require_once "Mailer/Exception.php"

$mail = new PHPMailer();

try {
    //Серверные натройки
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'karimov02.95@gmail.com';
    $mail->Password   = 'max-0312';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;


    $mail->setForm('karimov02.95@gmail.com', 'Site');
    $mail->addAddress('kajeta4220@fironia.com', 'Admin');


    $mail->isHTML(true);
    $mail->Subject = 'Письмо с тестого сайта';
    $mail->Body    = 'Имя: ' . $firstName . '<br>Фамилия: ' . $lastName . '<br>Email: ' . $email . '<br>Телефон: ' . $tel . '<br>Сообщение: ' . $massege;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('Location: ../Site');

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>