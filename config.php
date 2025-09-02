<?php
// Verifica se la sessione non è già attiva
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generazione del token CSRF se non esiste
if (empty($_SESSION['token'])) {
    try {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    } catch (Exception $e) {
        // Fallback se random_bytes non è disponibile
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
}

// config.php
$host = 'localhost'; // Server database
$dbname = 'course_db'; // Nome del tuo database
$username = 'adminCor'; // Nome utente database
$password = 'Tvo6i25$9'; // Password del database (lascia vuoto se non esiste)

// Crea la connessione al database
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Impostazione del charset della connessione
$conn->set_charset("utf8mb4");

// Impostazione del fuso orario
date_default_timezone_set('Europe/Rome');
?>