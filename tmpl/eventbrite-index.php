<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
.red{background-color:#ff3722; color:white; font-size:18px}
.cachemakers-block{height:auto; width:250px;display:inline-block;
	position:relative;font-family:sans-serif; text-align:center;}
#primary{width:75%;}
</style>

<?php
/**
 * Template Name: Eventbrite Events
 */


get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<h1 class="page-title">
					<?php// the_title(); ?>
				</h1>
			</header><!-- .page-header -->

			<h2> Current Group </h2>
			<?php
				// Set up and call our Eventbrite query.
				$events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
					 'display_private' => true, // boolean
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

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
