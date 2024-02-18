<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_input = $_POST['email'];
    $sanitized_email = filter_var($email_input, FILTER_SANITIZE_EMAIL);
    if (!$email_input) {
        echo "<div>Please make sure to fill out the email field</div>";
    } else if (filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
    } else {
        echo "<div>Invalid email address</div>";
    }
    $subject_input = $_POST['subject'];
    if (!$subject_input) {
        echo "<div>Please make sure to fill out the subject field</div>";
    }
    $message_input = $_POST['message'];
    if (!$message_input) {
        echo "<div>Please make sure to fill out the message field</div>";
    }
    $sanitized_subject = htmlspecialchars($subject_input);
    $sanitized_message = htmlspecialchars($message_input);


    $to = 'carinacmeireles@gmail.com';
    $subject = $sanitized_subject;
    $message = $sanitized_message;
    $headers = "From: $sanitized_email";
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully";
    } else {
        echo "Failed to send email";
    }
}
