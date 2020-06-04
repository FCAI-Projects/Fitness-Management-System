<?php require APP_PATH . '/views/inc/header.php' ?>

<div class="container mx-auto" style="width: 400px;margin-top: 150px">
    <h1 class="text-center mb-5 text-dark">Payment Info</h1>
    <form method="post" action="<?php echo URLROOT ?>/member/payment">

        <div class="form-group">
            <label for="visa">VISA Number</label>
            <input type="text" maxlength="16" minlength="16" name="visa" class="form-control" id="visa" aria-describedby="visa" value="<?php echo $data['visa']; ?>" required>
        </div>

        <div class="form-group">
            <label for="pin">PIN</label>
            <input type="number" name="pin" class="form-control" id="pin" aria-describedby="visa" value="<?php echo $data['pin']?>" required>
        </div>

        <div class="form-group">
            <label for="money">Money</label>
            <input type="number" name="money" class="form-control" id="money" aria-describedby="money" value="<?php echo $data['money']?>" required>
        </div>

        <button type="submit"class="btn btn-primary" name="save">Save</button>
    </form>
</div>


<?php require APP_PATH . '/views/inc/footer.php' ?>
