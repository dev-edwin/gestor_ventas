<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
    Cotizaciones
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .image .alineadoTextoImagenCentro {
        vertical-align: middle;
    }
</style>
<input id="base_url" type="hidden" value="<?= base_url() ?>">

<div class="columns is-multiline">
    <div class="column is-9">
        <input class="input" id="totalCotizacion" name="totalCotizacion" value="" type="hidden">
        <label class="label" for="cliente">
            Cliente codigo<span class="has-text-danger">*</span> 
            <input class="input" id="cliente" name="cliente" value="" list="clientes" onkeyup="mayus(this);">
        </label>
        <datalist id="clientes">
            <?php foreach($clientes as $cliente):?>
                <option value="<?= $cliente['nit'] ?> - <?= $cliente['nombre'] ?>"></option>
            <?php endForeach;?>
        </datalist>
    </div>
    <div class="column is-3>
        <input class="input" id="totalCotizacion" name="totalCotizacion" value="" type="hidden">
        <label class="label" for="cliente">
            Fecha Limite<span class="has-text-danger">*</span> 
            <input type="datetime-local" class="input" id="fecha_limite" name="fecha_limite" value="">
        </label>
    </div>
    <div class="column is-12">
        <div class="container">
            <button class="button is-primary" onclick="finalizarCotizacion()">
            <i class="fa-solid fa-cash-register"></i>&nbsp;&nbsp;Finalizar cotizacion
            </button>
        </div>
    </div>
    <div class="column is-12">
        <div class="container">
            <div class="columns">
                <div class="column is-5">
                    <div class="card events-card">
                        <div class="card-table">
                            <div class="content">
                                <table class="table is-fullwidth is-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Producto</th>
                                            <th>Unidad</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $cont = 1;?>
                                        <?php foreach ($productos as $producto):?>
                                            <tr>
                                                <td><?= $cont ?></td>
                                                <td><?= $producto['nombre_producto'] ?></td>
                                                <td><?= $producto['unidad'] ?></td>
                                                <td>
                                                    <select name="" id="precio<?= $producto['id'] ?>">
                                                        <option value="<?= $producto['precio_menor'] ?>"><?= $producto['precio_menor'] ?></option>
                                                        <option value="<?= $producto['precio_mayor'] ?>"><?= $producto['precio_mayor'] ?></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="input" id="cantidad<?= $producto['id'] ?>" value="" type="number">
                                                </td>
                                                <td>
                                                    <button class="button is-primary is-small" onclick="addCarrito(<?= $producto['id'] ?>)" title="Agregar al carrito">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php $cont++; ?>
                                        <?php endForeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-7">
                    <div class="card events-card">
                        <div class="card-table">
                            <div class="content">
                                <table class="table is-fullwidth is-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Producto</th>
                                            <th>Unidad</th>
                                            <th>cantidad</th>
                                            <th>P/U</th>
                                            <th>Sub Total Bs</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="carritoCotizacionTable"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL -->
<div id="modal_agregarProducto" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Agregar producto</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="content">
                <div class="columns">
                    <div class="column is-12">
                        <div class="card events-card">
                            <div class="card-table">
                                <section class="section">
                                    <?= $this->include('admin/producto/form') ?>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- MODAL -->
<script src="<?= base_url('resource/js/cotizacion.js')?>">

</script>
<script src="<?= base_url('resource/js/modalBulma.js') ?>"></script>
<?= $this->endSection() ?>