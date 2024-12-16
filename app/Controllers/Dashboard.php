<?php

namespace App\Controllers;

use App\Models\Problem;

class Dashboard extends BaseController
{
    public function index()
    {
        $problemsModel = new Problem();
        $problems = $problemsModel->where('user_id', auth()->id())->orderBy('created_at')->findAll();
        $username = auth()->user()->username;

        $data = [
            'username' => $username,
            'title' => 'Dashboard',
            'problems' => $problems
        ];
        return view('pages/dashboard', $data);
    }
}
