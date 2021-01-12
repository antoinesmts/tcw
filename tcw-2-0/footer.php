<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TCW_2.0
 */

?>

				<div class="container partenaires">
                <h6>Nos partenaires</h6><br />
                <section class="customer-logos slider">
                    <div class="slide"><img src="<?php bloginfo('stylesheet_directory')?>/img/partenaires/1.png"></div>
                    <div class="slide"><img src="<?php bloginfo('stylesheet_directory')?>/img/partenaires/2.png"></div>
                    <div class="slide"><img src="<?php bloginfo('stylesheet_directory')?>/img/partenaires/3.png"></div>
                    <div class="slide"><img src="<?php bloginfo('stylesheet_directory')?>/img/partenaires/4.png"></div>
                    <div class="slide"><img src="<?php bloginfo('stylesheet_directory')?>/img/partenaires/5.png"></div>
                    <div class="slide"><img src="<?php bloginfo('stylesheet_directory')?>/img/partenaires/6.png"></div>
                    <div class="slide"><img src="<?php bloginfo('stylesheet_directory')?>/img/partenaires/7.png"></div>
                    <div class="slide"><img src="<?php bloginfo('stylesheet_directory')?>/img/partenaires/8.png"></div>
                </section>
              </div>
	</div><!-- #content -->
        </main>

	<!-- Footer -->
        <footer class="footer">
            <!-- Copyright -->
            <div class="footer-copyright small">© 2021 Tennis Padel Waremmien</div>
        </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Include Jquery and Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory')?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
        <script src="<?php bloginfo('stylesheet_directory')?>/js/carousel.js"></script>

</body>
</html>
