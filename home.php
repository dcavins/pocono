<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pocono
 */

get_header();

// Get Theme Options from Database.
$theme_options = pocono_theme_options();

// Display Post Slider.
if ( true == $theme_options['slider_blog'] ) :

	get_template_part( 'template-parts/post-slider' );

endif;

// Display Magazine Homepage Widgets.
pocono_magazine_widgets();

// Display Blog Title.
if ( '' !== $theme_options['blog_title'] ) : ?>

	<header class="page-header clearfix">

		<h1 class="blog-title archive-title"><?php echo wp_kses_post( $theme_options['blog_title'] ); ?></h1>
		<p class="blog-description"><?php echo wp_kses_post( $theme_options['blog_description'] ); ?></p>

	</header>

<?php endif; ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php pocono_breadcrumbs(); ?>

				<div id="post-wrapper" class="post-wrapper clearfix">

					<?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content' );

					endwhile; ?>

				</div>

				<?php pocono_pagination(); ?>

			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
