<?php

return [
    /*
     * The host to use when listening for debug server connections.
     */
    'host' => 'tcp://127.0.0.1:9912',
    'sumery' => 25,
    'domainLogoBank' => 'https://alepay.vn/dataimage',
    'live' =>[
        'domain' => 'https://alepay-v3.nganluong.vn/api/v3/checkout',
        "apiKey" => "mz7yS4yVognq5UsUlbJq8vWXc9KwEB", //Là key dùng để xác định tài khoản nào đang được sử dụng.
        "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCn1EvZaQ4+BjvXZsqV4PFJcCLXp1He3wSyzbZ3dufD+oXmDzE1e4XinyEeWUEK9CJh2zpxqGJKJMAKWxozqNgy6CwnUE0amiauTgqglsCkLGb1s8671zOiCQqwF8IS9rLzIlJe59Juu/Sbw3F/lLB5cYuYwQoimXGIL9D4ppvD6wIDAQAB", //Là key dùng để mã hóa dữ liệu truyền tới Alepay.
        "checksumKey" => "s7UlvRCqTieXyA9UXoo2R9IJQ4W62p", //Là key dùng để tạo checksum data. 
        "callbackUrl" => '/transaction/result',
    ],
    'sandbox' =>[
        'domain' => 'https://alepay-v3-sandbox.nganluong.vn/api/v3/checkout',
        "apiKey" => "La4vzOQVGlVZUL2jp46ETpDDsHNeE9", //Là key dùng để xác định tài khoản nào đang được sử dụng.
        "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCn1EvZaQ4+BjvXZsqV4PFJcCLXp1He3wSyzbZ3dufD+oXmDzE1e4XinyEeWUEK9CJh2zpxqGJKJMAKWxozqNgy6CwnUE0amiauTgqglsCkLGb1s8671zOiCQqwF8IS9rLzIlJe59Juu/Sbw3F/lLB5cYuYwQoimXGIL9D4ppvD6wIDAQAB", //Là key dùng để mã hóa dữ liệu truyền tới Alepay.
        "checksumKey" => "HzxR9TCpMseGm1GUSNq873XGi156cP", //Là key dùng để tạo checksum data. 
        "callbackUrl" => '/transaction/result',
    ] 
];
