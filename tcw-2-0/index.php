<?php
/*
	Template Name: Home Page
*/

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TCW_2.0
 */

get_header();
?>

	<!-- Carousel dia -->

            <div class="carouselfront">
                <div id="carouselCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselCaptions" data-slide-to="2"></li>
                    </ol>
            
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php bloginfo('stylesheet_directory')?>/img/photos/terrains123.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Nos installations</h5>
                                <p>8 terrains, dont 5 éclairés !</p>
                            </div>
                         </div>
                        <div class="carousel-item">
                            <img src="<?php bloginfo('stylesheet_directory')?>/img/photos/bulle.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Pour la saison d'hiver</h5>
                                <p>3 terrains sous bulle et éclairés pour l'hiver !</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                           <img src="<?php bloginfo('stylesheet_directory')?>/img/photos/padel.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Nouveau !</h5>
                                <p>Essayez notre terrain de padel !</p>
                            </div>
                        </div>
                    </div>
                    
                    <a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        
            <!-- Cards News -->    
            <div class="container"> 
                <div class="card-columns">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="card-text"><?php $excerpt= kc_excerpt(); echo substr($excerpt, 0, 150);?></p>
                            <p class="card-text"><small class="text-muted">Publié le <?php the_time('l j F Y'); ?></small></p>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
						<p><?php _e('Désolé, il n\'y a rien ici !'); ?></p>
					<?php endif; ?>
                </div>

                <!-- Pagination -->
				<div id="pagination">
					<?php wplift_pagination(); ?>
				</div>
			</div>

<?php
get_footer();
