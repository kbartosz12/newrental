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
                </tr>
                <?php if (!empty($cars)): ?>
                    <?php foreach ($cars as $car): ?>

                        <tr>
                            <td>                           

                                <?php echo $car->brand_id; ?>
                             <?php //jak to zrobić, żeby wyświetlało markę samochodu, a nie jego id? ?>
                            </td>
                            <td>
                                <?php echo $car->model; ?>
                            </td>
                            <td>
                                <?php echo $car->car_type; ?>
                            </td>
                            <td>
                                <?php echo $car->engine; ?>
                            </td>
                            <td>
                                <?php echo $car->seats; ?>
                            </td>
                            <td>
                                <?php echo $car->color; ?>
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