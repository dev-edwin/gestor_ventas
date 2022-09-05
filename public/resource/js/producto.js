var base_url;
    window.onload = () => {
        base_url = $('#base_url').val();
        drawTable();
    }

    function drawTable() {
        let controller = `${base_url}/admin/getproductos`;
        $.ajax({
            url: controller,
            type: "POST",
            data: {},
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                let respuesta = JSON.parse(response);
                var html = ``;
                let cont = 1;
                let productos = respuesta['productos'];
                productos.map(producto => {
                    html += `<tr>
                                <td>${cont}</td>
                                <td>${producto.nombre_producto}</td>
                                <td>${producto.unidad}</td>
                                <td>${producto.precio_mayor}</td>
                                <td>${producto.precio_menor}</td>
                                <td>
                                    <button class="button is-small is-info" onclick="editProduct(${producto.id})">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button class="button is-small is-danger" onclick="delete(${producto.id})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>`;
                    cont++;
                });
                $('#productoTable').html(html);
            },
            error: () => {
                alert("No se logro listar los productos");
            }
        })
    }

    function savePrduct(){
        let nombre_producto = $('#nombre_producto').val();
        let unidad = $('#unidad').val();
        let precio_mayor = $('#precio_mayor').val();
        let precio_menor = $('#precio_menor').val();
        let id = $('#id_producto').val();
        let controller = id === "" ? `${base_url}/admin/store_producto`:`${base_url}/admin/update_producto`;
        $.ajax({
            url: controller,
            type: "POST",
            data: {
                id:id,
                nombre_producto:nombre_producto,
                unidad:unidad,
                precio_mayor:precio_mayor,
                precio_menor:precio_menor,
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

    function getProduct(product_id) {
        let controller = `${base_url}/admin/getproducto`;
        $.ajax({
            url: controller,
            type: "POST",
            data: {
                product_id: product_id
            },
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                let producto = JSON.parse(response);
                console.log(producto);
            },
            error: () => {
                alert("error");
            }
        })
    }

    function cleanForm(){
        $('#nombre_producto').val("");
        $('#unidad').val("");
        $('#precio_mayor').val("");
        $('#precio_menor').val("");
        $('#id_producto').val("");
    }

    function closeModal(id_modal) {
        $(`#${id_modal}`).removeClass('is-active');
    }

    function editProduct(product_id){
        let controller = `${base_url}/admin/getproducto`;
        $.ajax({
            url: controller,
            type: "POST",
            data: {
                product_id: product_id
            },
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                let producto = JSON.parse(response);
                $('#modal_agregarProducto').addClass('is-active');
                $('#nombre_producto').val(producto.nombre_producto);
                $('#unidad').val(producto.unidad);
                $('#precio_mayor').val(producto.precio_mayor);
                $('#precio_menor').val(producto.precio_menor);
                $('#id_producto').val(producto.id);
            },
            error: () => {
                alert("error");
            }   
        })
    }
