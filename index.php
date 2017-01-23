<?php get_header(); ?>
<div class="main-container grid">
  <?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
  <section id="main" class="grid__item palm--one-whole three-quarters">
  <?php else: ?>
  <section id="main" class="grid__item one-whole">
  <?php endif; ?>
    <h2 class="hidden">Posts</h2>
    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
      <div class="main-post">
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="icon icon-circle-right"></span></a></h3>
        <div class="post-excerpt">
          <div class="grid">
            <div class="grid__item one-quarter portable--one-third thumbnail">
              <?php if(has_post_thumbnail()) :?>
                <?php the_post_thumbnail(); ?>
              <?php else: ?>
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/no_image.jpg" alt="No image :(" />
              <?php endif; ?>
            </div><!--
            --><div class="grid__item three-quarters portable--two-thirds">
              <small>Publicado el <?php the_time('Y-m-d') ?> por <?php the_author_posts_link() ?> </small>
              <?php the_excerpt(); ?>
              <div class="tags">
                <?php the_tags('',' '); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; else: ?>
      <p><?php _e('No hay entradas .'); ?></p>
    <?php endif; ?>
  </section><!--
  <?php if ( !is_active_sidebar( 'sidebar-1' )  ) echo "-->"; ?>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
