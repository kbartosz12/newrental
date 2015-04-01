<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Rental</title>

        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>

        <div id="container">
            <?php if(validation_errors()): ?>
            <div style="border: lpx solid red;">
                 <?php echo "Niepoprwny login lub hasło!" ?>
        </div>
            <?php endif; ?>
            
            <form method="post">
                <table class="fullwidth border cell_input">
                    <tr>
                        <td width="300px"><label for="login">Login:</label> <span class="required right">*</span></td>
                        <td><input type="text" name="login" value="<?= set_value('login'); ?>" required /></td>
                        <td class="error"><?php echo form_error('login'); ?></td>
                    </tr>
                    <tr>
                        <td><label for="password">Hasło:</label> <span class="required right">*</span></td>
                        <td><input type="password" id="pass" name="password" /></td>
                        <td class="error"><?php echo form_error('password'); ?></td>
                    </tr>
                </table>
                <div>
                    <input type='submit' value='Zaloguj'/>
                </div>
            </form>
        </div>
        
        <div>
            
            <a href="register" >Zarejestruj </a>
            
        </div>

    </body>
</html>