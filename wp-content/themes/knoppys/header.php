<!DOCTYPE html>
<html>
<head>
<title><?php bloginfo('name'); ?></title>
<meta name="viewport" content="initial-scale=1">
<meta name="author" content="Knoppys.co.uk" >
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<?php wp_head(); ?>
</head>
<body>

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


