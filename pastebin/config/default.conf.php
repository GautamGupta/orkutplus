<?php
/**
* Site title
*/
$CONF['title']='PasteBin - By OrkutPlus!';

/**
* Email address feedback should be sent to
*/
$CONF['feedback_to']='<REDACTED>@gmail.com';

/**
* Apparent sender address for feedback email
*/
$CONF['feedback_sender']='orkutplus.net <no-reply@orkutplus.bet>';

/**
* database type - can be file or mysql
*/
$CONF['dbsystem']='file';

/**
* db credentials
*/

/**
 * format of urls to pastebin entries - %d is the placeholder for
 * the entry id.
 *
 * 1. for shortest possible url generation in conjuction with mod_rewrite:
 *    $CONF['url_format']='/%s';
 *
 * 2. if using pastebin with mod_rewrite, but within a subdir, you'd use
 *    something like this:
 *    $CONF['url_format']="/mysubdir/%s";
 *
 * 3. if not using mod_rewrite, you'll need something more like this:
 *    $CONF['url_format']="/pastebin.php?show=%s";
 */
$CONF['url_format']='/?show=%s';



/**
* default expiry time d (day) m (month) or f (forever)
*/
$CONF['default_expiry']='m';

/**
* this is the path to the script - you may want to
* to use / for even shorter urls if the main script
* is renamed to index.php
*/
$CONF['this_script']='/pastebin/';

/**
* what's the maximum number of posts we want to keep?
* Set this to 0 to have no limit on retained posts
*/
$CONF['max_posts']=0;

/**
* what's the highlight char?
*/
$CONF['highlight_prefix']='@@';

/**
* how many elements in the base domain name? This is used to determine
* what makes a "private" pastebin, i.e. for pastebin.com there are 2
* elements 'pastebin' and 'com' - for pastebin.mysite.com there 3. Got it?
* Good!
*/
$CONF['base_domain_elements']=2;


/**
* Google Adsense, clear this to remove ads.
*/
$CONF['google_ad_client']='pub-1123855832779971';

/**
* maintainer mode enables some code used to aid translation - unless you
* are involved in developing pastebin, leave this as false
*/
$CONF['maintainer_mode']=false;

/**
* default syntax highlighter
*/
$CONF['default_highlighter']='text';

/**
* available formats
*/
$CONF['all_syntax']=array(
	'text'=>'None',
	'actionscript'=>'ActionScript',
	'ada'=>'Ada',
	'apache'=>'Apache Log File',
	'applescript'=>'AppleScript',
	'asm'=>'ASM (NASM based)',
	'asp'=>'ASP',
	'bash'=>'Bash',
	'c'=>'C',
	'c_mac'=>'C for Macs',
	'caddcl'=>'CAD DCL',
	'cadlisp'=>'CAD Lisp',
	'cpp'=>'C++',
	'csharp'=>'C#',
	'cfm'=>'ColdFusion',
	'css'=>'CSS',
	'd'=>'D',
	'delphi'=>'Delphi',
	'diff'=>'Diff',
	'dos'=>'DOS',
	'eiffel'=>'Eiffel',
	'fortran'=>'Fortran',
	'freebasic'=>'FreeBasic',
	'gml'=>'Game Maker',
	'html4strict'=>'HTML',
	'ini'=>'INI file',
	'java'=>'Java',
	'javascript'=>'Javascript',
	'lisp'=>'Lisp',
	'lua'=>'Lua',
	'matlab'=>'MatLab',
	'mpasm'=>'MPASM',
	'mysql'=>'MySQL',
	'nsis'=>'NullSoft Installer',
	'objc'=>'Objective C',
	'ocaml'=>'OCaml',
	'oobas'=>'Openoffice.org BASIC',
	'oracle8'=>'Oracle 8',
	'pascal'=>'Pascal',
	'perl'=>'Perl',
	'php'=>'PHP',
	'python'=>'Python',
	'qbasic'=>'QBasic/QuickBASIC',
	'robots'=>'Robots',
	'ruby'=>'Ruby',
	'scheme'=>'Scheme',
	'smarty'=>'Smarty',
	'sql'=>'SQL',
	'tcl'=>'TCL',
	'vb'=>'VisualBasic',
	'vbnet'=>'VB.NET',
	'visualfoxpro'=>'VisualFoxPro',
	'xml'=>'XML',

);

/**
* popular formats, listed first
*/
$CONF['popular_syntax']=array(
	'text','bash', 'c', 'cpp', 'html4strict',
	'java','javascript','php','perl', 'python', 'ruby', 'lua');

?>
