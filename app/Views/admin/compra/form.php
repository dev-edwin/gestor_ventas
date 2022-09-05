<div class="columns is-mobile is-multiline">
    <div class="column is-12">
        <div class="field">
            <input id="compra_id" name="id" value="<?= $compraId ?>" type="hidden">
            <input id="totalCompra" name="totalCompra" value="" type="hidden">
            <label class="label" for="nombre_proveedor">
                Proveedor<span class="has-text-danger">*</span> 
                <input class="input" id="nombre_proveedor" name="nombre_proveedor" value="" list="proveedores" onkeyup="mayus(this);">
            </label>
            <datalist id="proveedores">
                <?php foreach($proveedores as $proveedor):?>
                    <option value="<?= $proveedor['id'] ?>"><?= $proveedor['nombre'] ?></option>
                <?php endForeach;?>
            </datalist>
            
            <p class="is-danger help" id="error_name_product"></p>
        </div>
    </div>

    <div class="column is-12">
        <div class="field">
            <div class="container">
                <div class="columns">
                    <div class="column is-5">
                        <table class="table is-fullwidth is-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $cont = 1;
                                    foreach ($productos as $producto): 
                                ?>
                                <tr>
                                    <td><?= $cont; ?></td>
                                    <td><?= $producto['nombre_producto']; ?></td>
                                    <td>
                                        <button class="button is-primary modal-button js-modal-trigger is-small" data-target="modal_agregarProducto" aria-haspopup="true" onclick="addCart(<?= $producto['id'] ?>)">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php 
                                    $cont++; 
                                    endForeach; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="column is-7">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Unidad</th>
                                <th>cantidad</th>
                                <th>p/unit</th>
                                <th>Sub Total Bs</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cardProductoTable">

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="column is-6">
        <div class="field">
            <p class="control">
                <!-- <input type="submit" class="button is-success" value="Guardar" > -->
                <button class="button is-success" onclick="terminarCompra()">Guardar</button>
                <button class="button">Cancel</button>
            </p>
        </div>
    </div>
</div>
<div id="modal_agregarProducto" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Agregar producto al carrito</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="content">
                <div class="columns">
                    <div class="column is-6">
                        <div class="card events-card">
                            <div class="card-table">
                                <section class="section">
                                    <label class="label" for="precio_unitario">
                                        Precio unitario<span class="has-text-danger">*</span> 
                                        <input class="input" id="precio_unitario" name="precio_unitario" value="" type="number" min="0">
                                    </label>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="card events-card">
                            <div class="card-table">
                                <section class="section">
                                    <label class="label" for="cantidad">
                                        Cantidad<span class="has-text-danger">*</span> 
                                        <input class="input" id="cantidad" name="cantidad" value="" type="number" min="0">
                                    </label>
                                    <input class="input" id="carproducto_id" name="carproducto_id" value="" type="hidden">
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-12">
                        <div class="card events-card">
                            <div class="card-table">
                                <button class="button is-small is-primary" onclick="saveProducto()">
                                    agregar al carrito 
                                </button>
                                <a class="button is-small is-danger" href="<?= base_url('/admin/compras') ?>">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script src="<?= base_url('resource/js/compra.js')?>">

</script>
<script src="<?= base_url('resource/js/modalBulma.js') ?>"></script>
