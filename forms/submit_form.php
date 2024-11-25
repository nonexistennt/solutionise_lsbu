<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $full_name = htmlspecialchars($_POST['full_name']); // Sanitize input
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Validate required fields
    if (!empty($full_name) && !empty($email) && !empty($message)) { // Corrected variable name from $fullName to $full_name
        // Email settings
        $to = "victorctin@gmail.com"; // Replace with your email address
        $subject = "New Contact Form Submission";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

        // Email content
        $emailBody = "You have received a new message from your contact form:\n\n";
        $emailBody .= "Name: $full_name\n";
        $emailBody .= "Phone Number: $phone_number\n";
        $emailBody .= "Email: $email\n\n";
        $emailBody .= "Message:\n$message\n";

        // Send the email
        if (mail($to, $subject, $emailBody, $headers)) {
            // Success response
            echo "Thank you for contacting us, $full_name. Your message has been sent successfully.";
        } else {
            // Error response
            echo "Sorry, there was an error sending your message. Please try again later.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    // Redirect if accessed directly
    header("Location: index.html");
    exit();
}
?>
