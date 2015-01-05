	<style type="text/css" media="screen">
	<!--
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style-core.css);
	@import url(http://www.orkutplus.net/blog/wp-content/themes/op/style.css);
		-->
	</style>

<?php
error_reporting(0);
include("../../blog/wp-config.php");
$oldBlogURL = "orkutplus.blogspot.com";
$ref = $_SERVER['HTTP_REFERER'];
$refarr = explode("/", $ref);

	if ($refarr[2] == $oldBlogURL ){
		$bloggerurl = '\/'.$refarr[3].'\/'.$refarr[4].'\/'.$refarr[5];
		$sqlstr = "
			    SELECT wposts.guid 
			    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			    WHERE wposts.ID = wpostmeta.post_id 
			    AND wpostmeta.meta_key = 'blogger_permalink' 
			    AND wpostmeta.meta_value = '".$bloggerurl."'
			 ";             
		$wpurl = $wpdb->get_results($sqlstr, ARRAY_N);
		if ($wpurl){
			header( 'Location: '.$wpurl[0][0].' ') ;
                        exit;
		}
	}
?>

<?php include("../../blog/wp-content/themes/op/header.php"); ?>
<script type="text/javascript" src="wysiwyg/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "exact",
	elements : "scrap",
	theme : "advanced",
	skin : "o2k7",
	plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
	theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,strikethrough,|,undo,redo,|,link,cleanup,code",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,ltr,rtl",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,spellchecker,|,cite,abbr,acronym,|,visualchars,nonbreaking,blockquote,|,insertdate,inserttime,preview,|,forecolor,backcolor,|,charmap,|,fullscreen",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	content_css : "css/example.css",

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "js/template_list.js",
	external_link_list_url : "js/link_list.js",
	external_image_list_url : "js/image_list.js",
	media_external_list_url : "js/media_list.js",

	// Replace values for the template plugin
	template_replace_values : {
		username : "Some User",
		staffid : "991234"
	}
});
</script>
<div id="page_container">

<?php include("../../blog/wp-content/themes/op/sidebar.php"); ?>
<?php include("../../blog/wp-content/themes/op/leftbar.php"); ?>
<div class="rbroundbox">
	<div class="rbtop"><div></div></div>
			<div class="rbcontent">

<div id="postcol" class="fixheight">
 <?php $adcount = 1; ?>
<div class="post_title">
<h2 id="post-scrapall" class="title"><a href="http://orkutplus.net/toolkit/scrapall" rel="bookmark">Scrap All Deluxe - Super Fast and Hassle Free.</a></h2>
<small class="title"><a href="http://www.orkutplus.net/toolkit/scrapall/br">Todos los desechos de lujo en Portugues</a></small>
<div class="content"><p>Our Scrap all friends is an very efficient way to send your scraps to all
your friends quickly and easily. Use our scrap all to send greetings or
important alerts or anything you like. And please note - it is <strong>advertisement
free</strong>. Please refer <a href="http://www.orkutplus.net/2008/09/scrap-all-friends.html">this
post</a> for the tutorial and help.</p></div>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//--></script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
   </div> 
<div class="content">
	<div style="padding-left:0px; padding-top:15px">
