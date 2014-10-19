<?php
/**
 Template Name: LORD-NEW
*/

get_header(); ?>

	<main class="<?php echo omega_apply_atomic( 'main_class', 'content' );?>" <?php omega_attr( 'content' ); ?>>

		<?php 
		omega_do_atomic( 'before_content' ); // omega_before_content 

		//omega_do_atomic( 'index_content' ); // omega_content 
		
		omega_do_atomic( 'after_content' ); // omega_after_content 
		?>



<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script>
	


var app = angular.module('LORD', []);

app.controller('LordCtrl', function($scope, $http) {
	$scope.posts = {
ID: 440,
title: "Deconversion, Belief, and the Power of Silence by Prplfox",
status: "publish",
type: "post",
author: {
ID: 3,
username: "KevinB",
name: "KevinB",
first_name: "Kevin",
last_name: "Bombardier",
nickname: "KevinB",
slug: "kevinb",
URL: "",
avatar: "http://1.gravatar.com/avatar/5af06fd6a73b19e4e4bcc2bc49cf3d6d?s=96",
description: "",
registered: "2014-01-24T05:31:07+00:00",
meta: {
links: {
self: "http://localhost:8888/secular-students/wp-json/users/3",
archives: "http://localhost:8888/secular-students/wp-json/users/3/posts"
}
}
},
content: "HELLO WORLD",
parent: 0,
link: "http://localhost:8888/secular-students/deconversion-belief-and-the-power-of-silence-by-prplfox/",
date: "2014-03-22T23:32:44-05:00",
modified: "2014-03-22T23:32:44-05:00",
format: "standard",
slug: "deconversion-belief-and-the-power-of-silence-by-prplfox",
guid: "http://secularstudents.org.uiowa.edu/?p=440",
excerpt: "<p>In this well-done video series, prplfox shows how he lost his faith by going through the hardships he experienced as well as discussing the tough questions he had to wrestle with.</p> ",
menu_order: 0,
comment_status: "open",
ping_status: "open",
sticky: false,
date_tz: "America/Chicago",
date_gmt: "2014-03-23T04:32:44+00:00",
modified_tz: "America/Chicago",
modified_gmt: "2014-03-23T04:32:44+00:00",
meta: {
links: {
self: "http://localhost:8888/secular-students/wp-json/posts/440",
author: "http://localhost:8888/secular-students/wp-json/users/3",
collection: "http://localhost:8888/secular-students/wp-json/posts",
replies: "http://localhost:8888/secular-students/wp-json/posts/440/comments"
}
},
featured_image: null,
terms: {
post_tag: [
{
ID: 30,
name: "Atheism",
slug: "atheism",
description: "",
parent: null,
count: 15,
link: "http://localhost:8888/secular-students/tag/atheism/",
meta: {
links: {
collection: "http://localhost:8888/secular-students/wp-json/taxonomies/post_tag/terms",
self: "http://localhost:8888/secular-students/wp-json/taxonomies/post_tag/terms/28"
}
}
},
{
ID: 16,
name: "Christianity",
slug: "christianity",
description: "",
parent: null,
count: 5,
link: "http://localhost:8888/secular-students/tag/christianity/",
meta: {
links: {
collection: "http://localhost:8888/secular-students/wp-json/taxonomies/post_tag/terms",
self: "http://localhost:8888/secular-students/wp-json/taxonomies/post_tag/terms/16"
}
}
},
{
ID: 100,
name: "deconversion",
slug: "deconversion",
description: "",
parent: null,
count: 2,
link: "http://localhost:8888/secular-students/tag/deconversion/",
meta: {
links: {
collection: "http://localhost:8888/secular-students/wp-json/taxonomies/post_tag/terms",
self: "http://localhost:8888/secular-students/wp-json/taxonomies/post_tag/terms/94"
}
}
}
],
category: [
{
ID: 7,
name: "L.O.R.D.",
slug: "lord",
description: "The List of Resources for Doubters",
parent: null,
count: 32,
link: "http://localhost:8888/secular-students/category/lord/",
meta: {
links: {
collection: "http://localhost:8888/secular-students/wp-json/taxonomies/category/terms",
self: "http://localhost:8888/secular-students/wp-json/taxonomies/category/terms/7"
}
}
},
{
ID: 14,
name: "Videos",
slug: "videos",
description: "",
parent: {
ID: 7,
name: "L.O.R.D.",
slug: "lord",
description: "The List of Resources for Doubters",
parent: null,
count: 32,
link: "http://localhost:8888/secular-students/category/lord/",
meta: {
links: {
collection: "http://localhost:8888/secular-students/wp-json/taxonomies/category/terms",
self: "http://localhost:8888/secular-students/wp-json/taxonomies/category/terms/7"
}
}
},
count: 27,
link: "http://localhost:8888/secular-students/category/lord/videos/",
meta: {
links: {
collection: "http://localhost:8888/secular-students/wp-json/taxonomies/category/terms",
self: "http://localhost:8888/secular-students/wp-json/taxonomies/category/terms/14"
}
}
}
]
}
};	    
    $scope.getProject = function($projectID) {
    	console.log($projectID);
    
    	$http.get('http://localhost:8888/secular-students/wp-json/posts/').success(function(data, status, headers, config) {
    	$scope.posts = data;
        console.log(data);
    });
	    
    };
	
});

