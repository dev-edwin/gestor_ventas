<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
    Proveedores
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
                    <span class="title">Lista de proveedores</span>
                </p>
                <button class="button is-primary modal-button js-modal-trigger" data-target="modal_agregarProveedor" aria-haspopup="true">
                    <i class="fa-solid fa-user-plus"></i> Agregar proveedor
                </button>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Proveedor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="proveedorTable"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL -->
<div id="modal_agregarProveedor" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Agregar proveedor</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="content">
                <div class="columns">
                    <div class="column is-12">
                        <div class="card events-card">
                            <div class="card-table">
                                <section class="section">
                                    <?= $this->include('admin/proveedores/form') ?>
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
<script src="<?= base_url('resource/js/proveedor.js') ?>"></script>
<script src="<?= base_url('resource/js/modalBulma.js') ?>"></script>
<?= $this->endSection() ?>