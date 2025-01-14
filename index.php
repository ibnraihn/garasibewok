<?php
    session_start();

    $page = isset($_GET['page']) ? $_GET['page'] : 'index';

    $allowed_pages = ['index', 'layanan', 'parts', 'tentang-kami'];
    if (!in_array($page, $allowed_pages)) {
        $page = 'index';
    }

    $path = 'views/' . $page . '.html';
    if (file_exists($path)) {
        include $path;
    } else {
        echo "Halaman tidak ditemukan.";
    }
?>
