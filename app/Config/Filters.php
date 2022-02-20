<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filterUsers' => \App\Filters\FilterUsers::class,
        'filterAdmin'   => \App\Filters\FilterAdmin::class,
        'filterPetugas' => \App\Filters\FilterPetugas::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',

            // jika session belum ada maka hanya bisa mengakses berikut
            'filterUsers' => [
                'except' => ['auth/*', 'auth', '/', 'home', 'home/*', 'login', 'login/*']
            ],
            'filterAdmin' => [
                'except' => ['auth/*', 'auth', '/', 'home', 'home/*', 'login', 'login/*', 'lapor', 'lapor/*']
            ],
            'filterPetugas' => [
                'except' => ['auth/*', 'auth', '/', 'home', 'home/*', 'login', 'login/*', 'lapor', 'lapor/*']
            ],

        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',

            // JIKA SESSION SUDAH MAKA BISA MENGAKSES HALAMAN BERIKUT BERDASARKAN ROLE YANG DIMILILKI
            'filterUsers' => [
                'except' => ['home', 'home/*', 'lapor', 'lapor/*', 'login', 'login/*']
            ],
            'filterAdmin' => [
                // jika role superadmin maka yang boleh akses berikut
                'except' => ['home', 'home/*', 'dashboard', 'dashboard/*', 'users', 'users/*', 'petugas', 'petugas/*', 'pengaduan', 'pengaduan/*', 'auth/logout', 'login', 'login/*']
            ],
            'filterPetugas' => [
                // jika role petugas maka yang boleh akses berikut
                'except' => ['home', 'home/*', 'dashboard', 'dashboard/*', 'users', 'users/*', 'pengaduan', 'pengaduan/*', 'auth/logout', 'login', 'login/*']
            ],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
