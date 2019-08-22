<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package open-eyes
 */

get_header();
?>

	<?php if ( get_header_image() ) : ?>
	  <div id="masthead" class="" style="background-image:url('<?php header_image(); ?>'); height:60vh; width:100vw; background-size:cover; background-repeat:no-repeat">
	  <?php endif;
		$open_eyes_description = get_bloginfo( 'description', 'display' );
		if ( $open_eyes_description || is_customize_preview() ) :
			?>
			<h1 class="text-6xl"><?php echo $open_eyes_description;?></h1>
		</div>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="container mx-auto">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
