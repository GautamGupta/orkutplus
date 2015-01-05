<?php
function login($user, $pass){
    require('class.XMLHttpRequest.php');
    $req = new XMLHttpRequest();
    $req->open("GET","https://www.google.com/accounts/ClientLogin?Email=".$user."&Passwd=".$pass."&service=orkut&skipvpage=true&sendvemail=false");
    $req->send(null);
    preg_match("/auth=(.*?)\n/i", $req->responseText, $auth);
    $req->open("GET","http://www.orkut.com/RedirLogin.aspx?auth=".$auth[1]);
    $req->send(null);
    preg_match("/orkut_state=[^;]*/i", $req->getResponseHeader('Set-Cookie'), $orkut_state);
    if($orkut_state[0] != NULL)
    {
        $req->open("GET","http://www.orkut.com/Scrapbook.aspx");
	$req->setRequestHeader("Cookie",$orkut_state[0]);
	$req->send(null);
	preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"POST_TOKEN\"\ value\=\"(.*?)\"\>/ism', $req->responseText,$lol,PREG_SET_ORDER);
        preg_match_all('/\<\input\ type\=\"hidden\"\ name\=\"signature\"\ value\=\"(.*?)\"\>/ism',$req->responseText,$lol1,PREG_SET_ORDER);
        $post = array();
        $post['post'] = urlencode($lol[0][1]);
        $post['sig'] = urlencode($lol1[0][1]);
        return $post;
    }
}
function title($title){
    echo '
<h2 class="titles"><a href="'.current_url(1).'">'.$title.'</a></h2>
<div class="post-info" style="width: 480px !important;">&nbsp;Written by <REDACTED>&nbsp;|&nbsp;<a href="'.current_url(1).'" class="brazil">&nbsp;Portugues</a><br />Advertisement</div>
<p align="center"><script type="text/javascript"><!--
google_ad_client = "pub-1123855832779971";
/* op.nu post top 336x280, created 5/26/09 */
google_ad_slot = "9944513892";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
<div style="clear: both;"></div>
<div class="single-entry">';
}
?>
