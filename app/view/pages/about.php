<?php require APPROOT . '/view/inc/header.php'; ?>
<div class="jumbotron jumbotron-fluid text-center">
<div class="container">
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>
    <p Version: <?php echo APPVERSION; ?>></p>
    
</div>
</div>

<?php require APPROOT . '/view/inc/footer.php'; ?>