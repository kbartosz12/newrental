<div id="container">
    <?php if (validation_errors()): ?>
        <div style="border: lpx solid red;">
            <?php echo "Pojawiły się błędy, zobacz niżej: <br />".validation_errors() ?>
        </div>
    <?php endif; ?>
    <form method="post">
        <table class="fullwidth border cell_input">
            <tr>
                <td><label for="repassword">Marka:</label> <span class="required right">*</span></td>
                <td><select name="brand_id" id="brand_id" onchange="get_models()">
                        <?php foreach ($brands as $group): ?>
                            <option value="<?php echo $group->brand_id; ?>"><?php echo $group->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="error"><?php echo form_error('brand_id'); ?></td>
            </tr>
            <tr>
                <td><label for="name">Model:</label> <span class="required right">*</span></td>
                <td id="models_box">
                </td>
                <td class="error"><?php echo form_error('model'); ?></td>
            </tr>
            <tr>
                <td width="300px"><label for="login">Typ pojazdu:</label> <span class="required right">*</span></td>
                <td>
                    <select name="car_type">
                        <option value="passenger">Osobowe</option>
                        <option value="van">Bus</option>
                        <option value="truck">Ciężarówka</option>
                        <option value="other">Inne</option>
                    </select>
                </td>
                <td class="error"><?php echo form_error('car_type'); ?></td>
            </tr>
            <td><label for="repassword">Rodzaj silnika:</label> <span class="required right">*</span></td>
            <td><select name="engine">
                    <?php foreach ($engine as $engin): ?>
                        <option value="<?php echo $engin->engine_id; ?>"><?php echo $engin->type; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>

            <tr>
                <td width="300px"><label for="login">Liczba miejsc:</label></td>
                <td><input type="text" name="seats" value="<?= set_value('seats'); ?>"  /></td>
                <td class="error"><?php echo form_error('seats'); ?></td>
            </tr>
            <tr>
                <td width="300px"><label for="login">Kolor:</label></td>
                <td><input type="text" name="color" value="<?= set_value('color'); ?>"  /></td>
                <td class="error"><?php echo form_error('color'); ?></td>
            </tr>
        </table>
        <div>
            <input type='submit' value='ZAPISZ'/>
        </div>
    </form>
</div>
<script type="text/javascript">
    //
    $(document).ready(function () {
        get_models();
    });
    
    function get_models()
    {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/cars/getModels') ?>",
            data: {brand_id: $('#brand_id').val()},
            dataType: "html",
            success: function (msg) {
                $('#models_box').html(msg);
            },
            complete: function (r) {
                //$('#loading').hide();
            },
            error: function (err) {
                console.log(err)
            }
        });
    }
</script>