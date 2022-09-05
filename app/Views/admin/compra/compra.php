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
                    <span class="title">Compra #<?= $compraId ?></span>
                </p>
                
            </header>
            <div class="card-table">
            <div class="content">
                <div class="columns">
                    <div class="column is-12">
                        <div class="card events-card">
                            <div class="card-table">
                                <section class="section">
                                    <?= $this->include('admin/compra/form') ?>
                                </section>
                            </div>
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

</script>
<script src="<?= base_url('resource/js/modalBulma.js') ?>"></script>
<?= $this->endSection() ?>