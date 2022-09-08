<!-- START NAV -->
<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?= base_url(route_to('login')) ?>">
                <img src="https://images.vexels.com/media/users/3/205437/isolated/lists/1d84c7d31a188b47fe75640a85af8d9c-icono-de-trazo-de-venta-de-compras-en-linea.png" alt="Logo">
                <!-- <img src="https://cdn.emk.dev/templates/bulma-logo-light.png" alt="Logo"> -->
            </a>
            <span class="navbar-burger burger" data-target="navbarMenu">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-end">
                <a class="navbar-item is-active" href="<?= base_url(route_to('login')) ?>">
                    Iniciar Sesión
                </a>
            </div>
        </div>
    </div>
</nav>
    <!-- END NAV -->