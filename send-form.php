<?php
require_once 'config.php';

// Verifica CSRF
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_SESSION['token']) || empty($_POST['csrf_token']) || !hash_equals($_SESSION['token'], $_POST['csrf_token'])) {
        die('Errore di sicurezza: token non valido. Per favore, ricarica la pagina e riprova.');
    }
}

// Verifica intervallo di tempo
if (!isset($_SESSION['last_submission'])) {
    $_SESSION['last_submission'] = 0;
}

$submission_interval = 30;
$current_time = time();

if ($current_time - $_SESSION['last_submission'] < $submission_interval) {
    die('Hai inviato troppe richieste in un breve periodo di tempo. Per favore, riprova più tardi.');
}

$_SESSION['last_submission'] = $current_time;

// Sanitizzazione input comuni
$nome = filter_var(trim($_POST['nome'] ?? ''), FILTER_SANITIZE_STRING);
$cognome = filter_var(trim($_POST['cognome'] ?? ''), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$telefono = filter_var(trim($_POST['telefono'] ?? ''), FILTER_SANITIZE_STRING);
$provincia = filter_var(trim($_POST['provincia'] ?? ''), FILTER_SANITIZE_STRING);
$citta = isset($_POST['citta']) ? filter_var(trim($_POST['citta']), FILTER_SANITIZE_STRING) : '';
$importo = isset($_POST['range']) ? str_replace(['€', '.', ' '], '', trim($_POST['range'])) : '0';

// Determina il tipo di form
$form_type = filter_var(trim($_POST['form_type'] ?? ''), FILTER_SANITIZE_STRING);
if (empty($form_type)) {
    die('Tipo di form non specificato');
}

// Campi specifici per ogni form
$corso_tipo = '';
$corso_specifico = '';
$modalita = '';
$tipo_utente = '';

switch ($form_type) {
    case 'corsi':
        $corso_tipo = filter_var(trim($_POST['course-level-professionale'] ?? ''), FILTER_SANITIZE_STRING);
        $corso_specifico = isset($_POST['altrocorso']) ? filter_var(trim($_POST['altrocorso']), FILTER_SANITIZE_STRING) : '';
        break;
    
    case 'laurea':
        $corso_tipo = filter_var(trim($_POST['course-level'] ?? ''), FILTER_SANITIZE_STRING);
        $corso_specifico = isset($_POST['course-interest']) ? filter_var(trim($_POST['course-interest']), FILTER_SANITIZE_STRING) : '';
        break;
    
    case 'mindset':
        $corso_tipo = filter_var(trim($_POST['course-level-mindset'] ?? ''), FILTER_SANITIZE_STRING);
        $tipo_utente = filter_var(trim($_POST['privatoazienda'] ?? ''), FILTER_SANITIZE_STRING);
        $modalita = filter_var(trim($_POST['luogocorso'] ?? ''), FILTER_SANITIZE_STRING);
        break;
        
    default:
        die('Tipo di form non valido');
}

// Privacy e consensi
$privacy_policy = isset($_POST['privacy-policy']) ? 1 : 0;
$newsletter = isset($_POST['newsletter']) ? 1 : 0;
$marketing = isset($_POST['materiale']) ? 1 : 0;

// Validazione
$errors = [];

if (empty($nome) || empty($cognome) || empty($email) || empty($telefono)) {
    $errors[] = "I campi Nome, Cognome, Email e Telefono sono obbligatori.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Indirizzo email non valido.";
}

if (!preg_match('/^[0-9]{9,10}$/', preg_replace('/[^0-9]/', '', $telefono))) {
    $errors[] = "Numero di telefono non valido.";
}

if (!$privacy_policy) {
    $errors[] = "Devi accettare la privacy policy per procedere.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</p>";
    }
    exit();
}

try {
    // Verifica che la connessione sia valida
    if (!$conn || !($conn instanceof mysqli)) {
        throw new Exception("Errore di connessione al database");
    }

    // Query di inserimento
    $sql = "INSERT INTO landing_lead (
        form_type, nome, cognome, email, telefono, provincia, citta, 
        corso_tipo, corso_specifico, importo, modalita, tipo_utente,
        privacy_policy, newsletter, marketing
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Errore nella preparazione della query: " . $conn->error);
    }
    
    // Converti l'importo in formato decimal
    $importo_decimal = floatval(str_replace(',', '.', $importo));
    
    $stmt->bind_param("sssssssssdssiis", 
        $form_type,
        $nome,
        $cognome,
        $email,
        $telefono,
        $provincia,
        $citta,
        $corso_tipo,
        $corso_specifico,
        $importo_decimal,
        $modalita,
        $tipo_utente,
        $privacy_policy,
        $newsletter,
        $marketing
    );
    
    if (!$stmt->execute()) {
        throw new Exception("Errore nell'esecuzione della query: " . $stmt->error);
    }

    // Genera un nuovo token CSRF per la prossima richiesta
    $_SESSION['token'] = bin2hex(random_bytes(32));

    // Redirect alla pagina di conferma
    header("Location: thankyou.php");
    exit();
    
} catch (Exception $e) {
    error_log("Errore nel salvataggio dei dati: " . $e->getMessage());
    echo "Si è verificato un errore nel salvataggio dei dati. Per favore, riprova più tardi.";
} finally {
    if (isset($stmt) && $stmt instanceof mysqli_stmt) {
        $stmt->close();
    }
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
    }
}
?>
