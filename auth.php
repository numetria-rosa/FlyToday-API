<?php
session_start();
require_once __DIR__ . '/config.php';

/**
 * Returns a valid PartoCRS SessionId, creating or renewing if needed.
 * @return string SessionId
 * @throws Exception on authentication failure
 */
function getPartoSessionId(): string {
    // Check existing session
    if (empty($_SESSION['parto_session'])
        || time() - ($_SESSION['parto_session']['timestamp'] ?? 0) > PARTO_SESSION_LIFETIME
    ) {
        // Call CreateSession endpoint
        $url = PARTO_API_BASE . '/api/Authenticate/CreateSession';
        $payload = [
            'OfficeId'  => PARTO_OFFICE_ID,
            'UserName'  => PARTO_USERNAME,
            'Password'  => PARTO_PASSWORD
        ];
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_TIMEOUT        => 15
        ]);
        $resp = curl_exec($ch);
        $err  = curl_error($ch);
        curl_close($ch);
        if (!$resp) {
            throw new Exception('PartoCRS Auth error: ' . $err);
        }
        $data = json_decode($resp, true);
        if (empty($data['SessionId'])) {
            throw new Exception('PartoCRS Auth invalid response: ' . htmlspecialchars($resp));
        }
        // Store session
        $_SESSION['parto_session'] = [
            'sessionId' => $data['SessionId'],
            'timestamp' => time()
        ];
    }
    return $_SESSION['parto_session']['sessionId'];
}
?>
