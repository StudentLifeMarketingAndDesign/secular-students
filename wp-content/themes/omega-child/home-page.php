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
				<a class="twitter-timeline" href="https://twitter.com/UISecs" data-widget-id="425776999278186496">Tweets by @UISecs</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>			
			<div id="extras-right" class="extras">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fsecsi&amp;width&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true&amp;appId=470713492967451" scrolling="no" frameborder="0" style="overflow:hidden; height:350px; border-bottom: solid black 1px;" allowTransparency="false" ></iframe>
			</div>		
		</div>
		
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