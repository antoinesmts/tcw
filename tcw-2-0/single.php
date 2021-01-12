<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TCW_2.0
 */

get_header();
?>

		<main class="contenu">

		<div class="container" style="margin-top: 150px;">
                <div id="contenupage">                  
                    <section>
                            <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			

		endwhile; // End of the loop.
		?>
                    </section> 
                </div>
            </div>

		</main><!-- #main -->

<?php
get_footer();
