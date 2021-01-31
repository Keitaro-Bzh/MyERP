<div class="main-menu">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_divMainMenuHeader.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_divMainMenuContent.php'); ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_divNavbar.php'); ?>

<div id="wrapper">
	<div class="main-content">
        <div class='row'>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <?php include $corpsPage; ?>
            </div>
        <div class='row'>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_divContentFooter.php'); ?>
        </div>
    </div>
</div>

<?php 
if (isset($pagePopup)) {
    include($pagePopup);
}
?>