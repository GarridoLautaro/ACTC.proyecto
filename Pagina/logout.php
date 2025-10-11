<?php
require __DIR__ . '/api/auth.php';
logout_user();
header('Location: ' . URL_BASE . '/' . LOGIN_FILE . '?ok=logout');
exit;
