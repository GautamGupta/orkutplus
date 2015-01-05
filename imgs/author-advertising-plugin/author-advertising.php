<?php
/*
Plugin Name: Author Advertising Plugin
Plugin URI: http://www.orkutplus.net/
Description: Allows authors to specify an advertising ID and share in your blog's ad revenue.
Version: 2.8
Author: Gautam
Author URI: http://www.orkutplus.net/
*/

/*  Copyright 2009  Gautam Gupta  (email : <REDACTED>@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function kd_authoredit(){
   global $wpdb, $user_ID, $current_user;
   $google_values = get_option('kd_author_advertising');
   $table_name = $wpdb->prefix . "author_advertising";
   $action = $_POST['action'];
   if($action == "add" && $_FILES['img'] != NULL && $_POST['custom1'] != NULL) {
      $image = $_FILES['img']["name"];
      $ext = $_FILES['img']["type"];
      $rnd = mt_rand();
      $name = $rnd.$image;
      $tmp = $_FILES['img']["tmp_name"];
      $size = $_FILES['img']["size"];
      //include_once("bitly.php"); //for bitly api class
      //$bitly = new Bitly('orkutplus', 'R_8ceb01e6874e1a37776bbed10a2c8f29');
      //$user_custom1 = $bitly->shorten($_POST['custom1']);
      if (($ext == "image/gif" || $ext == "image/pjpeg" || $ext == "image/jpeg" || $ext == "image/jpg" || $ext == "image/bmp" || $ext == "image/png") && ($_FILES["img"]["error"] <= 0)/* && ($user_custom1)*/) {
         $upload_dir = ABSPATH . get_option('upload_path') . "/banners/";
         $upload_file = trailingslashit($upload_dir) . basename($name);
         if( move_uploaded_file($tmp, $upload_file) ){
            $img_url = trailingslashit( get_option('siteurl') ) . 'wp-content/uploads/banners/' . $name;
            if($img_url){
               $user_advertising = $wpdb->escape($img_url);
               $user_custom1 = $wpdb->escape($_POST['custom1']);
               $user_custom2 = $wpdb->escape($_POST['custom2']);
               $wpdb->query("INSERT INTO $table_name (author_id, author_advertising, author_custom1, author_custom2) VALUES ('$user_ID', '$user_advertising', '$user_custom1', '$user_custom2')");
               $banner_id = $wpdb->get_var("SELECT id FROM $table_name WHERE author_id='$user_ID' and author_advertising='$user_advertising' ORDER BY id DESC LIMIT 1");
               mail_user_status(0, $user_ID, $banner_id, 0);
            }else{
               $error_msg = "Uploading Failed.";
            }
         } else {
            $error_msg = "Uploading Failed.";
         }
      } else {
         if(!$user_custom1){
            $error_msg = "Please submit a valid URL.";
         }else{
            $error_msg = "Invalid File Type.";
         }
      }
   }
   if($action == "edit" && $current_user->user_level >= 2){
      $user_advertising = $wpdb->escape($_POST['user_google']);
      $user_custom1 = $wpdb->escape($_POST['custom1']);
      if(!$wpdb->get_var("SELECT id FROM $table_name WHERE author_id='$user_ID' and author_advertising='$user_advertising' ORDER BY id DESC LIMIT 1")){
         $wpdb->query("INSERT INTO $table_name (author_id, author_advertising, author_custom1, author_custom2, approve, type) VALUES ('$user_ID', '$user_advertising', '$user_custom1', '', '1', '1')");
      }else{
         $wpdb->query("UPDATE $table_name SET author_advertising='$user_advertising',author_custom1='$user_custom1',approve='1',type='1' WHERE author_id='$user_ID'");
      }
   }
   if($action == "delete" && $current_user->user_level >= 1){
      $banner_id = $_POST['id'];
      $wpdb->query("DELETE FROM $table_name WHERE author_id='$user_ID' and id='$banner_id'");
   }
   ?>
   <div class="wrap">
      <h2><?php echo $google_values[5]; ?> - Add New</h2>
      <?php if($banner_id != NULL && $action == "add"){ ?>
            <div class="updated fade" id="message" style="background-color: rgb(255, 251, 204);"><p>Banner #<?php echo $banner_id; ?> successfully added! It is now Pending Approval.</p></div>
      <?php }elseif($banner_id != NULL && $action == "delete"){ ?>
            <div class="updated fade" id="message" style="background-color: rgb(255, 251, 204);"><p>Banner #<?php echo $banner_id; ?> successfully deleted.</p></div>
      <?php }elseif($error_msg){ ?>
            <div class="updated fade" id="message" style="background-color: rgb(255, 251, 204);"><p><?php echo $error_msg; ?></p></div>
      <?php } ?>
      <?php echo $google_values[6]; ?>

