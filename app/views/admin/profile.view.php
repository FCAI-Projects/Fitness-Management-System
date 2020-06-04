<?php require APP_PATH . '/views/inc/header.php'?>

<div class="container">
    <div class="row mt-5" style="background-color: #f8f9fa;padding: 15px;border-radius: 5px">
        <div class="col-3 text-center">
            <img src="<?php echo URLROOT ?>/img/<?php echo $data['info']->avatar; ?>" alt="avatar photo" style="width: 200px;border-radius: 50%">
        </div>
        <div class="col-9 mt-4">
            <h1 style="font-size: 50px"><?php echo $data['info']->name ?></h1>
            <span class="lead d-block"><b>email:</b> <?php echo $data['info']->email ?></span>
            <span class="lead d-block mt-2""><b>Trainer Name:</b> <?php if (isset($data['trainer']->name)) echo $data['trainer']->name ?></span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col mr-5" style="background-color: #f8f9fa;padding: 15px;border-radius: 5px">
            <h3 class="text-center mb-3">Package Details</h3>
            <?php if (isset($data['package']->cost)): ?>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cost: <?php if (isset($data['package']->cost)) echo ($data['package']->cost - (($data['package']->discount/100) * $data['package']->cost)) ?></li>
                <li class="list-group-item">Week Range: <?php if(isset($data['package']->week_range )) echo $data['package']->week_range ?></li>
            </ul>
            <?php else: ?>
                <div class="alert alert-warning" role="alert">
                    There is no data to show
                </div>
            <?php endif; ?>
        </div>
        <div class="col ml-4" style="background-color: #f8f9fa;padding: 15px;border-radius: 5px">
            <ul class="list-group list-group-flush">
                <h3 class="text-center mb-3">Attendance Details</h3>
                <?php foreach ($data['attendance'] as $attendance): ?>
                    <li class="list-group-item"><?php echo $attendance->date ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php require APP_PATH . '/views/inc/footer.php'?>