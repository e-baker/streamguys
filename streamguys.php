<?php
/**
 * Plugin Name:     Streamguys
 * Plugin URI:      https://ericbaker.me/streamguys-plugin
 * Description:     This plugin makes it easy to place your streamguys player anywhere on your WordPress site.
 * Author:          Eric Baker
 * Author URI:      https://ericbaker.me
 * Text Domain:     streamguys
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Streamguys
 */


// Print out the stuff for the head
add_action( 'wp_enqueue_style', 'PrintHeadStyles' );
add_action( 'wp_enqueue_scripts', 'PrintHeadScripts' );

function PrintHeadStyles(){
    ?>
        <link rel="stylesheet" href="//od-sportsmic.streamguys1.com/podcast-player/include/css/archive-playlist.css" type="text/css" />
        <link rel="stylesheet" href="//od-sportsmic.streamguys1.com/podcast-player/include/css/jquery-ui.css" type="text/css" />
        <link rel="stylesheet" href="//od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/css/360player.css" type="text/css" />
        <link rel="stylesheet" href="//od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/css/360player-visualization.css" type="text/css" />
        <link rel="stylesheet" href="//od-sportsmic.streamguys1.com/podcast-player/include/css/blue.monday/jplayer.blue.monday.css" type="text/css" />
        <?php
}

function PrintHeadScripts(){
    ?>
    <script type="text/javascript" src="//od-sportsmic.streamguys1.com/podcast-player/include/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="//od-sportsmic.streamguys1.com/podcast-player/include/js/jquery-ui.js"></script>
    <script type="text/javascript" src="//od-sportsmic.streamguys1.com/podcast-player/include/js/moment.min.js"></script>
    <script type="text/javascript" src="//od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/js/berniecode-animator.js"></script>
    <script type="text/javascript" src="//od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/js/soundmanager2.js"></script>
    <script type="text/javascript" src="//od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/js/360player.js"></script>
    <script type="text/javascript" src="//od-sportsmic.streamguys1.com/podcast-player/include/js/jquery.jplayer.js"></script>
    <script type="text/javascript" src="//od-sportsmic.streamguys1.com/podcast-player/include/js/addthis_widget.js#pubid=ra-5654ead46eed1786" async="async"></script>
    <script type="text/javascript" src="//od-sportsmic.streamguys1.com/podcast-player/include/js/archive-playlist.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
           var player = new Playlist({
               location:"recast-sportsmic.streamguys1.com",
               podcast:"1",
               apikey:"",
               limit:"all",
               descriptions:"0",
               color:"#608bbb",
               expandLatest:"0",
               sharing:"0",
               scrubbing:"0",
               layout:"bar"
           });
       });
    </script>
    <?php
}


