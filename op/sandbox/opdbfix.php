<?php
function mysql_prep( $value ) {
        $magic_quotes_active = get_magic_quotes_gpc();
        $new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
        if( $new_enough_php ) { // PHP v4.3.0 or higher
                // undo any magic quote effects so mysql_real_escape_string can do the work
                if( $magic_quotes_active ) { $value = stripslashes( $value ); }
                $value = mysql_real_escape_string( $value );
        } else { // before PHP v4.3.0
                // if magic quotes aren't already on then add slashes manually
                if( !$magic_quotes_active ) { $value = addslashes( $value ); }
                // if magic quotes are active, then the slashes already exist
        }
        return $value;
}
function changetitle($link){
        $ch2=curl_init();
        curl_setopt($ch2,CURLOPT_URL, $link);
        curl_setopt($ch2,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch2,CURLOPT_SSL_VERIFYPEER,0);
        $recieve = curl_exec($ch2);
        curl_close($ch2);
        $changed_lgn = str_ireplace('\\x3c', '<', $recieve);
        $changed_lgnn = str_ireplace('\\x3e', '>', $changed_lgn);
        $changed_sl = str_ireplace('\\ ', '\\', $changed_lgnn);
        $changed_sll = str_ireplace('/ ', '/', $changed_sl);
        $changed_q = str_ireplace('\\" ', '"', $changed_sll);
        $changed_q2 = str_ireplace('\\"', '"', $changed_q);
        $changed_href = str_ireplace('href href', 'href', $changed_q2);
        preg_match('/\"(.*?)\"/i', $changed_href, $changed_p1);
        $final = $changed_p1[1];
        return $final;
}
function changecontent($link){
$ch2=curl_init();
curl_setopt($ch2,CURLOPT_URL, $link);
curl_setopt($ch2,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch2,CURLOPT_SSL_VERIFYPEER,0);
$cool123 = curl_exec($ch2);
curl_close($ch2);
preg_match("/<div id=result_box dir=\"ltr\">(.*)<\/div>/s",$cool123,$matches);
$converted = explode("</td>",$matches[1]);
$converted = str_ireplace('&lt;', '<', $converted[0]);
$converted = str_ireplace('&gt;', '>', $converted);
$converted = str_ireplace('&quot;', '"', $converted);
$converted = str_ireplace(' "', '" ', $converted);
$converted = str_ireplace('/ ', '/', $converted);
$converted = str_ireplace(' /', '/', $converted);
$converted = str_ireplace('/ ', '/', $converted);
$converted = str_ireplace('\%\<\/div\>22', '"', $converted);
return $converted;
}
$from = 'en';
$to = 'pt';
/*$len = strlen($db_content);
$len = $len/2000;
$len = ceil($len);
$total = "";
for($n=1;$n<=$len;$n++){
        $k = $n - 1;
        $p = $k * 2000;
        $b = $n * 2000;
        $new = substr($db_content, $p, $b);
        $new_content = changecontent("http://translate.google.com/translate_t?sl={$from}&tl={$to}&text={$new}");
        $total .= $new_content;
}*/
mysql_connect("<REDACTED>","<REDACTED>","<REDACTED>");
mysql_select_db("<REDACTED>");
$query = mysql_query("SELECT * from `<REDACTED>`.`wp_tdxxtc_posts` ORDER BY `<REDACTED>`.`wp_tdxxtc_posts`.`ID` ASC LIMIT ".$_GET['from']." , ".$_GET['to']);
if(!isset($_POST['submit'])){
        echo '<form method="POST"><table border=1 style="overflow:none;" width=100% height=100%><tr><td width=3%>ID</td><td width=1%>#</td><td width=26%>Title</td><td width=50%>Content</td></tr>';
}
while($row=mysql_fetch_array($query))
{
        mysql_select_db("<REDACTED>");
        $id = $row['ID'];
        $type = $row['post_type'];
        $status = $row['post_status'];
        $guid = $row['guid'];
        $db_title = $row['post_title'];
        $db_content = $row['post_content'];
        if(($type == "post" || $type == "page") && $status == "publish"){
                if(!isset($_POST['submit'])){
                        if($db_content == "" || $db_title == ""){ //access to main db, hv to be carefull!
                                mysql_select_db("wp_orkutplus_db");
                                $query2 = mysql_query("SELECT * from `wp_orkutplus_db`.`wp_posts` WHERE `wp_orkutplus_db`.`wp_posts`.`ID` = '".$id."' ORDER BY `wp_orkutplus_db`.`wp_posts`.`ID` ASC");
                                while($row=mysql_fetch_array($query2))
                                {
                                        $new_db_title = urlencode($row['post_title']);
                                        $new_db_content = urlencode($row['post_content']);
                                        $changed_title = changetitle("http://translate.google.com/translate_a/t?client=t&sl={$from}&tl={$to}&text={$new_db_title}");
                                        $len = strlen($new_db_content);
                                        $len = $len/2000;
                                        $len = ceil($len);
                                        $total = "";
                                        for($n=1;$n<=$len;$n++){
                                                $k = $n - 1;
                                                $p = $k * 2000;
                                                $b = $n * 2000;
                                                $new = substr($new_db_content, $p, $b);
                                                $new_content = changecontent("http://translate.google.com/translate_t?sl={$from}&tl={$to}&text={$new}");
                                                $total .= $new_content;
                                        }
                                        $total = str_ireplace(urldecode("%20%c2%bb"), "&raquo;", $total);
                                        $total = str_ireplace(urldecode("%20%c2%20%bb"), "&raquo;", $total);
                                        $total = str_ireplace(urldecode("%c2%bb"), "&raquo;", $total);
                                        $total = str_ireplace(urldecode("%c2%20%bb"), "&raquo;", $total);
                                        $total = str_ireplace('”', '"', $total);
                                        $total = str_ireplace(' =" ', '="', $total);
                                        $total = str_ireplace("< ", "<", $total);
                                        $total = str_ireplace("/>", ">", $total);
                                        $total = str_ireplace(" >", ">", $total);
                                        $total = str_ireplace("<! - mais ->", "", $total);
                                        $total = str_ireplace("<!-- mais ->", "", $total);
                                        $total = ereg_replace()
                                        $total = str_ireplace("orkutplus.org", "orkutplus.net", $total);
                                        $total = str_ireplace("orkutplus.net", "br.orkutplus.net", $total);
                                        $total = str_ireplace("http://orkutplus.net", "http://br.orkutplus.net", $total);
                                        $total = str_ireplace("www.orkutplus.net", "br.orkutplus.net", $total);
                                        $total = str_ireplace("www.br.orkutplus.net", "br.orkutplus.net", $total);
                                        $total = str_ireplace("br.br.orkutplus.net/blog", "br.orkutplus.net", $total);
                                        $total = str_ireplace("br.orkutplus.net/blog", "br.orkutplus.net", $total);
                                        mysql_select_db("wp_br_orkutplus_db");
                                        mysql_query("UPDATE `wp_br_orkutplus_db`.`wp_tdxxtc_posts` SET `wp_br_orkutplus_db`.`wp_tdxxtc_posts`.`post_title` = '".mysql_prep($changed_title)."' WHERE `wp_br_orkutplus_db`.`wp_tdxxtc_posts`.`ID` = '{$id}'");
                                        mysql_query("UPDATE `wp_br_orkutplus_db`.`wp_tdxxtc_posts` SET `wp_br_orkutplus_db`.`wp_tdxxtc_posts`.`post_content` = '".mysql_prep($total)."' WHERE `wp_br_orkutplus_db`.`wp_tdxxtc_posts`.`ID` = '{$id}'");
                                        $total = str_ireplace("</textarea>", "</txtfixtoavoidcut>", $total);
                                        echo '<tr><td width=3%>'.$id.'</td><td width=1%><a href="'.$guid.'">#</a></td><td width=256%><textarea name="'.$id.'t" style="width:315px;height:400px;">'.$changed_title.'</textarea></td><td width=70%><textarea name="'.$id.'" style="width:865px;height:400px;">'.$total.'</textarea></td></tr>';
                                }
                        }else{
                                $db_content = str_ireplace(urldecode("%20%c2%bb"), "&raquo;", $db_content);
                                $db_content = str_ireplace(urldecode("%20%c2%20%bb"), "&raquo;", $db_content);
                                $db_content = str_ireplace(urldecode("%c2%bb"), "&raquo;", $db_content);
                                $db_content = str_ireplace(urldecode("%c2%20%bb"), "&raquo;", $db_content);
                                $db_content = str_ireplace('”', '"', $db_content);
                                $db_content = str_ireplace(' =" ', '="', $db_content);
                                $db_content = str_ireplace("< ", "<", $db_content);
                                $db_content = str_ireplace("/>", ">", $db_content);
                                $db_content = str_ireplace(" >", ">", $db_content);
                                $db_content = str_ireplace("<! - mais ->", "", $db_content);
                                $db_content = str_ireplace("<!-- mais ->", "", $db_content);
                                $db_content = str_ireplace("</textarea>", "</txtfixtoavoidcut>", $db_content);
                                $db_content = str_ireplace("orkutplus.org", "orkutplus.net", $db_content);
                                $db_content = str_ireplace("orkutplus.net", "br.orkutplus.net", $db_content);
                                $db_content = str_ireplace("http://orkutplus.net", "http://br.orkutplus.net", $db_content);
                                $db_content = str_ireplace("www.orkutplus.net", "br.orkutplus.net", $db_content);
                                $db_content = str_ireplace("www.br.orkutplus.net", "br.orkutplus.net", $db_content);
                                $db_content = str_ireplace("br.br.orkutplus.net", "br.orkutplus.net", $db_content);
                                $db_content = str_ireplace("br.orkutplus.net/blog", "br.orkutplus.net", $db_content);
                                echo '<tr><td width=3%>'.$id.'</td><td width=1%><a href="'.$guid.'">#</a></td><td width=256%><textarea name="'.$id.'t" style="width:315px;height:400px;">'.$db_title.'</textarea></td><td width=70%><textarea name="'.$id.'" style="width:865px;height:400px;">'.$db_content.'</textarea></td></tr>';
                        }
                }else{
                        $recieve_content = str_ireplace("</txtfixtoavoidcut>", "</textarea>", $_POST[$id]);
                        mysql_query("UPDATE `wp_tdxxtc_posts` SET `post_title` = '".mysql_prep($_POST[$id.'t'])."' WHERE `ID` = '{$id}'");
                        mysql_query("UPDATE `wp_tdxxtc_posts` SET `post_content` = '".mysql_prep($recieve_content)."' WHERE `ID` = '{$id}'");
                        echo '<a href="'.$guid.'">#</a>'.$id.' updated.<br />';
                }
                flush();
        }
}
if(!isset($_POST['submit'])){
        echo '</table><br /><br /><input type="submit" name="submit" value="Submit">&nbsp;<input type="reset" value="Reset"></form>';
}
/*$query = mysql_query("SELECT * from wp_tdxxtc_comments ORDER BY `wp_tdxxtc_comments`.`comment_ID` ASC");
while($row=mysql_fetch_array($query))
{
        $id = $row['comment_ID'];
        $type = $row['comment_type'];
        $approve = $row['comment_approved'];
        $c_content = trim(urlencode($row['comment_content']));
        if($type == "" && $approve == 1){
                $from = 'en';
                $to = 'pt';
                $len = strlen($c_content);
                $len = $len/2000;
                $len = ceil($len);
                $total = "";
                for($n=1;$n<=$len;$n++){
                        $k = $n - 1;
                        $p = $k * 2000;
                        $b = $n * 2000;
                        $new = substr($c_content, $p, $b);
                        $new_content = changecontent("http://translate.google.com/translate_t?sl={$from}&tl={$to}&text={$new}");
                        $total .= $new_content;
                }
                mysql_query("UPDATE `wp_tdxxtc_comments` SET `comment_content` = '{$total}' WHERE `comment_ID` = '{$id}'");
                echo "#{$id} updated<br />";
                flush();
        }
}*/
mysql_close();
?>
