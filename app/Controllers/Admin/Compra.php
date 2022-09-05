<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Compra extends BaseController
{
    
    public function index()
    {
        $model = model('CompraModel');
        $data['compras'] = $model
                            ->select('compras.id,numero,monto,created_at,updated_at,pro.nombre')
                            ->join('proveedores as pro', 'pro.id = proveedor_id')
                            ->find();
        return view('admin/compra/index',$data);
    }

    public function addCompra(){
        
        $compraModel = model('CompraModel');
        $proveedorModel = model('ProveedorModel');
        $productoModel = model('ProductoModel');
        $compra = [
            'numero' => 0,
            'monto' => 0,
            'proveedor_id' => 1,
        ];
        $compraModel->insert($compra);
        $data['compraId'] = $compraModel->getInsertID();
        $data['productos'] = $productoModel->findAll();
        $data['proveedores'] = $proveedorModel->findAll();

        return view('admin/compra/compra',$data);
    }

    public function storeProductoCompra(){
        $total = ($this->request->getPost('monto_unitario') * $this->request->getPost('cantidad'));
        $productoCarrito = [
            'producto_id' => $this->request->getPost('producto_id'),
            'compra_id' => $this->request->getPost('compra_id'),
            'monto_unitario' => $this->request->getPost('monto_unitario'),
            'cantidad' => $this->request->getPost('cantidad'),
            'monto_total' => $total,
        ];
        $modalDetalle = model("DetalleCompraModel");
        $modalDetalle->save($productoCarrito);
    }

    public function getDetalleCompra(){
        $compra_id = $this->request->getPost('compra_id');
        $model = model("DetalleCompraModel");
        $data['productosCarrito'] = $model
                                    ->join('producto as p','producto_id = p.id')
                                    ->where('compra_id',$compra_id)->find();
        // dd($data['productosCarrito']);                                    
        echo json_encode($data);
    }

    public function deleteProductoCompra(){
        $detalleCompra_id = $this->request->getPost('detcom_id');
        $model = model("DetalleCompraModel");
        $model->delete($detalleCompra_id);
        echo json_encode("ok");
    }
    
    public function update(){
        $id = $this->request->getPost('compra_id');
        $total = $this->request->getPost('total');
        $proveedor_id = $this->request->getPost('proveedor_id');
        // if(!$cliente = $this->getCliente($id)){
        //     echo json_encode("error: cliente no encontrado");
        // }
        // diferencia entre virtualizador y docker
        $compra = [
            'id'        => $id,
            'numero'    => $id,
            'monto'     => $total,
            'proveedor' => $proveedor_id,
        ];
        $model = model('CompraModel');

        $model->save($compra);
        echo json_encode("ok");
    }
}
