<?php
session_start();


const URL_BASE   = '/ACTC.proyecto/Pagina/Pantallas';
const LOGIN_FILE = 'loginn.php';   // pantalla de login (form)
const ADMIN_ID   = 1;              // id del admin (Lautaro debe tener id 1)

// Sess helpers
function login_user(int $id){ $_SESSION['uid'] = $id; }
function logout_user(){ unset($_SESSION['uid']); }
function current_user_id(): ?int { return $_SESSION['uid'] ?? null; }
function is_logged_in(): bool { return isset($_SESSION['uid']); }
function is_admin(): bool { return current_user_id() === ADMIN_ID; }


function require_login(){
  if (!is_logged_in()){
    header('Location: ' . URL_BASE . '/' . LOGIN_FILE . '?e=login_required');
    exit;
  }
}

function require_admin(){
  if (!is_admin()){
    header('Location: ' . URL_BASE . '/' . LOGIN_FILE . '?e=forbidden');
    exit;
  }
}
