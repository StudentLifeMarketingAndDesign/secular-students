<?php
/* Register custom menus. */
add_action( 'init', 'omega_register_menus' );

/* Register sidebars. */
add_action( 'widgets_init', 'omega_register_sidebars' );

/* Add default theme settings */
add_filter( 'omega_default_theme_settings', 'omega_set_default_theme_settings');

add_action( 'wp_enqueue_scripts', 'omega_scripts' );
add_action( 'wp_head', 'omega_styles' );
add_action( 'wp_head', 'omega_header_scripts' );
add_action( 'wp_footer', 'omega_footer_scripts' );

/* Header actions. */
add_action( 'omega_header', 'omega_header_markup_open', 5 );
add_action( 'omega_header', 'omega_branding' );
add_action( 'omega_header', 'omega_header_markup_close', 15 );

/* footer insert to the footer. */
add_action( 'omega_footer', 'omega_footer_markup_open', 5 );
add_action( 'omega_footer', 'omega_footer_insert' );
add_action( 'omega_footer', 'omega_footer_markup_close', 15 );

/* Load the primary menu. */
add_action( 'omega_before_header', 'omega_get_primary_menu' );

/* load content */
add_action( 'omega_index_content', 'omega_index_content');
add_action( 'omega_search_content', 'omega_search_content');
add_action( 'omega_archive_content', 'omega_archive_content');
add_action( 'omega_singular_content', 'omega_single_content');

/* Add the title, byline, and entry meta before and after the entry.*/
add_action( 'omega_before_entry', 'omega_entry_header' );
add_action( 'omega_entry', 'omega_entry' );
add_action( 'omega_singular_entry', 'omega_singular_entry' );
add_action( 'omega_after_entry', 'omega_entry_footer' );
add_action( 'omega_singular-page_after_entry', 'omega_page_entry_meta' );

/* Add the primary sidebars after the main content. */
add_action( 'omega_after_main', 'omega_primary_sidebar' );

/* Filter the sidebar widgets. */
add_filter( 'sidebars_widgets', 'omega_disable_sidebars' );
add_action( 'template_redirect', 'omega_one_column' );

/* Allow developers to filter the default sidebar arguments. */
add_filter( 'omega_sidebar_defaults', 'omega_sidebar_defaults' );

add_filter( 'omega_footer_insert', 'omega_default_footer_insert' );

add_filter( 'comment_form_defaults', 'omega_custom_comment_form' );


/**
 * Registers nav menu locations.
 *
 * @since  0.9.0
 * @access public
 * @return void
 */
function omega_register_menus() {
	register_nav_menu( 'primary',   _x( 'Primary', 'nav menu location', 'omega' ) );
}

/**
 * Registers sidebars.
 *
 * @since  0.9.0
 * @access public
 * @return void
 */

function omega_register_sidebars() {

	omega_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary', 'sidebar', 'omega' ),
			'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'omega' )
		)
	);

}

