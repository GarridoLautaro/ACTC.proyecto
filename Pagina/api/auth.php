<?php
session_start();

/** Ajustá esta constante a la URL base de tu proyecto en XAMPP */
const URL_BASE = '/ACTC.proyecto/Pagina/Pantallas';
const LOGIN_FILE = 'loginn.php';   // <-- si lo cambias, solo editás aquí
const ADMIN_ID  = 1;

function login_user(int $id){ $_SESSION['uid'] = $id; }
function logout_user(){ unset($_SESSION['uid']); }
function current_user_id(): ?int { return $_SESSION['uid'] ?? null; }
function is_logged_in(): bool { return isset($_SESSION['uid']); }
function is_admin(): bool { return current_user_id() === ADMIN_ID; }

function require_login(){
  if (!is_logged_in()){
    header('Location: ' . URL_BASE . '/login.php?e=login_required');
    exit;
  }
}

function require_admin(){
  if (!is_admin()){
    header('Location: ' . URL_BASE . '/login.php?e=forbidden');
    exit;
  }
}
