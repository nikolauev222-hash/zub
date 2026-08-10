<?php
/**
 * Front page.
 *
 * @package Zub_Industrial
 */

get_header();
?>
<main id="main">
	<section class="hero">
		<div class="container hero__grid">
			<div>
				<p class="eyebrow">Металлообработка · Гидравлика · Сварка</p>
				<h1>Производим металлические детали и гидравлические узлы под вашу задачу</h1>
				<p class="hero__lead">От чертежа и образца до готовой партии: лазерная резка, механическая обработка, сварка, покраска и испытания.</p>
				<div class="button-row">
					<a class="button" href="tel:+70000000000">Получить консультацию</a>
					<a class="button button--ghost" href="mailto:info@example.ru">Отправить чертёж</a>
				</div>
				<ul class="hero__facts">
					<li>Работа по чертежам и 3D-моделям</li>
					<li>Единичные и серийные заказы</li>
					<li>Контроль на этапах производства</li>
				</ul>
			</div>
			<div class="hero__visual" aria-label="Схематичное изображение производственной детали">
				<div class="blueprint" aria-hidden="true">
					<span>01</span>
					<span>3D</span>
					<span>QC</span>
				</div>
				<p>Инженерный подход<br><strong>к каждой детали</strong></p>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