function omega_sidebar_defaults($defaults) {
	/* Set up some default sidebar arguments. */
	$defaults = array(
		'before_widget' => '<section id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-wrap">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	);

	return $defaults;
}

/**
 * Adds custom default theme settings.
 *
 * @since 0.3.0
 * @access public
 * @param array $settings The default theme settings.
 * @return array $settings
 */

function omega_set_default_theme_settings( $settings ) {

	$settings = array(
		'comments_pages'            => 0,
		'comments_posts'            => 1,
		'trackbacks_pages'          => 0,
		'trackbacks_posts'          => 1,
		'content_archive'           => 'full',
		'content_archive_limit'		=> 0,
		'content_archive_thumbnail' => 0,
		'content_archive_more'      => '[Read more...]',
		'more_link_scroll'			=> 0,
		'image_size'                => 'thumbnail',
		'posts_nav'                 => 'numeric',
		'single_nav'                 => 0,
		'header_scripts'            => '',
		'footer_scripts'            => '',
	);

	return $settings;

}


function omega_header_markup_open() {
	echo '<header ' . omega_get_attr('header') . '>';
}


function omega_header_markup_close() {
	echo '</header><!-- .site-header -->';
}

function omega_footer_markup_open() {
	echo '<footer ' . omega_get_attr('footer') . '>';
}


function omega_footer_markup_close() {
	echo '</footer><!-- .site-footer -->';
}

/**
 * Dynamic element to wrap the site title and site description. 
 */
function omega_branding() {

	echo '<div class="' . omega_apply_atomic( 'title_area_class', 'title-area') .'">';

	/* Get the site title.  If it's not empty, wrap it with the appropriate HTML. */	
	if ( $title = get_bloginfo( 'name' ) ) {		
		if ( $logo = get_theme_mod( 'custom_logo' ) )
			$title = sprintf( '<h1 class="site-title"><a href="%1$s" title="%2$s" rel="home"><span><img src="%3$s"/></span></a></h1>', home_url(), esc_attr( $title ), $logo );		
		else
			$title = sprintf( '<h1 class="site-title"><a href="%1$s" title="%2$s" rel="home"><span>%3$s</span></a></h1>', home_url(), esc_attr( $title ), $title );		
	}

	/* Display the site title and apply filters for developers to overwrite. */
	echo omega_apply_atomic( 'site_title', $title );

	/* Get the site description.  If it's not empty, wrap it with the appropriate HTML. */
	if ( $desc = get_bloginfo( 'description' ) )
		$desc = sprintf( '<h2 class="site-description"><span>%1$s</span></h2>', $desc );

	/* Display the site description and apply filters for developers to overwrite. */
	echo omega_apply_atomic( 'site_description', $desc );

	echo '</div>';
}

/**
 * default footer insert filter
 */
function omega_default_footer_insert( $settings ) {

	/* If there is a child theme active, use [child-link] shortcode to the $footer_insert. */
	return '<p class="copyright">' . __( 'Copyright &#169; [the-year] [site-link].', 'omega' ) . '</p>' . "\n\n" . '<p class="credit">' . __( 'Theme by [author-uri].', 'omega' ) . '</p>';	

}

/**
 * Loads footer content
 */
function omega_footer_insert() {
	
	echo '<div class="footer-content footer-insert">';
	
	if ( $footer_insert = get_theme_mod( 'custom_footer' ) ) {
		echo omega_apply_atomic_shortcode( 'footer_content', $footer_insert );		
	} else {
		echo omega_apply_atomic_shortcode( 'footer_content', apply_filters( 'omega_footer_insert','') );
	}
	
	echo '</div>';
}

/**
 * Loads the menu-primary.php template.
 */
function omega_get_primary_menu() {
	get_template_part( 'partials/menu', 'primary' );
}


/**
 * Display the default page edit link
 */
function omega_page_entry_meta() {

	echo omega_apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[post_edit]</div>' );
}

/**
 * Display primary sidebar
 */
function omega_primary_sidebar() {
	get_sidebar();
}


/**
 * Display the default entry header.
 */
function omega_entry_header() {

	echo '<header class="entry-header">';

	if ( is_home() || is_archive() || is_search() ) {
	?>
		<h1 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<?php		
	} else {
	?>
		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
	<?php
	}
	if ( 'post' == get_post_type() ) : 
		get_template_part( 'partials/entry', 'byline' ); 
	endif; 
	echo '</header><!-- .entry-header -->';
	
}

/**
 * Display the default entry metadata.
 */
function omega_entry() {

	if ( is_home() || is_archive() || is_search() ) {
		if(omega_get_setting( 'content_archive_thumbnail' )) {
			get_the_image( array( 'meta_key' => 'Thumbnail', 'default_size' => omega_get_setting( 'image_size' ) ) ); 
		}
	

		if ( 'excerpts' === omega_get_setting( 'content_archive' ) ) {
			if ( omega_get_setting( 'content_archive_limit' ) )
				the_content_limit( (int) omega_get_setting( 'content_archive_limit' ), omega_get_setting( 'content_archive_more' ) );
			else
				the_excerpt();
		}
		else {
			the_content( omega_get_setting( 'content_archive_more' ) );
		}
	} 

}


function omega_excerpt_more( $more ) {
	return ' ... <a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . omega_get_setting( 'content_archive_more' ) . '</a>';
}
add_filter('excerpt_more', 'omega_excerpt_more');


/**
 * Display the default singular entry metadata.
 */
function omega_singular_entry() {

	the_content();

	wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'omega' ) . '</span>', 'after' => '</p>' ) );

}


/**
 * Display the default entry footer.
 */
function omega_entry_footer() {

	if ( 'post' == get_post_type() ) {
		get_template_part( 'partials/entry', 'footer' ); 
	}
	
}

/**
 * Enqueue scripts and styles
 */
