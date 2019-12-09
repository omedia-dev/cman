<?php
/**
 * Matreshka functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Matreshka
 */





 

if ( ! function_exists( 'matreshka_setup' ) ) :

	function matreshka_setup() {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'matreshka' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 105,
			'width'       => 91,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'matreshka_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/*
function matreshka_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'matreshka' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'matreshka' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'matreshka_widgets_init' );
*/
/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
	//wp_dequeue_style( 'wc-block-style' );
}



add_action('wp_enqueue_scripts', 'cman_styles' );
function cman_styles() {
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() .'/assets/css/bootstrap.css' );
	wp_enqueue_style('swiper', get_stylesheet_directory_uri() .'/assets/css/swiper.min.css' );
	wp_enqueue_style('gLightbox', get_stylesheet_directory_uri() .'/assets/css/glightbox.min.css' );
	wp_enqueue_style('hystmodal-css', get_template_directory_uri() .'/assets/css/hystmodal.css' );
	wp_enqueue_style('style', get_stylesheet_directory_uri() .'/assets/css/style.css' );
	wp_enqueue_style('custom-css', get_template_directory_uri() .'/style.css' );
}

add_action( 'wp_enqueue_scripts', 'cman_scripts' );
function cman_scripts(){
	wp_enqueue_script( 'child-bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.js');
	wp_enqueue_script( 'child-swiper', get_stylesheet_directory_uri() . '/assets/js/swiper.min.js');
	wp_enqueue_script( 'child-gLightbox', get_stylesheet_directory_uri() . '/assets/js/glightbox.min.js');
	wp_enqueue_script( 'child-hystmodal', get_stylesheet_directory_uri() . '/assets/js/hystmodal.js');
	wp_enqueue_script( 'imask', get_stylesheet_directory_uri() . '/assets/js/imask.js');
	//wp_enqueue_script( 'child-ui', get_stylesheet_directory_uri() . '/assets/js/jquery-ui.js');
	//wp_enqueue_script( 'child-slider', get_stylesheet_directory_uri() . '/assets/js/selectToUISlider.jQuery.js');
	wp_enqueue_script( 'child-custom', get_stylesheet_directory_uri() . '/assets/js/functions.js');
}


//Убрать BR из Contact form 7
add_filter( 'wpcf7_autop_or_not', '__return_false' );

//Отмена смайликов
add_filter('option_use_smilies', '__return_false');





//Добавление кастомных типов записей
add_action( 'init', 'register_post_types' ); // Использовать функцию только внутри хука init
 
function register_post_types() {

	//Тип поста : Квартиры под продажу
	$labelsKvartira = array(
		'name' => 'Недвижимость для продажи',
		'singular_name' => 'Недвижимость продажа', // админ панель Добавить->Функцию
		'all_items' => 'Список объектов',
		'edit_item' => 'Редактировать объект',
		'menu_name' => 'Недвижимость Продажа', // ссылка в меню в админке
		'add_new_item' => 'Добавить объекты недвижмости для продажи', // заголовок тега <title>
	);
	$argsKvartira = array(
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array('title'),
		'labels' => $labelsKvartira,
		'menu_icon' => 'dashicons-store', // иконка в меню
		'menu_position' => 4, // порядок в меню
	);
	register_post_type('nedv_sale', $argsKvartira);



	
	//Тип поста : Недвижимость под аренду
	$labelsArenda = array(
		'name' => 'Недвижимость для аренды',
		'singular_name' => 'Недвижимость Аренда', // админ панель Добавить->Функцию
		'all_items' => 'Список объектов',
		'menu_name' => 'Недвижимость Аренда', // ссылка в меню в админке
		'add_new_item' => 'Добавить объекты недвижмости под аренду', // заголовок тега <title>
	);
	$argsArenda = array(
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'map_meta_cap'		 => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array('title', 'author'),
		'labels' => $labelsArenda,
		'menu_icon' => 'dashicons-admin-network', // иконка в меню
		'menu_position' => 4, // порядок в меню
	);
	register_post_type('nedv_arenda', $argsArenda);




	//Тип поста : Жилые Комплексы
	$labelsJK = array(
		'name' => 'Жилые Комплексы',
		'singular_name' => 'Жилой Комплекс', // админ панель Добавить->Функцию
		'all_items' => 'Список объектов',
		'menu_name' => 'ЖК', // ссылка в меню в админке
		'add_new_item' => 'Добавить жилой комлекс или квартиру в ЖК', // заголовок тега <title>
	);
	$argsJK = array(
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'map_meta_cap'		 => true,
		'has_archive'        => true,
		'hierarchical'       => true,
		'supports'           => array('title', 'page-attributes'),
		'labels' => $labelsJK,
		'menu_icon' => 'dashicons-building', // иконка в меню
		'menu_position' => 5, // порядок в меню
	);
	register_post_type('nedv_jk', $argsJK);



	//Тип поста : Квартиры новостройки продажа
	$labelsNewFlat = array(
		'name' => 'Квартиры в новостройках',
		'singular_name' => 'Квартира в новостройке', // админ панель Добавить->Функцию
		'all_items' => 'Список объектов',
		'edit_item' => 'Редактировать объект',
		'menu_name' => 'Квартиры в новостройках', // ссылка в меню в админке
		'add_new_item' => 'Добавить квартиру в новостройке', // заголовок тега <title>
	);
	$argsNewFlat = array(
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array('title'),
		'labels' => $labelsNewFlat,
		'menu_icon' => 'dashicons-building', // иконка в меню
		'menu_position' => 5, // порядок в меню
	);
	register_post_type('nedv_new', $argsNewFlat);



	//Тип поста : НОВОСТИ
	$labelsNews = array(
		'name' => 'Новости',
		'singular_name' => 'Новость', // админ панель Добавить->Функцию
		'add_new' => 'Добавить новость',
		'add_new_item' => 'Добавить новость', // заголовок тега <title>
		'edit_item' => 'Редактировать новость',
		'new_item' => 'Новая новость',
		'all_items' => 'Все новости',
		'view_item' => 'Просмотр новостей на сайте',
		'search_items' => 'Искать новости',
		'not_found' =>  'Новости не найдены.',
		'not_found_in_trash' => 'В корзине нет новостей.',
		'menu_name' => 'Новости' // ссылка в меню в админке
	);
	$argsNews = array(
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments'),
		'labels' => $labelsNews,
		'menu_icon' => 'dashicons-clock', // иконка в меню
		'menu_position' => 6, // порядок в меню
	);
	register_post_type('news', $argsNews);



	//Тип поста : Баннер
	$labelsBanner = array(
		'name' => 'Баннер',
		'singular_name' => 'Баннер', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Баннер',
		'add_new_item' => 'Добавить Баннер', // заголовок тега <title>
		'edit_item' => 'Редактировать Баннер',
		'new_item' => 'Новый Баннер',
		'all_items' => 'Все Баннеры',
		'view_item' => 'Просмотр Баннера на сайте',
		'search_items' => 'Искать Баннеры',
		'not_found' =>  'Баннеры не найдены.',
		'not_found_in_trash' => 'В корзине нет Баннеров.',
		'menu_name' => 'Баннеры' // ссылка в меню в админке
	);
	$argsBanner = array(
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array('title'),
		'labels' => $labelsBanner,
		'menu_icon' => 'dashicons-tickets-alt', // иконка в меню
		'menu_position' => 7, // порядок в меню
	);
	register_post_type('banners', $argsBanner);




}



