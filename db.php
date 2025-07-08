<?php
// Connexion MySQL locale
$mysqli = new mysqli('localhost', 'root', '', 'vols_db');
if ($mysqli->connect_errno) {
    http_response_code(500);
    echo 'Erreur connexion BDD: ' . $mysqli->connect_error;
    exit;
}
$mysqli->set_charset('utf8mb4');
