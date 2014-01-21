<?php
/**
 Template Name: Home
*/

get_header(); ?>

	<main class="<?php echo omega_apply_atomic( 'main_class', 'content' );?>" <?php omega_attr( 'content' ); ?>>

		<?php 
		omega_do_atomic( 'before_content' ); // omega_before_content 

		omega_do_atomic( 'index_content' ); // omega_content 
		
		omega_do_atomic( 'after_content' ); // omega_after_content 
		?>
		
		<div id="homepage-extras">
			<div id="extras-left" class="extras">
				<h2>Testing</h2>
			</div>
	
			
			<div id="extras-right" class="extras">
				<h2>Testing</h2>
			</div>		
		</div>

	</main><!-- .content -->

<?php get_footer(); ?>