<?php
require_once __DIR__ . '/auth.php';

/**
 * Performs a low fare search using PartoCRS API.
 * @param array $criteria Payload keys: Origin, Destination, DepartureDate, ReturnDate (optional), ADT, CHD, INF, CabinClass, AirTripType
 * @return array ['raw' => JSON string, 'data' => decoded array, 'code' => HTTP status code]
 * @throws Exception on cURL or empty response
 */
function airLowFareSearch(array $criteria): array {
    // Build endpoint
    $url = PARTO_API_BASE . '/api/Air/AirLowFareSearch';
    // Inject SessionId
    $criteria['SessionId'] = getPartoSessionId();
    // Prepare request
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($criteria),
        CURLOPT_TIMEOUT        => 20
    ]);
    $raw  = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err  = curl_error($ch);
    curl_close($ch);
    if ($raw === false) {
        throw new Exception('AirLowFareSearch error: ' . $err);
    }
    $data = json_decode($raw, true);
    return ['raw' => $raw, 'data' => $data, 'code' => $code];
}

/**
 * Performs a fare revalidation using PartoCRS API.
 * @param array $payload Must contain SessionId (added automatically) and FareSourceCode, IsGenuine (optional)
 * @return array
 */
function airRevalidate(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirRevalidate';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($payload),
        CURLOPT_TIMEOUT        => 20
    ]);
    $raw  = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err  = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirRevalidate error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Retrieves fare rules using PartoCRS API.
 * @param array $payload Must contain SessionId and FareSourceCode, UniqueId
 * @return array
 */
function airRules(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirRules';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($payload),
        CURLOPT_TIMEOUT        => 20
    ]);
    $raw  = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err  = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirRules error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Books a flight using PartoCRS API.
 * @param array $payload Must contain required booking data; SessionId is added automatically
 * @return array
 */
function airBook(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirBook';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($payload),
        CURLOPT_TIMEOUT        => 20
    ]);
    $raw  = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err  = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirBook error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Retrieves baggage rule from GDS using PartoCRS API.
 * @param array $payload Must contain FareSourceCode
 * @return array
 */
function airBaggages(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirBaggages';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_HTTPHEADER=>['Content-Type: application/json'], CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>json_encode($payload), CURLOPT_TIMEOUT=>20]);
    $raw = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirBaggages error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Cancels a reserved PNR using PartoCRS API.
 * @param array $payload Must contain UniqueId
 * @return array
 */
function airCancel(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirCancel';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_HTTPHEADER=>['Content-Type: application/json'], CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>json_encode($payload), CURLOPT_TIMEOUT=>20]);
    $raw = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirCancel error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Displays online refund information using PartoCRS API.
 * @param array $payload Must contain UniqueId
 * @return array
 */
function airRefundDisplay(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirRefundDisplay';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_HTTPHEADER=>['Content-Type: application/json'], CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>json_encode($payload), CURLOPT_TIMEOUT=>20]);
    $raw = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirRefundDisplay error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Processes an online refund using PartoCRS API.
 * @param array $payload Must contain RefundType, EticketNumbers, RefundPaymentMode
 * @return array
 */
function airRefund(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirRefund';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_HTTPHEADER=>['Content-Type: application/json'], CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>json_encode($payload), CURLOPT_TIMEOUT=>20]);
    $raw = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirRefund error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Retrieves booking details using PartoCRS API.
 * @param array $payload Must contain UniqueId, ClientUniqueId
 * @return array
 */
function airBookingData(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirBookingData';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_HTTPHEADER=>['Content-Type: application/json'], CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>json_encode($payload), CURLOPT_TIMEOUT=>20]);
    $raw = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirBookingData error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Adds notes to a booking using PartoCRS API.
 * @param array $payload Must contain Notes, UniqueId
 * @return array
 */
function airAddBookingNotes(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirAddBookingNotes';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_HTTPHEADER=>['Content-Type: application/json'], CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>json_encode($payload), CURLOPT_TIMEOUT=>20]);
    $raw = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirAddBookingNotes error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Issues the reservation using PartoCRS API.
 * @param array $payload Must contain UniqueId
 * @return array
 */
function airOrderTicket(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirOrderTicket';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_HTTPHEADER=>['Content-Type: application/json'], CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>json_encode($payload), CURLOPT_TIMEOUT=>20]);
    $raw = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirOrderTicket error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}

/**
 * Performs an offline refund request using PartoCRS API.
 * @param array $payload May contain specific offline refund data
 * @return array
 */
function airRefundOfflineRequest(array $payload): array {
    $url = PARTO_API_BASE . '/api/Air/AirRefundOfflineRequest';
    $payload['SessionId'] = getPartoSessionId();
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true, CURLOPT_HTTPHEADER=>['Content-Type: application/json'], CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>json_encode($payload), CURLOPT_TIMEOUT=>20]);
    $raw = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    if ($raw === false) throw new Exception('AirRefundOfflineRequest error: '.$err);
    $data = json_decode($raw, true);
    return ['raw'=>$raw,'data'=>$data,'code'=>$code];
}
?>
