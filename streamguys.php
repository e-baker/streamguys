<?php
/**
 * Plugin Name:     Streamguys
 * Plugin URI:      https://ericbaker.me/streamguys-plugin
 * Description:     This plugin makes it easy to place your streamguys player anywhere on your WordPress site.
 * Author:          Eric Baker
 * Author URI:      https://ericbaker.me
 * Text Domain:     streamguys
 * Domain Path:     /languages
 * Version:         0.1
 *
 * @package         Streamguys
 */

/**
 * Download the external CSS & JS Files on activation
 *
 * @since 0.1
 */
function streamguys_install(){

  /**
   * Sets up the variables for install
   * 
   * @since 0.1
   */
  $files = array(
    'css' => array(
      'archive-playlist.css'        => 'http://od-sportsmic.streamguys1.com/podcast-player/include/css/archive-playlist.css',
      'jquery-ui.css'               => 'http://od-sportsmic.streamguys1.com/podcast-player/include/css/jquery-ui.css',
      '360player.css'               => 'http://od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/css/360player.css',
      '360player-visualization.css' => 'http://od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/css/360player-visualization.css',
      'jplayer.blue.monday.css'     => 'http://od-sportsmic.streamguys1.com/podcast-player/include/css/blue.monday/jplayer.blue.monday.css'
    ),
    'js'  => array(
      'jquery-1.10.2.js'            => 'http://od-sportsmic.streamguys1.com/podcast-player/include/js/jquery-1.10.2.js',
      'jquery-ui.js'                => 'http://od-sportsmic.streamguys1.com/podcast-player/include/js/jquery-ui.js',
      'moment.min.js'               => 'http://od-sportsmic.streamguys1.com/podcast-player/include/js/moment.min.js',
      'berniecode-animator.js'      => 'http://od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/js/berniecode-animator.js',
      'soundmanager2.js'            => 'http://od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/js/soundmanager2.js',
      '360player.js'                => 'http://od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/js/360player.js',
      'jquery.jplayer.js'           => 'http://od-sportsmic.streamguys1.com/podcast-player/include/js/jquery.jplayer.js',
      'addthis_widget.js'           => 'http://od-sportsmic.streamguys1.com/podcast-player/include/js/addthis_widget.js#pubid=ra-5654ead46eed1786',
      'archive-playlist.js'         => 'http://od-sportsmic.streamguys1.com/podcast-player/include/js/archive-playlist.js'
    )
  );
  $assets_dir = $upload_dir['basedir'] . '/support-custom-assets';

  /**
   * 
   */
  foreach( $files as $filetype => $list ){
    /**
     * Checks to see if each file exists yet. We don't need to duplicate the work.
     *
     */

    if( wp_mkdir_p($assets_dir) ) {
    }
  }

}
register_activation_hook( __FILE__, 'streamguys_install' );

/**
 * Print the CSS Styles by registering & enqueuing them
 *
 * @since 0.1
 */
function streamguys_print_styles(){
  
  if ( get_option( 'streamguys-local-assets' ) ) {
    $asset_path = plugin_dir_path(__FILE__) . '/assets/css/';

    wp_register_style( 'streamguys-archive-playlist', $asset_path . 'archive-playlist.css', array(), '0.1', 'all' );
    wp_register_style( 'jquery-ui', $asset_path . 'jquery-ui.css' );
    wp_register_style( '360player', $asset_path . '360player.css' );
    wp_register_style( '360player-visualization', $asset_path . '360player-visualization.css' );
    wp_register_style( 'jplayer-blue-monday', $asset_path . 'jplayer.blue.monday.css' );

  } else {

    get_option( 'streamguys-secure-assets') ? $protocol = 'https://' : $protocol = 'http://';

    wp_register_style( 'streamguys-archive-playlist', $protocol . 'od-sportsmic.streamguys1.com/podcast-player/include/css/archive-playlist.css', array(), '0.1', 'all' );
    wp_register_style( 'jquery-ui', $protocol . 'od-sportsmic.streamguys1.com/podcast-player/include/css/jquery-ui.css' );
    wp_register_style( '360player', $protocol . 'od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/css/360player.css' );
    wp_register_style( '360player-visualization', $protocol . 'od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/css/360player-visualization.css' );
    wp_register_style( 'jplayer-blue-monday', $protocol . 'od-sportsmic.streamguys1.com/podcast-player/include/css/blue.monday/jplayer.blue.monday.css' );

  }

  wp_enqueue_style( 'streamguys-archive-playlist' );
  wp_enqueue_style( 'jquery-ui' );
  wp_enqueue_style( '360player' );
  wp_enqueue_style( '360player-visualization' );
  wp_enqueue_style( 'jplayer-blue-monday' );

  wp_add_inline_style( 'streamguys-archive-playlist', '#podcast-player .container { position: relative; }' );
}
add_action( 'wp_enqueue_scripts', 'streamguys_print_styles' );