<?php if($current_user->user_level >= 2){
   $user_details = $wpdb->get_row("SELECT * FROM $table_name WHERE author_id = '$user_ID' and type='1'");
   $google_id = $user_details->author_advertising;
   $user_custom1 = $user_details->author_custom1;
?>
<br />
<strong>You have stepped up 1 level. You can now enter your Adsense ID here, as well as banners. Your adsense ad will be displayed, as well as one of the banners you add below. (<a href="http://www.orkutplus.net/join">?</a>)</strong>
   <form method="post">
   <table class="form-table">
   <tr valign="top"><th scope="row">Publisher ID</th>
   <td><input type="text" name="user_google" value="<?php echo $google_id; ?>"></td>
   </tr>
   <tr valign="top"><th scope="row">Ad Slot ID</th><td><input type="text" name="custom1" value="<?php echo $user_custom1; ?>"></td></tr>
   </table>
   <input type="hidden" name="action" value="edit">
   <p class="submit"><input type="submit" name="submit" value="Edit" /></p>
   </form>
   <hr />
<?php } ?>

   <form method="post" enctype="multipart/form-data">
   <table class="form-table">
   <tr valign="top"><th scope="row">Banner Image (The Image that is shown - 468x60px)</th>
   <td><input type="file" name="img"></td>
   </tr>
   <?php if($google_values[7] == 1){ echo '<tr valign="top"><th scope="row">' . $google_values[8] . '</th><td><input type="text" name="custom1"></td></tr>'; } ?>
   <?php if($google_values[10] == 1){ echo '<tr valign="top"><th scope="row">' . $google_values[11] . '</th><td><input type="text" name="custom2"></td></tr>'; } ?>
   </table>

   <input type="hidden" name="action" value="add">
   <p class="submit"><input type="submit" name="add_banner" value="Add New Banner" /></p>
   </form>
      <h2>Current Banner(s)</h2>
<table class="widefat">
<thead>
<tr class="thead">
   <th>Banner ID</th>
   <th>Banner Image</th>
   <th><?php echo $google_values[8]; ?></th>
   <th><?php echo $google_values[11]; ?></th>
   <th>Status</th>
   <th>Impressions</th>
   <th>Clicks</th>
   <th>Action</th>
</tr>
</thead>
<tbody id="users" class="list:user user-list">
<?php
$userresults = $wpdb->get_results("SELECT id, author_id, author_advertising, author_custom1, author_custom2, approve, impressions, clicks FROM $table_name WHERE author_id = '$user_ID' and type='0'");
foreach ($userresults as $userresult) {
   if($userresult->approve == 1){
      $approved = "Approved";
   }elseif($userresult->approve == 0){
      $approved = "Pending Approval";
   }elseif($userresult->approve == 2){
      $approved = "Rejected. Please upload another banner ad.";
   }else{
      $approved = "Please upload a banner ad.";
   }
?>
<tr id="<?php echo $userresult->id; ?>">
<td><?php echo $userresult->id; ?></td>
<td><a href="<?php echo $userresult->author_advertising; ?>" rel="nofollow"><?php echo $userresult->author_advertising; ?></a></td>
<td><a href="<?php echo $userresult->author_custom1; ?>" rel="nofollow"><?php echo $userresult->author_custom1; ?></a></td>
<td><?php echo $userresult->author_custom2; ?></td>
<td><?php echo $approved; ?></td>
<td><?php echo $userresult->impressions; ?></td>
<td><?php echo $userresult->clicks; ?></td>
<td><form method="post"><input type="hidden" name="action" value="delete"><input type="submit" class="button-secondary" name="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this banner?');"><input type="hidden" name="id" value="<?php echo $userresult->id; ?>"></form>
</tr>
<?php } ?>
</tbody>
</table>
   </div>
<?php
}

function kd_admin_menu() {
   $google_values = get_option('kd_author_advertising');
   $lowest_user = $google_values[3];
   add_submenu_page('options-general.php', 'Author Advertising Config', 'Author Advertising Config', 'manage_options', 'author-advertising-admin', 'kd_admin_options');
   add_submenu_page('users.php', 'Author Advertising', 'Author Advertising', 'manage_options', 'author-advertising-users', 'kd_admin_users');
   add_submenu_page('index.php', $google_values[5], $google_values[5], $lowest_user, 'author-advertising', 'kd_authoredit');
}

