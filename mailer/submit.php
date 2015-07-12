<?php

    require('class.phpmailer.php');
    require('class.pop3.php');
    require('class.smtp.php');
    require('PHPMailerAutoload.php');

    // Get copy and clean it
    $copy = $_POST["hidden"];

    // Ensure form filled out correctly
    if (!empty($copy)) {

        echo "Copy to mail: ". $copy."\r\r";
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
        $mail->AddAddress("cg3ntry@gmail.com");

        echo "Mailing...";

        // Set body
        $mail->Body = $copy;

        // Send mail
        if ($mail->Send() == false) {
            $mail->SMTPDebug = 1;
            die($mail->ErrorInfo);
        }

    } else {
      echo "They ain't nothin in the copy box.";
    }
?>

<?php require('templates/header.php');?>

<h1>Thanks!</h1>
<p>Hannah Margaret will get back to you soon.</h1>

<?php require('templates/footer.php');?>
