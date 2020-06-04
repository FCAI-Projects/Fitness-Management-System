<?php require APP_PATH . '/views/inc/header.php'?>

<div class="container">
    <div class="row mt-5" style="background-color: #f8f9fa;padding: 15px;border-radius: 5px">
        <div class="col-3 text-center">
            <img src="<?php echo URLROOT ?>/img/<?php echo $data['user']->avatar; ?>" alt="avatar photo" style="width: 200px;border-radius: 50%">
        </div>
        <div class="col-9 mt-4">
            <h1 style="font-size: 50px"><?php echo $_SESSION['name'] ?></h1>
            <span class="lead d-block"><b>email:</b> <?php echo $_SESSION['email'] ?></span>
            <span class="lead d-block mt-2""><b>Trainer Name:</b> <?php if ($data['trainer'] != false) { echo $data['trainer']->name; } else { echo '<span class="text-danger">None</span>'; } ?></span>
            <button class="btn btn-link" data-toggle="modal" data-target="#exampleModal" style="position: absolute;bottom: 0;right: 0" href="<?php echo URLROOT ?>">Change Photo</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Photo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="photo-form" action="<?php echo URLROOT ?>/member/changephoto" enctype="multipart/form-data">
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="myButton" form="photo-form" name="upload" class="btn btn-success">Save changes</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($data['trainer'] != false): ?>
    <div class="row mt-4">
        <div class="col-12" style="background-color: #f8f9fa;padding: 15px;border-radius: 5px">
            <h3 class="text-center mb-4 mt-2">Add Feedback to your Trainer :)</h3>
            <form method="post" action="<?php echo URLROOT; ?>/member/feedback">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Your Feedback</label>
                    <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php require APP_PATH . '/views/inc/footer.php'?>
<script>
    $('#customFile').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#myButton").click(function() {
            $("#photo-form").submit();
        });
    });
</script>