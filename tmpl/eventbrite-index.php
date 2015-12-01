<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
.red{background-color:#ff3722; color:white; font-size:18px}
.cachemakers-block{height:auto; width:250px;display:inline-block;
	position:relative;font-family:sans-serif; text-align:center;}
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

			<h1>Location</h1>
			<div>
			  <p>Cache Makerspace
				990 S Main Suite A
				Logan, UT
		          </p>
			<p>North of the Providence Maceys, east of the South Walmart,
      			    west of the Mattress Outlet, and directly south of (the former) Don Aslett.
		            Right by the bus stop.</p>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
