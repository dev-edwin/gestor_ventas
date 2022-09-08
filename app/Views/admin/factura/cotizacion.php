<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
    Productos
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .image .alineadoTextoImagenCentro {
        vertical-align: middle;
    }
</style>
<input id="base_url" type="hidden" value="<?= base_url() ?>">

<div class="columns is-multiline">
    <div class="column is-12">
        <div class="container" id="factura">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <div class="has-text-left">
                        <h2 class="subtitle">Gestor Ventas</h2>
                    </div>
                </div>
                <div class="column is-12">
                    <div class="has-text-centered">
                        <h2 class="subtitle">Cotizacion #<?= $cotizacion['id'] ?></h2>
                    </div>
                </div>
                <div class="column is-12">
                    <div class="has-text-left">
                        <p><b>Cliente:</b>&nbsp;<?= $cotizacion['cliente'] ?></p>
                    </div>
                    <div class="has-text-right">
                        <p><b>Fecha:</b><?= $cotizacion['created_at'] ?></p>
                    </div>
                </div>
                <div class="column is-12">
                    <div class="continer">
                        <div class="card events-card">
                            <div class="card-table">
                                <div class="content">
                                    <table class="table is-fullwidth is-striped">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Unidad</th>
                                                <th>cantidad</th>
                                                <th>P/U</th>
                                                <th>Sub Total Bs</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $cont = 1; ?>
                                            <?php $totalVenta = 0; ?>
                                            <?php foreach($detCotizaciones as $detVenta): ?>
                                                <tr>
                                                    <td><?= $detVenta['nombre_producto'] ?></td>
                                                    <td><?= $detVenta['unidad'] ?></td>
                                                    <td><?= $detVenta['cantidad'] ?></td>
                                                    <td><?= number_format($detVenta['monto_unitario'],2) ?></td>
                                                    <td><?= number_format($detVenta['monto_total'],2) ?></td>
                                                </tr>
                                            <?php $totalVenta += number_format($detVenta['monto_total'],2); ?>
                                            <?php $cont++; ?>
                                            <?php endForeach; ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Total Bs</td>
                                                <td><?= number_format($cotizacion['monto'],2) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = () => {
        imprim1("factura");
    }
    function imprim1(imp1){
        var contenido= document.getElementById(imp1).innerHTML;
        var contenidoOriginal= document.body.innerHTML;

        document.body.innerHTML = contenido;

        window.print();

        document.body.innerHTML = contenidoOriginal;
    }
</script>
<script src="<?= base_url('resource/js/modalBulma.js') ?>"></script>
<?= $this->endSection() ?>