/**
 * Include the JavaScript files by enqueueing them
 *
 * @since 0.1
 */
function streamguys_print_scripts(){
  wp_enqueue_script( 'jquery-1.10.2', '//od-sportsmic.streamguys1.com/podcast-player/include/js/jquery-1.10.2.js' );
  wp_enqueue_script( 'jquery-ui', '//od-sportsmic.streamguys1.com/podcast-player/include/js/jquery-ui.js' );
  wp_enqueue_script( 'moment-js', '//od-sportsmic.streamguys1.com/podcast-player/include/js/moment.min.js' );
  wp_enqueue_script( 'berniecode-animator', '//od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/js/berniecode-animator.js' );
  wp_enqueue_script( 'soundmanager2', '//od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/js/soundmanager2.js' );
  wp_enqueue_script( '360player', '//od-sportsmic.streamguys1.com/podcast-player/include/soundmanager/js/360player.js' );
  wp_enqueue_script( 'jplayer', '//od-sportsmic.streamguys1.com/podcast-player/include/js/jquery.jplayer.js' );
  wp_enqueue_script( 'addthis', '//od-sportsmic.streamguys1.com/podcast-player/include/js/addthis_widget.js#pubid=ra-5654ead46eed1786' );
  wp_enqueue_script( 'streamguys-archive-playlist', '//od-sportsmic.streamguys1.com/podcast-player/include/js/archive-playlist.js' );
}
add_action( 'wp_enqueue_scripts', 'streamguys_print_scripts' );

/**
 * Creates the [streamguys_player] shortcode for the player
 *
 * @since 0.1
 */
function streamguys_player_shortcode() {
    ?>
    <script type="text/javascript">
       jQuery(document).ready(function(j) {
           var player = new Playlist({
               location:"recast-sportsmic.streamguys1.com",
               podcast:"1",
               apikey:"<?php echo esc_attr( get_option('streamguys-apikey') ); ?>",
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
      <div id="player-div">
        <div id="podcast-player">
            <div id="playlist-container">
                <div id="archive-playlist"></div>
            </div>
        </div>
      </div>
    <?php 
}
add_shortcode( 'streamguys_player', 'streamguys_player_shortcode' );

/**
 * Setup page for settings
 *
 * @since 0.1
 */
function streamguys_player_create_menu(){

    /**
     * Creates the top-level admin menu link
     */
    add_menu_page('Streamguys Player', 'StreamGuys', 'administrator', __FILE__, 'streamguys_player_settings_page' );

    /**
     * Calls the register settings function
     */
    add_action( 'admin_init', 'streamguys_player_register_settings' );
}
add_action( 'admin_menu', 'streamguys_player_create_menu' );

/**
 * Registers the settings for the player
 */
function streamguys_player_register_settings() {
    /**
     * Gets the API Key for the Streamguys service
     *
     * @since 0.1
     */
    register_setting( 'streamguys-player-settings-group', 'streamguys-apikey' );

    /**
     * Adds support for pulling in secure assets
     *
     * @since 0.1
     */
    register_setting( 'streamguys-player-settings-group', 'streamguys-secure-assets');

    /**
     * Adds support for using assets locally
     *
     * @since 0.1
     */
    register_setting( 'streamguys-player-settings-group', 'streamguys-local-assets');
}

/**
 * Creates the player's settings page
 *
 * @since 0.1
 */
function streamguys_player_settings_page() {

  if( !current_user_can('manage_options') ){
    wp_die( 'You do not have sufficient rights to modify this page.' );
  }

  ?>
  <div class="wrap">
  <h1>StreamGuys Player Settings</h1>

  <form method="post" action="options.php">
    <?php settings_fields( 'streamguys-player-settings-group' ); ?>
    <?php do_settings_sections( 'streamguys-player-settings-group' ); ?>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">API Key</th>
        <td>
            <input type="text" name="streamguys-apikey" value="<?php echo esc_attr( get_option('streamguys-apikey') ); ?>" />
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">Use secure CSS/JS files</th>
        <td>
          <input type="checkbox" name="streamguys-secure-assets" value="1"  <?php checked( 1, get_option('streamguys-secure-assets' ) ); ?>/>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">Use local CSS/JS files</th>
        <td>
          <input type="checkbox" name="streamguys-local-assets" value="1" <?php checked( 1, get_option( 'streamguys-local-assets' ) ); ?> />
        </td>
      </tr>
    </table>
    <?php submit_button(); ?>
  </form>
  </div>
  <?php 
} 

/**
 * Adds the 'Settings' link to the plugins listing page.
 *
 * @since 0.1
 *
 * @param array $links Admin links under plugin name on Plugins page
 * @return 
 */
function streamguys_add_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=streamguys/streamguys.php">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'streamguys_add_settings_link' );

?>
