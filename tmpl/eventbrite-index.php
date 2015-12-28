<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
	.cachemakers-header {padding:4%; text-align:center; }
	.cachemakers-header h1 p{ text-align:center; width:66%; margin-left:auto; margin-right:auto; margin-bottom:2%}

	.cachemakers-box{ max-width:950px; margin-left:auto; margin-right:auto; }
	#main{width:100%; padding-left:10%; padding-right:10%;}
</style>

<?php
/**
 * Template Name: Eventbrite Events
 */

get_header(); ?>

		<main id="main">
			<div class="cachemakers-header">
			<h1> Sign Up for a Group </h1>
			<p>Cache Maker's hosts a multitude volunteer led youth groups focused on Science, Technology, Engineering, and Math.
				 Joining Cache Maker's 4-H club and signing up for a group is a great way to start learning interesting things, continue
				 learning about something you are already interested in, or meet likeminded individuals</p>
			</div>
			<div class="cachemakers-box">
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

          <div class="cachemakers-container">
	          <div class="cachemakers-image-box">
		          <div class="cachemakers-signup-box">
		            <!-- <h4>Leader: Joel Duffin</h4> -->
		            <a href="<?php echo eventbrite_event_eb_url(); ?>"><button>Sign Up</button></a>
		          </div>
							<p><?php echo eventbrite_get_description(); ?></p>
		          <?php the_post_thumbnail(); ?>
	          </div>
	          <div class ="cachemakers-info">
		          <h2><?php the_title(); ?></h2>
								<p class="dateTime"> <?php echo  eventbrite_format_time(); ?> </p>
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
			</div>
			<div class="cachemakers-header"><h1>Location</h1></div>
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
	<?php// get_sidebar(); ?>
	<?php get_footer(); ?>
