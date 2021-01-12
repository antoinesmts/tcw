<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TCW_2.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php bloginfo('stylesheet_directory')?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo('stylesheet_directory')?>/css/main.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tcw-2-0' ); ?></a>

	<header class="top" role="header">
            <div class="container">
                <nav class="navbar navbar-expand-md fixed-top navbar-dark" style="background-color: #e55b12;">
                            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                                <img src="<?php bloginfo('stylesheet_directory')?>/img/logo.png" class="d-inline-block" width="100" height="100" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                          
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <?php
																		wp_nav_menu( array(
										'theme_location'  => 'primary',
										'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
										'container'       => 'div',
										'container_class' => 'collapse navbar-collapse',
										'container_id'    => 'navbarSupportedContent',
										'menu_class'      => 'navbar-nav mr-auto',
										'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
										'walker'          => new WP_Bootstrap_Navwalker(),
) );
									?>
                                <a class="" href="https://www.facebook.com/TennisClubWaremmien">
                                    <img src="<?php bloginfo('stylesheet_directory')?>/img/facebook.png" class="d-inline-block" width="32" height="32" alt="Logo Facebook">
                                </a>
                            </div>
                </nav>                    
            </div>
        </header>
    
	<main class="contenu">

	<div id="content" class="site-content">
