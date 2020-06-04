<?php require APP_PATH . '/views/inc/header.php'?>
    <div class="container">
        <h1 class="text-center mt-4">Attendance</h1>
        <table class="table mt-5">
            <thead class="thead-light">
            <tr>

                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Package</th>
                <th scope="col">attendance days</th>
                <th scope="col">attendance</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($data as $member): ?>
                <tr>
                    <th scope="row"><?php echo $member->name; ?></th>
                    <th scope="row"><?php echo $member->email; ?></th>
                    <th scope="row"><?php echo $member->package_id ?></th>
                    <th scope="row"><?php echo $member->attendance_days ?></th>

                    <th scope="row">
                        <a href="<?php echo URLROOT ?>/trainer/attendance/<?php echo $member->id ?>" type="button" class="btn btn-success"><i class="far fa-check-square"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>



<?php require APP_PATH . '/views/inc/footer.php'?>