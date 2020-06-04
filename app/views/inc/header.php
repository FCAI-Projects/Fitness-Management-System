<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/all.min.css">
    <title>Fitness Club</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URLROOT ?>">Fitness Club</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>">Home</a>
                    </li>
                    <?php if (isset($_SESSION['status'])): ?>
                        <?php if ($_SESSION['status'] == 0): ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT ?>/admin/listtrainers">Trainers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT ?>/admin/listmembers">Members</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT ?>/admin/listpackages">Packages</a>
                            </li>

                        <?php endif; ?>
                        <?php if ($_SESSION['status'] == 1): ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT ?>/trainer/editTrainer">Edit Password</a>
                            </li>

                        <?php endif; ?>
                        <?php if ($_SESSION['status'] == 2): ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT ?>/member/trainers">All Trainers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT ?>/member/packages">Packages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo URLROOT ?>/member/payment">Payment Info</a>
                            </li>

                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URLROOT ?>/index/logout">Logout</a>
                        </li>
                    <?php endif; ?>


                </ul>
            </div>
        </div>
    </nav>
