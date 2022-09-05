<div class="columns is-mobile is-multiline">
    <div class="column is-12">
        <div class="field">
            <input id="id_cliente"name="id" value="" type="hidden">
            <label class="label" for="nombre">Nombre completo del cliente<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" id="nombre" name="nombre" value="" type="text" placeholder="Nombre del cliente" onkeyup="mayus(this);">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-box"></i>
                </span>
            </div>
            <p class="is-danger help" id="error_name_product"></p>
        </div>
    </div>
    <div class="column is-12-desktop">
        <div class="field">
            <label class="label" for="nit">Nit del cliente<span class="has-text-danger">*</span></label>
            <div class="control has-icons-left">
                <input class="input" id="nit" name="nit" value="" type="number" placeholder="Numero de NIT" min="0">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-hashtag"></i>
                </span>
            </div>
            <p class="is-danger help" id="error_nit"></p>
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
                <button class="button is-success" onclick="saveCliente()">Guardar</button>
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
