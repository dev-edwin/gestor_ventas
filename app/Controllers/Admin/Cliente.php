<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Cliente as EntitiesCliente;

class Cliente extends BaseController
{
    public function index()
    {
        return view('admin/cliente/index');
    }

    public function getClientes(){
        $productoModel = model('ClienteModel');
        $data['clientes'] = $productoModel->findAll();
        echo json_encode($data);
    }

    public function getClientea(){
        $clienteId = $this->request->getPost('cliente_id');
        $clienteModel = model('ClienteModel');
        if(!$data['cliente'] = $clienteModel->where('id', $clienteId)->first()){
            echo json_encode("Error");
        }
        echo json_encode($data);
    }

    public function store(){
        $clienteForm = [
            'nombre'         => $this->request->getPost('nombre'),
            'nit'            => $this->request->getPost('nit'),
        ];
        $model = model('ClienteModel');
        $cliente = new EntitiesCliente($clienteForm);
        $model->save($cliente);
        echo json_encode("ok");
    }

    public function update(){
        $id = $this->request->getPost('id');
        if(!$cliente = $this->getCliente($id)){
            echo json_encode("error: cliente no encontrado");
        }
        $cliente = [
            'id' => $id,
            'nombre' => $this->request->getPost('nombre'),
            'nit' => $this->request->getPost('nit'),
        ];
        $model = model('ClienteModel');

        $model->save($cliente);
        echo json_encode("ok");
    }

    public function getCliente($id = 0){
        if($id == 0){
            $id = $this->request->getPost('cliente_id');
        }
        $model = model('ClienteModel');
        if(!$cliente = $model->where('id', $id)->first()){
            echo json_encode("error: cliente no encontrado");
        }
        echo json_encode($cliente);
    }
}
