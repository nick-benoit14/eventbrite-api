<?php


if ( ! function_exists( 'eventbrite_get_description' ) ):
  function eventbrite_get_description(){
    $content = substr(strip_tags(get_the_content()), 0, 75);
    $more_info = "....<a href='" . eventbrite_event_eb_url() ."'>more info</a>";
    return $content . $more_info;
  }
endif;

if ( ! function_exists( 'eventbrite_get_eventblock' ) ):
  function eventbrite_get_eventblock(){

    $post_string = "";

    $post_string =  "<div class='cachemakers-container'>
                      <div class='cachemakers-image-box'>
                        <div class='cachemakers-signup-box'>
                          <!-- <h4>Leader: LeaderName</h4> -->
                          <a href='" .  eventbrite_event_eb_url() . "'><button>More Info</button></a>
                        </div>
                        <p>" . eventbrite_get_description() . "</p>
                        " . get_the_post_thumbnail() . "
                      </div>
                      <div class ='cachemakers-info'>
                      <h2><a href='". esc_url( get_permalink() ) . "' >" . get_the_title() . "</a></h2>
                          <p class='dateTime'> " . eventbrite_format_time() . " </p>
                      </div>
                    </div>";
       return $post_string;
  }
endif;


if ( ! function_exists( 'eventbrite_get_open_eventblock' ) ):
  function eventbrite_get_open_eventblock(){

    $post_string = "";

    $post_string =  "<div class='cachemakers-container'>
                      <div class='cachemakers-image-box'>
                        <div class='cachemakers-signup-box'>
                          <!-- <h4>Leader: LeaderName</h4> -->
                          <a href='" .  eventbrite_event_eb_url() . "'><button>Sign Up</button></a>
                        </div>
                        <p>" . eventbrite_get_description() . "</p>
                        " . get_the_post_thumbnail() . "
                      </div>
                      <div class ='cachemakers-info'>
                      <h2><a href='". esc_url( get_permalink() ) . "' >" . get_the_title() . "</a></h2>
                          <p class='dateTime'> " . eventbrite_format_time() . " </p>
                      </div>
                    </div>";
       return $post_string;
  }
endif;

if ( ! function_exists( 'eventbrite_get_open_eventblocks' ) ):
  function eventbrite_get_open_eventblocks(){
    // Set up and call our Eventbrite query.
    $events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
       'display_private' => false, // boolean
       'nopaging' => true,        // boolean
       'privacy_setting'=>'unlocked',
      // 'limit' => null,            // integer
      // 'organizer_id' => null,     // integer
      // 'p' => null,                // integer
      // 'post__not_in' => null,     // array of integers
      // 'venue_id' => null,         // integer
      // 'category_id' => null,      // integer
      // 'subcategory_id' => null,   // integer
      // 'format_id' => null,        // integer

    ) ) );

   $blockstring = "";

    if ( $events->have_posts() ) :
      while ( $events->have_posts() ) : $events->the_post();
        $blockstring .= eventbrite_get_open_eventblock();
     endwhile;

      // Previous/next post navigation.
      //eventbrite_paging_nav( $events );

    else :
      // If no content, include the "No posts found" template.
      get_template_part( 'content', 'none' );

    endif;

    // Return $post to its rightful owner.
    wp_reset_postdata();

    return $blockstring;
  }
endif;

if ( ! function_exists( 'eventbrite_get_eventblocks' ) ):
  function eventbrite_get_eventblocks(){
    // Set up and call our Eventbrite query.
    $events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
       'display_private' => true, // boolean
       'nopaging' => true,        // boolean
       'privacy_setting' => 'unlocked',
      // 'limit' => null,            // integer
      // 'organizer_id' => null,     // integer
      // 'p' => null,                // integer
      // 'post__not_in' => null,     // array of integers
      // 'venue_id' => null,         // integer
      // 'category_id' => null,      // integer
      // 'subcategory_id' => null,   // integer
      // 'format_id' => null,        // integer

    ) ) );

   $blockstring = "";

    if ( $events->have_posts() ) :
      while ( $events->have_posts() ) : $events->the_post();
        $blockstring .= eventbrite_get_eventblock();
     endwhile;

      // Previous/next post navigation.
      //eventbrite_paging_nav( $events );

    else :
      // If no content, include the "No posts found" template.
      get_template_part( 'content', 'none' );

    endif;

    // Return $post to its rightful owner.
    wp_reset_postdata();

    return $blockstring;
  }
endif;




if( ! function_exists('eventbrite_load_eventblock_style') ): //Give styles to wordpress. add action in eventbrite-api.php
  function eventbrite_load_eventblock_style(){
    wp_register_style( 'eventblock', plugins_url( 'eventbrite-api/inc/block.css' ) );
  	wp_enqueue_style( 'eventblock' );
  }
endif;



if( ! function_exists('eventbrite_format_time') ):
  function eventbrite_format_time(){
    $start = eventbrite_event_start()->local;
    $end = eventbrite_event_end()->local;
    $event_time = sprintf( //Day of week * StartTime - Time * Start Date - End Date
    '%s <br> %s - %s <br> %s - %s',
	esc_html( mysql2date( 'l', $start ) ) . 's', //Day of week
	esc_html( mysql2date( 'g:i A', $start ) ), //Start Time
	esc_html( mysql2date( 'g:i A', $end ) ), //End Time
  esc_html( mysql2date( 'F j', $start ) ), //Start Date
  esc_html( mysql2date( 'F j Y', $end ) )  //End Date
  );
    return $event_time;
  }
endif;

?>
