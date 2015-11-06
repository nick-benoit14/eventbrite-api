<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<script>
jQuery(document).ready(function()
		{

			 /* OnMouseOver Animation  */

						$(".group",this).mouseenter(
										function()
												{
														$("div.details", this).animate({"bottom":'-' + $("div.details",this).height() + 'px'}, 200);
														$(".group.photocontainer", this).addClass("selected-photocontainer");
														$(".group.details", this).addClass("selected-details");
												});

						$(".group",this).mouseleave(
										function()
												{
													 $("div.details", this).animate({"bottom":'-' + $("div.title",this).height() + 'px'}, 200);
														$(".group.photocontainer", this).removeClass("selected-photocontainer");
														$(".group.details", this).removeClass("selected-details");

												});

		$(window).resize(function()
							 {
									 if($(window).width() < 1100)
											 {

												 //minimize slider
													 $('.cachemakers.cache-slider-container-full').removeClass('cache-slider-container-full')
													 .addClass('cache-slider-container-min');

														$('.cachemakers.cache-announcement-text-full').removeClass('cachemakers cache-announcement-text-full')
													 .addClass('cachemakers cache-announcement-text-min');

												 //Minimize blockwrapper  <div class="blockwrapper-min">
													 $('.blockwrapper').removeClass('blockwrapper').addClass('blockwrapper-min');

												 //minimize sidebar <div class="cacheonium cache-sidebar-min grey">
													 $('.cacheonium.cache-sidebar-full').removeClass('cache-sidebar-full').addClass('cache-sidebar-min');


											 }
									 else
											{
													 $('.cachemakers.cache-slider-container-min').removeClass('cache-slider-container-min') //maximize slider
													 .addClass('cache-slider-container-full');

														$('.cachemakers.cache-announcement-text-min').removeClass('cachemakers cache-announcement-text-min')
													 .addClass('cachemakers cache-announcement-text-full');

												//Minimize blockwrapper  <div class="blockwrapper-min">
													 $('.blockwrapper-min').removeClass('blockwrapper-min').addClass('blockwrapper');

												 //minimize sidebar <div class="cacheonium cache-sidebar-min grey">
													 $('.cacheonium.cache-sidebar-min').removeClass('cache-sidebar-min').addClass('cache-sidebar-full');
											}
							 });
			 });
</script>

<style>
.red{background-color:#ff3722; color:white; font-size:18px}
.cachemakers-block{height:auto; width:250px;display:inline-block;
	position:relative;font-family:sans-serif; text-align:center;}
#primary{width:50%;}
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
					<?php the_title(); ?>
				</h1>
			</header><!-- .page-header -->


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
