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
                          <a href='" .  eventbrite_event_eb_url() . "'><button>Sign Up</button></a>
                        </div>
                        <p>" . eventbrite_get_description() . "</p>
                        " . get_the_post_thumbnail() . "
                      </div>
                      <div class ='cachemakers-info'>
                        <h2>" . get_the_title() . " . </h2>
                          <p class='dateTime'> " . eventbrite_format_time() . " </p>
                      </div>
                    </div>";
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
    $start = eventbrite_event_start()->local;
    $end = eventbrite_event_end()->local;
    $event_time = sprintf( //Day of week * StartTime - Time * Start Date - End Date
    '%s <br> %s - %s <br> %s - %s',
	esc_html( mysql2date( 'l', $start ) ), //Day of week
	esc_html( mysql2date( 'g:i A', $start ) ), //Start Time
	esc_html( mysql2date( 'g:i A', $end ) ), //End Time
  esc_html( mysql2date( 'F j', $start ) ), //Start Date
  esc_html( mysql2date( 'F j Y', $end ) )  //End Date
  );
    return $event_time;
  }
endif;

?>
