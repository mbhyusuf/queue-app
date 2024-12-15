<?php

namespace App\Controllers;

use App\Models\Problem;

class Admin extends BaseController
{
    public function index()
    {
        if (! auth()->user()->inGroup('superadmin', 'admin')) {
            $data = [
                'title' => '403 Forbidden',
            ];
            return view('pages/forbidden', $data);
        }

        $problemsModel = new Problem();
        $problems = $problemsModel->findAll();
        $data = [
            'title' => 'Admin',
            'problems' => $problems
        ];
        return view('pages/admin', $data);
    }
}
