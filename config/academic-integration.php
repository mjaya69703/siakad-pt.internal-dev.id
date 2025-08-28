<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Neo Feeder PDDIKTI Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for Neo Feeder PDDIKTI integration service.
    | Neo Feeder is the latest version of PDDikti Feeder application used to
    | synchronize university data to the PDDikti database.
    |
    */

    'neo_feeder' => [
        'base_url' => env('NEO_FEEDER_BASE_URL', 'http://localhost:3003/ws'),
        'username' => env('NEO_FEEDER_USERNAME'),
        'password' => env('NEO_FEEDER_PASSWORD'),
        'timeout' => env('NEO_FEEDER_TIMEOUT', 60),
        'retry_attempts' => env('NEO_FEEDER_RETRY_ATTEMPTS', 3),
        'retry_delay' => env('NEO_FEEDER_RETRY_DELAY', 5), // seconds
    ],

    /*
    |--------------------------------------------------------------------------
    | Midtrans Payment Gateway Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for Midtrans payment gateway integration.
    | Used for student billing and payment processing.
    |
    */

    'midtrans' => [
        'server_key' => env('MIDTRANS_SERVER_KEY'),
        'client_key' => env('MIDTRANS_CLIENT_KEY'),
        'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
        'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),
        'is_3ds' => env('MIDTRANS_IS_3DS', true),
        'notification_url' => env('MIDTRANS_NOTIFICATION_URL', '/webhook/midtrans'),
        'finish_url' => env('MIDTRANS_FINISH_URL', '/mahasiswa/keuangan/payment/callback'),
        'unfinish_url' => env('MIDTRANS_UNFINISH_URL', '/mahasiswa/keuangan/tagihan'),
        'error_url' => env('MIDTRANS_ERROR_URL', '/mahasiswa/keuangan/tagihan'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Academic Integration Settings
    |--------------------------------------------------------------------------
    |
    | Configuration for PMB to Academic migration and management.
    |
    */

    'academic' => [
        'auto_generate_billing' => env('AUTO_GENERATE_BILLING', true),
        'auto_sync_neo_feeder' => env('AUTO_SYNC_NEO_FEEDER', false),
        'default_password' => env('STUDENT_DEFAULT_PASSWORD', 'password123'),
        'nim_format' => env('NIM_FORMAT', 'YYPPNNNN'), // YY=Year, PP=Prodi, NNNN=Sequential
        'billing_penalty_rate' => env('BILLING_PENALTY_RATE', 0.02), // 2% per month
        'mandatory_billing_block' => env('MANDATORY_BILLING_BLOCK', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Billing Configuration
    |--------------------------------------------------------------------------
    |
    | Default billing amounts and settings for different types of charges.
    |
    */

    'billing' => [
        'spp_amounts' => [
            'D3' => env('SPP_D3', 800000),
            'S1' => env('SPP_S1', 1200000),
            'S2' => env('SPP_S2', 2000000),
            'S3' => env('SPP_S3', 3000000),
        ],
        'standard_fees' => [
            'DAFTAR_ULANG' => env('FEE_DAFTAR_ULANG', 150000),
            'KEMAHASISWAAN' => env('FEE_KEMAHASISWAAN', 100000),
            'PERPUSTAKAAN' => env('FEE_PERPUSTAKAAN', 50000),
            'UTS' => env('FEE_UTS', 75000),
            'UAS' => env('FEE_UAS', 100000),
            'SKS' => env('FEE_PER_SKS', 150000),
            'SEMINAR_PROPOSAL' => env('FEE_SEMINAR_PROPOSAL', 200000),
            'SEMINAR_HASIL' => env('FEE_SEMINAR_HASIL', 250000),
            'SIDANG_SKRIPSI' => env('FEE_SIDANG_SKRIPSI', 300000),
            'WISUDA' => env('FEE_WISUDA', 500000),
            'IJAZAH' => env('FEE_IJAZAH', 150000),
            'TRANSKRIP' => env('FEE_TRANSKRIP', 100000),
            'SKPI' => env('FEE_SKPI', 75000),
        ],
        'due_date_defaults' => [
            'SPP' => 30, // days from generation
            'DAFTAR_ULANG' => 30,
            'UTS' => 60,
            'UAS' => 90,
            'WISUDA' => 60,
            'default' => 30,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Email Notifications
    |--------------------------------------------------------------------------
    |
    | Email notification settings for various academic events.
    |
    */

    'notifications' => [
        'migration_success' => [
            'enabled' => env('NOTIFY_MIGRATION_SUCCESS', true),
            'template' => 'emails.academic.migration-success',
        ],
        'billing_created' => [
            'enabled' => env('NOTIFY_BILLING_CREATED', true),
            'template' => 'emails.billing.created',
        ],
        'payment_success' => [
            'enabled' => env('NOTIFY_PAYMENT_SUCCESS', true),
            'template' => 'emails.billing.payment-success',
        ],
        'payment_overdue' => [
            'enabled' => env('NOTIFY_PAYMENT_OVERDUE', true),
            'template' => 'emails.billing.overdue',
            'reminder_days' => [7, 3, 1], // Days before due date
        ],
        'neo_feeder_sync' => [
            'enabled' => env('NOTIFY_NEO_FEEDER_SYNC', false),
            'template' => 'emails.academic.neo-feeder-sync',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Data Mapping Configuration
    |--------------------------------------------------------------------------
    |
    | Mapping configuration for various data transformations.
    |
    */

    'mapping' => [
        'religions' => [
            'Islam' => 1,
            'Kristen Protestan' => 2,
            'Kristen Katolik' => 3,
            'Hindu' => 4,
            'Buddha' => 5,
            'Konghuchu' => 6,
        ],
        'student_status' => [
            'Aktif' => 'A',
            'Cuti' => 'C',
            'Tidak Aktif' => 'N',
            'Lulus' => 'L',
            'Drop Out' => 'D',
        ],
        'income_levels' => [
            0 => 11,        // <= 1M
            1000000 => 11,  // <= 1M
            2000000 => 12,  // 1M - 2M
            3000000 => 13,  // 2M - 3M
            5000000 => 14,  // 3M - 5M
            999999999 => 15, // > 5M
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Logging settings for academic integration activities.
    |
    */

    'logging' => [
        'migration_logs' => env('LOG_MIGRATIONS', true),
        'billing_logs' => env('LOG_BILLING', true),
        'neo_feeder_logs' => env('LOG_NEO_FEEDER', true),
        'payment_logs' => env('LOG_PAYMENTS', true),
        'retention_days' => env('LOG_RETENTION_DAYS', 365),
    ],

    /*
    |--------------------------------------------------------------------------
    | Security Settings
    |--------------------------------------------------------------------------
    |
    | Security configuration for the academic integration system.
    |
    */

    'security' => [
        'require_verification' => env('REQUIRE_VERIFICATION_FOR_MIGRATION', true),
        'max_bulk_operations' => env('MAX_BULK_OPERATIONS', 100),
        'api_rate_limit' => env('API_RATE_LIMIT', 60), // requests per minute
        'encrypt_sensitive_data' => env('ENCRYPT_SENSITIVE_DATA', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Performance Settings
    |--------------------------------------------------------------------------
    |
    | Performance optimization settings.
    |
    */

    'performance' => [
        'cache_ttl' => env('CACHE_TTL', 3600), // seconds
        'batch_size' => env('BATCH_SIZE', 50),
        'queue_connection' => env('QUEUE_CONNECTION', 'database'),
        'neo_feeder_delay' => env('NEO_FEEDER_DELAY', 500000), // microseconds between requests
    ],

];