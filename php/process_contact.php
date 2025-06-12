<?php if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['firstname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        header('Location: ../contact.php?status=error&message=Please fill in all fields.');
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../contact.php?status=error&message=Invalid email format.');
        exit;
    }

    $filename = 'contact_submissions.json';
    $dirpath = __DIR__ . '/../contacts/';

    $filepath = $dirpath . $filename;
    if (!is_dir($dirpath)) {
        mkdir($dirpath, 0777, true);
    }

    $submission = [
        'timestamp' => date("Y-m-d H:i:s"),
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    ];

    $current_submissions = [];
    if (file_exists($filepath) && filesize($filepath) > 0) {
        $file_content = file_get_contents($filepath);
        $decoded_content = json_decode($file_content, true);
    }

    $current_submissions[] = $submission;
    $make_JSON = json_encode($current_submissions, JSON_PRETTY_PRINT);
    if (file_put_contents($filepath, $make_JSON) !== false) {
        header('Location: ../contact.php?status=success&message=Your message has been saved!');
        exit;
    } else {
        header('Location: ../contact.php?status=error&message=Oops! Something went wrong and we couldn\'t save your message.');
        exit;
    }
} else {
    header('Location: ../contact.php');
    exit;
}
