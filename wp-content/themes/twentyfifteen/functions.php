<?php

if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
	
	function twentyfifteen_setup() {

	
		load_theme_textdomain( 'twentyfifteen' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );
	
		set_post_thumbnail_size( 825, 510, true );

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'twentyfifteen' ),
				'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
				'navigation-widgets',
			)
		);

		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
		);

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 248,
				'width'       => 248,
				'flex-height' => true,
			)
		);

		$color_scheme  = twentyfifteen_get_color_scheme();
		$default_color = trim( $color_scheme[0], '#' );


		add_theme_support(
			'custom-background',
	
			apply_filters(
				'twentyfifteen_custom_background_args',
				array(
					'default-color'      => $default_color,
					'default-attachment' => 'fixed',
				)
			)
		);

		
		add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Dark Gray', 'twentyfifteen' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'twentyfifteen' ),
					'slug'  => 'light-gray',
					'color' => '#f1f1f1',
				),
				array(
					'name'  => __( 'White', 'twentyfifteen' ),
					'slug'  => 'white',
					'color' => '#fff',
				),
				array(
					'name'  => __( 'Yellow', 'twentyfifteen' ),
					'slug'  => 'yellow',
					'color' => '#f4ca16',
				),
				array(
					'name'  => __( 'Dark Brown', 'twentyfifteen' ),
					'slug'  => 'dark-brown',
					'color' => '#352712',
				),
				array(
					'name'  => __( 'Medium Pink', 'twentyfifteen' ),
					'slug'  => 'medium-pink',
					'color' => '#e53b51',
				),
				array(
					'name'  => __( 'Light Pink', 'twentyfifteen' ),
					'slug'  => 'light-pink',
					'color' => '#ffe5d1',
				),
				array(
					'name'  => __( 'Dark Purple', 'twentyfifteen' ),
					'slug'  => 'dark-purple',
					'color' => '#2e2256',
				),
				array(
					'name'  => __( 'Purple', 'twentyfifteen' ),
					'slug'  => 'purple',
					'color' => '#674970',
				),
				array(
					'name'  => __( 'Blue Gray', 'twentyfifteen' ),
					'slug'  => 'blue-gray',
					'color' => '#22313f',
				),
				array(
					'name'  => __( 'Bright Blue', 'twentyfifteen' ),
					'slug'  => 'bright-blue',
					'color' => '#55c3dc',
				),
				array(
					'name'  => __( 'Light Blue', 'twentyfifteen' ),
					'slug'  => 'light-blue',
					'color' => '#e9f2f9',
				),
			)
		);

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // twentyfifteen_setup()
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 */
function twentyfifteen_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Widget Area', 'twentyfifteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
	/**
	 * Register Google fonts for Twenty Fifteen.
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function twentyfifteen_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
			$fonts[] = 'Noto Sans:400italic,700italic,400,700';
		}

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
			$fonts[] = 'Noto Serif:400italic,700italic,400,700';
		}

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
			$fonts[] = 'Inconsolata:400,700';
		}

		/*
		 * translators: To add an additional character subset specific to your language,
		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

		if ( 'cyrillic' === $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' === $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' === $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' === $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family'  => urlencode( implode( '|', $fonts ) ),
					'subset'  => urlencode( $subsets ),
					'display' => urlencode( 'fallback' ),
				),
				'https://fonts.googleapis.com/css'
			);
		}

		return $fonts_url;
	}
endif;


/**
 * Enqueue scripts and styles.
 *
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '20201208' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri(), array(), '20201208' );

	// Theme block stylesheet.
	wp_enqueue_style( 'twentyfifteen-block-style', get_template_directory_uri() . '/css/blocks.css', array( 'twentyfifteen-style' ), '20190102' );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20170916' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141210' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141028', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141210' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20171218', true );
	wp_localize_script(
		'twentyfifteen-script',
		'screenReaderText',
		array(
			'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );


/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Подключение базовых стилей
 *
 */
function cs_block_editor_styles() {
	wp_enqueue_style( 'twentyfifteen-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20201208' );
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'cs_block_editor_styles' );


// Добавляем поддержку woocommerce для WP 
add_theme_support('woocommerce' );

/**
 * Шаблон для оборётки страницы магазина ДО
 * 
 */
function cs_template_wrapper($lol) {
	echo "<div class='cs_sidebar'>";
	get_sidebar();
	echo "</div>";
	echo "<div class='cs_main'>";
}
add_action('woocommerce_before_main_content', 'cs_template_wrapper');


/**
 * Шаблон для оборётки страницы магазина ПОСЛЕ
 * 
 */
function cs_template_wrapper_after($lol) {
	echo "</div>
		<div class='cs_block_info container'>
		
			<p>
				Выбор родителями верхней одежды для мальчиков является, пожалуй, самым тщательным. Практически все дети младшего и подросткового возраста любят подолгу гулять, играть на улице в любую погоду и в любое время года. Ни дождь, ни мокрый снег, ни холодный ветер не остановит маленького непоседу в занимательной игре на свежем воздухе.
			</p>

			<p>
				Разработка тёплой и качественной верхней одежды для детей и подростов от бренда MANUFACTURER – труд команды профессиональных дизайнеров, которые находят наилучшие технологические, конструктивные и дизайнерские решения в производстве одежды. Прочные и не сковывающие движения комбинезоны для мальчиков младшей группы, утеплённые куртки и пуховики для подростков, стильные пальто на осень и весну, лёгкие непромокаемые ветровки не только сделают прогулки вашего сына на открытом воздухе комфортными, но и помогут создать модный образ для разных случаев жизни.
			</p>

			<p>
				Некоторые модели верхней одежды от MANUFACTURER изготовлены из износостойких материалов с водоотталкивающей пропиткой, благодаря которой ткань не промокает под дождём и снегом. Зимние парки, бомберы и комбинезоны утеплены синтепоном, что позволит вашему ребёнку не замёрзнуть даже в самых сильный мороз. Манжеты рукавов во многих изделиях шьются с трикотажной внешней или внутренней резинкой, которая препятствует проникновению ветра и влаги в рукава. Благодаря надёжным молниям, которые не заедают и не ломаются при частом использовании, верхняя одежда легко расстёгивается и застёгивается. Все изделия изготовлены по лекалам, в конструкции которых учитывается необходимость в свободном и активном движении, поэтому дети в вещах от MANUFACTURER могут легко прыгать, бегать, валяться в снегу, ничто не будет им мешать и сковывать движения.
			</p>

			<p>
				В нашем интернет-магазине вы можете купить недорогую, красивую и функциональную верхнюю одежду для мальчиков, детей и подростков, в один клик с доставкой по всей России. Мы уверены, что изделия от MANUFACTURER доставят удовольствие вам и вашим детям!
			</p>	
		</div>
	";
}
add_action('woocommerce_after_main_content', 'cs_template_wrapper_after');


// Ограничиваем через фильтр кол-во выводимых товаров
add_filter("loop_shop_per_page", function ($cols) {

	return 8;
	
}, 20);

