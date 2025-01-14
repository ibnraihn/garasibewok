<?php
    session_start();

    if (isset($_SESSION['nama'])) {
        header("Location: ../../index.php");
        exit();
    }

    $conn = new mysqli('localhost', 'root', '', 'garasi_bewok');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT nama, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($nama, $hashed_password);
        $stmt->fetch();

        if ($hashed_password && password_verify($password, $hashed_password)) {
            $_SESSION['nama'] = $nama; 
            header("Location: ../index.php");
            exit();
        } else {
            echo "Email atau kata sandi salah.";
        }

        $stmt->close();
    }
    $conn->close();
?>