</script>		
		
<div ng-app="LORD">

	<div>
		<section ng-controller="LordCtrl">
			
			<p> {{posts.title}} </p>
			<p> {{posts.slug}} </p>
			<p> {{posts.ID}} </p>
			<p> {{posts.content}} </p>
			<p> {{posts.date}} </p>
			<p> {{posts.author.name}} </p>
			<p> {{posts.excerpt}} </p>
			<p> {{posts.status}} </p>
			
				
		</section>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non magna hendrerit, malesuada nisi at, accumsan nibh. In hac habitasse platea dictumst. Morbi at consectetur leo, vitae imperdiet erat. Praesent gravida tortor sed tellus tempus, eu lacinia urna aliquet. Mauris cursus tincidunt dapibus. Proin iaculis elit eget accumsan euismod. Maecenas quam risus, scelerisque et ante nec, lacinia efficitur ipsum. Ut at accumsan est, at feugiat ante. Proin ligula erat, dapibus eu accumsan ac, volutpat sit amet quam. Vestibulum cursus ipsum ut volutpat faucibus. Vestibulum pharetra tincidunt sem, in placerat quam dignissim eu. Maecenas pellentesque urna nec posuere vestibulum.

Nulla facilisi. Curabitur sollicitudin interdum facilisis. Fusce tempor luctus ex sit amet vulputate. Donec luctus dui et quam tristique, eu elementum justo efficitur. Suspendisse in arcu venenatis, tempor tellus nec, egestas ex. Integer orci tellus, dictum eget nunc sit amet, eleifend tincidunt eros. Vestibulum ut purus eleifend, varius risus ac, pulvinar tortor. Quisque quis erat auctor, dictum augue et, tristique justo. Phasellus commodo, ligula vitae imperdiet dictum, quam mi lobortis velit, a aliquet sapien est ac felis. Integer tristique, ipsum quis ornare dictum, sem velit semper sem, nec commodo tellus ante eget urna. Nullam vitae bibendum sapien. Pellentesque tempus, dolor nec volutpat pharetra, dui quam lobortis tortor, sit amet eleifend ipsum odio at mi. Nullam bibendum risus id neque porttitor fermentum. Duis sapien felis, dapibus in ante vel, condimentum egestas ligula.

Curabitur pellentesque, libero nec laoreet lacinia, urna erat vestibulum justo, vel interdum odio ipsum id augue. Integer massa est, interdum vel viverra nec, vestibulum vel felis. Proin porta odio eu tellus fringilla fermentum. Suspendisse ex justo, ultricies et lacus et, pulvinar sagittis sapien. Etiam condimentum ante odio, ac rutrum arcu sagittis a. Suspendisse potenti. Aliquam tempor, nibh eget volutpat varius, urna felis suscipit turpis, hendrerit venenatis orci quam convallis orci. Maecenas congue nulla sed nisi suscipit aliquam. Sed ac volutpat lorem. Cras sed efficitur lectus. Pellentesque mollis maximus luctus. Donec et metus in justo malesuada convallis. Vestibulum libero tellus, ullamcorper id sapien in, congue sagittis magna. Suspendisse tristique aliquam ante et lacinia. Ut rutrum non leo at luctus. Donec volutpat suscipit velit vel fermentum.

Aenean ex ligula, accumsan id ante id, dapibus fringilla justo. Aliquam eget porttitor diam, quis condimentum felis. Phasellus lobortis sem nibh, vitae tristique lectus malesuada in. Proin a consequat nulla. Integer porttitor, nibh non venenatis aliquam, elit velit scelerisque libero, eget vestibulum dolor dui eget dolor. Ut interdum vitae enim sit amet iaculis. Sed rhoncus urna purus, vitae luctus lectus vestibulum quis. Duis quis turpis massa. Pellentesque dapibus elit ac rhoncus vulputate. Quisque a pulvinar nisl. Nulla cursus ante at scelerisque lobortis. Duis nec dui id felis laoreet sodales. Proin vehicula neque turpis, vel pretium massa volutpat ac. Nulla id aliquet felis, a feugiat massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		</p>


	</div>



</div>



	</main>