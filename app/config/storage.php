<?php
return [
    'servers' => [
        's3' => [
            //
            // Server type name. For a S3 server, this value must be a string
            // value "s3" or "s3-async".
            //
            'adapter' => 's3',

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
            // Optional key of S3 files visibility. Visibility is "public"
            // by default.
            //
            'visibility' => env('S3_VISIBILITY', 'public'),

            //
            // For buckets that use S3 servers, you can add a directory
            // prefix.
            //
            'prefix' => '',

            //
            // Optional key of S3 API endpoint URI. This value is required when
            // using a server other than Amazon.
            //
            'endpoint' => env('S3_ENDPOINT', null),

            //
            // Optional additional S3 options.
            // For example, option "use_path_style_endpoint" is required to work
            // with a Minio S3 Server.
            //
            // Note: This "options" section is available since framework >= 2.8.5
            // See also https://github.com/spiral/framework/issues/416
            //
            'options' => [
                'use_path_style_endpoint' => true,
            ]
        ],
    ],

    'buckets' => [
        'podlodka' => [
            //
            // Relation to an existing S3 server. Note that all further bucket
            // options are applicable only for this (i.e. s3 or s3-async) server
            // type.
            //
            'server' => 's3',

            //
            // The visibility value for a specific bucket type. Although you can
            // specify server-wide visibility, you can also override this value
            // for a specific bucket type.
            //
            'visibility' => env('S3_VISIBILITY', 'public'),

            //
            // In case you want to use another bucket using the main
            // server settings, you can redefine it by specifying the
            // appropriate configuration key.
            //
            'bucket' => env('S3_BUCKET', null),

            //
            // If the new bucket is in a different region, you can also
            // override this value.
            //
            'region' => env('S3_REGION', null),

            //
            // A similar thing can be done with the directory prefix in cases
            // where a particular bucket must refer to some other root directory.
            //
            'prefix' => env('S3_PREFIX', null),
        ]
    ]
];
