<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Proveedor as ProveedorEntity;

class Proveedor extends BaseController
{
    public function index(){
        return view('admin/proveedores/index');
    }

    public function getproveedores(){
        $proveedorModel = model('ProveedorModel');
        $data['proveedores'] = $proveedorModel->findAll();
        echo json_encode($data);
    }

    // public function getproveedor(){
    //     $proveedorId = $this->request->getPost('proveedor_id');
    //     $proveedorModel = model('ProveedorModel');
    //     if(!$data['producto'] = $proveedorModel->where('id', $proveedorId)->first()){
    //         echo json_encode("Error");
    //     }
    //     echo json_encode($data);
    // }

    public function store(){
        $proveedorForm = [
            'nombre'   => $this->request->getPost('nombre')
        ];
        $model = model('ProveedorModel');
        $proveedor = new ProveedorEntity($proveedorForm);
        $model->save($proveedor);
        echo json_encode("ok");
    }

    public function update(){
        $id = $this->request->getPost('id');
        if(!$proveedor = $this->getProveedor($id)){
            echo json_encode("error: proveedor no encontrado");
        }
        $proveedor = [
            'id' => $id,
            'nombre' => $this->request->getPost('nombre')
        ];
        $model = model('ProveedorModel');

        $model->save($proveedor);
        echo json_encode("ok");
    }

    public function getProveedor($id = 0){
        if($id == 0){
            $id = $this->request->getPost('proveedor_id');
        }
        $model = model('ProveedorModel');
        if(!$proveedor = $model->where('id', $id)->first()){
            echo json_encode("error: proveedor no encontrado");
        }
        echo json_encode($proveedor);
    }
}
