<?php
$to = "victorctin@gmail.com";
$subject = "Test Email";
$message = "This is a test email from your PHP server.";
$headers = "From: noreply@example.com\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail sent successfully.";
} else {
    echo "Mail failed to send.";
}
?>
