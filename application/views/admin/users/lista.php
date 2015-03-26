<div class="wraper">
    <div>
        <?php if($this->session->flashdata('success')): ?>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
        <?php endif; ?>
    </div>
    <h2>Lista użytkowników</h2>
    <div>
        <a href="<?php echo base_url('admin/users/create');  ?>" class="btn btn-info" role="button">Dodaj użytkownika</a>
        <table class="table-bordered" data-toggle="table">
              <thead>
            <tr>
                <th >Nazwa</th>
                <th>Login</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Opcje</th>
            </tr>
            <?php if (!empty($list)): ?>
                <?php foreach ($list as $user): ?>
                    <tr>
                        <td>
                            <?php echo $user->name; ?>
                        </td>
                        <td>
                             <?php echo $user->login; ?>
                        </td>
                        <td>
                             <?php echo $user->email; ?>
                        </td>
                        <td>
                            <?php if ($user->group_id == 1) echo 'tak';
                            else echo 'nie'; ?>
                            <?php //echo ($user->group_id == 1) ? 'tak' : 'nie'; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/users/edit/'.$user->user_id)?>" >Edytuj</a><br />
                            <a href="<?= base_url('admin/users/delete/'.$user->user_id)?>" 
                               onclick="return confirm('Czy jesteś pewien?');">Usuń</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="3">brak użytkowników</td>
                    </tr>
            <?php endif; ?>
                      </thead>
        </table>
    </div>
</div>