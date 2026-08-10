<?php
/**
 * Theme bootstrap.
 *
 * @package Zub_Industrial
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ZUB_THEME_VERSION', '1.0.3' );

require_once get_template_directory() . '/inc/services.php';

function zub_theme_setup() {
	load_theme_textdomain( 'zub-industrial', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'height' => 64, 'width' => 220, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'responsive-embeds' );
	register_nav_menus(
		array(
			'primary' => __( 'Основное меню', 'zub-industrial' ),
			'footer'  => __( 'Меню в подвале', 'zub-industrial' ),
		)
	);
}
add_action( 'after_setup_theme', 'zub_theme_setup' );

function zub_asset_version( $relative_path ) {
	$asset_path = get_template_directory() . '/' . ltrim( $relative_path, '/' );

	return file_exists( $asset_path ) ? (string) filemtime( $asset_path ) : ZUB_THEME_VERSION;
}

function zub_enqueue_assets() {
	wp_enqueue_style( 'zub-style', get_stylesheet_uri(), array(), zub_asset_version( 'style.css' ) );
	wp_enqueue_style( 'zub-main', get_template_directory_uri() . '/assets/css/main.css', array( 'zub-style' ), zub_asset_version( 'assets/css/main.css' ) );
	wp_enqueue_script( 'zub-main', get_template_directory_uri() . '/assets/js/main.js', array(), zub_asset_version( 'assets/js/main.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'zub_enqueue_assets' );

function zub_menu_fallback() {
	?>
	<ul class="site-nav__list">
		<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Услуги</a></li>
		<li><a href="<?php echo esc_url( home_url( '/#capabilities' ) ); ?>">Возможности</a></li>
		<li><a href="<?php echo esc_url( home_url( '/#process' ) ); ?>">Как работаем</a></li>
		<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Контакты</a></li>
	</ul>
	<?php
}

function zub_contact_form_handler() {
	if ( ! isset( $_POST['zub_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['zub_contact_nonce'] ) ), 'zub_contact' ) ) {
		wp_die( esc_html__( 'Проверка безопасности не пройдена.', 'zub-industrial' ), '', array( 'response' => 403 ) );
	}

	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'sent', $redirect ) . '#contact' );
		exit;
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$contact = isset( $_POST['contact'] ) ? sanitize_text_field( wp_unslash( $_POST['contact'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || '' === $contact ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', $redirect ) . '#contact' );
		exit;
	}

	$body = sprintf( "Имя: %s\nКонтакт: %s\n\nЗадача:\n%s", $name, $contact, $message );
	$sent = wp_mail( get_option( 'admin_email' ), 'Новая заявка с сайта', $body );
	wp_safe_redirect( add_query_arg( 'contact', $sent ? 'sent' : 'error', $redirect ) . '#contact' );
	exit;
}
add_action( 'admin_post_nopriv_zub_contact', 'zub_contact_form_handler' );
add_action( 'admin_post_zub_contact', 'zub_contact_form_handler' );
