<?php

return [
    'store_id' => 'sererl',
    'signature_key' => '3c831409a577666bd9c49b6a46473acc',
    'sandbox' => false,
    'redirect_url' => [
        'success' => [
            'route' => 'payment.success'
        ],
        'cancel' => [
            'route' => 'payment.cancel'
        ]
    ]
];
