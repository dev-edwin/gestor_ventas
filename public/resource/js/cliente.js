var base_url;
    window.onload = () => {
        base_url = $('#base_url').val();
        drawTable();
    }

    function drawTable() {
        let controller = `${base_url}/admin/getclientes`;
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
                let clientes = respuesta['clientes'];
                clientes.map(cliente => {
                    html += `<tr>
                                <td>${cont}</td>
                                <td>${cliente.nombre}</td>
                                <td>${cliente.nit}</td>
                                <td>
                                    <button class="button is-small is-info" onclick="editCliente(${cliente.id})">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button class="button is-small is-danger" onclick="delete(${cliente.id})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>`;
                    cont++;
                });
                $('#clienteTable').html(html);
            },
            error: () => {
                alert("No se logro listar los productos");
            }
        })
    }

    function saveCliente(){
        let nombre = $('#nombre').val();
        let nit = $('#nit').val();
        let id = $('#id_cliente').val();
        let controller = id === "" ? `${base_url}/admin/store_cliente`:`${base_url}/admin/update_cliente`;
        $.ajax({
            url: controller,
            type: "POST",
            data: {
                id:id,
                nombre:nombre,
                nit:nit,
            },
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                closeModal("modal_agregarCliente");
                cleanForm();
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
        $('#nombre').val("");
        $('#nit').val("");
        $('#id_cliente').val("");
    }

    function closeModal(id_modal) {
        $(`#${id_modal}`).removeClass('is-active');
    }

    function editCliente(cliente_id){
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
                $('#modal_agregarCliente').addClass('is-active');
                $('#nombre').val(cliente.nombre);
                $('#nit').val(cliente.nit);
                $('#id_cliente').val(cliente.id);
            },
            error: () => {
                alert("error");
            }   
        })
    }
