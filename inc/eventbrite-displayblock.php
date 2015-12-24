<?php

if ( ! function_exists( 'eventbrite_get_eventblock' ) ):
  function eventbrite_get_Eventblock(){

    $post_string = "";


    $post_string .= "<div class='container'>";
    $post_string .=		"<div class='image-box'>";
    $post_string .=			"<div class='signup-box'>";
    $post_string .=				"<h4>Leader: Joel Duffin</h4>";
    $post_string .=				"<button>Sign Up</button>";
    $post_string .=			"</div>";
    $post_string .=			"<p>Short description of the details of this group. This group. gonna be a good group... <a href=''>more information</a> </p>";
    $post_string .=			"<img src='wp-includes/images/Makers/sample.jpg' />";
    $post_string .=		"</div>";
    $post_string .=		"<div class ='info'>";
    $post_string .=			"<h2>Super Super Long Title: All of the Title that could be</h2>";
    $post_string .=			"<p class='dateTime'>Tuesday &middot; 5:30 - 6:30 PM <br> August 12 - September 30 <br> Cache Makerspace </p>";
    $post_string .=			"<div class='tags'>  &middot; Mechanical &middot; Design </div>";
    $post_string .=		"</div>";
    $post_string .= "</div>";

       return $post_string;
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
    // Determine if the end time needs the date included (in the case of multi-day events).
/*    $end_time = ( eventbrite_is_multiday_event() )
      ? mysql2date( 'F j Y, g:i A', eventbrite_event_end()->local )
      : mysql2date( 'g:i A', eventbrite_event_end()->local );
*/
    // Assemble the full event time string.
/*    $event_time = sprintf(
      _x( '%1$s - %2$s', 'Event date and time. %1$s = start time, %2$s = end time', 'eventbrite_api' ),
      esc_html( mysql2date( 'F j Y, g:i A', eventbrite_event_start()->local ) ),
      esc_html( $end_time )
    );
*/
    $start = eventbrite_event_start()->local;
    $end = eventbrite_event_end()->local;

    $event_time = sprintf( //Day of week * StartTime - Time * Start Date - End Date
    '%s &middot; %s - %s &middot; %s - %s',
	esc_html( mysql2date( 'l', $start ) ), //Day of week
	esc_html( mysql2date( 'g:i A', $start ) ), //Start Time
	esc_html( mysql2date( 'g:i A', $end ) ), //End Time
  null, null
  );

    return $event_time;
  }
endif;

?>
