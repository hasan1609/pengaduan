<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // JIKA TIDAK ADA SESSION
        if (session()->id_level == '') {
            return redirect()->to('/auth');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // JIKA ADA SESSION
        if (session()->id_level == 2) {
            return redirect()->to('/dashboard');
        }
    }
    // TENTUKAN HALAMAN YANG BISA DIAKSES KETIKA SUDAH ADA SESSION DENGAN MEMBUKA FIKE APP/CONFIG/FILTER.PHP
}
