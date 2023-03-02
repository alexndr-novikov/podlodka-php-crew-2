<?php
return [
    // ...
    'resolvers' => [
        // ...
        'default' => [
            //
            // Required key of resolver type.
            // For S3, it must contain the "s3" string value.
            //
            'type' => 's3',

            //
            // Required string key of S3 region like "eu-north-1".
            //
            // Region can be found on "Amazon S3" page here:
            //  - https://s3.console.aws.amazon.com/s3/home
            //
            'region' => env('S3_REGION'),

            //
            // Optional key of S3 API version.
            //
            'version' => env('S3_VERSION', 'latest'),

            //
            // Required key of S3 bucket.
            //
            // Bucket name can be found on "Amazon S3" page here:
            //  - https://s3.console.aws.amazon.com/s3/home
            //
            'bucket' => env('S3_BUCKET'),

            //
            // Required key of S3 credentials key like "AAAABBBBCCCCDDDDEEEE".
            //
            // Credentials key can be found on "Security Credentials" page here:
            //  - https://console.aws.amazon.com/iam/home#/security_credentials
            //
            'key' => env('S3_KEY'),

            //
            // Required key of S3 credentials private key.
            // This must be a private key string value or a path to a private key file.
            //
            // Identifier can be also found on "Security Credentials" page here:
            //  - https://console.aws.amazon.com/iam/home#/security_credentials
            //
            'secret' => env('S3_SECRET'),

            //
            // Optional key of S3 credentials token.
            //
            'token' => env('S3_TOKEN', null),

            //
            // Optional key of S3 credentials expiration time.
            //
            'expires' => env('S3_EXPIRES', null),

            //
            // Optional key of S3 API endpoint URI.
            //
//            'endpoint' => env('S3_ENDPOINT', null),
            'endpoint' => "https://s3.podlodka.localhost",

            //
            // Optional key of S3 API file prefixes.
            // This must contain string like "path/to/directory".
            //
            // In this case, this prefix will be added for each file when
            // generating url.
            //
            'prefix' => env('S3_PREFIX'),

            //
            // Optional additional S3 options.
            // For example, option "use_path_style_endpoint" is required to work
            // with a Minio S3 Server.
            //
            // Note: This "options" section is available since framework >= 2.8.6
            //
            'options' => [
                'use_path_style_endpoint' => true,
            ]
        ],
    ]
];
