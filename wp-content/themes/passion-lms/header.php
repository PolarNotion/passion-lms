<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Passion_LMS
 */

$page_title = get_the_title();
$header_bg_image = get_field('header_bg_image');
$title_image = get_field('title_image');

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/main.css">

<title><?php echo $page_title; ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php include('navigation.php'); ?>

<div id="page" class="site">
	<div id="content" class="site-content">
		<div style="background: url('<?php echo $header_bg_image; ?>') center center fixed; background-size: cover;">
			<header class="vertical-child">
				<div class="container">
					<img class="title-image" src="<?php echo $title_image; ?>">
				</div>
				<a href="#scroll_prompt_anchor">
					<div id="scroll_prompt" class="animated bounce">
						<img src="https://passioncitychurch.com/wp-content/themes/passioncitychurch/img/down-arrow.png">
					</div>
				</a>
			</header>
		</div>
		<span id="scroll_prompt_anchor"></span>
