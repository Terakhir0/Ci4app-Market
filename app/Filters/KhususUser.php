<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class KhususUser implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here

        if(session()->log != true){
            session()->setFlashdata('belum_login', 'Silahkan Login terlebih dahulu!');

            return redirect()->to('/auth');
        } 
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if(session()->log == true){
            return redirect()->to('/');
        }
    }
}