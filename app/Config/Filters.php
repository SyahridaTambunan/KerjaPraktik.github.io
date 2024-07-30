<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    // Makes alias to class for simplicity.
    public $aliases = [
        'csrf'     => \CodeIgniter\Filters\CSRF::class,
        'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot' => \CodeIgniter\Filters\Honeypot::class,
        'auth'     => \App\Filters\AuthFilter::class, // Tambahkan baris ini
    ];

    // Always applied before every request
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
        ],
        'after'  => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    // Works on all of a particular HTTP method
    // (GET, POST, etc.) as BEFORE filters only
    //    like: 'post' => ['csrf', 'throttle'],
    public $methods = [];

    // List filter aliases and any before/after uri patterns
    // like: 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
    public $filters = [
        'auth' => ['before' => ['dashboard', 'dashboard/*']], // Terapkan filter auth sebelum mengakses /dashboard dan semua rutenya
    ];
}
