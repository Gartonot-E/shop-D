<?php
/**
 * sidebar 
 * Вывод меню, категории товаров
 */

if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="secondary">

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					wp_nav_menu('menu=product-menu');
				?>
			</nav>
		<?php endif; ?>
	</div>

<?php endif; ?>
