<?php

namespace App\Controllers;

use App\Models\Problem;
use \CodeIgniter\Shield\Models\UserModel;

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
        $problems = $problemsModel->where('status', 'pending')->orderBy('updated_at')->findAll();

        $data = [
            'title' => 'Admin',
            'problems' => $problems,
        ];
        return view('pages/admin', $data);
    }

    public function getUsers()
    {
        if (! auth()->user()->inGroup('superadmin', 'admin')) {
            $data = [
                'title' => '403 Forbidden',
            ];
            return view('pages/forbidden', $data);
        }

        $userModel = new UserModel();
        $users = $userModel->findAll();

        $data = [
            'title' => 'User Management',
            'users' => $users
        ];
        return view('pages/user-management', $data);
    }

    public function deleteUser($id)
    {
        if (! auth()->user()->inGroup('superadmin', 'admin')) {
            $data = [
                'title' => '403 Forbidden',
            ];
            return view('pages/forbidden', $data);
        }

        if ($id == auth()->user()->id) {
            session()->setFlashdata('message', 'You cannot delete yourself.');
            return redirect()->back();
        }

        $userModel = new UserModel();
        $userModel->delete($id);

        session()->setFlashdata('message', 'User deleted succesfully.');
        return redirect()->back();
    }

    public function userDetail($id)
    {
        if (! auth()->user()->inGroup('superadmin', 'admin')) {
            $data = [
                'title' => '403 Forbidden',
            ];
            return view('pages/forbidden', $data);
        }

        $userModel = new UserModel();
        $user = $userModel->find($id);

        $data = [
            'title' => 'User Detail',
            'user' => $user
        ];

        return view('pages/user-detail', $data);
    }
}
