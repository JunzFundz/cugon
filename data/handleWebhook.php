<?php


require_once '../class/Paymongo.php';

try {
    $payload = @file_get_contents('php://input');
    $signatureHeader = $_SERVER['HTTP_PAYMONGO_SIGNATURE'];
    $webhookSecretKey = 'your webhook secret key here';

    $event = $client->webhooks->constructEvent([
        'payload' => $payload,
        'signature_header' => $signatureHeader,
        'webhook_secret_key' => $webhookSecretKey
    ]);

    echo $event->id;
    echo $event->type;
    print "<pre>";
    print_r($event->resource);
    print "</pre>";
    die();

} catch (\Paymongo\Exceptions\SignatureVerificationException $e) {
    echo 'invalid signature';
}
?>
