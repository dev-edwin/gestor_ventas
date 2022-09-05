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

<div class="columns">
    <div class="column is-12">
        <?php if((session('msg'))){ ?>
        <article class="message is-<?= session('msg.type') ?>">
            <div class="message-body">
                <?= session('msg.body ') ?>
            </div>
        </article>
        <?php } ?>
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="title">Todas las compras</span>
                </p>
                <a href="<?= base_url(route_to('admin/add_compra')) ?>" class="button is-primary">
                    <i class="fa-solid fa-user-plus"></i> Realizar compra
                </a>
                <!-- <button class="button is-primary modal-button js-modal-trigger" data-target="modal_agregarProducto" aria-haspopup="true">
                </button> -->
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Compra #</th>
                                <th>Monto en Bs</th>
                                <th>Proveedor</th>
                                <th>fecha y hora</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="compraTable">
                            <?php 
                                $cont = 1;
                                foreach ($compras as $compra): 
                            ?>
                                <tr>
                                    <td><?= $cont; ?></td>
                                    <td><?= $compra['numero'] ?></td>
                                    <td><?= $compra['monto'] ?></td>
                                    <td><?= $compra['nombre'] ?></td>
                                    <td><?= $compra['created_at'] ?></td>
                                    <td></td>
                                </tr>
                            <?php $cont++; ?>
                            <?php endForeach; ?>
                        </tbody>
                    </table>
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
<!-- <script src="<?= base_url('resource/js/compra_2.js')?>"> -->

</script>
<script src="<?= base_url('resource/js/modalBulma.js') ?>"></script>
<?= $this->endSection() ?>