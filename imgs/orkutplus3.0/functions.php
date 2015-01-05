<?php 

function the_title2($before = '', $after = '', $echo = true, $length = false) {
         $title = get_the_title();

      if ( $length && is_numeric($length) ) {

             $title = substr( $title, 0, $length );

          }

        if ( strlen($title)> 0 ) {

             $title = apply_filters('the_title2', $before . $title . $after, $before, $after);

             if ( $echo )

                echo $title;

             else

                return $title;

          }

      }

//function for tools
function current_url($lang = 0, $ct = "pt"){
	$_SERVER['FULL_URL'] = 'http';
	if($_SERVER['HTTPS']=='on'){$_SERVER['FULL_URL'] .=  's';}
	$_SERVER['FULL_URL'] .=  '://';
	if($_SERVER['SERVER_PORT']!='80'){
		$_SERVER['FULL_URL'] .=  $_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].$_SERVER['SCRIPT_NAME'];
	}else{
		$_SERVER['FULL_URL'] .=  $_SERVER['HTTP_HOST'];
		$_SERVER['FULL_URL'] .= $_SERVER['SCRIPT_NAME'];
	}
	if($_SERVER['QUERY_STRING']>' '){$_SERVER['FULL_URL'] .=  '?'.$_SERVER['QUERY_STRING'];}
	if($lang == 1){
		$_SERVER['FULL_URL'] = "http://translate.google.com/translate?hl=en&sl=en&tl=".$ct."&u=".urlencode($_SERVER['FULL_URL']);
	}
	return $_SERVER['FULL_URL'];
}

?>
<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="sidebar-box">',
    'after_widget' => '</div>',
 'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
