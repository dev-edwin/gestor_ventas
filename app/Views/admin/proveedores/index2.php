<?= $this->extend('admin/layout/main')?>
<?= $this->section('title')?>
Proveedores
<?= $this->endSection()?>

<?= $this->section('content')?>
<input id="base_url" type="hidden" value="<?= base_url() ?>">
<div class="column is-9">
    <nav class="breadcrumb" aria-label="breadcrumbs">
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Nuestros Proveedores
                </h1>
                <h2 class="subtitle">
                    I hope you are having a great day!
                </h2>
            </div>
        </div>
    </section>
    <div class="columns">
        <div class="column is-6">
            <div class="card events-card">
                <header class="card-header">
                    <p class="card-header-title">
                        Listado de Proveedores
                    </p>
                    <!-- <a href="#" class="card-header-icon" aria-label="more options">
                        <span class="icon">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                    </a> -->
                    <a href="<?= base_url('add_proveedor') ?>" class="button is-small is-primary"><i class="fa-thin fa-plus"></i>Agregar</a>
                </header>
                <div class="card-table">
                    <div class="content">
                        <table class="table is-fullwidth is-striped">
                            <tbody>
                                <?php 
                                    foreach($proveedores as $proveedor){
                                ?>
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td><?php echo $proveedor['nombre']?></td>
                                    <td class="level-right">
                                        <a class="button is-small is-info" href="#">Editar</a> 
                                        <a class="button is-small is-danger" href="#">Borrar</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="#" class="card-footer-item">View All</a>
                </footer>
            </div>
        </div>
        <div class="column is-6">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Agregar proveedor
                    </p>
                    <a href="#" class="card-header-icon" aria-label="more options">
                        <span class="icon">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                    </a>
                </header>
                <div class="card-content">
                    <div class="content">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="text" placeholder="">
                            <span class="icon is-medium is-left">
                                <i class="fa fa-search"></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Agregar Proveedor
                    </p>
                    <a href="#" class="card-header-icon" aria-label="more options">
                        <span class="icon">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                    </a>
                </header>
                <div class="card-content">
                    <div class="content">
                        <div class="control has-icons-left has-icons-right">
                            <input id="name_proveedor" class="input is-large" type="text" placeholder="">
                            <span class="icon is-medium is-left">
                                <i class="fa fa-search"></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <button class="butto is-medium is-primary" onclick="addProveedor()">
                        guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script async type="text/javascript" src="../js/bulma.js"></script>
<script>
    var base_url;
    window.onload = () =>{
        base_url = $('#base_url').val();
        drawTable();
    }

    // function drawTable(){
        
    // }

// $(document).ready(function () {
//     $("#formulario").bind("submit",function(){
//         // Capturamnos el boton de envío
//         var btnEnviar = $("#btnEnviar");
//         $.ajax({
//             type: $(this).attr("method"),
//             url: $(this).attr("action"),
//             data:$(this).serialize(),
//             beforeSend: function(){
//                 /*
//                 * Esta función se ejecuta durante el envió de la petición al
//                 * servidor.
//                 * */
//                 // btnEnviar.text("Enviando"); Para button 
//                 btnEnviar.val("Enviando"); // Para input de tipo button
//                 btnEnviar.attr("disabled","disabled");
//             },
//             complete:function(data){
//                 /*
//                 * Se ejecuta al termino de la petición
//                 * */
//                 btnEnviar.val("Enviar formulario");
//                 btnEnviar.removeAttr("disabled");
//             },
//             success: function(data){
//                 /*
//                 * Se ejecuta cuando termina la petición y esta ha sido
//                 * correcta
//                 * */
//                 $(".respuesta").html(data);
//             },
//             error: function(data){
//                 /*
//                 * Se ejecuta si la peticón ha sido erronea
//                 * */
//                 alert("Problemas al tratar de enviar el formulario");
//             }
//         });
//         // Nos permite cancelar el envio del formulario
//         return false;
//     });
// });

    function addProveedor(){
        let name = $('#name_proveedor').val();
        console.log($(this).serialize());
        let controllador = `${base_url}/admin/store`;
        $.ajax({
            url:controllador,
            type:"POST",
            data:{name:name},
            beforeSend: () => {},
            complete: (data) => {},
            success: (response)=>{
                alert("ok");
            },
            error: ()=>{
                alert("error");
            }
        })
    }
</script>
<?= $this->endSection()?>