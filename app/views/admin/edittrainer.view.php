<?php require APP_PATH . '/views/inc/header.php'?>
<div class="container mx-auto" style="width: 400px;margin-top: 250px">
    <h1 class="text-center mb-5 text-dark">Edit Trainer Shift</h1>
    <form method="post" action="<?php echo URLROOT ?>/admin/edittrainer/<?php echo $data->trainer_id ?>">
        <div class="form-group">
            <label for="start">Member name </label>
            <input type="time" name="start" class="form-control" id="start" aria-describedby="start" value="<?php echo $data->start_shift ?>" required>
        </div>
        <div class="form-group">
            <label for="end">Email address</label>
            <input type="time" name="end" class="form-control" id="end" aria-describedby="end" value="<?php echo $data->end_shift ?>" required>
        </div>


        <button type="submit"class="btn btn-primary" name="save">Save</button>
    </form>
</div>


<?php require APP_PATH . '/views/inc/footer.php'?>

