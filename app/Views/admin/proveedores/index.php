<?= $this->extend('admin/layout/main')?>
<?= $this->section('title')?>
home
<?= $this->endSection()?>

<?= $this->section('content')?>
<div class="column is-9">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="../">Bulma</a></li>
            <li><a href="../">Templates</a></li>
            <li><a href="../">Examples</a></li>
            <li class="is-active"><a href="#" aria-current="page">Admin</a></li>
        </ul>
    </nav>
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
                    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fa fa-angle-down" aria-hidden="true"></i>
      </span>
    </a>
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
                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
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
                        Buscar Proveedor
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
        </div>
    </div>
</div>
</div>
</div>
<script async type="text/javascript" src="../js/bulma.js"></script>
<?= $this->endSection()?>