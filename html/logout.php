<?php
// clear session data
    $_SESSION = [];
    header("Location: testHome2.html");
    echo "<p>You have been logged out!</p>";
?>