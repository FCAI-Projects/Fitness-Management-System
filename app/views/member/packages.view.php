<?php require APP_PATH . '/views/inc/header.php' ?>
<div class="container mt-5">
    <h1 class="text-center mb-5 text-dark">All Packages</h1>
    <ul class="list-group">
        <?php foreach ($data['packages'] as $package): ?>

            <a href="<?php echo URLROOT ?>/member/selectpackage/<?php echo $package->id ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php if ($data['member_package_id']->package_id == $package->id) echo 'list-group-item-info' ?>">
                <?php echo $package->week_range ?> Week
                <span>[$<?php echo ($package->cost - (($package->discount/100) * $package->cost)) ?>]</span>
                <span class="badge badge-warning ?> badge-pill" data-toggle="tooltip" data-placement="top" title="Discount"><?php echo $package->discount ?>%</span>
            </a>

        <?php endforeach; ?>

    </ul>
</div>
<?php require APP_PATH . '/views/inc/footer.php' ?>

