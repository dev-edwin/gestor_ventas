var base_url;
    window.onload = () => {
        base_url = $('#base_url').val();
        drawTable();
    }

    function drawTable() {
        let controller = `${base_url}/admin/getproveedores`;
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
                let proveedores = respuesta['proveedores'];
                proveedores.map(proveedor => {
                    html += `<tr>
                                <td>${cont}</td>
                                <td>${proveedor.nombre}</td>
                                <td>
                                    <button class="button is-small is-info" onclick="editProveedor(${proveedor.id})">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button class="button is-small is-danger" onclick="delete(${proveedor.id})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>`;
                    cont++;
                });
                $('#proveedorTable').html(html);
            },
            error: () => {
                alert("No se logro listar los productos");
            }
        })
    }

    function saveProveedor(){
        // let nombre_producto = $('#nombre').val();
        let nombre = document.getElementById('nombre').value;
        // let id = $('#id_proveedor').val();
        let id = document.getElementById('id_proveedor').value;
        let controller = id === "" ? `${base_url}/admin/store_proveedor`:`${base_url}/admin/update_proveedor`;
        $.ajax({
            url: controller,
            type: "POST",
            data: {
                id:id,
                nombre:nombre
            },
            beforeSend: () => {
            },
            complete: (data) => {},
            success: (response) => {
                closeModal("modal_agregarProveedor");
                cleanForm();
                drawTable();
            },
            error: () => {
                alert("error");
            }
        })
    }

    function getProduct(proveedor_id) {
        let controller = `${base_url}/admin/getproveedor`;
        $.ajax({
            url: controller,
            type: "POST",
            data: {
                proveedor_id: proveedor_id
            },
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                let producto = JSON.parse(response);
                // console.log(producto);
            },
            error: () => {
                alert("error");
            }
        })
    }

    function cleanForm(){
        $('#nombre').val("");
    }

    function closeModal(id_modal) {
        $(`#${id_modal}`).removeClass('is-active');
    }

    function editProveedor(proveedor_id){
        let controller = `${base_url}/admin/getproveedor`;
        $.ajax({
            url: controller,
            type: "POST",
            data: {
                proveedor_id: proveedor_id
            },
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                let proveedor = JSON.parse(response);
                $('#modal_agregarProveedor').addClass('is-active');
                $('#nombre').val(proveedor.nombre);
                $('#id_proveedor').val(proveedor.id);
            },
            error: () => {
                alert("error");
            }   
        })
    }