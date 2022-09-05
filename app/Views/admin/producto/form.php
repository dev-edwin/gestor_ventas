<div class="columns is-mobile is-multiline">
    <div class="column is-12">
        <div class="field">
            <input id="id_producto"name="id" value="" type="hidden">
            <label class="label" for="nombre_producto">Nombre producto<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" id="nombre_producto" name="nombre_producto" value="" type="text" placeholder="Nombre del producto" onkeyup="mayus(this);">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-box"></i>
                </span>
            </div>
            <p class="is-danger help" id="error_name_product"></p>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label" for="unidad">Unidad<span class="has-text-danger">*</span></label>
            <div class="control has">
                <input class="input" id="unidad" name="unidad" value="" type="text" placeholder="Unidad de medida" onkeyup="mayus(this);">
                <!-- <span class="icon is-small is-left">
                    <i class="fa-solid fa-union"></i>
                </span> -->
            </div>
            <p class="is-danger help" id="error_unidad"></p>
        </div>
    </div>
    <div class="column is-6-mobile is-6-desktop">
        <div class="field">
            <label class="label" for="precio_mayor">Precio por mayor Bs<span class="has-text-danger">*</span></label>
            <div class="control has-icons-left">
                <input class="input" id="precio_mayor" name="precio_mayor" value="" type="number" placeholder="Precio en Bs" min="0">
                <span class="icon is-small is-left">
                    <i class="fa-sharp fa-solid fa-money-bill"></i>
                </span>
            </div>
            <p class="is-danger help" id="error_pmayor"></p>
        </div>
    </div>  
    <div class="column is-6">
        <div class="field">
            <label class="label" for="precio_menor">Precio por menor</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" id="precio_menor" name="precio_menor" value="" type="number" placeholder="Precio en Bs" min="0">
                <span class="icon is-small is-left">
                    <i class="fa-sharp fa-solid fa-money-bill"></i>
                </span>
            </div>
            <p class="is-danger help" id="error_pmenor"></p>
        </div>
    </div>
    
    <?php if(isset($student)): ?>
    <div class="column is-6-mobile is-6">
        <div class="field">
            <label class="label" for="status_id">Estado</label>
            <div class="control has-icons-left has-icons-right">
                <div class="select">
                    <select name="status_id">
                        <?php foreach($status as $statu): ?>
                            <option value="<?= $statu['status_id'] ?>" <?= $statu['status_id'] == (isset($student['status_id']) ? $student['status_id']:"") ? "selected":"" ?>><?= $statu['status_description'] ?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="icon is-small is-left">
                        <i class="fa-solid fa-square-check"></i>
                    </span>
                </div>
            </div>
            <p class="is-danger help"><?= session('errors.student_phonenumber') ?></p>
        </div>
    </div>
    <?php endIf; ?>
    <div class="column is-6">
        <div class="field">
            <p class="control">
                <!-- <input type="submit" class="button is-success" value="Guardar" > -->
                <button class="button is-success" onclick="savePrduct()">Guardar</button>
                <button class="button">Cancel</button>
            </p>
        </div>
    </div>
</div>

<script>
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>
