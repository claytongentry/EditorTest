<?php

    require('class.phpmailer.php');
    require('class.pop3.php');
    require('class.smtp.php');
    require('PHPMailerAutoload.php');

    // Get copy and clean it
    $copy = $_POST["hidden"];

    // Ensure form filled out correctly
    if (!empty($copy)) {

        // Instantiate mailer
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->SMTPSecure = "tls";
        $mail->Host = "tls://smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = getenv('user');
        $mail->Password = getenv('pw');
        $mail->Port = 587;

        // Set from
        $fromname = "Editor Test Application Server";
        $fromaddress = "clayton.gentry@inverse.com";
        $mail->SetFrom($fromaddress, $fromname);

        // Set to
        $mail->AddAddress("clayton.gentry@inverse.com");

        // Set body
        $mail->Body = $copy;

        // Send mail
        if ($mail->Send() == false) {
            die($mail->ErrorInfo);
        }

    } else {
      echo "No text in the editor!";
    }
?>

<?php require('../templates/header.php');?>
<h1>Thank you!</h1>
<p>Hannah Margaret will get back to you soon.</p>
<?php require('../templates/footer.php');?>
