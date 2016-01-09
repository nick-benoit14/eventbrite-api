<?php
/**
 * Template Name: Eventbrite Events
 */
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
	.cachemakers-header {padding:4%; text-align:center; }
	.cachemakers-header h1 p{ text-align:center; width:66%; margin-left:auto; margin-right:auto; margin-bottom:2%}

	.cachemakers-box{ max-width:950px; margin-left:auto; margin-right:auto; }
	#main{width:100%; padding-left:10%; padding-right:10%;}
	iframe{ display:block; margin:auto !important; padding:2%; }
</style>

<?php get_header(); ?>

		<main id="main">
			<div class="cachemakers-header">
			<h1> Events </h1>
			<p>Cache Makers hosts a multitude volunteer led youth groups focused on Science, Technology, Engineering, and Math.
				 Joining Cache Maker's 4-H club and signing up for a group is a great way to start learning interesting things, continue
				 learning about something you are already interested in, or meet likeminded individuals</p>
			</div>
			<div class="cachemakers-box">
			  <?php //echo eventbrite_get_eventblocks(); ?>
			</div>

		</main><!-- #main -->
	<?php// get_sidebar(); ?>
	<?php get_footer(); ?>
