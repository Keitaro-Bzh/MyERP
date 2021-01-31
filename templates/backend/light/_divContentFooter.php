<footer class="footer text-right">
    <ul class="list-inline">     
        <li>2020 © MyERP</li>
        <li><a href="index.php?module=apropos" data-toggle="tooltip" data-placement="top" title="A propos de">A propos de</a></li>
        <?php if(isset($GLOBALS['Site'])) { ?>
              <li><?php echo $GLOBALS['Site']->get_Valeur('footer'); ?></li>
          <?php } ?>
    </ul>
</footer>