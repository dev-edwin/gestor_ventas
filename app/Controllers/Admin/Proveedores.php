<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Proveedores extends BaseController
{
    public function index()
    {
        $model = model('Proveedores');
        $data['proveedores'] = $model->find();
        return view('admin/proveedores/index',$data);
    }

    public function store(){
        // return view('admin/proveedores/create');
        echo "hpña";
    }
}
