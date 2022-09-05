<aside class="menu is-hidden-mobile " style="margin-left: 20px;">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a href="<?= base_url(route_to('admin/dashboard')) ?>" class="<?= service('request')->uri->getPath() == 'admin/dashboard' ? 'is-active':'' ?>">
                Ventas
            </a>
            <ul>
                <li>
                    <a href="<?= base_url(route_to('admin/ventas')) ?>" class="<?= service('request')->uri->getPath() == 'admin/ventas' ? 'is-active':'' ?>">
                        Realizar venta
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(route_to('admin/ver_ventas')) ?>" class="<?= service('request')->uri->getPath() == 'admin/ver_ventas' ? 'is-active':'' ?>">
                        Ver ventas
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url(route_to('admin/compras')) ?>" class="<?= service('request')->uri->getPath() == 'admin/compras' ? 'is-active':'' ?>">
                Compras
            </a>
        </li>
        <li>
            <a href="<?= base_url(route_to('admin/producto')) ?>" class="<?= service('request')->uri->getPath() == 'admin/producto' ? 'is-active':'' ?>">
                Productos
            </a>
        </li>
        <li>
            <a href="<?= base_url(route_to('admin/proveedores')) ?>" class="<?= service('request')->uri->getPath() == 'admin/proveedores' ? 'is-active':'' ?>">
                Proveedores
            </a>
        </li>
        <li>
            <a href="<?= base_url(route_to('admin/clientes')) ?>" class="<?= service('request')->uri->getPath() == 'admin/clientes' ? 'is-active':'' ?>">
                Clientes
            </a>
        </li>
        <li>
            <a href="<?= base_url(route_to('admin/cotizaciones')) ?>" class="<?= service('request')->uri->getPath() == 'admin/cotizaciones' ? 'is-active':'' ?>">
                Cotizaciones
            </a>
        </li>
        <!-- <li>
            <a>Certificados</a>
            <ul>
                <li>
                    <a href="#">Emitidos</a>
                </li>
                <li>
                    <a href="#">Modelo</a>
                </li>
            </ul>
        </li> -->
        <li>
            <a href="#">Usuarios</a>
        </li>
        
    </ul>
    <p class="menu-label">
        Institución
    </p>
    <ul class="menu-list">
        <li>
            <a>Información general</a>
        </li>
    </ul>
    <p class="menu-label">
        Configuración
    </p>
    <ul class="menu-list">
        <li><a>test</a></li>
    </ul>
</aside>