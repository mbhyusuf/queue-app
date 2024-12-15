<?php

namespace App\Controllers;

use App\Models\Problem;
use App\Models\Solution;
use \CodeIgniter\Shield\Models\UserModel;
use \Ramsey\Uuid\Uuid;

class SolutionController extends BaseController
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
            'title' => 'Solution',
            'problem' => $problem,
            'username' => $user->username
        ];
        return view('pages/solution', $data);
    }

    public function postSolution($id)
    {
        if (! auth()->user()->inGroup('superadmin', 'admin')) {
            $data = [
                'title' => '403 Forbidden',
            ];
            return view('pages/forbidden', $data);
        }

        $problemsModel = new Problem();
        $data = [
            'status' => 'completed'
        ];
        $problemsModel->update($id, $data);

        $solutionModel = new Solution();

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'problem_id' => $id,
            'description' => $this->request->getPost()['solution'],
        ];

        $solutionModel->insert($data);

        session()->setFlashdata('message', 'Problem Solved!');
        return redirect()->to('admin');
    }

    public function getSolution($id)
    {
        $solutionModel = new Solution();
        $solution = $solutionModel->where('problem_id', $id)->findAll();
        $problemModel = new Problem();
        $problem = $problemModel->find($id);

        $data = [
            'title' => 'Solution',
            'problem' => $problem,
            'solution' => $solution,
        ];

        return view('pages/solution-detail', $data);
    }
}
