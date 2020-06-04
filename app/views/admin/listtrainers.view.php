<?php require APP_PATH . '/views/inc/header.php'?>
    <div class="container">
        <a class="btn btn-primary mt-5" href="<?php echo URLROOT ?>/admin/addtrainer"><i class="fas fa-user-plus"></i> Add Trainer</a>

            <form action="" method="get" class="p-1 mt-4">
                <input class="form-control d-inline-block" name="search" placeholder="Search ..." value="<?php if (isset($_GET['search'])) echo $_GET['search'] ?>">
            </form>


        <table class="table mt-5">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Cuurent Number</th>
                <th scope="col">Maximum Number</th>
                <th scope="col">Shift Start</th>
                <th scope="col">Shift End</th>
                <th scope="col">date</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody style="font-size: 14px;">


            <?php foreach ($data as $trainer): ?>
                <tr>
                    <th scope="row"><?php echo $trainer->id; ?></th>
                    <th scope="row"><?php echo $trainer->name; ?></th>
                    <th scope="row"><?php echo $trainer->email; ?></th>
                    <th scope="row"><?php echo $trainer->cur_num ?></th>
                    <th scope="row"><?php echo $trainer->max_num ?></th>
                    <th scope="row"><?php echo $trainer->start_shift ?></th>
                    <th scope="row"><?php echo $trainer->end_shift ?></th>
                    <th scope="row"><?php echo $trainer->date; ?></th>
                    <th scope="row">
                        <a href="<?php echo URLROOT ?>/admin/removetrainer/<?php echo $trainer->id ?>" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                        <a href="<?php echo URLROOT ?>/admin/edittrainer/<?php echo $trainer->id ?>" type="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>



<?php require APP_PATH . '/views/inc/footer.php'?>