<?php require APP_PATH . '/views/inc/header.php'?>
<div class="container">
    <a class="btn btn-primary mt-5" href="<?php echo URLROOT ?>/admin/addmember"><i class="fas fa-user-plus"></i> Add Member</a>

    <form action="" method="get" class="p-1 mt-4">
        <input class="form-control d-inline-block" name="search" placeholder="Search ..." value="<?php if (isset($_GET['search'])) echo $_GET['search'] ?>">
    </form>

    <table class="table mt-5">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Package</th>
            <th scope="col">date</th>
            <th scope="col">Control</th>
        </tr>
        </thead>
        <tbody>


        <?php foreach ($data as $member): ?>
            <tr>
                <th scope="row"><?php echo $member->id; ?></th>
                <th scope="row"><?php echo $member->name; ?></th>
                <th scope="row"><?php echo $member->email; ?></th>
                <th scope="row"><?php echo $member->package_id ?></th>
                <th scope="row"><?php echo $member->date; ?></th>
                <th scope="row">
                    <a href="<?php echo URLROOT ?>/admin/removemember/<?php echo $member->id ?>" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                    <a href="<?php echo URLROOT ?>/admin/editmember/<?php echo $member->id ?>" type="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo URLROOT ?>/admin/profile/<?php echo $member->id ?>" type="button" class="btn btn-info"><i class="fas fa-user-alt"></i></a>

                </th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php require APP_PATH . '/views/inc/footer.php'?>