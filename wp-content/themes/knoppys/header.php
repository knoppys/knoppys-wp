<!DOCTYPE html>
<html>
<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

	<?php
	/*
	Dont forget to add your favicon and touch icong into the images directory. You can
	generate these from a png on loads of different websites
	*/
	?>
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="home-naviagtion" id="sticky">
		<nav class="navbar navbar-default">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		        	
			    
			 
		    	  <!-- Collect the nav links, forms, and other content for toggling -->
				    
			  
			    	<div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a href="<?php echo get_site_url(); ?>" class="navbar-brand" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" title="Serviced City Pads Logo" alt="Serviced City Pads Logo"></a>
				    </div>	    	
			    
	 				<?php
				        wp_nav_menu( array(
				            'menu'              => 'primary',
				            'theme_location'    => 'primary',
				            'depth'             => 2,
				            'container'         => 'div',
				            'container_class'   => 'collapse navbar-collapse',
				    		'container_id'      => 'bs-example-navbar-collapse-1',
				            'menu_class'        => 'nav navbar-nav pull-right',
				            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				            'walker'            => new wp_bootstrap_navwalker())
				        );
				    ?>
		    

		  
		  </div><!-- /.container-fluid -->
		</nav>
	</header>


