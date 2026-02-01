<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "snehatheballoonart@gmail.com"; // Replace with your email
    $subject = "New Contact Form Submission - The Balloon Art";

    // Collect and sanitize data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $event_type = htmlspecialchars($_POST['event_type']);
    $message = htmlspecialchars($_POST['message']);

    $body = "You have received a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Event Type: $event_type\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if(mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you! Your message has been sent.'); window.location.href='contact-us.html';</script>";
    } else {
        echo "<script>alert('Oops! Something went wrong, please try again.'); window.location.href='contact-us.html';</script>";
    }
} else {
    // Redirect back if accessed directly
    header("Location: contact-us.html");
    exit();
}
?>
