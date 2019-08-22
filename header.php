<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package open-eyes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="bg-white antialiased">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="text-white">
<div id="page" class="site">
	<!--<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'open-eyes' ); ?></a>-->

	<header id="site-navigation" class="site-header">
		<nav class="flex items-center justify-between flex-wrap bg-gray-800 p-6">
			<div class="flex items-center flex-shrink-0 text-white mr-6">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
					?>
			</div><!-- .site-branding -->

		  <div class="block lg:hidden">
		    <button aria-expanded="false" class="flex flex-col h-8 items-center px-3 py-2 toggle">
				  <span class="nav-bar bg-white"></span>
				  <span class="nav-bar bg-white"></span>
				  <span class="nav-bar bg-white"></span>
		    </button>
		  </div>

			<div class="w-full flex-grow items-center lg:w-auto text-white">
			    <?php
						wp_nav_menu( array(
							'theme_location' => 'top-nav',
							'container'      => 'ul',
							'container_class'=> 'nav-menu'
						) );
						?>
			</div>
		</nav>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
