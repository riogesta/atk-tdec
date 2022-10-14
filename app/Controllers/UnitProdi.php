<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitProdiModel;

class UnitProdi extends BaseController
{
    protected $session;
    protected $model;

    function __construct(){
        $this->session = session();
        $this->model = new UnitProdiModel();
    }

    public function index()
    {

        if ($this->request->getMethod() == 'post') {
            $input['unit_prodi'] = $this->request->getPost('unit-prodi');

            $this->model->save($input);

            return redirect()->route('unit-prodi');
        }

        $data = [
            'title' => 'Unit / Prodi',
            'unitProdi' => $this->model->getUnitProdi()
        ];

        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('unit_prodi/unit_prodi', $data)
                .view('layout/footer');
    }

    public function edit() {
        $id = $this->request->getPost('id');
        $input['unit_prodi'] = $this->request->getPost('unit-prodi');

        $this->model->update($id, $input);

        return redirect()->route('unit-prodi');
    }

    public function hapus() {
        $id = $this->request->getPost('id');
        $this->model->delete($id);
    }
}