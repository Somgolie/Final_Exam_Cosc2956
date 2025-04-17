<?php 
define('SITE_ROOT', __DIR__);
include SITE_ROOT . "\header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '\conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_Message'])) {
    $Text_Message = isset($_POST['text']) ? trim($_POST['text']) : null;

    if ($Text_Message !== null) {
        $sql = "INSERT INTO string_info (message) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $Text_Message);
        $success = $stmt->execute();
    }
}
?>

<body>
    <h1>Welcome to the Final Exam</h1>
    <p>This is a simple PHP script that includes a header file.</p>

    <form id="saveMessage" method="POST" action="">
        <textarea name="text" placeholder="Edit your Text..."></textarea>
        <button type="submit" name="save_Message">Save</button>
    </form>

    <a href="showAll.php">Show all records</a>
</body>
