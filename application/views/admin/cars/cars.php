<div class="wraper">

    <h2>Lista dostępnych pojazdów</h2>
    <div>
        <a href="<?php echo base_url('admin/cars/addCar'); ?>" class="btn btn-info" role="button">Dodaj pojazd</a>
        <table class="table-bordered" data-toggle="table">
            <thead>
                <tr>
                    <th >Marka</th>
                    <th>Model</th>
                    <th>Typ pojazdu</th>
                    <th>Silnik</th>
                    <th>Liczba miejsc</th>
                    <th>Kolor</th>
                    <th>Opcje</th>
                </tr>
                <?php if (!empty($cars)): ?>
                    <?php foreach ($cars as $car): ?>

                        <tr>
                            <td>                           

                                <?php echo $car->name; ?>
                            
                            </td>
                            <td>
                                <?php echo $car->model; ?>
                            </td>
                            <td>
                                <?php // tu trzeba dodać funkcję tłumaczącą, albo dorzucić tabelę car_type (polecam)
                                echo $car->car_type; ?>
                            </td>
                            <td>
                                <?php echo $car->type; ?>
                            </td>
                            <td>
                                <?php echo $car->seats; ?>
                            </td>
                            <td>
                                <?php echo $car->color; ?>
                            </td>
                            <td>
                                
                            </td>

                        </tr>
                    <?php endforeach; ?>


                <?php else: ?>
                    <tr>
                        <td colspan="3">brak pojazdów</td>
                    </tr>
                <?php endif; ?>
            </thead>
        </table>
    </div>