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
global $user_permissions;
$user_permissions[] = "819";
$user_permissions[] = "123";

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
<!-- Font Awesome, added from bootstrap cdn -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<title><?php echo $page_title; ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php include('navigation.php'); ?>

<div id="page" class="site">
	<div id="content" class="site-content">
		<div style="background: url('<?php echo $header_bg_image; ?>') center center fixed; background-size: cover;">
			<header class="vertical-child pad">
				<div class="container">
					<div class="img-lg">
						<img src="<?php echo $title_image; ?>">
					</div>
				</div>
				<a href="#scroll_prompt_anchor">
					<div id="scroll_prompt" class="animated bounce">
						<img src="<?php echo get_template_directory_uri();?>/img/down-arrow.png">
					</div>
				</a>
			</header>
		</div>
		<span id="scroll_prompt_anchor"></span>