function kd_admin_users(){
   global $wpdb;
   $table_name = $wpdb->prefix . "author_advertising";
   $google_values = get_option('kd_author_advertising');
   echo "<div class=wrap>";
   $action = $_POST['action'];
   if($action == "delete"){
      $banner_id = $_POST['id'];
      $user_id = $_POST['user_id'];
      $wpdb->query("DELETE FROM $table_name WHERE author_id='$user_id' and id='$banner_id'");
   }
   if($action == "edit"){
      $user_id = $_POST['user_id'];
      $banner_id = $_POST['id'];
   ?>
   <table class="form-table">
   <form method="post">
   <input type="hidden" name="action" value="edited">
   <input type="hidden" name="id" value="<?php echo $banner_id; ?>">
   <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
   <tr valign="top"><th scope="row">Authors Publisher ID</th>
   <td><input type="text" name="edit_pubid" value="<? echo $wpdb->get_var("SELECT author_advertising FROM $table_name WHERE author_ID='$user_id' and id='$banner_id'"); ?>"></td>
   </tr>
   <tr valign="top"><th scope="row">Authors Custom 1</th>
   <td><input type="text" name="edit_custom1" value="<? echo $wpdb->get_var("SELECT author_custom1 FROM $table_name WHERE author_ID='$user_id' and id='$banner_id'");  ?>"></td>
   </tr>
   <tr valign="top"><th scope="row">Authors Custom 2</th>
   <td><input type="text" name="edit_custom2" value="<? echo $wpdb->get_var("SELECT author_custom2 FROM $table_name WHERE author_ID='$user_id' and id='$banner_id'");  ?>"></td>
   <tr valign="top"><th scope="row">Banner Approval</th>
   <?php $approve = $wpdb->get_var("SELECT approve FROM $table_name WHERE author_ID='$user_id' and id='$banner_id'");  ?>
   <td><input type="radio"<?php if($approve==0){echo ' checked="true"';} ?> name="approve" value="0">Pending Approval
       <input type="radio"<?php if($approve==1){echo ' checked="true"';} ?> name="approve" value="1">Approved
       <input type="radio"<?php if($approve==2){echo ' checked="true"';} ?> name="approve" value="2">Disapproved</td>
   </tr>
   <tr valign="top"><th scope="row">Notify via E-Mail</th>
   <td><input type="checkbox" name="notify"></td>
   </table>
   <p class="submit"><input type="submit" name="submit" value="Edit Banner"></p></form>
   <div class="tablenav">


<br class="clear" />

</div>
<?php
   }
   if($action == "edited"){
      $banner_id = $_POST['id'];
      $user_id = $_POST['user_id'];
      $edited_id = stripslashes($_POST['edit_pubid']);
      $edited_1 = stripslashes($_POST['edit_custom1']);
      $edited_2 = stripslashes($_POST['edit_custom2']);
      $approve = $_POST['approve'];
      if($_POST['notify'] == "on"){
         mail_user_status($approve, $user_id, $banner_id);
      }
      $wpdb->query("UPDATE $table_name SET author_advertising='$edited_id',author_custom1='$edited_1',author_custom2='$edited_2',approve='$approve' WHERE author_id='$user_id' and id='$banner_id'");
   }
   $userresults = $wpdb->get_results("SELECT id, author_id, author_advertising, author_custom1, author_custom2, approve, impressions, clicks, type FROM $table_name ORDER BY author_id ASC");
?>
<table class="widefat">
<thead>
<tr class="thead">
   <th>Banner ID</th>
   <th>User ID</th>
   <th>Username</th>
   <th>Advertising ID</th>
   <th>Custom 1 (<?php echo $google_values[8]; ?>)</th>
   <th>Custom 2 (<?php echo $google_values[11]; ?>)</th>
   <th>Approval</th>
   <th>Impressions</th>
   <th>Clicks</th>
   <th>Type</th>
   <th>Actions</th>
</tr>
</thead>
<tbody id="users" class="list:user user-list">
<?php foreach ($userresults as $userresult) { ?>
<tr id="<?php echo $userresult->id; ?>">
<td><?php echo $userresult->id; ?></td>
<td><?php echo $userresult->author_id; ?></td>
<td><?php $user_info = get_userdata($userresult->author_id); echo $user_info->user_login; ?></td>
<td><?php echo $userresult->author_advertising; ?></td>
<td><?php echo $userresult->author_custom1; ?></td>
<td><?php echo $userresult->author_custom2; ?></td>
<td><?php echo $userresult->approve; ?></td>
<td><?php echo $userresult->impressions; ?></td>
<td><?php echo $userresult->clicks; ?></td>
<td><?php echo $userresult->type; ?></td>
<td><form method="post"><input type="hidden" name="action" value="delete"><input type="submit" class="button-secondary" name="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this banner?');"><input type="hidden" name="user_id" value="<?php echo $userresult->author_id; ?>"><input type="hidden" name="id" value="<?php echo $userresult->id; ?>"></form>
<form method="post"><input type="hidden" name="action" value="edit"><input type="hidden" name="user_id" value="<?php echo $userresult->author_id; ?>"><input type="hidden" name="id" value="<?php echo $userresult->id; ?>"><input type="submit" class="button-secondary" name="submit" value="Edit"></form>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php
}

function mail_user_status($approve, $user_id, $banner_id, $admin = 1){
   if($admin == 1){
      global $current_user;
      $sender_name = $current_user->display_name;
      $sender_mail = $current_user->user_email;
   }else{
      $sender_name = "<REDACTED>";
      $sender_mail = "<REDACTED>@gmail.com";
   }
   $contributor = get_userdata($user_id);
   if($approve == 2){
	$subject='[Orkut Plus!] Your Ad Banner No. '.$banner_id.' is Rejected.';
        $message="Hi {$contributor->display_name},\n\nUnfortunately, the advertisement banner you uploaded on OrkutPlus <www.orkutplus.net> does not comply with the 'healthy advertising terms'.\n\nJust to refresh you, we would like to: \n\na) Check - If banner dimensions are 468px x 60px\nb) Check - If banner content is family safe.\n\nIf you think this banner should not have been rejected, you can contact the administrator at admin@orkutplus.net and seek necessary answers and help.\n\n
Thank You for being a part of Orkut Plus!\n\n<REDACTED>\nAdmin, Orkut Plus!";
        wp_mail($contributor->user_email, $subject, $message);
   }elseif($approve == 1){
	$subject='[Orkut Plus!] Your Ad Banner No. '.$banner_id.' is Approved!';
        $message="Hi {$contributor->display_name},\n\nWe have just approved the banner (No. {$banner_id}) that you had uploaded on OrkutPlus <www.orkutplus.net> as a Guest Blogger. Thanks for registering with us. If you have any queries, you can mail us at admin@orkutplus.net.\n\nKeep Blogging!\n\nThank You.\n\n{$sender_name} <{$sender_mail}>";
        wp_mail($contributor->user_email, $subject, $message);
   }elseif($approve == 0){
	$subject='[Orkut Plus!] Your Ad Banner No. '.$banner_id.' is Pending Approval!';
        $message="Hi {$contributor->display_name},\n\nThis is to inform you that the banner (No. {$banner_id}) that you had uploaded on OrkutPlus <www.orkutplus.net> as a Guest Blogger, is pending approval. We will approve or reject it after reviewing it and you will be notified via email for the same. Thanks for registering with us. Till the time your other banner doesn't get approved and you don't have any other approved banner, OrkutPlus's ads will be displayed on your post(s) (if any). If you have any queries, you can mail us at admin@orkutplus.net.\n\nKeep Blogging!\n\nThank You.\n\n{$sender_name} <{$sender_mail}>";
        wp_mail($contributor->user_email, $subject, $message);
   }
}

function kd_admin_options(){
   global $wpdb;
   $table_name = $wpdb->prefix . "author_advertising";

   if(isset($_POST['update_kd_google'])) {
   $google_values[0] = $_POST['user_google'];
   $google_values[1] = $_POST['admin_show'];
   $google_values[2] = 100 - $google_values[1];
   $google_values[3] = $_POST['level_google'];
   $google_values[4] = $_POST['random_home'];
   $google_values[5] = stripslashes($_POST['myadsense_title']);
   $google_values[6] = stripslashes($_POST['myadsense_text']);
   $google_values[7] = $_POST['customfield1'];
   $google_values[8] = stripslashes($_POST['customfield1_title']);
   $google_values[9] = stripslashes($_POST['customfield1_default']);
   $google_values[10] = $_POST['customfield2'];
   $google_values[11] = stripslashes($_POST['customfield2_title']);
   $google_values[12] = stripslashes($_POST['customfield2_default']);
   $google_values[13] = $_POST['adplace1'];
   $google_values[14] = stripslashes($_POST['adtext1']);
   $google_values[15] = $_POST['adplace2'];
   $google_values[16] = stripslashes($_POST['adtext2']);
   $google_values[17] = $_POST['adplace3'];
   $google_values[18] = stripslashes($_POST['adtext3']);
   //$google_values[19] = $_POST['adplace4'];
   //$google_values[20] = stripslashes($_POST['adtext4']);
   //$google_values[21] = stripslashes($_POST['subject_rejected']);
   //$google_values[22] = stripslashes($_POST['content_rejected']);

   update_option("kd_author_advertising", $google_values);
   }
$checkcustom1 = $wpdb->query("show columns from $table_name like 'author_custom1'");
$checkcustom2 = $wpdb->query("show columns from $table_name like 'author_custom2'");

   if($checkcustom1 == 0){
   echo "Your Author Advertising table structure is out of date.... updated now.<br/>";
   $wpdb->query("alter table $table_name add column author_custom1 text NOT NULL");
   }
   if($checkcustom2 == 0){
   echo "Your Author Advertising table structure is out of date.... updated now.<br/>";
   $wpdb->query("alter table $table_name add column author_custom2 text NOT NULL");
   }

   if($wpdb->get_var("show tables like '$table_name'") != $table_name){
         echo "<div class='wrap'><p><b>The database table is not installed, check your db permissions and activate the plugin again or run the following code in phpMyAdmin</b></p>";
   $sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
  `id` mediumint(9) NOT NULL auto_increment,
  `author_id` int(11) NOT NULL default '0',
  `author_advertising` text NOT NULL,
  `author_custom1` text,
  `author_custom2` text,
  `approve` tinyint(1) NOT NULL default '0',
  `impressions` int(20) NOT NULL default '0',
  `clicks` int(20) NOT NULL default '0',
  `type` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
);";
   echo "<p><code>" . $sql . "</code></p></div>";
         }

   $google_values = get_option('kd_author_advertising');
   ?>
   <div class=wrap>
   <form method="post">
      <h2>Update Author Advertising Options</h2>
      <p>At the moment your ads are showing at a ratio of (Admin) <?php echo $google_values[1] . ":" . $google_values[2]; ?> (User).</p>
<table class="form-table">

   <tr valign="top"><th scope="row">Admin Advertising ID</th>
   <td><input type="text" name="user_google" value="<?php echo $google_values[0]; ?>"><br />Enter your own advertising ID. If the author hasn't specified an ID, the admin id will be shown instead.</td>
   </tr>

   <tr valign="top"><th scope="row">Admin Percentage</th>
   <td><input type="text" name="admin_show" value="<?php echo $google_values[1]; ?>" size="2">%<br />Put in the percentage you want the above admin ID to show for example if you want your ads to show half of the time enter 50, if you want them to show three quarters of the time enter 75.</td>
   </tr>

   <tr valign="top"><th scope="row">Lowest User Level</th>
   <td><select name="level_google" size="1">
   <option <?php if($google_values[3]=="manage_options") echo "selected "; ?>value="manage_options">Administrator</option>
   <option <?php if($google_values[3]=="moderate_comments") echo "selected "; ?>value="moderate_comments">Editor</option>
   <option <?php if($google_values[3]=="publish_posts") echo "selected "; ?>value="publish_posts">Author</option>
   <option <?php if($google_values[3]=="edit_posts") echo "selected "; ?>value="edit_posts">Contributer</option>
   </select><br />Enter the lowest user level that are allowed to add their advertising details.</td>
   </tr>

   <tr valign="top"><th scope="row">Random Home</th>
   <td><label for="random_home">
   <input name="random_home" type="checkbox" id="random_home" value="1" <?php if($google_values[4]=="1") echo "checked=\"checked \""; ?>/> Randomised home?</label><br />If checked, then the homepage will randomly rotate author ads (still at the ratio you've specified) on your homepage. If unchecked only admin ads will be shown on the homepage. This plugin only displays one ID on a page at a time.</td>
   </tr>
   </table>

   <h3>The Author Page</h3>
   <p>You can adjust the text that authors see in their (default) 'My Advertising' page and also change the title. This way you can tell the authors which publisher ID to put in there i.e Yahoo, Google or whichever advertising program you use.</p>

   <table class="form-table">
   <tr valign="top"><th scope="row">Title</th>
   <td><input type="text" name="myadsense_title" value="<?php echo $google_values[5]; ?>" size="25"><br/>e.g 'My Adsense', 'My Advertising'</td>
   </tr>
   <tr valign="top"><th scope="row">Page Content</th>
   <td><textarea rows="10" cols="50" name="myadsense_text"><?php echo $google_values[6]; ?></textarea><br />The text you'd like your authors to see on the page.</td>
   </tr>

   <tr valign="top"><th scope="row">Custom Fields</th>
   <td><label for="customfield1"><input name="customfield1" type="checkbox" id="customfield1" value="1" <?php if($google_values[7]=="1") echo "checked=\"checked \""; ?>/> Custom Field 1 enabled?</label><br />If checked, you may use a custom field to gather more information from your authors to use in the adverts.<br />
   <label for="customfield1_text"><input type="text" name="customfield1_title" value="<?php echo $google_values[8]; ?>" size="25"> Field 1 title e.g Yahoo ID, Amazon ID or even Author URL, Author Hometown.</label><br/>
   <label for="customfield1_default"><input type="text" name="customfield1_default" value="<?php echo $google_values[9]; ?>" size="25"> Field 1 default. If a user doesn't enter anything in this custom field what would you like shown instead?</label><br/>
   <label for="customfield2"><input name="customfield2" type="checkbox" id="customfield2" value="1" <?php if($google_values[10]=="1") echo "checked=\"checked \""; ?>/> Custom Field 2 enabled?</label><br />If checked, you may use a custom field to gather more information from your authors to use in the adverts.<br />
   <label for="customfield2_text"><input type="text" name="customfield2_title" value="<?php echo $google_values[11]; ?>" size="25"> Custom Field 2 title.</label><br/>
   <label for="customfield2_default"><input type="text" name="customfield2_default" value="<?php echo $google_values[12]; ?>" size="25"> Field 2 default. If a user doesn't enter anything in this custom field what would you like shown instead?</label><br/>
   </td>
   </table>

   <h3>Advertising Code</h3>
   <p>Below you can specify the advertising code for each of your ads. You can style your ads here too i.e centre them. The textarea fields allow html but not php code. The picture below shows the positioning of each advert. Bear in mind that this automatic positioning may not work with some themes (it's the themes fault not the plugin ;). If your ad's are not showing properly simply disable all the ads below and use the function below in your theme:
<code>
&lt;?php echo kd_get_ad_ready($user->ID); ?&gt;
</code>
Replacing $type with a number from 1-4 according to which of the ads below you'd like displayed.</p>
<a href="http://www.harleyquine.com/wp-downloads/php-scripts/authoradvertising/advertplaces.jpg" target="_blank"><img src="http://www.harleyquine.com/wp-downloads/php-scripts/authoradvertising/advertplaces_small.jpg" style="margin-bottom:20px;"></a>

   <table class="form-table">
   <tr valign="top"><th scope="row">Ad Place 1</th>
   <td><label for="adplace1_active"><input type="checkbox" name="adplace1" value="YES"<?php if($google_values[13]=="YES")echo " checked=\"checked\""; ?>> Active?</label><br />
   <textarea rows="10" cols="50" name="adtext1"><?php echo $google_values[14]; ?></textarea><br />Advert Place 1: Just before the posts start in the main content.<br /><p><b>Available tags:</b> %pubid% (original field), %custom1% (custom field 1) and %custom2% (custom field 2).</p></td>
   </tr>

   <tr valign="top"><th scope="row">Ad Place 2</th>
   <td><label for="adplace2_active"><input type="checkbox" name="adplace2" value="YES"<?php if($google_values[15]=="YES")echo " checked=\"checked\""; ?>> Active?</label><br />
   <textarea rows="10" cols="50" name="adtext2"><?php echo $google_values[16]; ?></textarea><br />Advert Place 2: At the end of the posts in the main content.<br /><p><b>Available tags:</b> %pubid% (original field), %custom1% (custom field 1) and %custom2% (custom field 2).</p></td>
   </tr>

   <tr valign="top"><th scope="row">Ad Place 3</th>
   <td><label for="adplace3_active"><input type="checkbox" name="adplace3" value="YES"<?php if($google_values[17]=="YES")echo " checked=\"checked\""; ?>> Active?</label><br />
   <textarea rows="10" cols="50" name="adtext3"><?php echo $google_values[18]; ?></textarea><br />Advert Place 3: At the very end of the page, in the footer.<br /><p><b>Available tags:</b> %pubid% (original field), %custom1% (custom field 1) and %custom2% (custom field 2).</p></td>
   </tr>
<?php
/*
   <tr valign="top"><th scope="row">Author Advertising Widget</th>
   <td><label for="adplace4_active"><input type="checkbox" name="adplace4" value="YES"<?php if($google_values[19]=="YES")echo " checked=\"checked\""; ?>> Active?</label><br />
   <textarea rows="10" cols="50" name="adtext4"><?php echo $google_values[20]; ?></textarea><br />Widget: The Author Advertising widget.<br /><p><b>Available tags:</b> %pubid% (original field), %custom1% (custom field 1) and %custom2% (custom field 2).</p></td>
   </tr>

   <tr valign="top"><th scope="row">Rejected Banner Mail Subject</th>
   <td><input type="text" name="subject_rejected" value="<?php echo $google_values[21]; ?>" size="25"></td>
   </tr>

   <tr valign="top"><th scope="row">Rejected Banner Mail Content</th>
   <td><textarea rows="10" cols="50" name="content_rejected"><?php echo $google_values[22]; ?></textarea></td>
   </tr>
*/
?>
   </table>

   <input type="hidden" name="update_kd_google" value="1">
   <p class="submit"><input type="submit" name="info_update" value="Save Changes" /></p>
   </form>
<?php
}

function kd_get_google_id($banner_id, $send_default = 1){
   global $wpdb;
   $table_name = $wpdb->prefix . "author_advertising";
   $google_values = get_option('kd_author_advertising');
   $query = "SELECT author_advertising FROM $table_name WHERE id='$banner_id'";
   $google_id = $wpdb->get_var($query);
   $google_values = get_option('kd_author_advertising');
   if(!$google_id && $send_default == 1){ $google_id = $google_values[0]; }
   return $google_id;
}

function kd_get_custom1($banner_id, $send_default = 1){
   global $wpdb;
   $table_name = $wpdb->prefix . "author_advertising";
   $google_values = get_option('kd_author_advertising');
   //$kd_current_id = $user_id; //get_option('kd_current_id');
   $custom1 = $wpdb->get_var("SELECT author_custom1 FROM $table_name WHERE id='$banner_id'");
   if(!$custom1 && $send_default == 1){ $custom1 = $google_values[9]; }else{ $google_id = null; }
   return $custom1;
}

function kd_get_banner_id($user_id, $type = 1){
   global $wpdb;
   $table_name = $wpdb->prefix . "author_advertising";
   if($type == 2){
      $query = "SELECT id FROM $table_name WHERE author_id='$user_id' and type='1' LIMIT 1";
   }else{
      $query = "SELECT id FROM $table_name WHERE author_id='$user_id' and approve='1' and type='0' ORDER BY rand() LIMIT 1";
   }
   $banner_id = $wpdb->get_var($query);
   if(!$banner_id){ $banner_id = null; }
   return $banner_id;
}

function kd_get_custom2($banner_id){
   global $wpdb;
   $table_name = $wpdb->prefix . "author_advertising";
   $google_values = get_option('kd_author_advertising');
   $custom2 = $wpdb->get_var("SELECT author_custom2 FROM $table_name WHERE id='$banner_id'");
   if(!$custom2){ $custom2 = $google_values[12]; }
   return $custom2;
}

function kd_get_ad_ready($content){
   global $wpdb, $post;
   if($post->post_author){
      $authid = $post->post_author;
   }else{
      $authid = 4;
   }
   $table_name = $wpdb->prefix . "author_advertising";
   $user_info = get_userdata($authid);
   $google_values = get_option('kd_author_advertising');
   //for all contributors, atleast 1 ad is loaded, if no ad, then orkutplus's ad is loaded (op ad - only for level 1 users)
   $banner_id = kd_get_banner_id($authid);
   $adimg_url = kd_get_google_id($banner_id);
   if($banner_id != NULL){
      $custom1 = 'http://www.orkutplus.net/r.php?i='.$banner_id;
   }else{
      $custom1 = $google_values[9];
   }
   $custom2 = kd_get_custom2($banner_id);
   $adtext = str_replace("%pubid%", $adimg_url, $google_values[14]);
   $adtext = str_replace("%custom1%", $custom1, $adtext);
   $adtext = str_replace("%custom2%", $custom2, $adtext);
   $adtext .= '<!-- Start Of Script Generated By My Ad Banner -->';
   if($banner_id != NULL){
      wp_enqueue_scripts('jquery');
      $adtext .= '<script type="text/javascript">';
      $adtext .= '/* <![CDATA[ */';
      $adtext .= "jQuery.ajax({type:'GET',url:'".plugins_url('author-advertising-plugin/i.php')."',data:'i=".$banner_id."',cache:false});";
      $adtext .= '/* ]]> */';
      $adtext .= '</script>';
   }
   //for +2 users, adsense ads - 468x60
   if($user_info->user_level >= 2){
      $adsense_id = kd_get_banner_id($authid, 2); //for level 2+ users
      $google_id = kd_get_google_id($adsense_id, 0); //2nd parameter = return null, because they we need not show adsense ads
      $custom1 = kd_get_custom1($adsense_id, 0);
      if(!empty($adsense_id) && !empty($google_id) && !empty($custom1)){
         $adtext2 = str_replace("%pubid%", $google_id, $google_values[16]);
         $adtext2 = str_replace("%custom1%", $custom1, $adtext2);
      }else{
         $adtext2 = '<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
google_ad_slot = "2511471179";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>';
      }
      $adtext = $adtext2.$adtext;
   }
   $adtext .= '<!-- End Of Script Generated By My Ad Banner -->'."\n";
   return $content.$adtext;
}

add_action('admin_menu', 'kd_admin_menu');
add_filter('the_content', 'kd_get_ad_ready', -999);
//not of much use
/*
function kd_authoradvertisingparse($content) {
   $google_values = get_option('kd_author_advertising');
   if(strpos($content, "%authorad1%")){ $adtext = kd_get_ad_ready($google_values[14]); $content = str_replace("%authorad1%", $adtext, $content); }
   if(strpos($content, "%authorad2%")){ $adtext = kd_get_ad_ready($google_values[16]); $content = str_replace("%authorad2%", $adtext, $content); }
   if(strpos($content, "%authorad3%")){ $adtext = kd_get_ad_ready($google_values[18]); $content = str_replace("%authorad3%", $adtext, $content); }
   if(strpos($content, "%authorad4%")){ $adtext = kd_get_ad_ready($google_values[20]); $content = str_replace("%authorad4%", $adtext, $content); }

   return $content;
}*/

//$google_values = get_option('kd_author_advertising');
/*
function kd_get_banner_type($banner_id){
   global $wpdb;
   $table_name = $wpdb->prefix . "author_advertising";
   $banner_type = $wpdb->get_var("SELECT type FROM $table_name WHERE id='$banner_id'");
   if(!$banner_type){ $banner_type = 0; }
   return $banner_type;
}*/
/*
function kd_shutdown(){
   update_option("kd_current_id", '0');
}

add_action('activate_author-advertising.php','kd_install');
add_action('shutdown','kd_shutdown');
*/
//add_filter('the_content', 'kd_authoradvertisingparse');
//add_action('plugins_loaded','kd_aa_widget_setup');
//add_action('wp','kd_init_author_id');

//if($google_values[13] == "YES"){ add_action('loop_start','kd_header_ad'); }
//if($google_values[15] == "YES"){ add_action('loop_end','kd_footer_ad'); }
//if($google_values[17] == "YES"){ add_action('wp_footer','kd_footer_ad2'); }

/*******************************************************************************
 *
 *
 * NOT NEEDED
 *
 *
 ******************************************************************************/
/*
function kd_get_random(){
   global $wpdb;
   $table_name = $wpdb->prefix . "author_advertising";
      $google_id = $wpdb->get_var("SELECT author_advertising FROM $table_name WHERE approve='1' ORDER BY rand() LIMIT 1");
      $google_values = get_option('kd_author_advertising');
      $admin_id = $google_values[0];
      if(!$google_id){ $google_id = $admin_id; }
   srand(time());
   $random = (rand()%101);
   if($random <= $google_values[1]){ return $admin_id; }
   else { return $google_id; }
}

function kd_install(){
   global $wpdb, $user_level;

   $table_name = $wpdb->prefix . "author_advertising";

   if($wpdb->get_var("show tables like '$table_name'") != $table_name){

   $sql = "CREATE TABLE ".$table_name." (
   id mediumint(9) NOT NULL auto_increment,
   author_id int(11) NOT NULL default '0',
   author_advertising text NOT NULL,
   author_custom1 text,
   author_custom2 text,
   PRIMARY KEY  (`id`)
   );";

   require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
   dbDelta($sql);

   $google_values[0] = "ADMIN ID";
   $google_values[1] = "50";
   $google_values[2] = "50";
   $google_values[3] = "edit_posts";
   $google_values[4] = "0";
   $google_values[5] = "My Advertising";
   $google_values[6] = '<p><b>Warning:</b> Repeatedly clicking on your own ads will lead to a suspension of your advertising account by the friendly people at Google. For more information about Google\'s terms, take a look <a href="https://www.google.com/support/advertising/bin/answer.py?answer=23921&topic=8426" target="_blank">at what you should do to prevent suspension</a>.</p>
      <p>Insert your Google Advertising publishers ID below. If you don\'t have one you can get one <a href="http://www.google.com/advertising/" target="_blank">here</a>.</p>';
   $google_values[7] = "0";
   $google_values[8] = "Google Ad Slot";
   $google_values[9] = "my-slot-id";
   $google_values[10] = "0";
   $google_values[11] = "Author URL";
   $google_values[12] = "http://www.example.com";
   $google_values[13] = "NO";
   $google_values[14] = 'Example: %customfield2% <script type="text/javascript"><!--
google_ad_client = "%pubid%";
//Demo Ad
google_ad_slot = "%customfield1%";
google_ad_width = 468;
google_ad_height = 60;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';
   $google_values[15] = "NO";
   $google_values[16] = "";
   $google_values[17] = "NO";
   $google_values[18] = "";
   $google_values[19] = "NO";
   $google_values[20] = "";
   $google_values[21] = "[Orkut Plus!] Your Ad Banner No. %banner_id% is Rejected."; //subject of mail rejected (no 2)
   $google_values[22] = "Hi %name%,\n\n We are sorry to tell you that the banner (No. %banner_id%) you uploaded on OrkutPlus <www.orkutplus.net> as a Guest Blogger, has been rejected by the Admins. Please upload another banner. Till the time your other banner doesn't get approved and you don't have any other approved banner, OrkutPlus's ads will be displayed on your post(s). Sorry for the inconvinience. If you have any queries, you can mail us at <REDACTED>@gmail.com.\n\nThank You.\n\n%admin_name% <%admin_email%>"; //content of mail rejected (no 2)
   update_option("kd_author_advertising", $google_values);

   }
}*/

/*function kd_init_author_id(){
   global $post;
   $google_values = get_option('kd_author_advertising');
   $random_home = $google_values["4"];
   if(is_home()){ if($random_home == 1){ $kd_pub_id = kd_get_random(); } else { $kd_pub_id = kd_get_google_id('0'); }}
   if(is_single()){ $kdid = $post->post_author; $kd_pub_id = kd_get_google_id($kdid);}
   if(is_page()){ $kdid = $post->post_author; $kd_pub_id = kd_get_google_id($kdid);}
   update_option("kd_current_id", $kd_pub_id);
}*/
/*
function kd_header_ad(){
   $google_values = get_option('kd_author_advertising');
   if($google_values[13] == "YES"){ echo kd_get_ad_ready($google_values[14]); }
}

function kd_footer_ad(){
   $google_values = get_option('kd_author_advertising');
   if($google_values[15] == "YES"){ echo kd_get_ad_ready($google_values[16]); }
}

function kd_footer_ad2(){
   $google_values = get_option('kd_author_advertising');
   if($google_values[17] == "YES"){ echo kd_get_ad_ready($google_values[18]); }
}

function kd_aa_widget($args, $number=1){
extract($args);
$options = get_option('kd_aa_widget');
$title = $options[$number]['title'];
$google_values = get_option('kd_author_advertising');
if($google_values[19] == "YES"){ $widget_content = kd_get_ad_ready($google_values[20]); }
   echo $before_widget . $before_title . $title . $after_title . $widget_content . $after_widget;
}

function kd_aa_widget_control($number) {
   $options = $newoptions = get_option('kd_aa_widget');
   if ( !is_array($options) )
      $options = $newoptions = array();
   if ( $_POST["kd_aa_widget-$number"] ) {
      $newoptions[$number]['title'] = strip_tags(stripslashes($_POST["kd_aa_widget-$number"]));
      }
   if ( $options != $newoptions ) {
      $options = $newoptions;
      update_option('kd_aa_widget', $options);
   }
   $title = attribute_escape($options[$number]['title']);
?>
<p><label for="advertising_widget-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="kd_aa_widget-<?php echo $number; ?>" name="kd_aa_widget-<?php echo $number; ?>" type="text" value="<?php echo $title; ?>" /></label></p>
<input type="hidden" id="kd_aa_widget-submit-<?php echo "$number"; ?>" name="kd_aa_widget-submit-<?php echo "$number"; ?>" value="1" />
<?php
}

function kd_aa_widget_setup() {
if (function_exists('register_sidebar_widget')){
   $options = $newoptions = get_option('kd_aa_widget');
   if ( isset($_POST['kd_aa_widget-submit']) ) {
      $number = (int) $_POST['kd_aa_widget-number'];
      if ( $number > 3 ) $number = 3;
      if ( $number < 1 ) $number = 1;
      $newoptions['number'] = $number;
   }
   if ( $options != $newoptions ) {
      $options = $newoptions;
      update_option('kd_aa_widget', $options);
      kd_aa_widget_register($options['number']);
   }
kd_aa_widget_register();
}
}

function kd_aa_widget_page() {
   $options = $newoptions = get_option('kd_aa_widget');
?>
   <div class="wrap">
      <form method="POST">
         <h2><?php _e('Author Advertising Widgets'); ?></h2>
         <p style="line-height: 30px;"><?php _e('How many Author Advertising widgets would you like?'); ?>
         <select id="kd_aa_widget-number" name="kd_aa_widget-number" value="<?php echo $options['number']; ?>">
<?php for ( $i = 1; $i < 4; ++$i ) echo "<option value='$i' ".($options['number']==$i ? "selected='selected'" : '').">$i</option>"; ?>
         </select>
         <span class="submit"><input type="submit" name="kd_aa_widget-submit" id="kd_aa_widget-submit" value="<?php echo attribute_escape(__('Save')); ?>" /></span></p>
      </form>
   </div>
<?php
}

function kd_aa_widget_register() {
   $options = get_option('kd_aa_widget');
   $number = $options['number'];
   if ( $number < 1 ) $number = 1;
   if ( $number > 3 ) $number = 3;
   $class = array('classname' => 'kd_aa_widget');
   for ($i = 1; $i <= 3; $i++) {
      $name = sprintf(__('Author Advertising %d'), $i);
      $id = "advertising-$i"; // Never never never translate an id
      wp_register_sidebar_widget($id, $name, $i <= $number ? 'kd_aa_widget' : '', $class, $i);
      wp_register_widget_control($id, $name, $i <= $number ? 'kd_aa_widget_control' : '', $dims, $i);
   }
   add_action('sidebar_admin_setup', 'kd_aa_widget_setup');
   add_action('sidebar_admin_page', 'kd_aa_widget_page');
}*/
/* not needed end */

?>
