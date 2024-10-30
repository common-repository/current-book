<?php
/*
Plugin Name: Current Book
Plugin URI: http://www.pixelhavenllc.com/2008/04/20/plugin-current-book/
Description: Displays the book you're currently reading
Version: 1.0.1
Author: Josh Harbaugh
Author URI: http://www.pixelhavenllc.com
*/

// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages() {

  // Add a new submenu under Manage:
  add_management_page('Current Book', 'Current Book', 1, 'current_book', 'mt_manage_page');

}

function mt_manage_page() {

// variables for the field and option names
  $opt_name = 'mt_current_book';
  $opt2_name = 'mt_author_name';
  $opt3_name = 'mt_book_link';
  $opt4_name = 'mt_book_image';
  $hidden_field_name = 'mt_submit_hidden';
  $data_book_name = 'mt_current_book';
  $data_author_name = 'mt_author_name';
  $data_book_link = 'mt_book_link';
  $data_book_image = 'mt_book_image';

  // Read in existing option value from database
  $opt_val = get_option( $opt_name );
  $opt_val2 = get_option( $opt2_name );
  $opt_val3 = get_option( $opt3_name );
  $opt_val4 = get_option( $opt4_name );
  

  if( $_POST[ $hidden_field_name ] == 'Y' ) {
    // Read their posted value
    $opt_val = $_POST[ $data_book_name ];
    $opt_val2 = $_POST[ $data_author_name ];
    $opt_val3 = $_POST[ $data_book_link ];
    $opt_val4 = $_POST[ $data_book_image ];

    // Save the posted values in the database
    update_option( $opt_name, $opt_val );
    update_option( $opt2_name, $opt_val2 );
    update_option( $opt3_name, $opt_val3 );
    update_option( $opt4_name, $opt_val4 );

    // Put an options updated message on the screen

    ?>
    <div class="updated"><p><strong><?php _e('Options saved.', 'mt_trans_domain' ); ?></strong></p></div>
    <?php }

      // Now display the options editing screen
      echo '<div class="wrap">';

      // header
      echo "<h2>" . __( 'The Book You\'re Reading', 'mt_trans_domain' ) . "</h2>"
    ?>
      <div style="float:left;width:475px;background:#f4f4f4;padding:0;margin:0;">
          <h3 style="background:#fff;font-size:14px;font-weight:normal;margin:12px 0 0 0;padding:0 0 6px 3px;">Preview Information</h3>
          <p style="padding:5px 10px;color:#999;font-size:18px;font-family:Georgia,Times,serif;margin:0;">
               <img src="<?php echo stripslashes($opt_val4); ?>" border="0" style="float:left;padding:6px" />
               <?php echo stripslashes($opt_val); ?><br />
               <em style="color:#666;font-size:11px;font-style:normal;">
                    <?php echo stripslashes($opt_val2); ?>
               </em>
          </p>
     </div><div style="clear:both;"></div>

      <!-- options form -->
      <form name="form1" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" style="float:left;">
      <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

      <p><?php _e("Book Title:", 'mt_trans_domain' ); ?>
      <input style="margin-left:25px;" type="text" name="<?php echo $data_book_name; ?>" value="<?php echo stripslashes($opt_val); ?>" size="45">
      </p>
      <p><?php _e("Book Link:", 'mt_trans_domain' ); ?>
      <input style="margin-left:26px;" type="text" name="<?php echo $data_book_link; ?>" value="<?php echo stripslashes($opt_val3); ?>" size="45"><br />
      <span style="margin-left:95px;color:#999;font-size:10px;">(ex. www.amazon.com/WordPress-Complete-customize-market-your/dp/1904811892/ref=pd_bbs_sr_2?ie=UTF8&s=books&qid=1208667766&sr=1-2)</span>
      </p>
      <p><?php _e("Image Path:", 'mt_trans_domain' ); ?>
      <input style="margin-left:13px;" type="text" name="<?php echo $data_book_image; ?>" value="<?php echo stripslashes($opt_val4); ?>" size="45"><br />
      <span style="margin-left:95px;color:#999;font-size:10px;">(ex. http://www.example.com/images/cover.jpg)</span>
      </p>
      <p><?php _e("Author:", 'mt_trans_domain' ); ?>
      <input style="margin-left:45px;" type="text" name="<?php echo $data_author_name; ?>" value="<?php echo stripslashes($opt_val2); ?>" size="20">
      </p>

      <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Update Options', 'mt_trans_domain' ) ?>" />
      </p>

      </form>
      </div>

<?php }

function current_book() {
	$head = "<div><p>\n";
	$output = "<img src='";
	$output .= get_option('mt_book_image');
	$output .= "' border='0' style='float:left;padding:6px' />";
	$output .= "<a href='http://";
     $output .= get_option('mt_book_link');
     $output .= "'>";
	$output .= stripslashes(get_option('mt_current_book'));
     $output .= "</a> <em>by ";
     $output .= stripslashes(get_option('mt_author_name'));
     $output .= "</em>";
	$foot = "</p></div>";
	if ( '' != $output )
	echo $head . $output . $foot;
}

add_action('current_book', 'current_book');

?>
