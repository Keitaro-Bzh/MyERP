	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="/templates/<?php //echo $_SESSION['template']; ?>/assets/script/html5shiv.min.js"></script>
		<script src="/templates/<?php //echo $_SESSION['template']; ?>/assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/jquery.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/modernizr.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/nprogress/nprogress.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/waves/waves.min.js"></script>

	<!-- Morris Chart -->
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/chart/morris/morris.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/chart/morris/raphael-min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/chart.morris.init.min.js"></script>

	<!-- Flot Chart -->
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/chart/plot/jquery.flot.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/chart/plot/jquery.flot.tooltip.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/chart/plot/jquery.flot.categories.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/chart/plot/jquery.flot.pie.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/chart/plot/jquery.flot.stack.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/chart.flot.init.min.js"></script>

	<!-- Sparkline Chart -->
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/chart.sparkline.init.min.js"></script>

	<!-- FullCalendar -->
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/moment/moment.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/fullcalendar/fullcalendar.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/fullcalendar.init.js"></script>

	<!-- Mise en forme table -->
	<?php if (isset($includeScriptTable)) { ?>
		<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
		<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
		<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
		<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/datatables.demo.min.js"></script>
	<?php } ?>

	<!-- Jquery UI -->
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/jquery-ui/jquery-ui.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js"></script>

	<!-- Dropify -->
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/dropify/js/dropify.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/fileUpload.demo.min.js"></script>

	<!-- Form Wizard -->
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/form-wizard/prettify.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/form-wizard/jquery.bootstrap.wizard.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/jquery-validation/jquery.validate.min.js"></script>
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/form.wizard.init.min.js"></script>

	<!-- Remodal -->
	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/modal/remodal/remodal.min.js"></script>

	<script src="/templates/<?php echo $_SESSION['template']; ?>/assets/scripts/main.min.js"></script>

	<script src="/frameworks/myFramework/scripts/myERP.js"></script>
    <?php if (isset($scriptPersoJS)) {
      include($scriptPersoJS);
    }
    ?>

    <!-- Scripts MyERP --> 
    <script>
        $(function() {
          $(document).ready(function() {
            controleFormulaire();
            <?php
			if (isset($GLOBALS['Site']) && $GLOBALS['Site']->get_Valeur('onRefresh') === '0') { ?>
              $(document).on("keydown", desactiveF5);
            <?php } ?>
<?php if (isset($scriptPersoJSOnLoad) && ($scriptPersoJSOnLoad)) { ?>
chargeScriptPerso();
			<?php } ?>});
        });
	</script> 
	<!-- Fin script --> 
</body>
</html>