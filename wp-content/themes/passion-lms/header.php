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

$current_team = get_current_team_wpid();

if( $current_team !== 'EVERYONE' && is_numeric($current_team) ):
	// Grab the background-image and title-image of the current team
	$args = array(
		'p'	=> $current_team,
		'post_type'   => 'teams',
	);

	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$header_bg_image 	= get_field('header_bg_image');
		$title_image 			= get_field('title_image');
		$title_text				= get_field('title_text');
	endwhile;
	wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page
else:
	$header_bg_image	= get_field('header_bg_backup', 'option');
  $title_image 			= get_field('header_title_image_backup', 'option');
endif;

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

<!-- Haivision controller script -->
<script src="http://player.theplatform.com/pdk/IfSiAC/tpPdkController.js"></script>

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
						<?php if($title_image == ''): ?>
							<h1 class="page-title"><?php echo $title_text; ?></h1>
						<?php else: ?>
							<img src="<?php echo $title_image; ?>">
						<?php endif; ?>
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
