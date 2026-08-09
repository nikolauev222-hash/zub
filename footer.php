<?php /** Footer. @package Zub_Industrial */ ?>
<footer class="site-footer">
	<div class="container site-footer__grid">
		<div><strong>ЗУБ Инжиниринг</strong><p>Производственные и гидравлические решения для бизнеса.</p></div>
		<div><strong>Контакты</strong><p><a href="tel:+70000000000">+7 (000) 000-00-00</a><br><a href="mailto:info@example.ru">info@example.ru</a></p></div>
		<div><strong>Навигация</strong><p><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Услуги</a><br><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Отправить заявку</a></p></div>
	</div>
	<div class="container site-footer__bottom"><span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> ЗУБ Инжиниринг</span><span>Информация на сайте не является публичной офертой</span></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

