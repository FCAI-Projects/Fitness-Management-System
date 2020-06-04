<?php require APP_PATH . '/views/inc/header.php'?>
<div class="container mx-auto" style="width: 400px;margin-top: 250px">
    <h1 class="text-center mb-5 text-dark">Login Form</h1>
    <form method="post" action="<?php echo URLROOT ?>/index/">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['email']?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control <?php if ($data['error']) echo 'is-invalid' ?>" id="exampleInputPassword1" value="<?php echo $data['password']?>" required>
            <div class="invalid-feedback"><?php echo $data['error'] ?></div>
        </div>
        <button type="submit"class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
    </form>
</div>


<?php require APP_PATH . '/views/inc/footer.php'?>
