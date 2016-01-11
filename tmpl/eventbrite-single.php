<?php
/**
 * The Template for displaying all single Eventbrite events.
 */ ?>

 <style>
 		article{text-align:center; margin-left:10%; margin-right:10%; margin-top:5%; margin-bottom:5%;}
		.entry-content{margin-left:10%; margin-right:10%;}
		.entry-header{margin-bottom:2%;}
		.entry-meta{margin-top:2%;}
 </style>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				// Get our event based on the ID passed by query variable.
				$event = new Eventbrite_Query( array( 'p' => get_query_var( 'eventbrite_id' ) ) );

				if ( $event->have_posts() ) :
					while ( $event->have_posts() ) : $event->the_post(); ?>

						<article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">

								<h1 class="entry-title"><?php the_title(); ?></h1>
								<?php the_post_thumbnail(); ?>

								<div class="entry-meta">
									<?php echo eventbrite_format_time(); //eventbrite_event_meta(); ?>
								</div><!-- .entry-meta -->
							</header><!-- .entry-header -->

							<div class="entry-content">
								<p>
                  <?php echo eventbrite_strip_style( get_the_content() ); ?>
								</p>

								<?php eventbrite_ticket_form_widget(); ?>
							</div><!-- .entry-content -->

							<footer class="entry-footer">
								<?php eventbrite_edit_post_link( __( 'Edit', 'eventbrite_api' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-## -->

					<?php endwhile;

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;

				// Return $post to its rightful owner.
				wp_reset_postdata();
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php// get_sidebar(); ?>
<?php get_footer(); ?>
