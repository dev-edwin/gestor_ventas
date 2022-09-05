<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->group('admin',['namespace'=>'App\Controllers\Admin'],function($routes){
    // PROVEEDORES
    $routes->get('proveedores', 'Proveedor::index');
    $routes->post('getproveedores', 'Proveedor::getproveedores');
    $routes->post('getproveedor', 'Proveedor::getproveedor');
    $routes->post('store_proveedor', 'Proveedor::store');
    $routes->post('update_proveedor', 'Proveedor::update');
    // PRODUCTOS
    $routes->get('producto', 'Producto::index');
    $routes->post('getproducto', 'Producto::getProduct');
    $routes->post('getproductos', 'Producto::getproductos');
    $routes->post('store_producto', 'Producto::store');
    $routes->post('update_producto', 'Producto::update');
    // VENTAS
    $routes->get('ventas', 'Ventas::index');
    $routes->get('ver_ventas', 'Ventas::verVentas');
    $routes->post('store_venta', 'Ventas::store');
    $routes->post('update_venta', 'Ventas::update');
    // COMPRAS
    $routes->get('compras', 'Compra::index');
    $routes->post('getcompras', 'Compra::getCompras');
    $routes->get('add_compra', 'Compra::addCompra');
    $routes->post('get_detalle_compra', 'Compra::getDetalleCompra');
    $routes->post('delete_producto_compra', 'Compra::deleteProductoCompra');
    $routes->post('store_compra', 'Compra::store');
    $routes->post('store_producto_compra', 'Compra::storeProductoCompra');
    $routes->post('update_compra', 'Compra::update');
    // CLIENTES
    $routes->get('clientes', 'Cliente::index');
    $routes->post('getcliente', 'Cliente::getCliente');
    $routes->post('getclientes', 'Cliente::getClientes');
    $routes->post('store_cliente', 'Cliente::store');
    $routes->post('update_cliente', 'Cliente::update');
    // COTIZACIONES
    $routes->get('cotizaciones', 'Cotizaciones::index');
    $routes->post('store_cotizacion', 'Cotizaciones::store');
    $routes->post('update_cotizacion', 'Cotizaciones::update');
    // USUARIOS
    $routes->get('usuarios', 'Usuarios::index');
    $routes->post('store_usuario', 'Usuarios::store');
    $routes->post('update_usuario', 'Usuarios::update');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
