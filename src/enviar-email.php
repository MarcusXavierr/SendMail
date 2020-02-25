<?php
    header('Content-Type: text/html; charset=utf-8');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "Mensagem.php";
    require "../bibliotecas/PHPMailer/src/PHPMailer.php";
    require "../bibliotecas/PHPMailer/src/Exception.php";
    require "../bibliotecas/PHPMailer/src/SMTP.php";
    require "../bibliotecas/PHPMailer/src/POP3.php";
    require "../bibliotecas/PHPMailer/src/OAuth.php";
    
    $mensagem = new Mensagem($_POST['destinatario'],$_POST['assunto'],$_POST['mensagem'],$_POST['nome']);

    if(!$mensagem->getMsgValida()){
        echo "Mensagem inválida";
        header("Location:mensagem-enviada.php?erro");
        die();
    }
    
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->CharSet = 'UTF-8';                    // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'emailphpsender@gmail.com';                     // SMTP username
        $mail->Password   = '!@123456789$';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
        
        $mail->setLanguage('pt_br', '../bibliotecas/PHPMailer/language');

        //Recipients
        $mail->setFrom('emailphpsender@gmail.com', $mensagem->getRemetente());
        $mail->addAddress($mensagem->getDestinatario());     // Add a recipient            // Name is optional
        
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $mensagem->getAssunto();
        $mail->Body    = nl2br($mensagem->getMensagem());
        $mail->AltBody = nl2br(strip_tags($mensagem->getMensagem()));
    
        $mail->send();
        header("Location:mensagem-enviada.php");
        } catch (Exception $e) {
        header("Location:mensagem-enviada.php?erro");
    }

?>