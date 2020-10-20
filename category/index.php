<?php if(isset($_GET['is'])){ ?>
<?php require('../functions.php'); ?>
<?php get_header('category'); ?>
  <div class="main__box projects">
    <?php get_content('category.php'); ?>
    <div class="loader-box">
      
    </div>
  </div>
<?php get_footer() ?>
</html>

<?php } ?>