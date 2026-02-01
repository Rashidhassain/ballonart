<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "snehatheballoonart@gmail.com";
    $subject = "New Form Submission - The Balloon Art";

    $body = "You have received a new submission from your website:\n\n";

    // Contact Us form
    if(isset($_POST['event_type'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $event_type = htmlspecialchars($_POST['event_type']);
        $message = htmlspecialchars($_POST['message']);

        $body .= "Form: Contact Us\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Phone: $phone\n";
        $body .= "Event Type: $event_type\n";
        $body .= "Message:\n$message\n";
    }

    // Wedding page form
    elseif(isset($_POST['service'])) {
        $service = htmlspecialchars($_POST['service']);
        $name = htmlspecialchars($_POST['name']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);

        $body .= "Form: Wedding Page\n";
        $body .= "Service: $service\n";
        $body .= "Name: $name\n";
        $body .= "Phone: $phone\n";
        $body .= "Email: $email\n";
    }

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if(mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you! Your message has been sent.'); window.history.back();</script>";
    } else {
        echo "<script>alert('Oops! Something went wrong, please try again.'); window.history.back();</script>";
    }

} else {
    header("Location: index.html");
    exit();
}
?>
