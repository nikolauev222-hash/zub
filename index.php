<?php /** Default index. @package Zub_Industrial */ get_header(); ?>
<main id="main" class="section"><div class="container"><h1><?php bloginfo( 'name' ); ?></h1><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?><article <?php post_class(); ?>><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></article><?php endwhile; the_posts_pagination(); else : ?><p>Материалы не найдены.</p><?php endif; ?></div></main>
<?php get_footer(); ?>

