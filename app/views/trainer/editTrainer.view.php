<?php require APP_PATH . '/views/inc/header.php'?>
<div class="container mx-auto" style="width: 400px;margin-top: 250px">
    <h1 class="text-center mb-5 text-dark">Edit Password</h1>
    <form method="post" action="<?php echo URLROOT ?>/trainer/editTrainer">

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $data['password'] ?>" required>
        </div>


        <button type="submit"class="btn btn-primary">Save</button>
    </form>
</div>


<?php require APP_PATH . '/views/inc/footer.php'?>
