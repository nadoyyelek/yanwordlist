<?php
session_start(); // Memulai session

// Menyertakan file konfigurasi
require_once 'config.php';

// Cek apakah form login disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menyiapkan query untuk memeriksa username dan password
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Mengecek apakah username ditemukan dan password sesuai
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Redirect ke halaman dashboard
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Username not found!";
    }
}
?>

<!-- Form login -->
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br>
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>

    <input type="submit" value="Login">
</form>
<?php if (isset($error)) { echo $error; } ?>
