<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Rejestracja</title>

        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>

        <div id="container">
            <?php if(validation_errors()): ?>
            <div style="border: lpx solid red;">
                 <?php echo "Są błędy. zobacz niżej" ?>
        </div>
            <?php endif; ?>
            
            <form method="post">
                <table class="fullwidth border cell_input">
                    <tr>
                        <td><label for="name">Imię i nazwisko:</label> <span class="required right">*</span></td>
                        <td><input type="name" id="pass" name="name"  value="<?= set_value('name'); ?>" /></td>
                        <td class="error"><?php echo form_error('name'); ?></td>
                    </tr>
                    <tr>
                        <td width="300px"><label for="login">Login:</label> <span class="required right">*</span></td>
                        <td><input type="text" name="login" value="<?= set_value('login'); ?>" required /></td>
                        <td class="error"><?php echo form_error('login'); ?></td>
                    </tr>
                    <tr>
                        <td width="300px"><label for="login">Email:</label> <span class="required right">*</span></td>
                        <td><input type="text" name="mail" value="<?= set_value('mail'); ?>" required /></td>
                        <td class="error"><?php echo form_error('mail'); ?></td>
                    </tr>
                    <tr>
                        <td><label for="repassword">Grupa:</label> <span class="required right">*</span></td>
                        <td><select name="group_id">
                                <?php foreach ($groups as $group): ?>
                                    <option value="<?php echo $group->group_id; ?>"><?php echo $group->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td class="error"><?php echo form_error('group_id   '); ?></td>
                    </tr>
                    <tr>
                        <td><label for="password">Hasło:</label> <span class="required right">*</span></td>
                        <td><input type="password" id="pass" name="password" /></td>
                        <td class="error"><?php echo form_error('password'); ?></td>
                    </tr>
                    <tr>
                        <td><label for="repassword">Powtórz hasło:</label> <span class="required right">*</span></td>
                        <td><input type="password" id="pass2" name="password2" /></td>
                        <td class="error"><?php echo form_error('repassword'); ?></td>
                    </tr>
                </table>
                <div>
                    <input type='submit' value='ZAPISZ'/>
                </div>
            </form>
        </div>

    </body>
</html>