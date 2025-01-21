<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Kirim email menggunakan mail() function
    $to = 'admin@example.com';
    $subject = 'Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $success = "Your message has been sent!";
    } else {
        $error = "Failed to send message!";
    }
}
?>

<!-- Form kontak -->
<form method="POST" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea><br>

    <input type="submit" value="Send">
</form>

<?php if (isset($success)) { echo $success; } ?>
<?php if (isset($error)) { echo $error; } ?>
