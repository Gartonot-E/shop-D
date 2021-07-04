<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

		<header>
			<div class="important-header">
				<div class="container">
					<p>Бесплатная доставка</p>
					<p class="ml-a">до 90 дней возврата</p>
				</div>
			</div>
			<div class="logo-section">
				<div class="container">
					<a href="/" class="logo">
						<img src="<?=get_template_directory_uri()?>/images/logo.png">
						<h2>MANUFACTURER</h2>
					</a>
					<a href="/cart" class="buskit">
						<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0)">
							<path d="M24.2131 30H5.78564C4.68064 30 3.74564 29.225 3.56189 28.1575L0.029386 7.575C-0.078114 6.94125 0.099386 6.29625 0.515636 5.8025C0.945636 5.2925 1.58064 5 2.25564 5H27.7444C28.4194 5 29.0544 5.2925 29.4844 5.8025C29.9006 6.29625 30.0781 6.9425 29.9706 7.57375L26.4369 28.1575C26.2531 29.225 25.3181 30 24.2131 30ZM2.25564 6.25C1.94939 6.25 1.66314 6.38 1.47189 6.6075C1.28939 6.8225 1.21689 7.09125 1.26314 7.36375L4.79439 27.9463C4.87314 28.4113 5.29064 28.75 5.78564 28.75H24.2131C24.7081 28.75 25.1244 28.4113 25.2044 27.945L28.7356 7.3625C28.7819 7.09 28.7094 6.82125 28.5269 6.6075C28.3356 6.38 28.0494 6.25 27.7431 6.25H2.25564Z" fill="#4729A3"/>
							<path d="M8.12499 9.99906C8.04249 9.99906 7.95874 9.98281 7.87874 9.94781C7.56124 9.81281 7.41499 9.44531 7.54999 9.12781L11.3 0.377811C11.4375 0.0578108 11.805 -0.0871892 12.1212 0.0490609C12.4387 0.185311 12.585 0.552811 12.45 0.869061L8.69999 9.61906C8.59749 9.85781 8.36624 9.99906 8.12499 9.99906Z" fill="#4729A3"/>
							<path d="M21.875 10.0007C21.6337 10.0007 21.4025 9.85944 21.3 9.62194L17.55 0.871944C17.415 0.555694 17.5612 0.188194 17.8787 0.051944C18.1937 -0.083056 18.5625 0.061944 18.7 0.380694L22.45 9.13069C22.585 9.44694 22.4387 9.81444 22.1212 9.95069C22.0412 9.98444 21.9575 10.0007 21.875 10.0007Z" fill="#4729A3"/>
							<path d="M8.125 25C7.78 25 7.5 24.72 7.5 24.375V18.125C7.5 17.78 7.78 17.5 8.125 17.5C8.47 17.5 8.75 17.78 8.75 18.125V24.375C8.75 24.72 8.47 25 8.125 25Z" fill="#4729A3"/>
							<path d="M15 25C14.655 25 14.375 24.72 14.375 24.375V18.125C14.375 17.78 14.655 17.5 15 17.5C15.345 17.5 15.625 17.78 15.625 18.125V24.375C15.625 24.72 15.345 25 15 25Z" fill="#4729A3"/>
							<path d="M21.875 25C21.53 25 21.25 24.72 21.25 24.375V18.125C21.25 17.78 21.53 17.5 21.875 17.5C22.22 17.5 22.5 17.78 22.5 18.125V24.375C22.5 24.72 22.22 25 21.875 25Z" fill="#4729A3"/>
							</g>
							<defs>
							<clipPath id="clip0">
							<rect width="30" height="30" fill="white"/>
							</clipPath>
							</defs>
						</svg>
						<span>корзина</span>
					</a>
				</div>	
			</div>
			<nav class="top-menu">
				<div class="container">
					<? wp_nav_menu('menu=top-menu') ?>
				</div>
			</nav>
			<?
			
			if(is_shop()) {
				echo '<div class="discount-block">
						<div class="container">
							Скидка до -40% на каждый товар по полной цене
						</div>
					</div>';
			} else {
				echo "<hr>";
			}

			?>
		</header>


	<div id="content" class="site-content">
