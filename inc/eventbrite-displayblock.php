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



if( ! function_exists('eventbrite_load_eventblock_style') ):

  function eventbrite_load_eventblock_style(){
    wp_register_style( 'eventblock', plugins_url( 'eventbrite-api/inc/block.css' ) );
  	wp_enqueue_style( 'eventblock' );

  }
endif;

?>