add_image_size( 'catalog-thumbs', 600, 600, true );


  



//скрываем чужие вложения при создании поста не администратором
add_filter( 'posts_where', 'true_hide_attachments_from_another_author' );
function true_hide_attachments_from_another_author( $where ){
	global $current_user;
 
	if( !current_user_can( 'administrator' ) // пользователь - не администратор, но можно это убрать
	   && isset( $_POST['action'] ) // придётся использовать это условие, если не хотите получать Notices при включенном WP_DEBUG
	   && $_POST['action'] == 'query-attachments') // вложения загружаются AJAX запросом, в котором POST-параметр action равен query-attachments
		$where .= ' AND post_author=' . $current_user->data->ID; // добавляем автора в SQL запросв	
	return $where;
}





// Фильтр для API Google Maps
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyDpXFjCvah4hnFrwrzU2DCihwMBbiNCKFc';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');





//скрытие панели для всех кроме админов start
// add_action('after_setup_theme', function(){
// 	if ( ! is_admin() && ! current_user_can('manage_options') )
// 		show_admin_bar( false );
// });




//Переписваем листинг избранного
add_filter( 'favorites/list/listing/html', 'custom_favorites_listing_html', 10, 4 );
function custom_favorites_listing_html($html, $markup_template, $post_id, $list_options){

	$main_img = get_field('dom-gallery', $post_id)[0];
	$html = '<a href=' . get_permalink($post_id) .'" class="row favorlist" data-postid="' . $post_id .'">
		<div class="col-12 col-md-8 pl-md-5">
			<div class="favorlist__title">' . get_the_title($post_id) . '</div>';
		
			$objtype = get_post_type_object( get_post_type( $post_id ) );

		$html .= '<div class="favorlist__type">' . $objtype->labels->singular_name . '</div>';

		if(get_field('dom-locality-name', $post_id)){
			$line2Text = "г. " . get_field('dom-locality-name', $post_id) . ", " . get_field('dom-address', $post_id);
			$html .=  '<div class="favorlist__addr">' . $line2Text . '</div>';
		}

		$html .= '</div>';
		
		if(get_post_type( $post_id ) != 'nedv_jk'){
			$html .= '<div class="col-8 col-md-3">
						<div class="favorlist__price">' .
							number_format ( (int)get_field('dom-price', $post_id), 0, ",", " " ) .
						'руб</div>
					</div>';
		} else {
			$html .= '<div class="col-8 col-md-3"></div>';
		}
		$html .= '<div class="col-4 col-md-1">
					<div class="favorlist__action">' .
						do_shortcode('[favorite_button post_id=' . $post_id . ']') . '
					</div>
				</div></a>';
	return $html;
}





//Для контактной формы информация из аттрибута "from"
add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7', 10, 3 );
function custom_shortcode_atts_wpcf7( $out, $pairs, $atts ) {
	if( isset($atts['from']) )
		$out['from'] = $atts['from'];

	return $out;
}