

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
	.cachemakers-header {padding:4%; text-align:center; }
	.cachemakers-header h1 p{ text-align:center; width:66%; margin-left:auto; margin-right:auto; margin-bottom:2%}

	.cachemakers-box{ max-width:950px; margin-left:auto; margin-right:auto; }
	#main{width:100%; padding-left:10%; padding-right:10%;}
	iframe{ display:block; margin:auto !important; padding:2%; }
</style>


<?php
/**
 * Template Name: Eventbrite Events
 */

get_header(); ?>

		<main id="main">
			<div class="cachemakers-header">
			<h1> Sign Up for a Group </h1>
			<p>Cache Makers hosts a multitude volunteer led youth groups focused on Science, Technology, Engineering, and Math.
				 Joining Cache Maker's 4-H club and signing up for a group is a great way to start learning interesting things, continue
				 learning about something you are already interested in, or meet likeminded individuals</p>
			</div>
			<div class="cachemakers-box">
			  <?php echo eventbrite_get_eventblocks(); ?>
			</div>

			<div class="cachemakers-header"><h1>Things We've Made</h1></div>
			<div  style="overflow:auto;">
				<iframe style="float:left;" width="560" height="315" src="https://www.youtube.com/embed/MxaKxS5POmY" frameborder="0" allowfullscreen></iframe>
				<iframe style="float:left;" width="560" height="315" src="https://www.youtube.com/embed/CYzd85A-oCE" frameborder="0" allowfullscreen></iframe>
			</div>
			<div style="margin:5%;">
				<a data-flickr-embed="true"  href="https://www.flickr.com/photos/114910479@N08/albums/72157661959120016" title="Website Slides"><img src="https://farm1.staticflickr.com/697/20499472514_61c1370293_b.jpg" style="display:block; margin-auto;" width="1024" height="768" alt="Website Slides"></a><script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>
			</div>
		</main><!-- #main -->
	<?php// get_sidebar(); ?>
	<?php get_footer(); ?>
