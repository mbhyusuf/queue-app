<?php

namespace App\Controllers;

use App\Models\Problem;
use \CodeIgniter\Shield\Models\UserModel;

class Solution extends BaseController
{
    public function index($id)
    {
        if (! auth()->user()->inGroup('superadmin', 'admin')) {
            $data = [
                'title' => '403 Forbidden',
            ];
            return view('pages/forbidden', $data);
        }

        $problemsModel = new Problem();
        $problem = $problemsModel->find($id);

        $userModel = new UserModel();
        $user = $userModel->find($problem['user_id']);
        $data = [
            'title' => 'Admin',
            'problem' => $problem,
            'username' => $user->username
        ];
        return view('pages/solution', $data);
    }
}
