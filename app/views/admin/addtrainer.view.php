<?php require APP_PATH . '/views/inc/header.php'?>
<div class="container mx-auto" style="width: 400px;margin-top: 150px">
    <form method="post" action="<?php echo URLROOT ?>/admin/addtrainer">
        <div class="form-group">
            <label for="name">Trainer name </label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="<?php echo $data['name']?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['email']?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control <?php if ($data['error']) echo 'is-invalid' ?>" id="exampleInputPassword1" value="<?php echo $data['password']?>" required>

        </div>
        <div class="form-group">
            <label for="maxNumber">Max number</label>
            <input type="number" name="maxNumber" class="form-control" id="maxNumber" aria-describedby="emailHelp" value="<?php echo $data['maxNumber']?>" required>
            <div class="invalid-feedback"><?php echo $data['error'] ?></div>
        </div>

        <div class="form-group">
            <label for="start">Shift Start </label>
            <input type="time" name="start" class="form-control" id="start" aria-describedby="start" value="<?php echo $data->start_shift ?>" required>
        </div>
        <div class="form-group">
            <label for="end">Shift End</label>
            <input type="time" name="end" class="form-control" id="end" aria-describedby="end" value="<?php echo $data->end_shift ?>" required>
        </div>

        <button type="submit"class="btn btn-primary">Submit</button>
    </form>
</div>


<?php require APP_PATH . '/views/inc/footer.php'?>

