<?php
/*
Template Name: Page Builder Template
*/
//get the header
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();
