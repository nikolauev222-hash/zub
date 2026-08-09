<?php
/** Header. @package Zub_Industrial */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Перейти к содержимому</a>
<header class="site-header">
	<div class="container site-header__inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="На главную">
			<?php if ( has_custom_logo() ) : the_custom_logo(); else : ?><span class="brand__mark">Z</span><span>ЗУБ Инжиниринг<small>Промышленное производство</small></span><?php endif; ?>
		</a>
		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-navigation"><span class="screen-reader-text">Открыть меню</span><span></span><span></span><span></span></button>
		<nav class="site-nav" id="site-navigation" aria-label="Основная навигация">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'site-nav__list', 'fallback_cb' => 'zub_menu_fallback' ) ); ?>
		</nav>
		<a class="button button--small header-cta" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Обсудить задачу</a>
	</div>
</header>

