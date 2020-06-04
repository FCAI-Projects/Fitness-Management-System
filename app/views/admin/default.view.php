<?php require APP_PATH . '/views/inc/header.php'?>

<div class="container mt-5">
    <?php foreach ($data as $notify): ?>
    <?php if ($notify->notify == 1): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $notify->mname ?></strong> has add a new feedback on <?php echo $notify->tname ?>
            <a href="<?php echo URLROOT?>/admin/seen/<?php echo $notify->id ?>" class="close" >
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
       <?php endif; ?>
    <?php endforeach; ?>


    <div class="row">
        <div class="col-12 mt-4" style="background-color: #f8f9fa;padding: 15px;border-radius: 5px" id="element-to-print">
            <h2 class="text-center mb-3 mt-2">All Feedback</h2>
            <div class="list-group">
                <?php foreach ($data as $notify): ?>
                <li href="#" class="list-group-item <?php if ($notify->notify == 1) echo 'list-group-item-warning'?> ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Feed Back From <?php echo $notify->mname ?></h5>
                        <small>about <?php echo $notify->tname ?></small>
                    </div>
                    <p class="mb-1"><?php echo $notify->feedback ?></p>
                </li>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button onclick="html2pdf(element, opt)" class="btn btn-dark"><i class="fas fa-download"></i> Download Feedback</button>
    </div>

</div>


<?php require APP_PATH . '/views/inc/footer.php'?>
<script>
    var element = document.getElementById('element-to-print');
    var opt = {
        margin:       1,
        filename:     'feedback.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };


</script>
