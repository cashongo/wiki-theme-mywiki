<?php
/*
Template name: Wiki template
*/
get_header();
?>
<div id="content" class="clearfix">
  <div id="main" class="col-sm-8 clearfix nopadding-left" role="main">
    <div id="home-main" class="home-main home">
      <header>
        <div class="page-catheader">
          <h2 class="page-title"><?php _e('Glossary Entries','mywiki'); ?></h2>
        </div>
      </header>
          <?php
	    query_posts('cat=22' . '&order=ASC' . '&orderby=title');
            while (have_posts()) : the_post();
              echo '<div class="glossary-title"><h2>';the_title();echo '</h2></div>';
              echo '<div class="glossary-item">';the_content();echo '</div>';
            endwhile;
	?>
    <!-- end #main -->
  </div>
  <?php get_sidebar(); // sidebar 1 ?>
</div></div>
<!-- end #content -->
<?php get_footer();?>
