<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'home':
            include 'views/home.php';
            break;

        case 'about':
            include 'views/about.php';
            break;

        case 'contact':
            include 'views/contact.php';
            break;

        case 'makanan':
            include 'views/makanan_view.php';
            break;

        case 'minuman':
            include 'views/minuman_view.php';
            break;
        case 'maAdd':
            include 'modul/makanan_Add.php';
            break;

        case 'miAdd':
            include 'modul/minuman_Add.php';
            break;
        case 'maEdit':
            include 'modul/makanan_Edit.php';
            break;

        case 'miEdit':
            include 'modul/minuman_Edit.php';
            break;
        case 'maDel':
            include 'modul/makanan_Delete.php';
            break;

        case 'miDel':
            include 'modul/minuman_Delete.php';
            break;

        default:
            include 'views/404.php';
    }
} else {
    include 'views/home.php';
}
