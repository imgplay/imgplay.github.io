<?php
// Constant "PROJECT_DIR" will be contain path of project
define('PROJECT_DIR', dirname(__FILE__) . '/..');

// Path to file with saved emails
$filePath = PROJECT_DIR . '/data/subscribe.txt';

$success = false;
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
if (preg_match('/^\w+@\S+/', $email)) {
    if (@file_put_contents($filePath, "\r\n" . $email, FILE_APPEND)) {
        $success = true;
    }
}

echo json_encode(array(
    'success' => $success
));
