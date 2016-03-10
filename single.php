<?php get_header(); ?>

<div id="content" class="clearfix">
  <div id="main" class="col-sm-8 clearfix" role="main">
    <div id="home-main" class="home-main home mywiki-post">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope>
        <header>
            <header>
              <div class="page-catheader cat-catheader">
                <h1 class="cat-title">
                  <?php the_category(', '); ?>: <?php the_title(); ?>
                </h1>
              </div>
            </header>
            <?php if (function_exists('mywiki_custom_breadcrumbs')) mywiki_custom_breadcrumbs(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
              <header>
              <div class="single-page">
                <div class="meta nopadding">
                  <time class="sprite date-icon" datetime="<?php echo the_modified_time('M-j-Y'); ?>" pubdate>
                    Initial version: <?php the_date(); ?><br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last modified: <?php the_modified_date(); ?>
                  </time><br/>
                  <span class="sprite author-icon">
                  Original author: <?php the_author(); ?><br/>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last modifier: <?php the_modified_author(); ?>
                  </span><br/>
                  <span class="sprite amp cat-icon-small">
                  Wiki category: <?php the_category(', '); ?>
                  </span>
                  <!-- <span class="sprite comments-icon-small">
                    <?php comments_number(); ?>
                  </span> -->
                </div>
               </div>
              </header>
              <!-- end article header -->

	      <section class="notice_box_top">
                <?php if(get_field('notice_box_top')) { the_field('notice_box_top'); } ?>
              </section>
              <!-- end notice box top section -->

              <section class="post_content">
                <?php if( get_field('scope_of_feature') ): ?>
                  <h2>Scope of Feature: <?php the_field('scope_of_feature'); ?></h2>
                <?php endif; ?>

                <?php if( get_field('owner') ): ?>
                  <h3>Author / Owner: <?php the_field('owner'); ?></h3>
                <?php endif; ?>

                <?php if( get_field('why') ): ?>
                  <h2>Why was it implemented?</h2>
                  <div><?php the_field('why'); ?></div>
                <?php endif; ?>

                <?php if( get_field('what_do') ): ?>
                  <h2>What does it do?</h2>
                  <div><?php the_field('what_do'); ?></div>
                <?php endif; ?>

                <?php if( get_field('where') ): ?>
                  <h2>Where does it live?</h2>
                  <div><?php the_field('where'); ?></div>
                <?php endif; ?>

                <?php if( get_field('use_other') ): ?>
                  <h2>What other systems is it using?</h2>
                  <div><?php the_field('use_other'); ?></div>
                <?php endif; ?>

                <?php if( get_field('used_by_other') ): ?>
                  <h2>What other systems are using it?</h2>
                  <div><?php the_field('used_by_other'); ?></div>
                <?php endif; ?>

                <?php if( get_field('when') ): ?>
                  <h2>When is it running?</h2>
                  <div><?php the_field('when'); ?></div>
                <?php endif; ?>

                <?php if( get_field('customer_flow_position') ): ?>
                  <h2>Where in the customer flow is it running?</h2>
                  <div><?php the_field('customer_flow_position'); ?></div>
                <?php endif; ?>

                <?php if( get_field('external_service_dependencies') ): ?>
                  <h2>What are its external service dependencies?</h2>
                  <div><?php the_field('external_service_dependencies'); ?></div>
                <?php endif; ?>

                <?php if( get_field('feature_description') ): ?>
                  <h2>Any other information</h2>
                  <div><?php the_field('feature_description'); ?></div>
                <?php endif; ?>

                <?php if( get_field('list_of_related_resources') ): ?>
                  <h2>List of Related Resources</h2>
                  <div><?php the_field('list_of_related_resources'); ?></div>
                <?php endif; ?>

                <?php the_content(); ?>
                <?php if(wp_get_attachment_url( get_post_thumbnail_id($post->ID) )!= ''){ ?>
                <figure class="single_cat_image"> <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" /> </figure>
                <?php } ?>
                <?php wp_link_pages(); ?>
              </section>
              <!-- end article section -->

            </article>
        </header>
      </article>
      <!-- end article -->
      <?php endwhile; ?>
      <?php endif; ?>
       <nav class="mywiki-nav">
                <span class="mywiki-nav-previous"><?php previous_post_link('%link', 'Previous in category', TRUE); ?> </span>
                <span class="mywiki-nav-next"><?php next_post_link('%link', 'Previous in category', TRUE); ?> </span>
    </nav>
    </div>
  <?php comments_template( '', true ); ?>
  </div>
  <!-- end #main -->

  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
