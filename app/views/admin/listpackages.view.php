<?php require APP_PATH . '/views/inc/header.php'?>

<div class="container">
    <a class="btn btn-primary mt-5" href="<?php echo URLROOT ?>/admin/addpackage"><i class="fas fa-plus"></i> Add Package</a>
    <table class="table mt-5">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cost</th>
            <th scope="col">Discount</th>
            <th scope="col">Cost After Discount</th>
            <th scope="col">Week Range</th>
            <th scope="col">date</th>
            <th scope="col">Control</th>
        </tr>
        </thead>
        <tbody>


        <?php foreach ($data as $package): ?>
            <tr>
                <th scope="row"><?php echo $package->id; ?></th>
                <th scope="row">$<?php echo $package->cost; ?></th>
                <th scope="row"><?php echo $package->discount; ?>%</th>
                <th scope="row">$<?php echo ($package->cost - (($package->discount/100) * $package->cost)); ?></th>
                <th scope="row"><?php echo $package->week_range; ?> Weeks</th>
                <th scope="row"><?php echo $package->date; ?></th>
                <th scope="row">
                    <a href="<?php echo URLROOT ?>/admin/removepackage/<?php echo $package->id ?>" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                    <a href="<?php echo URLROOT ?>/admin/editpackage/<?php echo $package->id ?>" type="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
                </th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require APP_PATH . '/views/inc/footer.php'?>
