<?php

namespace App\Controllers;

use App\Models\Problem as ModelsProblem;
use Ramsey\Uuid\Uuid;

class Consult extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Consult',
        ];
        return view('pages/consult', $data);
    }

    public function postProblem()
    {
        $problemModel = new ModelsProblem();

        $problem = $this->request->getPost();
        $problem['id'] = Uuid::uuid4()->toString();
        $problem['user_id'] = auth()->id();

        $problemModel->insert($problem);

        session()->setFlashdata('message', 'Consultation sent! Waiting for a reply.');
        return redirect()->to('dashboard');
    }

    public function deleteProblem($id)
    {
        $problemModel = new ModelsProblem();

        $problemModel->delete($id);

        session()->setFlashdata('message', 'Consultation deleted successfully.');
        return redirect()->to('dashboard');
    }

    public function editProblem($id)
    {
        $problemModel = new ModelsProblem();

        $problem = $problemModel->find($id);

        $data = [
            'title' => 'Consult',
            'problem' => $problem
        ];

        return view('pages/consult', $data);
    }

    public function updateProblem($id)
    {
        $problemModel = new ModelsProblem();

        $problem = $problemModel->update($id, $this->request->getPost());

        session()->setFlashdata('message', 'Consultation updated successfully.');
        return redirect()->to('dashboard');
    }
}
