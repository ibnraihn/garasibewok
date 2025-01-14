<?php
    $conn = new mysqli('localhost', 'root', '', 'garasi_bewok');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nomor_telepon = $_POST['nomor_telepon'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Format email tidak valid.";
            exit;
        }

        if (!preg_match('/^[0-9]{10,15}$/', $nomor_telepon)) {
            echo "Nomor telepon tidak valid. Harus berupa angka 10-15 digit.";
            exit;
        }

        if ($password !== $confirm_password) {
            echo "Kata sandi tidak cocok.";
            exit;
        }

        $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $checkEmail->store_result();

        if ($checkEmail->num_rows > 0) {
            echo "Email sudah terdaftar.";
            exit;
        }
        $checkEmail->close();

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (nama, email, nomor_telepon, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $email, $nomor_telepon, $hashed_password);

        if ($stmt->execute()) {
            header("Location: ../../auth/login.html");
            exit;
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }

        $stmt->close();
    }
    $conn->close();
?>