?>
<?php
$themename = "GrungeMag Theme";
$shortname = "artsee";
$options = array (

    array(    "name" => "Layout Settings",
            "type" => "titles",),
			
	array(    "name" => "Blog Color Scheme",
            "id" => $shortname."_color",
            "type" => "select",
            "std" => "Red",
            "options" => array("Red", "Blue", "Green")),
	
	array(    "name" => "Post Format",
            "id" => $shortname."_format",
            "type" => "select",
            "std" => "Default",
            "options" => array("Default", "Blog Style")),
			
    array(    "name" => "About Us Text",
            "id" => $shortname."_about",
            "std" => "Consectetuer rutrum urna in, a molestie aliquam gravida, quam vestibulum ac. Consequat ut lacus tempus a ipsum, sociis urna sed, vel tellus maecenas nec, lorem maecenas tortor. At odio platea etiam. Euismod libero pretium accumsan pellentesque ac. Quam semper in vitae dictum eget, ipsum magna orci odio lectus vitae, luctus magnam, porta integer, ac purus. Vestibulum sit ligula vestibulum, vestibulum fames ac mauris venenatis. Ut vel ligula fermentum enim fermentum dignissim. Morbi lacus nulla, condimentum ac, suscipit auctor, aliquam sit amet, odio. Nunc scelerisque facilisis ante. Vestibulum dui lectus, egestas at, tempus vitae, vehicula et, lectus.",
            "type" => "text2"),
			
    array(    "name" => "Hide/Display Share Button",
            "id" => $shortname."_share",
            "type" => "select",
            "std" => "visible",
            "options" => array("visible", "hidden")),
			
	array(    "name" => "Number of Recent Entries displayed in Sidebar",
            "id" => $shortname."_tab_entries",
            "std" => "8",
            "type" => "text"),
			
	array(    "name" => "Number of Recent Comments displayed in Sidebar",
            "id" => $shortname."_tab_comments",
            "std" => "4",
            "type" => "text"),
			
							
					
    array(    "name" => "Homepage Options",
            "type" => "titles"),

	array(    "name" => "Number of Recent-Posts",
            "id" => $shortname."_homepage_posts",
            "std" => "5",
            "type" => "text"),

	array(    "name" => "Number of Featured Articles Displayed",
            "id" => $shortname."_featured",
            "std" => "4",
            "type" => "text"),
			
	array(    "name" => "Number of Random Articles Displayed",
            "id" => $shortname."_random",
            "std" => "6",
            "type" => "text"),
			
	array(    "name" => "Homepage Category 1 Name",
            "id" => $shortname."_cat_one_name",
            "std" => "category one",
            "type" => "text"),

	array(    "name" => "Home Category 1 ID",
            "id" => $shortname."_home_cat_one",
            "std" => "6",
            "type" => "text"),
			
	
	array(    "name" => "Homepage Category 2 Name",
            "id" => $shortname."_cat_two_name",
            "std" => "category two",
            "type" => "text"),
			
	array(    "name" => "Home Category 2 ID",
            "id" => $shortname."_home_cat_two",
            "std" => "3",
            "type" => "text"),
			
	array(    "name" => "Homepage Category 3 Name",
            "id" => $shortname."_cat_three_name",
            "std" => "category three",
            "type" => "text"),
			
	array(    "name" => "Home Category 3 ID",
            "id" => $shortname."_home_cat_three",
            "std" => "4",
            "type" => "text"),
			
	array(    "name" => "Homepage Category 4 Name",
            "id" => $shortname."_cat_four_name",
            "std" => "category four",
            "type" => "text"),
			
	array(    "name" => "Home Category 4 ID",
            "id" => $shortname."_home_cat_four",
            "std" => "5",
            "type" => "text"),
			

			
    array(    "name" => "Post-Page Options",
            "type" => "titles"),
			
	array(    "name" => "Hid/Display Thumbnails on Post Pages",
            "id" => $shortname."_thumbnails",
            "type" => "select",
            "std" => "Display",
            "options" => array("Display", "Hide")),
			

			
    array(    "name" => "Navigation Options",
            "type" => "titles"),

    array(    "name" => "Exclude Pages From Navigation",
            "id" => $shortname."_exclude_page",
            "std" => "",
            "type" => "text"),
			
    array(    "name" => "Exclude Categories From Navigation",
            "id" => $shortname."_exclude_cat",
            "std" => "",
            "type" => "text"),
			
			
    array(    "name" => "Advertisement Options",
            "type" => "titles"),
			
	array(    "name" => "Enable/Disable 125x125 Sidebar Ads",
            "id" => $shortname."_ads",
            "type" => "select",
            "std" => "Disable",
            "options" => array("Disable", "Enable")),
			
	array(    "name" => "468x60 Banner Image",
            "id" => $shortname."_banner_image_one_2",
            "std" => "http://www.elegantwordpressthemes.com/images/GrungeMag/468x60.gif",
            "type" => "text"),
			
	array(    "name" => "468x60 Banner URL",
            "id" => $shortname."_banner_url_one_2",
            "std" => "#",
            "type" => "text"),
			
	array(    "name" => "125x125 Banner #1 Image",
            "id" => $shortname."_banner_image_one",
            "std" => "http://www.elegantwordpressthemes.com/preview/InterPhase/wp-content/themes/InterPhase/images/125x125.gif",
            "type" => "text"),
			
	array(    "name" => "125x125 Banner #1 URL",
            "id" => $shortname."_banner_url_one",
            "std" => "#",
            "type" => "text"),
			
	array(    "name" => "125x125 Banner #2 Image",
            "id" => $shortname."_banner_image_two",
            "std" => "http://www.elegantwordpressthemes.com/preview/InterPhase/wp-content/themes/InterPhase/images/125x125.gif",
            "type" => "text"),
			
	array(    "name" => "125x125 Banner #2 URL",
            "id" => $shortname."_banner_url_two",
            "std" => "#",
            "type" => "text"),
			
	array(    "name" => "125x125 Banner #3 Image",
            "id" => $shortname."_banner_image_three",
            "std" => "http://www.elegantwordpressthemes.com/preview/InterPhase/wp-content/themes/InterPhase/images/125x125.gif",
            "type" => "text"),
			
	array(    "name" => "125x125 Banner #3 URL",
            "id" => $shortname."_banner_url_three",
            "std" => "#",
            "type" => "text"),
		
	array(    "name" => "125x125 Banner #4 Image",
            "id" => $shortname."_banner_image_four",
            "std" => "http://www.elegantwordpressthemes.com/preview/InterPhase/wp-content/themes/InterPhase/images/125x125.gif",
            "type" => "text"),
			
	array(    "name" => "125x125 Banner #4 URL",
            "id" => $shortname."_banner_url_four",
            "std" => "#",
            "type" => "text"),
			
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "Current Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<form method="post">



<?php foreach ($options as $value) { 
    
if ($value['type'] == "text") { ?>

<div style="float: left; width: 880px; background-color:#E4F2FD; border-left: 1px solid #C2D6E6; border-right: 1px solid #C2D6E6;  border-bottom: 1px solid #C2D6E6; padding: 10px;">     
<div style="width: 200px; float: left;"><?php echo $value['name']; ?></div>
<div style="width: 680px; float: left;"><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width: 400px;" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></div>
</div>
 
<?php } elseif ($value['type'] == "text2") { ?>
        
<div style="float: left; width: 880px; background-color:#E4F2FD; border-left: 1px solid #C2D6E6; border-right: 1px solid #C2D6E6;  border-bottom: 1px solid #C2D6E6; padding: 10px;">     
<div style="width: 200px; float: left;"><?php echo $value['name']; ?></div>
<div style="width: 680px; float: left;"><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width: 400px; height: 200px;" type="<?php echo $value['type']; ?>"><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></div>
</div>


<?php } elseif ($value['type'] == "select") { ?>

<div style="float: left; width: 880px; background-color:#E4F2FD; border-left: 1px solid #C2D6E6; border-right: 1px solid #C2D6E6;  border-bottom: 1px solid #C2D6E6; padding: 10px;">   
<div style="width: 200px; float: left;"><?php echo $value['name']; ?></div>
<div style="width: 680px; float: left;"><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width: 400px;">
<?php foreach ($value['options'] as $option) { ?>
<option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select></div>
</div>

<?php } elseif ($value['type'] == "titles") { ?>

<div style="float: left; width: 870px; padding: 15px; background-color:#2583AD; border: 1px solid #2583AD; color: #FFF; font-size: 16px; font-weight: bold; margin-top: 25px;">   
<?php echo $value['name']; ?>
</div>

<?php 
} 
}
?>

<div style="clear: both;"></div>

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

function mytheme_wp_head() { ?>

<?php }

add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin'); ?>