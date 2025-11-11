<?php
require __DIR__ . '/api/auth.php';
logout_user();
header('Location: ' . URL_BASE . '/inicio.php');
exit;
