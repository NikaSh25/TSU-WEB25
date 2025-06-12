<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

header('Location: ../dashboard.php?cart_cleared=true');
exit();
