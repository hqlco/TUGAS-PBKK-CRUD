<?php

namespace App\Controllers;

use App\Models\SampleModel;

class Sample extends BaseController
{
    public function index()
    {
        $sampleModel = new SampleModel();


        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'samples' => $sampleModel->paginate(2, 'sample'),
            'pager' => $sampleModel->pager
        );

        return view('sample-index', $data);
    }

    public function create()
    {
        return view('sample-create');
    }

    public function store()
    {

        //load helper form and URL
        helper(['form', 'url']);

        //define validation
        $validation = $this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Judul Post.'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan konten Post.'
                ]
            ],
        ]);

        if (!$validation) {

            //render view with error validation message
            return view('sample-create', [
                'validation' => $this->validator
            ]);
        } else {
            $sampleModel = new SampleModel();

            $data = array(
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content')
            );

            $sampleModel->insert($data);

            return redirect()->to(base_url('sample'));
        }
    }

    public function edit($id)
    {
        $sampleModel = new SampleModel();

        $data = array(
            'sample' => $sampleModel->find($id)
        );

        return view('sample-edit', $data);
    }

    public function update($id)
    {
        //load helper form and URL
        helper(['form', 'url']);

        //define validation
        $validation = $this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Judul Post.'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan konten Post.'
                ]
            ],
        ]);

        if (!$validation) {

            //render view with error validation message
            return view('sample-edit', [
                'validation' => $this->validator
            ]);
        } else {
            $sampleModel = new SampleModel();

            $data = array(
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content')
            );

            $sampleModel->update($id, $data);

            return redirect()->to(base_url('sample'));
        }
    }

    public function delete($id)
    {
        $sampleModel = new SampleModel();

        $sampleModel->delete($id);

        return redirect()->to(base_url('sample'));
    }
}
