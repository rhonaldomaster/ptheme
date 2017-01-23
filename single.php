<?php get_header(); ?>
<div class="main-container grid">
  <?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
  <section id="main" class="grid__item palm--one-whole three-quarters">
  <?php else: ?>
  <section id="main" class="grid__item one-whole">
  <?php endif; ?>
    <article id="single">
  		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title_attribute(); ?>"><?php the_title(); ?>. </a></h2>
        <small> Publicado por <?php the_author_posts_link() ?>  el <?php the_time('Y-m-d') ?>. Categor&iacute;a: <?php the_category(', '); ?> </small><br>
        <div class="post">
          <img src="<?php the_field('post_image'); ?>" alt="" />
          <?php the_content(); ?>
          <div class="tags">
            <?php the_tags('',' '); ?>
          </div>
          <div class="related">
          <?php
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
              $tag_ids = array();
              foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
              $args=array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'showposts'=>4,
                'caller_get_posts'=>1
              );
              $my_query = new wp_query($args);
              if( $my_query->have_posts() ) {
                echo '<h3>Art&iacute;culos relacionados</h3><ul>';
                while ($my_query->have_posts()) {
                  $my_query->the_post();
          ?>
                <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
          <?php
                }
                echo '</ul>';
              }
              wp_reset_query();
            }
          ?>
          </div>
        </div>
      <?php endwhile; ?>
      <div class="comentarios">
        <?php comments_template(); ?>
      </div>
      <?php endif; ?>
    </article> <!-- Fin de single -->
  </section><!-- Fin de main --><!--
  <?php if ( !is_active_sidebar( 'sidebar-1' )  ) echo "-->"; ?>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
