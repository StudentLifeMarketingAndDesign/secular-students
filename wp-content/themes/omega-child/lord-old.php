<?php
/**
 Template Name: LORD-OLD
*/

get_header(); ?>

	<main class="<?php echo omega_apply_atomic( 'main_class', 'content' );?>" <?php omega_attr( 'content' ); ?>>

		<?php 
		omega_do_atomic( 'before_content' ); // omega_before_content 

		omega_do_atomic( 'index_content' ); // omega_content 
		
		omega_do_atomic( 'after_content' ); // omega_after_content 
		?>
		
<script>
//a script to filter resources by tag.
var listItems = jQuery("#lord-category>ul").children(); //Object of all the list items. Each resource post is an li.
var listItemsLength = listItems.size(); //counts number of li's on page
var tagArray = []; //create array where parsed tags will live
//loops through li's and parses out tags
jQuery.each(listItems, function( i, val ) {
    	var classes = listItems.eq(i).attr('class');
		var classList = classes.split(" ");
		var classListCount = classList.length; //generic javascript function
		for (var i = 0; i < classListCount; i++) {
		  var tagName = classList[i];
		  var plainTag = tagName.slice(9); //slices off first 9 chars of class, revealing plain tags
		  if (tagName.substring(0,9) == "post_tag-") {  //WP spits out tags with 'post_tag-' prefix
		      tagArray.push(plainTag); //if class starts with 'post_tag-', pushes plainTag to tagArray
            }
        }   
});
// Handles the creation of all buttons, tags, heading elements. Original divs created in cms, perhaps should be moved here.
// Although page should always have tags, we don't want them showing up if the tags go missing for some reason. Thus, if.
if (tagArray.length != 0) {
	jQuery('#category-nav-menu').prepend("<h5>Sort Tag...</h5><button type='button'class='sort-tag-button' id='sort-show-all'>Show All Posts</button><button type='button' class='sort-tag-button' id='freq'>By Frequency</button><button type='button' class='sort-tag-button' id='alpha'>Alphabetically</button>"); // let's hide away tags when not in use
	jQuery('.entry-title').css('margin-bottom', '0'); //squeezes nav right under page heading, for good looks
}
//sorts tagArray alphabetically, likely will have muliptle repeated tags
tagArray.sort();
//so...create new array where final, alphabatized, no-repeat list of tags will live
var tags_by_alpha = [];
jQuery.each(tagArray, function(i, el){
    if(jQuery.inArray(el, tags_by_alpha) === -1) tags_by_alpha.push(el); //if tag not in tags_by_alpha, push to tags_by_alpha
});
// to sort by frequency, first we must compute frequencies of each tag, uses orginal tagArray to this end.
var frequency = {}, value;
for(var i = 0; i < tagArray.length; i++) {
	value = tagArray[i];
	if(value in frequency) {
	    frequency[value]++;
	}
	else {
	    frequency[value] = 1;
	}
}
// make array from the frequency object to de-duplicate
var tags_by_freq = [];
for(value in frequency) {
    tags_by_freq.push(value);
}
// custom sort function, sorts the uniques array in descending order by frequency
function compareFrequency(a, b) {
    return frequency[b] - frequency[a];
}
// sorts it
tags_by_freq.sort(compareFrequency);
// populates the category-nav divs, respectively to alphabetically and frequency
for (var i = 0; i < tags_by_alpha.length; i++) {
    jQuery('#tags-by-alpha').append("<button type='button' class='tag-button' id='post_tag-"+ tags_by_alpha[i] + "'>" + tags_by_alpha[i] + "</button>"); //easy	
    jQuery('#tags-by-freq').append("<button type='button' class='tag-button' id='post_tag-"+ tags_by_freq[i] + "'>" + tags_by_freq[i] + "</button>");
}	
// objects defining behavior of hiding and showing li's
var hidingOptions = {
    duration: 666
    //start: colorExit()
}   
var showingOptions = {
    duration: 666
}
//Describes function of category-nav-menu buttons. Sort tags respectively, or show all li's
var lastPicked;
jQuery('#category-nav-menu button').click(function() {
    var thisId = jQuery(this).attr('id');
    if (thisId == "sort-show-all") {
   		listItems.show(showingOptions);
    }else {
	 	if (thisId == lastPicked) {
		 	jQuery('#tags-by-'+thisId).hide(hidingOptions);
		 	lastPicked = '';
	 	}else {
	 		jQuery('#tags-by-'+lastPicked).hide(hidingOptions);
		 	jQuery('#tags-by-'+thisId).show(showingOptions);
		 	lastPicked = thisId;	 	
	 	}
    }
});
// Describes function of category-nav buttons. Show all li's with said tag, hide the rest.
jQuery('.category-nav button').click(function() {
	console.log('i clicked');
    var thisTag = jQuery(this).attr('id');
    jQuery.each(listItems, function( i, val ) {
        var lordItem = listItems.eq(i).attr('class');
        if (jQuery(this).hasClass(thisTag) == false) {
            jQuery(this).hide(hidingOptions);
        }
        else {
            jQuery(this).show(showingOptions);
        }
    })
});
</script>	
<script>
//breaks skelton grid into rows of three, for proper formating. Can't seem to get around the miniloops limitations
var $lordGrid = jQuery('#lord-grid').children();
var countLordGrid = 0;
jQuery.each($lordGrid, function( i, val ) {
	if (countLordGrid == 3) {
		jQuery(this).before("<br class='clear'>");
		countLordGrid = 1;
		console.log('added br');
	}else {
		countLordGrid++;
		console.log(countLordGrid);
	}
});
</script>	
	</main><!-- .content -->

<?php get_footer(); ?>