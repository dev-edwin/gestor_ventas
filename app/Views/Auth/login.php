<?= $this->extend('users/layout/main') ?>
<?= $this->section('title')?>
Login
<?= $this->endSection()?>

<?= $this->section('content') ?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <?php if((session('msg'))){ ?>
                    <article class="message is-<?= session('msg.type') ?>">
                        <div class="message-body">
                            <?= session('msg.body ') ?>
                        </div>
                    </article>
                <?php } ?>
                <figure style="margin-bottom: 40px;">
                    <!-- <img src="https://placeimg.com/640/480/any" alt="Melton Hill Lake"> -->
                    <img style="display: block; margin: 0px auto;" src="https://images.vexels.com/media/users/3/205437/isolated/lists/1d84c7d31a188b47fe75640a85af8d9c-icono-de-trazo-de-venta-de-compras-en-linea.png" alt="Logo">
                </figure>                
                <form action="<?= base_url(route_to('signin')) ?>" method="POST">
                    <div class="field">
                        <div class="control">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input is-medium is-rounded" type="email" name="user_email" placeholder="Email" value="<?= old('user_email') ?>">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </p>
                            <p class="is-danger help"><?= session('errors.user_email') ?></p>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <p class="control has-icons-left">
                                <input class="input is-medium is-rounded" type="password" name="user_password" placeholder="Contraseña">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                            <p class="is-danger help"><?= session('errors.user_password') ?></p>
                        </div>
                    </div>
                    <br/>
                    <input type="submit" class="button is-block is-fullwidth is-primary is-medium is-rounded" value="Ingresar">
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>