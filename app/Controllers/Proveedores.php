<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Proveedores extends BaseController
{
    public function index()
    {
        $model = model('Proveedores');
        $data['proveedores'] = $model->find();
        return view('admin/proveedores/index',$data);
    }
}
