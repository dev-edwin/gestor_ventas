<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Producto as EntitiesProducto;

class Producto extends BaseController
{
    public function index()
    {
        return view('admin/producto/index');
    }

    public function getproductos(){
        $productoModel = model('ProductoModel');
        $data['productos'] = $productoModel->findAll();
        echo json_encode($data);
    }

    public function getproducto(){
        $productoId = $this->request->getPost('product_id');
        $productoModel = model('ProductoModel');
        if(!$data['producto'] = $productoModel->where('id', $productoId)->first()){
            echo json_encode("Error");
        }
        echo json_encode($data);
    }

    public function store(){
        $productoForm = [
            'nombre_producto'   => $this->request->getPost('nombre_producto'),
            'unidad'            => $this->request->getPost('unidad'),
            'precio_mayor'      => $this->request->getPost('precio_mayor'),
            'precio_menor'      => $this->request->getPost('precio_menor'),
        ];
        $model = model('ProductoModel');
        $producto = new EntitiesProducto($productoForm);
        $model->save($producto);
        echo json_encode("ok");
    }

    public function update(){
        $id = $this->request->getPost('id');
        if(!$producto = $this->getProduct($id)){
            echo json_encode("error: producto no encontrado");
        }
        $producto = [
            'id' => $id,
            'nombre_producto' => $this->request->getPost('nombre_producto'),
            'unidad' => $this->request->getPost('unidad'),
            'precio_mayor' => $this->request->getPost('precio_mayor'),
            'precio_menor' => $this->request->getPost('precio_menor'),
        ];
        $model = model('Productos');

        $model->save($producto);
        echo json_encode("ok");
    }

    public function getProduct($id = 0){
        if($id == 0){
            $id = $this->request->getPost('product_id');
        }
        $model = model('ProductoModel');
        if(!$producto = $model->where('id', $id)->first()){
            echo json_encode("error: producto no encontrado");
        }
        echo json_encode($producto);
    }
}
