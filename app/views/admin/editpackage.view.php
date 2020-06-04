<?php require APP_PATH . '/views/inc/header.php'?>
<div class="container mx-auto" style="width: 400px;margin-top: 280px">
    <form method="post" action="<?php echo URLROOT ?>/admin/editpackage/<?php  echo $data->id ?>">
        <div class="form-group">
            <label for="maxNumber">Package Cost</label>
            <input type="number" name="cost" class="form-control" id="maxNumber" aria-describedby="emailHelp" min="1" value="<?php echo $data->cost ?>" required>
        </div>

        <div class="form-group">
            <label for="maxNumber">Discount</label>
            <input type="number" name="discount" class="form-control" id="maxNumber" aria-describedby="emailHelp" min="0" value="<?php echo $data->discount ?>" required>
        </div>

        <div class="form-group">
            <label for="maxNumber">Week Range</label>
            <input type="number" name="range" class="form-control" id="maxNumber" aria-describedby="emailHelp" min="1" value="<?php echo $data->week_range ?>" required>
        </div>


        <button type="submit"class="btn btn-primary" name="addpackage">Save</button>
    </form>
</div>


<?php require APP_PATH . '/views/inc/footer.php'?>

