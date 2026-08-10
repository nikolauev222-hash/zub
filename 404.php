<?php /** 404 template. @package Zub_Industrial */ get_header(); ?>
<main id="main" class="section"><div class="container"><p class="eyebrow">Ошибка 404</p><h1>Страница не найдена</h1><p>Возможно, адрес изменился. Вернитесь на главную страницу или отправьте нам запрос.</p><a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">На главную</a></div></main>
<?php get_footer(); ?>

