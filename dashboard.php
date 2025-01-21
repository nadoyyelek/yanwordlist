<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}

// Flag
$username = "iyan";
$password = "vina123";
$email = $_SESSION['email'];
$flag = "yanCTF{" . $username . "_" . $password . "_" . $email . "}";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Ini adalah flag kamu:</p>
    <p style="font-weight: bold; color: green;"><?php echo $flag; ?></p>
</body>
</html>
\
