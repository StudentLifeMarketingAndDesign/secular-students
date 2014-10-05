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
<script>
jQuery(window).ready(function() {
	var homeTitle = jQuery("h1.entry-title");
	if (homeTitle.html() === "Home") {
		homeTitle.addClass('display-none');
	}
});
</script>
		
	</main><!-- .content -->

<?php get_footer(); ?>