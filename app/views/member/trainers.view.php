<?php require APP_PATH . '/views/inc/header.php' ?>
<div class="container mt-5">
    <h1 class="text-center mb-5 text-dark">All Trainers</h1>
    <ul class="list-group">
        <?php foreach ($data['trainers'] as $trainer): ?>

            <a href="<?php echo URLROOT ?>/member/selecttrainer/<?php echo $trainer->id ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php if (($trainer->max_num - $trainer->cur_num) == 0) echo 'list-group-item-danger' ?> <?php if ($data['member_trianer_id']->trainer_id == $trainer->trainer_id) echo 'list-group-item-info' ?>">
                <?php echo $trainer->name ?>
                <span>[Shift from
                <?php echo $trainer->start_shift; ?>
                to
                    <?php echo $trainer->end_shift; ?>]</span>
                <span class="badge badge-<?php if (($trainer->max_num - $trainer->cur_num) == 0) {echo 'danger';} else {echo 'primary';} ?> badge-pill" data-toggle="tooltip" data-placement="top" title="Left Places"><?php echo ($trainer->max_num - $trainer->cur_num) ?></span>
            </a>

        <?php endforeach; ?>

    </ul>
</div>
<?php require APP_PATH . '/views/inc/footer.php' ?>

