<?php
require __DIR__ . '/api/auth.php';
logout_user();
header('Location: ' . URL_BASE . '/login.php?ok=logout');
exit;
?>
