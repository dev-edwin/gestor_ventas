var base_url;
    window.onload = () => {
        base_url = $('#base_url').val();
        drawTable();
    }

    function drawTable() {
        let controller = `${base_url}/admin/getcompras`;
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
                let compras = respuesta['compras'];
                compras.map(compra => {
                    html += `<tr>
                                <td>${cont}</td>
                                <td>${compra.nombre}</td>
                                <td>${compra.nit}</td>
                                <td>
                                    <button class="button is-small is-info" onclick="editcompra(${compra.id})">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button class="button is-small is-danger" onclick="delete(${compra.id})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>`;
                    cont++;
                });
                $('#compraTable').html(html);
            },
            error: () => {
                alert("No se logro listar los productos");
            }
        })
    }