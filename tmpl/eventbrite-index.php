<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<style>
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: local("Raleway"), url(https://fonts.gstatic.com/s/raleway/v9/0dTEPzkLWceF7z0koJaX1A.woff2) format("woff2"); }

.cachemakers-block, .container, .image-box, .info {
  font-family: 'Raleway', sans-serif;
  font-size: 100%;
  line-height: 130%; }

.container {
  display: inline-block;
  text-align: center;
  height: auto;
  width: 300px;
  margin: 1%;
  background-color: #DDDDDD;
  position: relative;
  color: #222222;
  box-shadow: 4px 4px 2px gray; }
  .container .image-box img {
    visibility: visible;
    opacity: 1; }
  .container:hover .image-box
  img {
    -webkit-transition: visibility 0s 0.2s, opacity 0.2s;
    -moz-transition: visibility 0s 0.2s, opacity 0.2s;
    -ms-transition: visibility 0s 0.2s, opacity 0.2s;
    transition: visibility 0s 0.2s, opacity 0.2s;
    opacity: 0;
    visibility: hidden; }

.image-box {
  height: 150px;
  width: 100%;
  position: relative;
  overflow: hidden; }
  .image-box img {
    -webkit-transition: visibility 0s 0s, opacity 0.2s;
    -moz-transition: visibility 0s 0s, opacity 0.2s;
    -ms-transition: visibility 0s 0s, opacity 0.2s;
    transition: visibility 0s 0s, opacity 0.2s;
    position: absolute;
    left: 0px;
    top: 0px;
    height: 100%;
    width: 100%; }
  .image-box p {
    font-size: 80%;
    padding: 10px; }
  .image-box .signup-box {
    width: 100%;
    height: 33%;
    overflow: hidden; }
    .image-box .signup-box h4 {
      position: absolute;
      left: 0%;
      margin: 5%;
      font-size: 100%; }
    .image-box .signup-box button {
      position: absolute;
      right: 0%;
      margin: 5%;
      padding: 1%;
      font-size: 100%;
      background-color: #848383;
      color: #efefef; }
      .image-box .signup-box button:hover {
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        background-color: #ffffff;
        color: #000000; }

.info h2 {
  padding: 1%;
  margin: 1%;
  font-size: 100%; }
.info .dateTime {
  font-size: 100%; }
.info .tags {
  font-size: 70%;
  text-align: left;
  margin: 10%; }

/*# sourceMappingURL=block.css.map */

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

          <div class="container">
          <div class="image-box">
          <div class="signup-box">
            <h4>Leader: Joel Duffin</h4>
            <button>Sign Up</button>
          </div>
          <p>Short description of the details of this group. This group. gonna be a good group... <a href="">more information</a>
          </p>
          <img src="wp-includes/images/Makers/sample.jpg" />
          </div>
          <div class ="info">
          <h2>Super Super Long Title: All of the Title that could be</h2>
          <p class="dateTime">Tuesday &middot; 5:30 - 6:30 PM <br> August 12 - September 30 <br> Cache Makerspace </p>
          <div class="tags">&middot; Mechanical &middot; Design </div>
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
