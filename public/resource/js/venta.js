var base_url;
window.onload = () => {
    base_url = $('#base_url').val();
    drawTable();
}

function drawTable() {
    let venta_id = 0;
    let controller = `${base_url}/admin/get_detalle_venta`;
    $.ajax({
        url: controller,
        type: "POST",
        data: {venta_id: venta_id},
        beforeSend: () => {},
        complete: (data) => {},
        success: (response) => {
            let respuesta = JSON.parse(response);
            var html = ``;
            let cont = 1;
            let productosCarrito = respuesta['productosCarrito'];
            let total = 0;
            productosCarrito.map(producto => {
                subTotal = producto.cantidad * producto.monto_unitario;
                total += parseFloat(producto.monto_total);
                html += `<tr>
                            <td>${cont}</td>
                            <td>${producto.nombre_producto}</td>
                            <td>${producto.unidad}</td>
                            <td>${producto.cantidad}</td>
                            <td>${parseFloat(producto.monto_unitario).toFixed(2)}</td>
                            <td>${parseFloat(producto.monto_total).toFixed(2)}</td>
                            <td>
                                <button class="button is-small is-danger" onclick="deleteProducto(${producto.detvent_id})">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>`;
                cont++;
            });
            html += `<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Bs</td>
                        <td>`+parseFloat(total).toFixed(2)+`</td>
                        <td></td>
                    </tr>`;
            $('#totalVenta').val(total);
            $('#carritoVentaTable').html(html);
        },
        error: () => {
            alert("No se logro listar los productos");
        }
    })
}

function addCart(id_producto){
    $('#carproducto_id').val(id_producto);
}

function addCarrito(producto_id){
    let precio = $(`#precio${producto_id}`).val();
    let cantidad = $(`#cantidad${producto_id}`).val();
    let controller = `${base_url}/admin/store_producto_venta`;
    $.ajax({
        url: controller,
        type: "POST",
        data: {
            producto_id:producto_id,
            precio:precio,
            cantidad:cantidad,
        },
        beforeSend: () => {},
        complete: (data) => {},
        success: (response) => {
            drawTable();
            cleanForm(``,`#cantidad${producto_id}`);
        },
        error: () => {
            alert("error");
        }
    })
}

function saveProducto(){
    let producto_id = $('#carproducto_id').val();
    let cantidad = $('#cantidad').val();
    let monto_unitario = $('#precio_unitario').val();
    let compra_id = $('#compra_id').val();
    let controller = `${base_url}/admin/store_producto_compra`;
    $.ajax({
        url: controller,
        type: "POST",
        data: {
            compra_id:compra_id,
            producto_id:producto_id,
            cantidad:cantidad,
            monto_unitario:monto_unitario
        },
        beforeSend: () => {},
        complete: (data) => {},
        success: (response) => {
            closeModal("modal_agregarProducto");
            cleanForm();
            drawTable();
        },
        error: () => {
            alert("error");
        }
    })
}

function deleteProducto(detvent_id){
    let controller = `${base_url}/admin/delete_producto_venta`;
    $.ajax({
        url: controller,
        type: "POST",
        data: {
            detvent_id:detvent_id
        },
        beforeSend: () => {},
        complete: (data) => {},
        success: (response) => {
            drawTable();
        },
        error: () => {
            alert("error");
        }
    })
}

function getProduct(cliente_id) {
    let controller = `${base_url}/admin/getcliente`;
    $.ajax({
        url: controller,
        type: "POST",
        data: {
            cliente_id: cliente_id
        },
        beforeSend: () => {},
        complete: (data) => {},
        success: (response) => {
            let cliente = JSON.parse(response);
        },
        error: () => {
            alert("error");
        }
    })
}

function cleanForm(precio, cantidad){
    $(precio).val("");
    $(cantidad).val("");
}

function closeModal(id_modal) {
    $(`#${id_modal}`).removeClass('is-active');
}

function terminarCompra(){
    let compra_id = $('#compra_id').val();
    let total = $('#totalCompra').val();
    let proveedor_id = $('#nombre_proveedor').val();
    let controller = `${base_url}/admin/update_compra`;
    $.ajax({
        url: controller,
        type: "POST",
        data: {
            compra_id: compra_id,
            total: total,
            proveedor_id:proveedor_id
        },
        beforeSend: () => {},
        complete: (data) => {},
        success: (response) => {
            $('#totalCompra').val("");
            window.location.href = `${base_url}/admin/compras`;
        },
        error: () => {
            alert("error");
        }
    })
}

function finalizarVenta(){
    let compra_id = $('#compra_id').val();
    let total = $('#totalVenta').val();
    let cliente = $('#cliente').val();
    let controller = `${base_url}/admin/update_venta`;
    $.ajax({
        url: controller,
        type: "POST",
        data: {
            cliente: cliente,
            total: total,
        },
        beforeSend: () => {},
        complete: (data) => {},
        success: (response) => {
            // $('#totalCompra').val("");
            let venta_id = JSON.parse(response);
            window.open(`${base_url}/admin/factura/${venta_id}`, '_blank', 'location=yes');
            window.location.href = `${base_url}/admin/ventas`;
        },
        error: () => {
            alert("error");
        }
    })
}
