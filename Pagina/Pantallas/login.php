<?php
require __DIR__ . '/../api/auth.php';
header('Location: ./' . LOGIN_FILE . (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : ''));
exit;
