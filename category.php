<?php get_header(); ?>
<?php $post = $posts[0]; ?>
<?php if (is_category()) { ?>
<?php } elseif( is_tag() ) { ?>
	<h2>Etiqueta &amp;amp;amp;#8216;<?php single_tag_title(); ?>&amp;amp;amp;#8217;</h2>
<?php } elseif (is_day()) { ?>
	<h2>Archivo para <?php the_time('F jS Y'); ?>:</h2>
<?php } elseif (is_month()) { ?>
	<h2>Archivo para <?php the_time('F, Y'); ?>:</h2>
<?php } elseif (is_year()) { ?>
	<h2>Archivo para <?php the_time('Y'); ?>:</h2>
<?php } elseif (is_author()) { ?>
	<h2>Archivo del autor </h2>
<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2>Archivos del blog</h2>
<?php } ?>
<div class="main-container grid">
  <?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
  <section id="main" class="grid__item three-quarters">
  <?php else: ?>
  <section id="main" class="grid__item one-whole">
  <?php endif; ?>
    <article id="single">
  		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title_attribute(); ?>"><?php the_title(); ?>. </a></h2>
        <small> Publicado por <?php the_author_posts_link() ?>  el <?php the_time('Y-m-d') ?>. Categor&iacute;a: <?php the_category(', '); ?> </small><br>
        <div class="post">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
      <div class="comentarios">
        <?php comments_template(); ?>
      </div>
			<?php else: ?>
				<h3>No hay posts</h3>
      <?php endif; ?>
    </article> <!-- Fin de single -->
  </section><!-- Fin de main --><!--
  <?php if ( !is_active_sidebar( 'sidebar-1' )  ) echo "-->"; ?>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
