<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // File where emails are stored (append to file)
        $file = 'subscribers.txt';

        // Check if email already exists in the file
        if (file_exists($file) && strpos(file_get_contents($file), $email) !== false) {
            echo "You are already subscribed!";
        } else {
            // Save email to file
            file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);
            echo "Thank you for subscribing!";
        }
    } else {
        echo "Invalid email address. Please try again.";
    }
} else {
    // Redirect if accessed directly
    header("Location: index.html");
    exit();
}
?>