<?php
if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['scrap'])) //post submission ok
{
        set_time_limit(0); //clears 30 second limit
        require('class.XMLHttpRequest.php'); //browser call
        $req = new XMLHttpRequest(); //browser var
        $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$_POST['email']."&Passwd=".$_POST['pass']."&service=orkut&skipvpage=true&sendvemail=false"); //to match auth
        $req->send(null);
        preg_match("/auth=(.*?)\n/i", $req->responseText, $auth); //auth match
        $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]); //login
        $req->send(null);
        preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state); //cookie match
        if ($orkut_state[0] != NULL) //id verified
        {
                $req->open("GET","http://www.orkut.com/Scrapbook.aspx"); //to get post token & sig
                $req->setRequestHeader("Cookie",$orkut_state[0]);
                $req->send(null);
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER); //post token var
                preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER); //sig var
                $abc = urlencode($lol[0][1]); //post token urlencode
                $abc1 = urlencode($lol1[0][1]); //sig urlencode
		if($_POST['to'] == 1){ //all friends, code below before if to match number of pages of frnds for loop
			$req->open("GET","http://www.orkut.com/Friends.aspx"); //nav to match
			$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
			$req->send(null);
			preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs); //matching no of frnds
			$pgs = $pgs[1]; //string from array
			$pgs = $pgs/20; //divide by 20 to get no of pgs as 1 pg contains 20 frnds
			$pgs = ceil($pgs); //change to the next higher number coz of division from decimal for loop
			if($pgs == 0){ //if pg var comes to be 0, then it is converted to 1
				$pgs = 1;
			}
			if($_POST['sel'] == 1){ //all
				echo "<center><strong>Scrap went to:</strong></center><br /><table border=0>"; //html output
				for($a=1;$a<=$pgs;$a++) //loop
				{
					$req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a); //nav to page in frnd section
					$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
					$req->send(null);
					$ts = $req->responseText; //var assign n clear below coz of anonymous dp
					$ts = str_replace(' class="listimg"  ', '', $ts);
					$ts = str_replace(' class="listimg"', '', $ts);
					$ts = str_replace('<imgsrc', '<img src', $ts);
					preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER); //matching all frnds - advance (matches all details on the page)
					$sfrnd = sizeof($frnd); //count of frnds
					for($y=0;$y<=$sfrnd;$y++) //loop for frnds
					{
						if($frnd[$y][2] != NULL){ //if uid not null - bug cleared
							$scrap = urlencode(str_replace("%NAME%", $frnd[$y][3], $_POST['scrap'])."<br /><br /></font>[silver]".date("H:i:s")); //scrap assign
							$req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]); //sb open of uid
							$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
							$req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&scrapText=".$scrap."&uid=".$frnd[$y][2]); //send data
							if(($y % 2)==0){ //if statement for design html output
								//even
								echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
							}else{
								//odd
								echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
							}
							if(isset($_POST['interval'])){ //interval (seconds)
								sleep($_POST['interval']);
							}else{
								sleep(1);
							}
							flush();
						} //uid null check end
					} //end frnds loop
				} //end page loop
				echo "</table>"; //html output
			}elseif($_POST['sel'] == 3){ //range - changed from limit
				$range = $_POST['range']; //var assign
				$rangeexplode = explode(";", $range); //explode with ";"
				$recount = count($rangeexplode); //get the number of values
				$scd = 0; //v
				$scf = 1; //v
				echo "<center><strong>Scrap went to:</strong></center><br /><table border=0>"; //html output
				for($a=1;$a<=$pgs;$a++) //loop for pgs
				{
					$req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a); //nav to pg
					$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
					$req->send(null);
					$ts = $req->responseText; //clear
					$ts = str_replace(' class="listimg"  ', '', $ts);
					$ts = str_replace(' class="listimg"', '', $ts);
					$ts = str_replace('<imgsrc', '<img src', $ts);
					preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER); //match frnd details
					$sfrnd = sizeof($frnd); //count of frnds
					for($y=0;$y<=$sfrnd;$y++) //loop for frnds
					{
						for($r=0;$r<=$recount;$r++){ //loop for values in range
							$ir = explode("-", $rangeexplode[$r]); //explode value to get start and end
							if($scf >= $ir[0] && $scf <= $ir[1]){ //if frnd is in the range
								if($frnd[$y][2] != NULL){ //if uid not null - not needed as it will be cleared in the prev step, but to clear the 0.01% doubt
									$scrap = urlencode(str_replace("%NAME%", $frnd[$y][3], $_POST['scrap'])."<br /><br /></font>[silver]".date("H:i:s")); //scrap var
									$req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]); //nav to uid sb
									$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
									$req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&scrapText=".$scrap."&uid=".$frnd[$y][2]); //send data
									if(($scd % 2)==0){ //if statement for design html output
										//even
										echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
									}else{
										//odd
										echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
									}
									if(isset($_POST['interval'])){ //interval (seconds)
										sleep($_POST['interval']);
									}else{
										sleep(1);
									}
									flush();
								}//uid null check end
								break;
							} //frnd in range check end
						} //values in range loop end
						$scd++;
						$scf++;
					} //loop for frnds end
				} //loop for pgs end
				echo "</table>"; //html output
			}elseif($_POST['sel'] == 2){ //selected frnds
				echo '<form method="POST" action="selected.php"><p>Check the Friends to send the Scrap:</p><table border=0>'; //html output
				for($a=1;$a<=$pgs;$a++) //pg loop
				{
					$req->open("GET","http://www.orkut.com/Friends.aspx?show=all&pno=".$a); //nav to pg
					$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
					$req->send(null);
					$ts = $req->responseText; //clear
					$ts = str_replace(' class="listimg"  ', '', $ts);
					$ts = str_replace(' class="listimg"', '', $ts);
					$ts = str_replace('<imgsrc', '<img src', $ts);
					preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER); //match frnds
					$sfrnd = sizeof($frnd); //count
					for($y=0;$y<=$sfrnd;$y++) //loop for frnds
					{
						if($frnd[$y][2] != NULL){ //uid null check
							if(($y % 2)==0){// if for design html output
								//even
								echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p><p><input type="checkbox" name="'.$frnd[$y][2].'">&nbsp;Scrap this Friend.</p></td></tr>';
							}else{
								//odd
								echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p><p><input type="checkbox" name="'.$frnd[$y][2].'">&nbsp;Scrap this Friend.</p></td></tr>';
							}
							flush();
						}//uid null check end
					} //frnd loop end
				} //pg loop end
				$scrap = urlencode($_POST['scrap']); //urlencode scrap
				echo '</table><input type="hidden" name="email" value="'.$_POST['email'].'"><input name="pass" type="hidden" value="'.$_POST['pass'].'"><input name="scrap" type="hidden" value="'.$scrap.'">'; //html output
				echo '<input type="hidden" name="to" value="1">';
				if(isset($_POST['interval'])){ //if interval, then html output
					echo '<input type="hidden" name="interval" value="'.$_POST['interval'].'">';
				}
				echo '<input type="submit" value="Scrap Selected Friends!"></form>'; //html output
			} //selected frnds end
		}elseif($_POST['to'] == 2){ //groups frnds
			if($_POST['sel'] == 1){ //all
				echo "<center><strong>Scrap went to:</strong></center><br /><table border=0>"; //html output
				$grp = $_POST['groups']; //grp var
				$grpexp = explode(";", $grp); //explode grps
				$grpc = count($grpexp); //count number of values
				$grpc--; //-1
				for($r=0;$r<=$grpc;$r++){ //loop for grps
					$req->open("GET","http://www.orkut.com/Friends.aspx?show=group".$grpexp[$r]); //nav to grp
					$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
					$req->send(null);
					preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs); //match no of frnds
					$pgs = $pgs[1]; //string from array
					$pgs = $pgs/20; //no of pgs frm frnds
					$pgs = ceil($pgs); //higger number
					if($pgs == 0){ //if pg var comes to be 0, then it is converted to 1
						$pgs = 1;
					}
					for($a=1;$a<=$pgs;$a++) //grp pg loop
					{
						$req->open("GET","http://www.orkut.com/Friends.aspx?show=group".$grpexp[$r]."&pno=".$a); //grp pg nav
						$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
						$req->send(null);
						$ts = $req->responseText; //clear
						$ts = str_replace(' class="listimg"  ', '', $ts);
						$ts = str_replace(' class="listimg"', '', $ts);
						$ts = str_replace('<imgsrc', '<img src', $ts);
						preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER); //match frnds
						for($y=0;$y<=sizeof($frnd);$y++) //frnd loop
						{
							if($frnd[$y][2] != NULL){ //uid check
								$scrap = urlencode(str_replace("%NAME%", $frnd[$y][3], $_POST['scrap'])."<br /><br /></font>[silver]".date("H:i:s")); //scrap
								$req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]); //uid sb
								$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
								$req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&scrapText=".$scrap."&uid=".$frnd[$y][2]); //send data
								if(($y % 2)==0){ //if for design html output
									//even
									echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
								}else{
									//odd
									echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
								}
								if(isset($_POST['interval'])){ //interval
									sleep($_POST['interval']);
								}else{
									sleep(1);
								}
								flush();
							} //uid cheeck end
						} //frnd loop end
					} //grp pg loop end
				} //grp loop end
				echo "</table>"; //html output
			}elseif($_POST['sel'] == 2){ //selected frnds
				echo '<form method="POST" action="selected.php"><p>Check the Friends to send the Scrap:</p><table border=0>'; //html output
				$grp = $_POST['groups']; //grp var
				$grpexp = explode(";", $grp); //explode grps
				$grpc = count($grpexp); //count number of values
				$grpc--; //-1
				for($r=0;$r<=$grpc;$r++){ //loop for grps
					$req->open("GET","http://www.orkut.com/Friends.aspx?show=group".$grpexp[$r]); //nav to grp
					$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
					$req->send(null);
					preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs); //match no of frnds
					$pgs = $pgs[1]; //string from array
					$pgs = $pgs/20; //no of pgs frm frnds
					$pgs = ceil($pgs); //higger number
					if($pgs == 0){ //if pg var comes to be 0, then it is converted to 1
						$pgs = 1;
					}
					for($a=1;$a<=$pgs;$a++) //grp pg loop
					{
						$req->open("GET","http://www.orkut.com/Friends.aspx?show=group".$grpexp[$r]."&pno=".$a); //grp pg nav
						$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
						$req->send(null);
						$ts = $req->responseText; //clear
						$ts = str_replace(' class="listimg"  ', '', $ts);
						$ts = str_replace(' class="listimg"', '', $ts);
						$ts = str_replace('<imgsrc', '<img src', $ts);
						preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER); //match frnds
						for($y=0;$y<=sizeof($frnd);$y++) //frnd loop
						{
							if($frnd[$y][2] != NULL){ //uid check
								if(($y % 2)==0){// if for design html output
									//even
									echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p><p><input type="checkbox" name="'.$frnd[$y][2].'">&nbsp;Scrap this Friend.</p></td></tr>';
								}else{
									//odd
									echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p><p><input type="checkbox" name="'.$frnd[$y][2].'">&nbsp;Scrap this Friend.</p></td></tr>';
								}
								flush();
							} //uid cheeck end
						} //frnd loop end
					} //grp pg loop end
				} //grp loop end
				$scrap = urlencode($_POST['scrap']); //urlencode scrap
				echo '</table><input type="hidden" name="email" value="'.$_POST['email'].'"><input name="pass" type="hidden" value="'.$_POST['pass'].'"><input name="scrap" type="hidden" value="'.$scrap.'">'; //html output
				echo '<input type="hidden" name="to" value="2"><input type="hidden" name="grp" value="'.$grp.'">';
				if(isset($_POST['interval'])){ //if interval, then html output
					echo '<input type="hidden" name="interval" value="'.$_POST['interval'].'">';
				}
				echo '<input type="submit" value="Scrap Selected Friends!"></form>'; //html output
			}elseif($_POST['sel'] == 3){ //range
				$range = $_POST['range']; //var assign
				$rangeexplode = explode(";", $range); //explode with ";"
				$recount = count($rangeexplode); //get the number of values
				$scd = 0; //v
				$scf = 1; //v
				echo $recount;
				$grp = $_POST['groups']; //grp var
				$grpexp = explode(";", $grp); //explode grps
				$grpc = count($grpexp); //count number of values
				$grpc--; //-1
				echo $grpc;
				for($r=0;$r<=$grpc;$r++){ //loop for grps
					
				}
				/*echo "<center><strong>Scrap went to:</strong></center><br /><table border=0>"; //html output
				for($r=0;$r<=$grpc;$r++){ //loop for grps
					$req->open("GET","http://www.orkut.com/Friends.aspx?show=group".$grpexp[$r]); //nav to grp
					$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
					$req->send(null);
					preg_match("/showing\ \<B\>1\-20\<\/b\>\ of\ \<b\>(.*?)\<\/b\>/i",$req->responseText,$pgs); //match no of frnds
					$pgs = $pgs[1]; //string from array
					$pgs = $pgs/20; //no of pgs frm frnds
					$pgs = ceil($pgs); //higger number
					if($pgs == 0){ //if pg var comes to be 0, then it is converted to 1
						$pgs = 1;
					}
					for($a=1;$a<=$pgs;$a++) //grp pg loop
					{
						$req->open("GET","http://www.orkut.com/Friends.aspx?show=group".$grpexp[$r]."&pno=".$a); //grp pg nav
						$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
						$req->send(null);
						$ts = $req->responseText; //clear
						$ts = str_replace(' class="listimg"  ', '', $ts);
						$ts = str_replace(' class="listimg"', '', $ts);
						$ts = str_replace('<imgsrc', '<img src', $ts);
						preg_match_all('/<img src="(.*?)"><\/a>\n<h3 class="smller">\n<a  href="\/Main\#Profile\.aspx\?uid\=(.*?)">(.*?)\<\/a\>\n\<\/h3\>\n\<div class\=\"nor\"  \>\n(.*?)\n\<\/div\>/i',$ts,$frnd,PREG_SET_ORDER); //match frnds
						for($y=0;$y<=sizeof($frnd);$y++) //frnd loop
						{
							if($frnd[$y][2] != NULL){ //uid check
								$scrap = urlencode(str_replace("%NAME%", $frnd[$y][3], $_POST['scrap'])."<br /><br /></font>[silver]".date("H:i:s")); //scrap
								$req->open("POST","http://www.orkut.com/Scrapbook.aspx?uid=".$frnd[$y][2]); //uid sb
								$req->setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								$req->setRequestHeader("Cookie", "TZ=-330;".$orkut_state[0]);
								$req->send("POST_TOKEN=".$abc."&signature=".$abc1."&&Action.submit=1&scrapText=".$scrap."&uid=".$frnd[$y][2]); //send data
								if(($y % 2)==0){ //if for design html output
									//even
									echo '<tr><td style="border:2px groove #FBFACE;" width=20%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
								}else{
									//odd
									echo '<tr><td width=20% style="background-color:#FBFACE;border:2px groove #FBFACE;"><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'"><img src="'.$frnd[$y][1].'"></a></p></td><td style="background-color:#FBFACE;border:2px groove #FBFACE;" width=80%><p align="center"><a href="http://www.orkut.com/Profile.aspx?uid='.$frnd[$y][2].'">'.$frnd[$y][3].'</a></p><p align="center">'.$frnd[$y][4].'</p></td></tr>';
								}
								if(isset($_POST['interval'])){ //interval
									sleep($_POST['interval']);
								}else{
									sleep(1);
								}
								flush();
							} //uid cheeck end
						} //frnd loop end
					} //grp pg loop end
				} //grp loop end
				echo "</table>"; //html output
				*/
			}
		}
        }else{
                echo "Email ID not working.<br>"; //id isnt workin
        }
}else{ 
?>
<form method="POST">
	<p align="center"><strong>Please refer to the HELP GUIDE to see how the new ScrapAll works.</strong></p>
	<div class="loltitleclassic"><b>Your Orkut EMail ID</b></div>
	<p><input type="text" name="email" size="71" value="Username"></p>
	<div class="loltitleclassic"><b>Password</b></div>
	<p><input type="password" name="pass" size="71" value = "Password"></p>
	<div class="loltitleclassic"><b>Time Interval Between Scraps</b></div>
	<p><input type="text" name="interval" size="50" value = ""> (in seconds)(optional) </p>
        <div class="loltitleclassic"><b>Scrap To</b></div>
	<p><input type="radio" checked="true" name="to" value="1" onchange="if(this.checked=true){document.forms[2].elements[11].value='1-5;10-19;40-50';}">All Friends</p>
	<p><input type="radio" name="to" value="2" onchange="if(this.checked=true){document.forms[2].elements[11].value='1:1-5,20-23;3:10-13;4:1-10,20-25,30-40';}">Friends in Group(s):
	<input type="text" name="groups" size="47" value="1;3;4"></p>
	<div style="margin:5px;padding:2px;font-size: 11px;width:auto;color:#000;background-color:#fff;border:1px solid #CCCCCC;line-height:1.2em;height:auto;">
	<p><input type="radio" name="to" value="3" onchange="if(this.checked=true){document.forms[2].elements[11].value='1-5;10-19;40-50';}">UID(s): 
	<input type="text" name="uids" size="57" value="UID1:UID2:UID3"></p>
	<p>If the UID is not in your friend list, then the scrap will be only sent if the scrapbook is unlocked.</p></div><p></p>
	<div class="loltitleclassic"><b>Selection</b></div>
	<p><input type="radio" checked="true" name="sel" value="1">All</p>
        <p><input type="radio" name="sel" value="2">Selected</p>
        <div style="margin:5px;padding:2px;font-size: 11px;width:auto;color:#000;background-color:#fff;border:1px solid #CCCCCC;line-height:1.2em;height:auto;">
	<p><input type="radio" name="sel" value="3">Range:
	<input type="text" name="range" size="57" value="1-5;10-19;40-50"></p>
	<p><strong>Format:</strong></p>
	<p><i>For All Friends & UIDs</i>: SR-ER;SR-ER;SR-ER<br />
	<i>For Groups</i>: G#1:SR-ER,SR-ER;G#2:SR-ER;G#3:SR-ER,SR-ER,SR-ER</p>
	<p><strong>Key:</strong><br />
	<i>G#</i> -> Group Number (As Entered Above in Groups Field)<br />
	<i>SR</i> -> Starting Range<br />
	<i>ER</i> -> Ending Range</p>
	<p align="center"><strong>HELP</strong></p></div><p></p>
	<div class="loltitleclassic"><b>Your Scrap - No Captcha Content Please</b></div>
	<p><textarea name="scrap" id="scrap" style="width:460px;height:200px;z-index:999;">Hi, %NAME%. I wanted to tell you that [b][blue][u]ht[b]tp://ww[b]w.orkutplus.[b]net/[/u][/blue][/b] Rocks! [:D]</textarea></p>
        <p align="left">Subsitutes you can use in scraps: <strong>%NAME%</strong> for Friend's Name in the Scrap.</p>
        <div class="loltitleclassic"><b>Scrap All / Reset</b></div>
        <p align="left"><input type="submit" value="Scrap All!" name="B1">&nbsp;<input type="reset" value="Reset" name="B2"></p></div>
</form>
	<?php } ?>
		<?php if ($adcount == 1) : ?>
<center><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 234x60, created 3/15/08 */
google_ad_slot = "2976980064";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>
&nbsp;&nbsp;&nbsp;<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* 180x90, created 8/15/08 */
google_ad_slot = "2368320585";
google_ad_width = 180;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
<div class="loltitleclassic"><b>Important Note</b></div>
<p>We do not store your account details anywhere in scrap all friends. Please read our <a href="http://www.orkutplus.net/privacy-policy">Privacy policy</a> and our <a href="http://www.orkutplus.net/disclaimer">Disclaimer</a> if you have any questions or concerns.</p>
<div class="loltitleclassic"><b>See Other Tools By Orkut Plus!</b></div>
<p>We are adding new tools every now and then in our <a href="http://www.orkutplus.net/orkut-toolkit">Official Orkut Toolkit</a>. Please navigate to <a href="http://www.orkutplus.net/orkut-toolkit">this page</a> to see the other tools.</p><br> 
<?php endif; $adcount++; ?>
<?php $adcount++; ?>
<div style="clear: both"></div></div></div>
</div></div><!-- /rbcontent -->
<div class="rbbot"><div></div></div>
</div><!-- /rbroundbox -->
</div> <!-- close page container-->
<?php include("../../blog/wp-content/themes/op/footer.php"); ?>