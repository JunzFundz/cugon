<?php
// createPaymentIntent.php

require_once 'PaymongoClient.php';

try {
    $client = new \Paymongo\PaymongoClient('sk_test_HXyD75ZUb8TqjCtAym2jH8EH');
    $paymentIntent = $client->paymentIntents->create([
        'amount' => 10000,
        'currency' => 'PHP',
        'payment_method_allowed' => ['card']
    ]);

    echo $paymentIntent->id;
} catch(\Paymongo\Exceptions\InvalidRequestException $e) {
    print "<pre>";
    print_r($e->getError());
    print "</pre>";
}
?>
