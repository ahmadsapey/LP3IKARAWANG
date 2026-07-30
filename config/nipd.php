<?php

return [
    // Branch & city code (6 digits) — LP3I Karawang default
    'branch_code' => env('NIPD_BRANCH_CODE', '260781'),

    // Department/program codes (3 digits each)
    'program_codes' => [
        'ASE' => '004', // Application Software Engineering
        'OAA' => '007', // Office Administration Automatization
        'AIS' => '003', // Accounting Information System
    ],

    // Number of digits for the sequential part
    'sequence_digits' => 4,
];
