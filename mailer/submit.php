<?php

    require('class.phpmailer.php');
    require('class.pop3.php');
    require('class.smtp.php');
    require('PHPMailerAutoload.php');

    // Preserve formatting from editor (nl2br)
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
        $mail->isHTML(true);

        // Set from
        $fromname = "Editor Test Application Server";
        $fromaddress = "clayton.gentry@inverse.com";
        $mail->SetFrom($fromaddress, $fromname);

        // Set to
        $mail->AddAddress("hannahmargaret@inverse.com");

        // Set subject
        $mail->Subject = "New Editor Test";

        // Set body
        $mail->Body = nl2br($copy);

        // Send mail
        if ($mail->Send() == false) {
            die($mail->ErrorInfo);
        }

    } else {
      echo "No text in the editor!";
    }
?>

<?php require('../templates/header.php');?>
<div id = "submit_body">
  <h1>Thank you!</h1>
  <br/>
  <p>Hannah Margaret will get back to you soon.</p>
  <hr/>
  <p>In the meantime, how 'bout <a href = "https://www.inverse.com">some light reading?</a></p>
</div>
<?php require('../templates/footer.php');?>
