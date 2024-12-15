<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Ahmad yani km10',
                    'kota' => 'Banjarbaru'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'Jl. Diponegoro km 20',
                    'kota' => 'Banjarmasin'
                ]
            ]
        ];
        return view('pages/home', $data);
    }
}
