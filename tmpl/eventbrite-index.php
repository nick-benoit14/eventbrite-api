<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>

@keyframes blockFade {
    from {background-color: #ff3722;}
    to {background-color: #1DA4B4;}
}

/*.red{ color:white; font-size:18px}*/
.cachemakers-block{
	 background-color:#ff3722; color:white; font-size: 18px;
	 height:auto; width:250px;display:inline-block;
	position:relative;font-family:sans-serif; text-align:center;
	 margin:15px;

	 animation-name: blockFade;
	 animation-duration: 2s;
 }
#primary{}
</style>

<?php
/**
 * Template Name: Eventbrite Events
 */


get_header(); ?>
	<div id="primary" <?php generate_content_class();?>>
		<main id="main" class="site-main" role="main">


                        <div  style="padding:30px" class="slider">
  			  <div><img width="800" height="400" src="http://45.55.18.170/wp-content/uploads/2015/11/solder.jpg"></div>
			</div>

			<h1> Current Groups </h1>
			<?php
				// Set up and call our Eventbrite query.
				$events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
					 'display_private' => false, // boolean
					 'nopaging' => true,        // boolean
					// 'limit' => null,            // integer
					// 'organizer_id' => null,     // integer
					// 'p' => null,                // integer
					// 'post__not_in' => null,     // array of integers
					// 'venue_id' => null,         // integer
					// 'category_id' => null,      // integer
					// 'subcategory_id' => null,   // integer
					// 'format_id' => null,        // integer
				) ) );



				if ( $events->have_posts() ) :
					while ( $events->have_posts() ) : $events->the_post(); ?>

							<div class="cachemakers-block red">
								<div class="cachemakers-block-photo">
									<?php echo get_the_post_thumbnail(); ?>
								</div>
							<div class="cachemakers-block-details">
								<?php echo  get_the_title();?>
							</div>
						</div>



					<?php endwhile;

					// Previous/next post navigation.
					eventbrite_paging_nav( $events );

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;

				// Return $post to its rightful owner.
				wp_reset_postdata();
			?>

			<h1 style="">Location</h1>
			<div>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1489.1541753032047!2d-111.83529
				941880711!3d41.71386464291981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87547e380e50b5e9%
				3A0xd48d3e368581ac3a!2s990+S+Main+St%2C+Logan%2C+UT+84321!5e0!3m2!1sen!2sus!4v1449011906529" width="400"
				height="300" frameborder="0" style="border:0; display:inline-block" allowfullscreen></iframe>

				<div style="display:inline-block; width:500px; vertical-align:top; margin-left:20px; margin-right:20px;">
			  <p>
				Cache Makerspace </br>
				990 S Main Suite A</br>
				Logan, UT
		    </p>

			  <p>
				North of the Providence Maceys, east of the South Walmart,
	    	 west of the Mattress Outlet, and directly south of (the former) Don Aslett.
		     Right by the bus stop.
			  </p>

			</div>


			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
