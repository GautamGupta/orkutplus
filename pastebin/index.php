<?php
require_once('pastebin/config.inc.php');
require_once('geshi/geshi.php');
require_once('pastebin/diff.class.php');
require_once('pastebin/pastebin.class.php');
error_reporting(0);
include("../blog/wp-config.php");
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
$charset_code=array(
	'latin1'=>array('http'=>'iso-8859-1', 'htmlentities'=>'ISO-8859-1'),
	'1251'=>array('http'=>'windows-1251', 'htmlentities'=>'cp1251')
);
$charset='latin1';
$CONF['htmlentity_encoding']=$charset_code[$charset]['htmlentities'];
$CONF['http_charset']=$charset_code[$charset]['http'];
set_time_limit(180);
if (isset($_GET['maintain']))
{
	$CONF["maintainer_mode"]=1;
}
function t($str)
{
	return $str;	
}
function h1($str)
{
	echo '<h1>'.$str.'</h1>';	
}
function p($str)
{
	echo '<p>'.$str.'</p>';	
}
function li($str)
{
	echo '<li>'.$str.'</li>';	
}
if (get_magic_quotes_gpc())
{
	function callback_stripslashes(&$val, $name) 
	{
		if (get_magic_quotes_gpc()) 
			$val=stripslashes($val);
	}


	if (count($_GET))
		array_walk ($_GET, 'callback_stripslashes');
	if (count($_POST))
		array_walk ($_POST, 'callback_stripslashes');
	if (count($_COOKIE))
		array_walk ($_COOKIE, 'callback_stripslashes');
}
$pastebin=new Pastebin($CONF);
$errors=array();
if (isset($_REQUEST['paste']))
{
	//process posting and redirect
	$id=$pastebin->doPost($_REQUEST);
	if ($id)
	{
		?><script>window.location="http://www.orkutplus.net/pastebin?show=<?php echo $id; ?>";</script><?php
		exit;
	}

}

if (isset($_GET['dl'])) 
{
	$pid=$pastebin->cleanPostId($_GET['dl']);
	
	if (!$pastebin->doDownload($pid))
	{
		//not fount
		echo "PasteBin Entry $pid is not Available!";
	}
	exit;
}
$page=array();
$page['current_format']=$CONF['default_highlighter'];
$page['expiry']=$CONF['default_expiry'];
$page['remember']='';	

$cookie=$pastebin->extractCookie();
if ($cookie)
{
	//initialise bits of page with cookie data
	$page['remember']='checked="checked"';
	$page['current_format']=$cookie['last_format'];
	$page['poster']=$cookie['poster'];
	$page['expiry']=$cookie['last_expiry'];
	$page['token']=$cookie['token'];
}
if (isset($_POST['feedback']) && strlen($_POST['msg']))
{
	$matches=array();
	$spam=false;
	
	//more than two links?
	preg_match_all('{http://}', $_POST['msg'], $matches);
	$spam=$spam || count($matches[0])>2;
	
	//[url=][/url] ?
	$spam=$spam || preg_match('{\[url=}i', $_POST['msg']);
	$spam=$spam || preg_match('{<a href=}i', $_POST['msg']);
	
	
	if (!$spam)
	{
		@mail($CONF['feedback_to'], "[pastebin] Feedback", $_POST['msg'], "From: {$CONF['feedback_sender']}");
		$page['thankyou']=t('Thanks for your feedback, If you included your E-Mail Address in your Message, We will reply you as soon as Possible!');
	}
	else
	{
		$page['thankyou']=t('Sorry, That looked a bit too much like Spam - Go Easy on the Links There.');
	}
}
if (isset($_REQUEST['erase']))
{
	$pid=$pastebin->cleanPostId($_REQUEST['erase']);
	$post=$pastebin->getPost($pid);
	if (!empty($post['token']) && !empty($cookie['token']) && $post['token']==$cookie['token'])
	{
		$pastebin->deletePost($pid);
		$page['delete_message']='Your post has been deleted';
	}
	else
	{
		$page['delete_message']='You cannot Delete this Post.';
		$_REQUEST["show"]=$pid;
	}
}

//add list of recent posts
$list=isset($_REQUEST["list"]) ? intval($_REQUEST["list"]) : 5;
$page['recent']=$pastebin->getRecentPosts($list);


if (isset($_REQUEST["show"]))
{
	$pid=$pastebin->cleanPostId($_REQUEST['show']);
	
	//get the post
	$page['post']=$pastebin->getPost($pid);
	
	
	
	//ensure corrent format is selected
	$page['current_format']=$page['post']['format'];
}
else
{
	 $page['posttitle']='New Posting';
}

//use configured title
$page['title']="PasteBin - By OrkutPlus!";
$page['current_format']!='text';

header("Content-Type: text/html; charset=".$CONF['http_charset']);

include("layout.php");

// clean up older posts 
$pastebin->doGarbageCollection();

DB::dumpDiagnostics();