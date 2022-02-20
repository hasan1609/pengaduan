<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterUsers implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // JIKA TIDAK ADA SESSION
        if (!session()) {
            return redirect()->to('/login');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // JIKA ADA SESSION
        if (session()->nik != '') {
            return redirect()->to('/lapor');
        }
    }

    // TENTUKAN HALAMAN YANG BISA DIAKSES KETIKA SUDAH ADA SESSION DENGAN MEMBUKA FIKE APP/CONFIG/FILTER.PHP
}
