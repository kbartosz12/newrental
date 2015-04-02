<div id="container">
    <?php if (validation_errors()): ?>
        <div style="border: lpx solid red;">
            <?php echo "Pojawiły się błędy, zobacz niżej" ?>
        </div>
    <?php endif; ?>
    <form method="post">
        <table class="fullwidth border cell_input">
            <tr>
                <td><label for="repassword">Marka:</label> <span class="required right">*</span></td>
                <td><select name="brand_id">
                        <?php foreach ($brands as $group): ?>
                            <option value="<?php echo $group->brand_id; ?>"><?php echo $group->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="error"><?php echo form_error('brand_id'); ?></td>
            </tr>
            <tr>
                <td><label for="name">Model:</label> <span class="required right">*</span></td>
                <td><input type="name" id="pass" name="model"  value="<?= set_value('model'); ?>" /></td>
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
            <tr>
                <td width="300px"><label for="login">Silnik:</label> <span class="required right">*</span></td>
                <td><input type="text" name="engine" value="<?= set_value('engine'); ?>" required /></td>
                <td class="error"><?php echo form_error('engine'); ?></td>
            </tr>

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