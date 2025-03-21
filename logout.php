<?php
session_start();

session_unset(); // ✅ Session data ko delete karo
session_destroy(); // ✅ Session ko destroy karo

header("Location: index.php"); // ✅ Redirect to home page
exit;
?>
