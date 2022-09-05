var base_url;
window.onload = () => {
    base_url = $('#base_url').val();
    drawTable();
}

function drawTable() {
    let compra_id = $('#compra_id').val();
    let controller = `${base_url}/admin/get_detalle_compra`;
    $.ajax({
        url: controller,
        type: "POST",
        data: {compra_id: compra_id},
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
                            <td>${producto.monto_unitario}</td>
                            <td>${producto.monto_total}</td>
                            <td>
                                <button class="button is-small is-danger" onclick="deleteProducto(${producto.detcom_id})">
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
                        <td></td>
                        <td>`+parseFloat(total).toFixed(3)+`</td>
                        <td></td>
                    </tr>`;
            $('#totalCompra').val(total);
            $('#cardProductoTable').html(html);
        },
        error: () => {
            alert("No se logro listar los productos");
        }
    })
}

function addCart(id_producto){
    $('#carproducto_id').val(id_producto);
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

function deleteProducto(detcom_id){
    let controller = `${base_url}/admin/delete_producto_compra`;
    $.ajax({
        url: controller,
        type: "POST",
        data: {
            detcom_id:detcom_id
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

function cleanForm(){
    $('#cantidad').val("");
    $('#precio_unitario').val("");
    $('#id_producto').val("");
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
