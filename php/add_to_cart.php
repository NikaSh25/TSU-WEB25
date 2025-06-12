<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['slug'])) {
        die('No course slug specified.');
    }

    $slug = htmlspecialchars($_POST['slug']);

    $coursesJSON = file_get_contents(__DIR__ . "/../courses/courses.json");
    if ($coursesJSON === false) {
        die('Error reading courses data.');
    }
    $courses = json_decode($coursesJSON, true);

    $courseFound = false;
    foreach ($courses as $c) {
        if ($c['slug'] == $slug) {
            $courseFound = true;
            break;
        }
    }

    if (!$courseFound) {
        header('Location: ../course.php?slug=' . $slug . '&error=coursenotfound');
        exit();
    }

    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!in_array($slug, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $slug;
    }

    header('Location: ../course.php?slug=' . $slug . '&added=true');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}
