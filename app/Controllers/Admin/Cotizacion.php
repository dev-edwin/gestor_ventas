<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Cotizacion extends BaseController
{
    public function index()
    {
        $productoModel = model('ProductoModel');
        $clienteModel = model('ClienteModel');
        $data['productos'] = $productoModel->find();
        $data['clientes'] = $clienteModel->find();

        return view('admin/cotizacion/index',$data);
    }
    public function verCotizacion()
    {
        $cotizacionModel = model('CotizacionModel');
        $data['cotizaciones'] = $cotizacionModel->find();

        return view('admin/cotizacion/cotizaciones',$data);
    }

    public function getDetalleCotizacion(){
        $cotizacion_id = $this->request->getPost('cotizacion_id');
        $detalleCotizacionModel = model('DetalleCotizacionModel');
        $data['productosCarrito'] = $detalleCotizacionModel
                                    ->join('producto as p','producto_id = p.id')
                                    ->where('cotizacion_id',$cotizacion_id)
                                    ->find();
        echo json_encode($data);
    }

    public function storeDetalleCotizacion(){
        $producto_id = $this->request->getPost('producto_id');
        $precio = $this->request->getPost('precio');
        $cantidad = $this->request->getPost('cantidad');
        $total = $precio * $cantidad;

        $productoCarrito = [
            'producto_id' => $producto_id,
            'cotizacion_id' => 0,
            'monto_unitario' => $precio,
            'cantidad' => $cantidad,
            'monto_total' => $total,
        ];
        $model = model('DetallecotizacionModel');
        $model->save($productoCarrito);

        echo json_encode("ok");
    }

    public function saveCotizacion(){
        $cotizacion = [
            'cliente'       => $this->request->getPost('cliente'),
            'fecha_limite'  => $this->request->getPost('fecha_limite'),
            'monto'         => $this->request->getPost('total'),
        ];
        $modelCotizacion = model('CotizacionModel');
        $modelCotizacion->insert($cotizacion);
        $detCotizacionId = $modelCotizacion->getInsertID();
        $detalleCotizacionModel = model('DetalleCotizacionModel');
        $cotizacion_id = 0;
        $productosCarrito = $detalleCotizacionModel
                                    ->where('cotizacion_id',$cotizacion_id)
                                    ->find();
        foreach($productosCarrito as $productoCarrito){
            // dd($productoCarrito);
            $productoCarrito['cotizacion_id'] = $detCotizacionId;
            $detalleCotizacionModel->save($productoCarrito);
        }

        echo json_encode($detCotizacionId);
    }

    public function deleteProductoCotizacion(){
        $detalleCotizacion_id = $this->request->getPost('detvent_id');
        $model = model("DetalleCotizacionModel");
        $model->delete($detalleCotizacion_id);
        echo json_encode("ok");
    }

    public function boucher($cotizacion_id){
        $cotizacionModel = model("CotizacionModel");
        $detCotizacionModel = model("DetalleCotizacionModel");
        if(!$data['cotizacion'] = $cotizacionModel->where('id',$cotizacion_id)->first()){
            return "";
        }
        $data['detCotizaciones'] = $detCotizacionModel->join('producto as p','producto_id = p.id')
                                            ->where('cotizacion_id',$cotizacion_id)
                                            ->find();
        return view("admin/factura/cotizacion",$data);
        
    }
}
