<?php

return [
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\M_Data_Akun::class,
        ],

        // Tambahkan ini
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\M_Akun_Admin::class, // Ganti dengan model admin kamu
        ],
    ],
];