function omega_scripts() {
	wp_enqueue_style( 'omega-style', get_stylesheet_uri() );
}

/**
 * Insert conditional script / style for the theme used sitewide.
 */
function omega_styles() {
?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
<?php 
}


/**
 * Echo header scripts in to wp_head().
 */
function omega_header_scripts() {

	echo omega_get_setting( 'header_scripts' );

}

/**
 * Echo the footer scripts, defined in Theme Settings.
 */
function omega_footer_scripts() {

	echo omega_get_setting( 'footer_scripts' );

}

/**
 * Function for deciding which pages should have a one-column layout.
 */
function omega_one_column() {

	if ( !is_active_sidebar( 'primary' ) )
		add_filter( 'theme_mod_theme_layout', 'omega_theme_layout_one_column' );

	elseif ( is_attachment() && wp_attachment_is_image() && 'default' == get_post_layout( get_queried_object_id() ) )
		add_filter( 'theme_mod_theme_layout', 'omega_theme_layout_one_column' );

}


/**
 * Filters 'get_theme_layout' by returning 'layout-1c'.
 */
function omega_theme_layout_one_column( $layout ) {
	return '1c';
}


/**
 * Disables sidebars if viewing a one-column page.
 */

function omega_disable_sidebars( $sidebars_widgets ) {
	global $wp_customize;

	$customize = ( is_object( $wp_customize ) && $wp_customize->is_preview() ) ? true : false;

	if ( !is_admin() && !$customize && '1c' == get_theme_mod( 'theme_layout' ) )
		$sidebars_widgets['primary'] = false;

	return $sidebars_widgets;
}

function omega_index_content() {
	if ( have_posts() ) : 

		/* Start the Loop */ 
		while ( have_posts() ) : the_post(); 
		
			get_template_part( 'partials/content', get_post_format() );
	
		endwhile; 

		omega_content_nav( 'nav-below' ); 

	else :

		get_template_part( 'partials/no-results', 'index' );

	endif;
}

function omega_archive_content() {
	if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="archive-title">
				<?php
					if ( is_category() ) :
						single_cat_title();

					elseif ( is_tag() ) :
						single_tag_title();

					elseif ( is_author() ) :
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						*/
						the_post();
						printf( __( 'Author: %s', 'omega' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();

					elseif ( is_day() ) :
						printf( __( 'Day: %s', 'omega' ), '<span>' . get_the_date() . '</span>' );

					elseif ( is_month() ) :
						printf( __( 'Month: %s', 'omega' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

					elseif ( is_year() ) :
						printf( __( 'Year: %s', 'omega' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						_e( 'Asides', 'omega' );

					elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
						_e( 'Images', 'omega');

					elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
						_e( 'Videos', 'omega' );

					elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
						_e( 'Quotes', 'omega' );

					elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
						_e( 'Links', 'omega' );

					else :
						_e( 'Archives', 'omega' );

					endif;
				?>
			</h1>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</header><!-- .page-header -->

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				get_template_part( 'partials/content', get_post_format() );
			?>

		<?php endwhile; ?>

		<?php omega_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'partials/no-results', 'archive' ); ?>

	<?php endif;	
}

function omega_single_content() {
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); 

			get_template_part( 'partials/content', 'single' ); 
			omega_content_nav( 'nav-below' );
			comments_template(); // Loads the comments.php template. 

		endwhile; // end of the loop. 
	endif;
}

function omega_page_content() {
	if ( have_posts() ) : 

		/* Start the Loop */ 
		while ( have_posts() ) : the_post();

			get_template_part( 'partials/content', 'page' );
			comments_template(); // Loads the comments.php template.

		endwhile; // end of the loop. 
	
	endif;
}

function omega_search_content() {
	if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="archive-title"><?php printf( __( 'Search Results for: %s', 'omega' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content', 'search' ); ?>

		<?php endwhile; ?>

		<?php omega_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'partials/no-results', 'search' ); ?>

	<?php endif;
}

function omega_custom_comment_form($fields) {
	$fields['comment_notes_after'] = ''; //Removes Form Allowed Tags Box
return $fields;
}


// add disqus compatibility
if (function_exists('dsq_comments_template')) {
	remove_filter( 'comments_template', 'dsq_comments_template' );
	add_filter( 'comments_template', 'dsq_comments_template', 12 ); // You can use any priority higher than '10'	
}
