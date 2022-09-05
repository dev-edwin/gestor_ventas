<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Venta extends BaseController
{
    public function index()
    {
        $productoModel = model('ProductoModel');
        $clienteModel = model('ClienteModel');
        $data['productos'] = $productoModel->find();
        $data['clientes'] = $clienteModel->find();

        return view('admin/ventas/index',$data);
    }
    public function verVentas()
    {
        $ventaModel = model('VentaModel');
        $data['ventas'] = $ventaModel->find();

        return view('admin/ventas/ventas',$data);
    }

    public function getDetalleVenta(){
        $venta_id = $this->request->getPost('venta_id');
        $detalleVentaModel = model('DetalleVentaModel');
        $data['productosCarrito'] = $detalleVentaModel
                                    ->join('producto as p','producto_id = p.id')
                                    ->where('venta_id',$venta_id)
                                    ->find();
        echo json_encode($data);
    }

    public function storeDetalleVenta(){
        $producto_id = $this->request->getPost('producto_id');
        $precio = $this->request->getPost('precio');
        $cantidad = $this->request->getPost('cantidad');
        $total = $precio * $cantidad;

        $productoCarrito = [
            'producto_id' => $producto_id,
            'venta_id' => 0,
            'monto_unitario' => $precio,
            'cantidad' => $cantidad,
            'monto_total' => $total,
        ];
        $model = model('DetalleVentaModel');
        $model->save($productoCarrito);

        echo json_encode("ok");
    }

    public function saveVenta(){
        $venta = [
            'cliente'   => $this->request->getPost('cliente'),
            'monto'     => $this->request->getPost('total'),
        ];
        $modelVenta = model('VentaModel');
        $modelVenta->insert($venta);
        $detVentaId = $modelVenta->getInsertID();
        $detalleVentaModel = model('DetalleVentaModel');
        $venta_id = 0;
        $productosCarrito = $detalleVentaModel
                                    ->where('venta_id',$venta_id)
                                    ->find();
        foreach($productosCarrito as $productoCarrito){
            // dd($productoCarrito);
            $productoCarrito['venta_id'] = $detVentaId;
            $detalleVentaModel->save($productoCarrito);
        }

        echo json_encode("ok");
    }

    public function deleteProductoVenta(){
        $detalleVenta_id = $this->request->getPost('detvent_id');
        $model = model("DetalleVentaModel");
        $model->delete($detalleVenta_id);
        echo json_encode("ok");
    }

}
