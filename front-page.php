<?php
/**
 * Front page.
 *
 * @package Zub_Industrial
 */

get_header();

$services = zub_get_services();
$labels   = array(
	'lazernaya-rezka-listovogo-metalla'          => 'Лазерная обработка · Лист',
	'lazernaya-rezka-trub'                       => 'Лазерная обработка · Труба',
	'izgotovlenie-gidravlicheskikh-shlangov'     => 'Гидравлика · РВД',
	'izgotovlenie-gidravlicheskikh-trubok'       => 'Гидравлика · Трубные сборки',
	'robotizirovannaya-svarka'                   => 'Сварка · Серийное производство',
	'tokarnye-raboty'                            => 'Мехобработка · Точение',
	'frezernye-raboty'                           => 'Мехобработка · Фрезерование',
	'poroshkovaya-pokraska-metalla'              => 'Покрытия · Фосфатирование',
	'poluavtomaticheskaya-svarka'                => 'Сварка · Мелкая серия',
	'ispytanie-gidravlicheskogo-oborudovaniya'   => 'Контроль · Лаборатория',
);
$short_titles = array(
	'lazernaya-rezka-listovogo-metalla'        => 'Лазерная резка листа',
	'lazernaya-rezka-trub'                     => 'Лазерная резка труб',
	'izgotovlenie-gidravlicheskikh-shlangov'   => 'Гидрошланги и РВД',
	'izgotovlenie-gidravlicheskikh-trubok'     => 'Гидравлические трубки',
	'robotizirovannaya-svarka'                 => 'Роботизированная сварка',
	'tokarnye-raboty'                          => 'Токарные работы',
	'frezernye-raboty'                         => 'Фрезерные работы',
	'poroshkovaya-pokraska-metalla'            => 'Порошковая покраска',
	'poluavtomaticheskaya-svarka'              => 'Полуавтоматическая сварка',
	'ispytanie-gidravlicheskogo-oborudovaniya' => 'Испытания гидрооборудования',
);
?>
<main id="main">
	<section class="service-hero" aria-labelledby="service-hero-title" data-service-slider>
		<div class="container service-hero__intro">
			<div>
				<p class="eyebrow"><?php echo esc_html( count( $services ) ); ?> производственных направлений</p>
				<h1 id="service-hero-title">Производственные операции для деталей, узлов и гидравлических систем</h1>
			</div>
			<div class="service-hero__intro-copy">
				<p>Выберите нужную технологию или начните с описания задачи. Работаем по чертежу, 3D-модели или образцу.</p>
				<a class="button" href="mailto:info@example.ru">Отправить задачу</a>
			</div>
		</div>

		<nav class="container service-hero__quick-nav" aria-label="Все услуги">
			<p class="service-hero__quick-title">Все услуги</p>
			<ol class="service-hero__quick-list">
				<?php foreach ( $services as $index => $service ) : ?>
					<li>
						<a
							href="<?php echo esc_url( home_url( '/uslugi/' . $service['slug'] . '/' ) ); ?>"
							aria-label="<?php echo esc_attr( $service['title'] ); ?>"
						>
							<span><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<strong><?php echo esc_html( $short_titles[ $service['slug'] ] ); ?></strong>
							<span aria-hidden="true">↗</span>
						</a>
					</li>
				<?php endforeach; ?>
			</ol>
		</nav>

		<div class="container service-hero__stage">
			<div class="service-hero__panels">
				<?php foreach ( $services as $index => $service ) : ?>
					<article
						class="service-hero__panel"
						id="service-panel-<?php echo esc_attr( $index ); ?>"
						role="tabpanel"
						aria-labelledby="service-tab-<?php echo esc_attr( $index ); ?>"
						<?php echo 0 !== $index ? 'hidden' : ''; ?>
					>
						<div class="service-hero__visual" aria-hidden="true">
							<span class="service-hero__visual-number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<span class="service-hero__visual-icon"><?php echo esc_html( $service['icon'] ); ?></span>
							<span class="service-hero__visual-line"></span>
						</div>
						<div class="service-hero__content">
							<p class="service-hero__label"><?php echo esc_html( $labels[ $service['slug'] ] ); ?></p>
							<h2><?php echo esc_html( $service['title'] ); ?></h2>
							<p><?php echo esc_html( $service['description'] ); ?></p>
							<p class="service-hero__products"><strong>Типовые изделия:</strong> <?php echo esc_html( $service['use'] ); ?></p>
							<div class="button-row">
								<a class="button" href="<?php echo esc_url( home_url( '/uslugi/' . $service['slug'] . '/' ) ); ?>">Подробнее об услуге</a>
								<a class="service-hero__text-link" href="mailto:info@example.ru?subject=<?php echo esc_attr( rawurlencode( $service['title'] ) ); ?>">Запросить расчёт →</a>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="service-hero__navigation">
				<p class="service-hero__navigation-title">Выберите услугу</p>
				<div class="service-hero__tabs" role="tablist" aria-label="Производственные услуги">
					<?php foreach ( $services as $index => $service ) : ?>
						<button
							class="service-hero__tab"
							id="service-tab-<?php echo esc_attr( $index ); ?>"
							type="button"
							role="tab"
							aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
							aria-controls="service-panel-<?php echo esc_attr( $index ); ?>"
							tabindex="<?php echo 0 === $index ? '0' : '-1'; ?>"
							data-service-tab="<?php echo esc_attr( $index ); ?>"
						>
							<span><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<strong><?php echo esc_html( $service['title'] ); ?></strong>
						</button>
					<?php endforeach; ?>
				</div>
				<div class="service-hero__controls">
					<button type="button" data-service-prev aria-label="Предыдущая услуга">←</button>
					<output data-service-count aria-live="polite">01 / <?php echo esc_html( sprintf( '%02d', count( $services ) ) ); ?></output>
					<button type="button" data-service-next aria-label="Следующая услуга">→</button>
				</div>
			</div>
		</div>

		<noscript>
			<div class="container service-hero__noscript">
				<p>Все услуги:</p>
				<ul>
					<?php foreach ( $services as $service ) : ?>
						<li><a href="<?php echo esc_url( home_url( '/uslugi/' . $service['slug'] . '/' ) ); ?>"><?php echo esc_html( $service['title'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</noscript>
	</section>
</main>
<?php get_footer(); ?>
