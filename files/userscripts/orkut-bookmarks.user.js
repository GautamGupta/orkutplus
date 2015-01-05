// ==UserScript==
// @name           Orkut Bookmarks 
// @namespace      http://www.orkutplus.net
// @description    Adds Bookmarks Option to Manage and Track Your Favorite Orkut Communities and Community Topics.
// @include        http://*.orkut.*
// @exclude        http://*.orkut.*/Edit*
// ==/UserScript==

/*
 * @author Some Brazilian Orkut Great
 * @via http://www.orkutplus.net
 */

// -------------------------------------Options-------------------------------------
// Change these values to customize linkified link appearances:

var customizeLinks = false; // true = customization on; false = off (default)
var linkBackground = "transparent"; // "#xxxxxx" "#xxx" "colorname" "transparent"
var linkBorder = "1px #00ff00 dotted"; // ex: "1px #00ff00 dotted"
var linkColor = "#ff0000"; // "#xxxxxx" "#xxx" (rgb hex) "colorname"
var linkDecoration = "none"; // "none" "blink" "line-through" "overline" "underline"
var linkExtras = ""; // ex: "font-size: 16px !important;" add extra css properties

// Enable or disable and customize "link after text" support
var linkAfterText = false; // true = feature on; false = off (default)
var beforeLink = "(" // text inserted before link -- "link: " "(" "[link]"
var afterLink = ")" // text inserted after link -- "" ")" "[/link]"

// Enable or disable Pagerization compatibility
var pagerization = false; // true = compatibility on; false = off (default)

// ---------------------------------------------------------------------------------


var nodesWithUris = new Array();
var uriRe = /\b((?:(?:https?|ftp|telnet|ldap|irc|nntp|news|irc|ed2k):\/\/[\w\-.+$!*\/(),~%?:@#&=\\]*)(?:[\w\-+$\/~%?@&=\\]|\b)|(?:about:[.\w?=%-&]{4,30})\b|(?:mailto:)?(?:[.\w-]+@)(?!irc:|ftp:|www\.)(?:[.\w-]+\.[\w-]+)\b)/gi;

function fixLinks()
{
	var replacements, regex, key, textnodes, node, s; 

	replacements = { 
		"\\b(?:h..p|ttp):\\/\\/([\\w-.+$!*\\/(),~%?@&=\\\\])": "http://$1",
		"(#[\\w-]+@)?\\b([.\\w-]+(?::[.\\w-]+)?@)?(ftp|irc)\\.": "$1$3://$2$3.",
		"(\\s[^\\w]?)([\\w-.+$!*\\/(),~%?@&=\\\\]+\\.[A-Za-z]{2,4}\\/|[\\w-.+$!*\\/(),~%?@&=\\\\]*www\\.|(?:(?:[^(mailto)][.\\w-]+:)?[.\\w-]+@)?(?:(?:[0-1]?[\\d]{1,2}|2[0-4][\\d]|25[0-5])(?:\\.(?:[0-1]?[\\d]{1,2}|2[0-4][\\d]|25[0-5])){3})\\/|[^(mailto)][.\\w-]+:[.\\w-]+@)": "$1http://$2"
	};
	regex = {}; 
	for (key in replacements)
	{ 
		regex[key] = new RegExp(key, 'gi');
	}
	textnodes = document.evaluate( "//body//text()", document, null, XPathResult.UNORDERED_NODE_SNAPSHOT_TYPE, null); 

	for (var i = 0; i < textnodes.snapshotLength; i++)
	{ 
	    node = textnodes.snapshotItem(i); 
		if (!node.parentNode.tagName.match(/^(a|head|object|embed|script|style|frameset|frame|iframe|textarea|input|button|select|option)$/i))
		{
			s = node.data;
			for (key in replacements) { 
				s = s.replace(regex[key], replacements[key]); 
			} 
			node.data = s; 
		}
	}
}

function makeLinks(baseNode)
{
	getNodesWithUris(baseNode);

	for (var i in nodesWithUris)
	{
		var nodes = new Array(nodesWithUris[i]);	// We're going to add more nodes as we find/make them
		while (nodes.length > 0)
		{
			var node = nodes.shift();
			var uriMatches = node.nodeValue.match(uriRe);	// array of matches
			if (uriMatches == null) continue;
			var firstMatch = uriMatches[0].toLowerCase();
			var pos = node.nodeValue.toLowerCase().indexOf(firstMatch);

			if (pos == -1) continue;	// shouldn't happen, but you should always have safe regex
			else if (pos == 0)	// if starts with URI
			{
				if (node.nodeValue.length > firstMatch.length)
				{
					node.splitText(firstMatch.length);
					nodes.push(node.nextSibling);
				}

				var linky = document.createElement("a");
				linky.className = "superLinkifier";

				linky.href = (node.nodeValue.indexOf(":") == -1 ? "mailto:" : "") + node.nodeValue.replace(/\.*$/, "");
				if (!linkAfterText)
				{
					node.parentNode.insertBefore(linky, node);
					linky.appendChild(node);
				}
				if (linkAfterText)
				{
					var beforeText = document.createTextNode(" " + beforeLink);
					var nodeText = document.createTextNode(node.nodeValue);
					var afterText = document.createTextNode(afterLink);
					node.parentNode.insertBefore(afterText, node.nextSibling);
					node.parentNode.insertBefore(linky, node.nextSibling);
					linky.appendChild(nodeText);
					node.parentNode.insertBefore(beforeText, node.nextSibling);
				}
			}
			else	// if URI is in the text, but not at the beginning
			{
				node.splitText(pos);
				nodes.unshift(node.nextSibling);
			}
		}
	}
}

function getNodesWithUris(node)
{
	if (node.nodeType == 3)
	{
		if (node.nodeValue.search(uriRe) != -1)
			nodesWithUris.push(node);
	}
	else if (node && node.nodeType == 1 && node.hasChildNodes() && !node.tagName.match(/^(a|head|object|embed|script|style|frameset|frame|iframe|textarea|input|button|select|option)$/i))
		for (var i in node.childNodes)
			getNodesWithUris(node.childNodes[i]);
}

function styleLinks()
{
	var css = "a.superLinkifier { background-color: " + linkBackground + " !important; border: " + linkBorder + " !important; color: " + linkColor + " !important; text-decoration: " + linkDecoration + " !imporant; " + linkExtras + " }";
	if (typeof GM_addStyle != "undefined") 
	{
		GM_addStyle(css);
	} 
	else if (typeof addStyle != "undefined") 
	{
		addStyle(css);
	} 
	else 
	{
		var styleSheet = document.createElement('style');
		styleSheet.type = "text/css";
		styleSheet.innerHTML = css;
		styleSheet = document.getElementsByTagName('head')[0].appendChild(styleSheet);
	}
}

function main()
{
	fixLinks();
	makeLinks(document.documentElement);
	if (customizeLinks) styleLinks();
}

main();

// Compatibility with Pagerization
if (pagerization) addFilter(function () {main();});

function addFilter(func, i) {
	i = i || 4;
	if (window.AutoPagerize && window.AutoPagerize.addFilter) {
		window.AutoPagerize.addFilter(func);
	}
	else if (i > 1) {
		setTimeout(arguments.callee, 1000, func, i - 1);
	}
	else {
		(function () {
			func(document);
			setTimeout(arguments.callee, 200);
		})();
	}
}
///////////////////////////////////////////////
////////////////////New-Code/////////////////
//////////////////////////////////////////////

    
/******************************************************
                Orkut Bookmarks Module
 ******************************************************/

/** Reset Bookmarks **/
/**
GM_setValue("BookmarkCommunities", "");
GM_setValue("BookmarkTopics", "");
/**/
if (!GM_getValue("BookmarkCommunities"))
    GM_setValue("BookmarkCommunities", "");
if (!GM_getValue("BookmarkTopics"))
    GM_setValue("BookmarkTopics", "");
 
// #region SYSTEM VARS
// Cmm
var bookmarks = new Array();
var bookmarksDesc = new Array();

// Topics
var bookmarksTopics = new Array();
var bookmarksTopicsName = new Array();
var bookmarksTopicsId = new Array();
var bookmarksTopicsDesc = new Array();
// #endregion

// #region IMAGES
var imgBookmarkOn = "http://img352.imageshack.us/img352/5624/bookmarkkp9.png";
var imgBookmarkOff = "http://img146.imageshack.us/img146/7938/bookmarkoffyx6.png";
// #endregion

// #region TABS
var tabContainer = getXPATH('//*[@id="divBody0"]');
var tabLast = getXPATH('//*[@id="subPage2"]');
// #endregion

// #region Cmms
var cmmPath = '/html/body/div[8]/div[4]/table[2]/tbody/tr/td/div[2]/div[4]/table/tbody/tr[$]/td/a';
var cmm;
// #endregion

// #region Topics
// start 2, inc 1
var topicPath = '/html/body/div[8]/div[4]/table[3]/tbody/tr[2]/td/form/table/tbody/tr[$]/td[2]/a';
var topicListPath = '/html/body/div[8]/div[3]/table/tbody/tr[2]/td/form/table/tbody/tr[$]/td[2]/a';
var topic;
// #endregion
// #endregion

var newIcon = "<img alt='[!]' src='http://img48.imageshack.us/img48/2505/newzo0.gif' onclick=\"window.location.href=(this.parentNode.href + '&na=2#footer'); return false;\" />";
/// <summary>
/// User configuration
/// </summary>
// UserConfig
var _refreshDelay = 10;
// UserConfig End

AddBookmarkCmm("25675519", "Orkut Plus!");
AddBookmarkTopic("25675519", "Orkut Plus!", "5249189027809069222", "Orkut Help and Support");



/// <summary>
/// User configuration END
/// </summary>

 
var urlcmmList = "Communities.aspx";
var urlcmmCmm = "Community.aspx";

function getXPATH(path)
{
    return document.evaluate(
        path,
        document,
        null,
        XPathResult.FIRST_ORDERED_NODE_TYPE,
        null
    ).singleNodeValue;
}

function GetCmmName()
{
    var name = getXPATH("/html/body/div[8]/div[3]/table/tbody/tr[2]/td/div[2]/p/a/b");
    if (!name)
        name = getXPATH("/html/body/div[8]/div[2]/table/tbody/tr[2]/td/div[2]/p/a/b");
    return name.innerHTML;
}

// #region BOOKMARK

var bkCmmHolder = "BookmarkCommunities";

/// <summary>
/// Add a bookmark for communities
/// </summary>
/// <param name="id">CmmId</param>
/// <param name="name">CmmName</param>
/// <param name="removeIfExists">Remove if exists</param>
/// <return>removed</return>
function AddBookmarkCmm(id, name, removeIfExists)
{
    var current = GM_getValue("BookmarkCommunities");
    if (current != "") current += "|";
    if (!IsCmmBookmark(id, name))
        GM_setValue("BookmarkCommunities", current + name + "=" + id);
    else
    {
        if (removeIfExists)
        {
            RemoveBookmarkCmm(id, name);
            return true;
        }
    }
    return false;
}

function RemoveBookmarkCmm(id, name)
{
    var current = GM_getValue("BookmarkCommunities");
    if (current.indexOf(name + "=" + id) != -1)
    {
        GM_setValue("BookmarkCommunities", current.replace(name + "=" + id, "").replace("||", "").replace(/\|$/, "").replace(/^\|/, ""));
    }
}

function IsCmmBookmark(id, name)
{
    return (GM_getValue("BookmarkCommunities").indexOf(name + "=" + id) == -1) ? false : true;
}

function BuildTabCmmRowEventListener(tabId)
{
    if (!tabId) tabId = "subPage0";
    var tb = document.getElementById(tabId).getElementsByTagName("table")[0];
    var trs = tb.getElementsByTagName("tr");
    for (var tr in trs)
    {
        if (tr == 0) continue;
        img = trs[tr].cells[0].getElementsByTagName("img")[0];
        if (!img) continue;
        if (img.id.indexOf("HASEVT") != -1) continue;
        img.id = "cmmbkHASEVT" + tr;
        img.addEventListener(
            "click",
            function ()
            {
                var id = this.nextSibling.href.match(/\?cmm=(\d+)/i)[1];
                var name = this.nextSibling.innerHTML.replace(/<.*>\s*/g, "");
                
                var b = AddBookmarkCmm(id, name, true);

                if (b)
                    this.src = this.src.replace(imgBookmarkOn, imgBookmarkOff);
                else
                    this.src = this.src.replace(imgBookmarkOff, imgBookmarkOn);
            },
            false);
    }
}

function SetEventListenerCmm(img)
{
    img.addEventListener(
        "click",
        function ()
        {
            var id = this.nextSibling.href.match(/\?cmm=(\d+)/i)[1];
            var name = this.nextSibling.innerHTML.replace(/<[^>]+>\s*/g, "");

            var b = AddBookmarkCmm(id, name, true);
            
            if (b)
                this.src = this.src.replace(imgBookmarkOn, imgBookmarkOff);
            else
                this.src = this.src.replace(imgBookmarkOff, imgBookmarkOn);
        },
        false);
}

var bkCmmHolder = "BookmarkTopics";

/// <summary>
/// Add a bookmark for topics
/// </summary>
/// <param name="id">CmmId</param>
/// <param name="name">CmmName</param>
/// <param name="description">topic name</param>
function AddBookmarkTopic(id, name, tid, description, removeIfExists)
{
    var current = GM_getValue("BookmarkTopics");
    if (current != "") current += "|";
    if (!IsTopicBookmark(id, name, tid, description))
        GM_setValue("BookmarkTopics", current + id + "#obt#" + tid + "=" + name + "#obt#" + description);
    else
    {
        if (removeIfExists)
        {
            RemoveBookmarkTopic(id, name, tid, description);
            return true;
        }
    }
    return false;
}

function RemoveBookmarkTopic(id, name, tid, description)
{
    var current = GM_getValue("BookmarkTopics");
    if (current.indexOf(id + "#obt#" + tid + "=" + name + "#obt#" + description) != -1)
    {
        GM_setValue("BookmarkTopics", current.replace(id + "#obt#" + tid + "=" + name + "#obt#" + description, "").replace("||", "").replace(/\|$/, "").replace(/^\|/, ""));
    }
}

function IsTopicBookmark(id, name, tid, description)
{
    return (GM_getValue("BookmarkTopics").indexOf(id + "#obt#" + tid + "=" + name + "#obt#" + description) == -1) ? false : true;
}

function BuildTopicMainRowEventListener(table)
{
    var trs = table.getElementsByTagName("tr");
    for (var tr in trs)
    {
        if (tr == 0) continue;
        img = trs[tr].cells[1].getElementsByTagName("img")[0];
        if (!img) continue;
        if (img.id.indexOf("HASEVT") != -1) continue;
        img.id = "topicbkHASEVT" + tr;
        img.addEventListener(
            "click",
            function ()
            {
                var id = this.nextSibling.href.match(/\?cmm=(\d+)/i)[1];
                var tid = this.nextSibling.href.match(/\&tid=(\d+)/i)[1];
                var name = this.nextSibling.innerHTML.replace(/<.*>\s*/g, "");
                var cmmName = GetCmmName();
                
                var b = AddBookmarkTopic(id, cmmName, tid, name, true);

                if (b)
                    this.src = this.src.replace(imgBookmarkOn, imgBookmarkOff);
                else
                    this.src = this.src.replace(imgBookmarkOff, imgBookmarkOn);
            },
            false);
    }
}

function BuildTabTopicRowEventListener(tabId)
{
    if (!tabId) tabId = "subPage4";
    if (!document.getElementById(tabId)) return;
    var tb = document.getElementById(tabId).getElementsByTagName("table")[0];
    var trs = tb.getElementsByTagName("tr");
    var cmmNameI = "";
    for (var tr in trs)
    {
        if (trs[tr].firstChild.tagName == "TH")
        {
            cmmNameI = trs[tr];
        }
        img = trs[tr].cells[0].getElementsByTagName("img")[0];
        if (!img) continue;
        if (img.id.indexOf("HASEVT") != -1) continue;
        img.id = "topicbkHASEVT" + tr;
        img.addEventListener(
            "click",
            function ()
            {
                var id = this.nextSibling.href.match(/\?cmm=(\d+)/i)[1];
                var tid = this.nextSibling.href.match(/\&tid=(\d+)/i)[1];
                var name = this.nextSibling.innerHTML.replace(/<.*>\s*/g, "");
                var cNode = this.parentNode.parentNode;
                while ((cNode = cNode.previousSibling) && cNode.firstChild.tagName != "TH") continue;
                var cmmName = cNode.firstChild.innerHTML;
                
                var b = AddBookmarkTopic(id, cmmName, tid, name, true);

                if (b)
                    this.src = this.src.replace(imgBookmarkOn, imgBookmarkOff);
                else
                    this.src = this.src.replace(imgBookmarkOff, imgBookmarkOn);
            },
            false);
    }
}

function SetEventListenerTopic(img)
{
    img.addEventListener(
        "click",
        function ()
        {
            var id = this.nextSibling.href.match(/\?cmm=(\d+)/i)[1];
            var tid = this.nextSibling.href.match(/\&tid=(\d+)/i)[1];
            var name = this.nextSibling.innerHTML.replace(/<[^>]+>\s*/g, "");
            var cmmName = GetCmmName();
            
            var b = AddBookmarkTopic(id, cmmName, tid, name, true);

            if (b)
                this.src = this.src.replace(imgBookmarkOn, imgBookmarkOff);
            else
                this.src = this.src.replace(imgBookmarkOff, imgBookmarkOn);
        },
        false);
}



function BuildLink(count, imgBookmark, textEl, addText, InsertLastLink)
{
    var i = count;
    addText = addText || "";

    var img = document.createElement("img");
    img.alt = "*";
    img.src = imgBookmark;
    img.id = "cmmbk" + i;
    
    img.style.cursor = "pointer";
    img.style.width = "16px";
    img.style.height= "16px";
    img.style.paddingRight = "5px";
    img.style.verticalAlign = "middle";
    
    textEl.parentNode.insertBefore(img, textEl);

    textEl.innerHTML = addText + textEl.innerHTML;
    
    if (InsertLastLink)
    {
        var LastPage = document.createElement("a");
        LastPage.href = textEl.href + "&na=2#footer";
        LastPage.innerHTML = "&nbsp;<small>(last)</small>";
        textEl.parentNode.insertBefore(LastPage, textEl.nextSibling);
    }
}

/// <summary>
/// Load all bookmarks
/// </summary>
function LoadBookmarks()
{
    var bks = GM_getValue("BookmarkCommunities").split("|");
    var _iBCmm = 0;

    bookmarks = new Array();
    bookmarksDesc = new Array();
    
    for (var bk in bks)
    {
        bookmarks[_iBCmm] = bks[bk].split("=")[1];
        bookmarksDesc[_iBCmm] = bks[bk].split("=")[0];
        ++_iBCmm;
    }
    
    var bkst = GM_getValue("BookmarkTopics").split("|");
    var _iBTopic = 0;

    for (var bk in bkst)
    {
        bookmarksTopics[_iBTopic] = bkst[bk].split("=")[0].split("#obt#")[0];
        bookmarksTopicsId[_iBTopic] = bkst[bk].split("=")[0].split("#obt#")[1];
        bookmarksTopicsName[_iBTopic] = bkst[bk].split("=")[1].split("#obt#")[0];
        bookmarksTopicsDesc[_iBTopic] = bkst[bk].split("=")[1].split("#obt#")[1];
        ++_iBTopic;
    }
}

/// <summary>
/// Build bookmark settings in the main list
/// </summary>
function UpdateBookmarkCmmList()
{
    var i = 1;
    while ((cmm = getXPATH(cmmPath.replace("$", i))))
    {
        var imgBookmark = (bookmarks.indexOf((cmm.href.split("cmm="))[1]) != -1) ? imgBookmarkOn : imgBookmarkOff;
        var isBookmark = imgBookmark.indexOf(imgBookmarkOn) != -1 ? 1 : 0

        BuildLink(i, imgBookmark, cmm);

        BuildTabCmmRowEventListener();

        ++i;
    }
}

/// <summary>
/// Build bookmark settings in the main list
/// </summary>
function UpdateBookmarkTopicList()
{
    // Front Page Topic List
    var i = 2;
    while ((topic = getXPATH(topicPath.replace("$", i))))
    {
        var tid = (topic.href.match(/&tid=(\d+)/i))[1];
        var imgBookmark = (bookmarksTopicsId.indexOf(tid) != -1) ? imgBookmarkOn : imgBookmarkOff;
        var isBookmark = imgBookmark.indexOf(imgBookmarkOn) != -1 ? 1 : 0

        BuildLink(i, imgBookmark, topic, null, true);
        
        SetEventListenerTopic(topic.previousSibling);
        
        ++i;
    }

    // Global Page Topic List
    i = 1;
    while ((topic = getXPATH(topicListPath.replace("$", i))))
    {
        var tid = (topic.href.match(/&tid=(\d+)/i))[1];
        var imgBookmark = (bookmarksTopicsId.indexOf(tid) != -1) ? imgBookmarkOn : imgBookmarkOff;
        var isBookmark = imgBookmark.indexOf(imgBookmarkOn) != -1 ? 1 : 0
        
        BuildLink(i, imgBookmark, topic, null, true);
        
        SetEventListenerTopic(topic.previousSibling);
        
        ++i;
    }
}

/// <summary>
/// Add button tab to bookmarks
/// </summary>
function CreateTabButtonBookmarks()
{
    var bf = getXPATH('/html/body/div[8]/div[4]/table[2]/tbody/tr/td/div[2]/div[2]');
    var tab;
    
    tab = document.createElement("span");
    tab.innerHTML = ", <a href='javascript:void(0)' onclick='_displaySubPage(3)'>Bookmarks</a>";
    tabContainer.insertBefore(tab, bf);
    
    tab = document.createElement("span");
    tab.innerHTML = ", <a href='javascript:void(0)' onclick='_displaySubPage(4)'>Topics</a>";
    tabContainer.insertBefore(tab, bf);
}

/// <summary>
/// Create the list of the cmm bookmarks
/// </summary>
function CreateTabBookmarksCmm()
{
    var subPage = document.createElement("div");
    subPage.id = "subPage3";
    subPage.style.display = "none";

    var cssRow = new Array("listlight", "listdark");
    
    var inner = "";
    inner = 
        '<table cellspacing="0" class="displaytable">' +
            '<thead>' +
                '<tr>' +
                    '<th width="55%">Bookmarks</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>';

    for (i = 0; i < bookmarks.length; ++i)
    {
        var srow = i % 2;
        inner += '<tr class="' + cssRow[srow] + '">' +
            '<td style="overflow: hidden;">' +
            '<img alt="*" src="' + imgBookmarkOn + '" style="cursor: pointer; width: 16px; height: 16px; vertical-align: middle; padding-right: 5px" />' +
            '<a href="/Community.aspx?cmm=' + bookmarks[i] + '">' +
                bookmarksDesc[i] +
            '</a>' +
            '</td>' +
            '</tr>';
    }

    inner += '</tbody></table>';
    subPage.innerHTML = inner;
    
    tabContainer.appendChild(subPage);
}

/// <summary>
/// Create the list of the topics bookmarks
/// </summary>
function CreateTabBookmarksTopics()
{
    var subPage = document.createElement("div");
    subPage.id = "subPage4";
    subPage.style.display = "none";


    var inner = '<table cellspacing="0" class="displaytable">' + '<tbody>';
    inner += DoTopicBookmark();
    inner += '</tbody></table>';
    
    subPage.innerHTML = inner;
    
    tabContainer.appendChild(subPage);
}

function DoTopicBookmark()
{
    var cssRow = new Array("listlight", "listdark");
    
    var inner = "";

    var block = null;
    for (i = 0; i < bookmarksTopics.length; ++i)
    {
        var srow = i % 2;
        if (block == bookmarksTopics[i])
        {
            if (bookmarksTopicsId[i] != 0)
            {
                inner += '<tr class="' + cssRow[srow] + '">' +
                    '<td style="overflow: hidden;">' +
                    '<img alt="*" src="' + imgBookmarkOn + '" style="cursor: pointer; width: 16px; height: 16px; vertical-align: middle; padding-right: 5px" />' +
                    '<a href="/CommMsgs.aspx?cmm=' + bookmarksTopics[i] + '&tid=' + bookmarksTopicsId[i] + '">' +
                        bookmarksTopicsDesc[i] +
                    '</a>' +
                    '</td>' +
                    '</tr>';
            }
            else
            {
                inner += '<tr class="' + cssRow[srow] + '"><td style="overflow: hidden; font-weight: bold">' + bookmarksTopicsDesc[i] + '</td></tr>';
            }
        }
        else
        {
            inner += "<tr><th style='font-size: 18px'>" + bookmarksTopicsName[i] + "</th></tr>";
            block = bookmarksTopics[i];
            --i;
        }
    }

    return inner;
}

/// <summary>
/// Group Sort Topic Array
/// </summary>
function GroupSortTopics()
{
    var auxbookmarksTopics = new Array();
    var auxbookmarksTopicsName = new Array();
    var auxbookmarksTopicsId = new Array();
    var auxbookmarksTopicsDesc = new Array();

    var it;
    var i, j, x = -1, z = 0;
    
    for (i = 0; i < bookmarksTopics.length; ++i)
    {
        if (auxbookmarksTopics.indexOf(bookmarksTopics[i]) != -1) continue;
        ++x;
        auxbookmarksTopics[x] = bookmarksTopics[i];
        auxbookmarksTopicsName[x] = bookmarksTopicsName[i];
        auxbookmarksTopicsId[x] = bookmarksTopicsId[i];
        auxbookmarksTopicsDesc[x] = bookmarksTopicsDesc[i];
        z = x;
        for (j = 0; j < bookmarksTopics.length; ++j)
        {
            if (i == j) continue;
            if (auxbookmarksTopics[z] == bookmarksTopics[j])
            {
                ++x;
                auxbookmarksTopics[x] = bookmarksTopics[j];
                auxbookmarksTopicsName[x] = bookmarksTopicsName[j];
                auxbookmarksTopicsId[x] = bookmarksTopicsId[j];
                auxbookmarksTopicsDesc[x] = bookmarksTopicsDesc[j];
            }
        }
    }
    bookmarksTopics = auxbookmarksTopics;
    bookmarksTopicsName = auxbookmarksTopicsName;
    bookmarksTopicsId = auxbookmarksTopicsId;
    bookmarksTopicsDesc = auxbookmarksTopicsDesc;
}

LoadBookmarks();
GroupSortTopics();
if (window.location.href.indexOf(urlcmmList) != -1)
{
    UpdateBookmarkCmmList();
    CreateTabBookmarksCmm();
    
    CreateTabBookmarksTopics();
    BuildTabTopicRowEventListener();
    
    CreateTabButtonBookmarks();
    BuildTabCmmRowEventListener("subPage3");
    
    /** AJax Update List **/
    
    function DoCommunityMainListBookmark(table, oldtable)
    {
        LoadBookmarks();
        var i = 2;
        var trs = table.getElementsByTagName("tr");
        for (var tr in trs)
        {
            if (tr == 0) continue;
            var cmm = trs[tr].cells[0].getElementsByTagName("a")[0];
            var posts = trs[tr].cells[1].innerHTML;
            var cmmId = (cmm.href.match(/\?cmm=(\d+)/i))[1];
            
            
            var changed = false;
            
            // check for updates
            var oldtrs = oldtable.getElementsByTagName("tr");
            
            for (var oldtr in oldtrs)
            {
                if (oldtr == 0) continue;
                
                var oldCmm = oldtrs[oldtr].cells[0].getElementsByTagName("a")[0];
                var oldPosts = oldtrs[oldtr].cells[1].innerHTML;
                var oldCmmId = oldCmm.href.match(/\?cmm=(\d+)/i)[1];

                
                if ((oldtrs[oldtr].cells[0].innerHTML.indexOf("[!]") != -1 && cmmId == oldCmmId) ||
                    (cmmId == oldCmmId && posts != oldPosts))
                {
                    changed = true;
                    break;
                }
            }
            
            var imgBookmark = (bookmarks.indexOf((cmm.href.split("cmm="))[1]) != -1) ? imgBookmarkOn : imgBookmarkOff;
            var isBookmark = imgBookmark.indexOf(imgBookmarkOn) != -1 ? 1 : 0
            
            var i = tr;
            
            var changedAlert = "";
            if (changed)
                changedAlert = newIcon;

            BuildLink(i, imgBookmark, cmm, changedAlert);

            ++i;
        }
        
    }
    
    function UpdateCommunitiesList()
    {
        var CurrentUrl = window.location.href.match(/^(http:\/\/[^/]+)/)[0];
        var Url = CurrentUrl + "/Communities.aspx?cache=" + (new Date().getTime());
        GM_xmlhttpRequest({
            method: 'GET',
            url: Url,
            onload: UpdateCommunitiesResponse
        });
    }

    function UpdateCommunitiesResponse(response)
    {
        var txt = response.responseText;
        var oldTable = document.getElementById("subPage0").getElementsByTagName("table")[0];
        var newTable = document.createElement("div");
        newTable.innerHTML = txt;
        var divs = newTable.getElementsByTagName("div");
        for (var d in divs)
        {
            if (divs[d].id == "subPage0")
            {
                newTable = divs[d];
                break;
            }
        }
        newTable = newTable.getElementsByTagName("table")[0];
        
        DoCommunityMainListBookmark(newTable, oldTable);
        
        oldTable.innerHTML = newTable.innerHTML;
        
        BuildTabCmmRowEventListener();
    }
    
    setInterval(UpdateCommunitiesList, 1000 * _refreshDelay);
}
else
{
    UpdateBookmarkTopicList();
    
    if (window.location.href.match(/\/Comm.+\.aspx/i))
    {
        // Cmm name star icon
        
        var cmmMain = getXPATH('/html/body/div[8]/div[3]/table/tbody/tr[2]/td/div[2]/p/a');
        if (cmmMain == null)
            cmmMain = getXPATH('/html/body/div[8]/div[2]/table/tbody/tr[2]/td/div[2]/p/a');

        var cmmId   = CommunityId;
        
        var isBookmark = (bookmarks.indexOf(cmmId) != -1) ? 1 : 0;
        var imgBookmark = isBookmark ? imgBookmarkOn : imgBookmarkOff;

        BuildLink(1, imgBookmark, cmmMain);
        SetEventListenerCmm(cmmMain.previousSibling);
    }
    
    /** AJax Update List **/
    
    function DoTopicMainListBookmark(table, oldtable)
    {
        LoadBookmarks();
        var i = 2;
        var trs = table.getElementsByTagName("tr");
        for (var tr in trs)
        {
            if (tr == 0) continue;
            var topic = trs[tr].cells[1].getElementsByTagName("a")[0];
            var posts = parseInt(trs[tr].cells[2].innerHTML.replace(/\.|,/g, ""));
            var tid = (topic.href.match(/&tid=(\d+)/i))[1];
            
            var changed = false;
            
            // check for updates
            var oldtrs = oldtable.getElementsByTagName("tr");
            
            var oldTids = new Array(); var oldTidsI = 0;
            for (var oldtr in oldtrs)
            {
                if (oldtr == 0) continue;
                
                var oldTopic = oldtrs[oldtr].cells[1].getElementsByTagName("a")[0];
                var oldPosts = parseInt(oldtrs[oldtr].cells[2].innerHTML.replace(/\.|,/g, ""));
                var oldTid = oldTopic.href.match(/&tid=(\d+)/i)[1];
                oldTids[oldTidsI] = oldTid; ++oldTidsI;
                
                if ((oldtrs[oldtr].cells[1].innerHTML.indexOf("[!]") != -1 && tid == oldTid) ||
                    (tid == oldTid && posts > oldPosts))
                {
                    changed = true;
                    break;
                }
            }
            
            if (oldTids.indexOf(tid) == -1) changed = true;
            
            var imgBookmark = (bookmarksTopicsId.indexOf(tid) != -1) ? imgBookmarkOn : imgBookmarkOff;
            var isBookmark = imgBookmark.indexOf(imgBookmarkOn) != -1 ? 1 : 0
            
            var i = tr;

            var changedAlert = "";
            if (changed)
                changedAlert = newIcon;
            
            BuildLink(i, imgBookmark, topic, changedAlert, true);
            
            ++i;
        }
    }
    
    function GetPanelContainer(root)
    {
        root = root || document;
        var frms = root.getElementsByTagName("form");
        var i;
        
        for (var frm in frms)
        {
            if (frms[frm].name == "topicsForm")
                return frms[frm];
        }
        
        return null;
    }

    function UpdateTopicList()
    {
        var CurrentUrl = window.location.href;
        var Url = CurrentUrl + "?cache=" + (new Date().getTime());
        GM_xmlhttpRequest({
            method: 'GET',
            url: Url,
            onload: UpdateTopicResponse
        });
    }

    function UpdateTopicResponse(response)
    {
    	var txt = response.responseText;
        var oldTable = GetPanelContainer();
        if (!oldTable) return;
        var newTable = document.createElement("div");
        try
        {
            newTable.innerHTML = txt;
            newTable.innerHTML = GetPanelContainer(newTable).innerHTML;
        } catch (Ex) { }
        
        DoTopicMainListBookmark(newTable.getElementsByTagName("table")[0], oldTable.getElementsByTagName("table")[0]);
        
        oldTable.innerHTML = newTable.innerHTML;
        
        BuildTopicMainRowEventListener(oldTable);
    }

    if (window.location.href.indexOf(urlcmmCmm) != -1)
        setInterval(UpdateTopicList, 1000 * _refreshDelay);

}

/******************************************************
                Orkut Chat Module
 ******************************************************/

var ChatMaxHeight = 700;
 
// #region ATTRIBUTES
var Module;

// Chat configuration
const CHATADD = 0;
const CHATREMOVE = 1;
var ChatMessage = new Array();
ChatMessage[CHATADD] = "Add Chat";
ChatMessage[CHATREMOVE] = "Remove Chat";

// Drag & Drop
var IsDrag = false;
var DragX = 0;
var DragY = 0;
var DragCurrentX;
var DragCurrentY;
// #endregion

// #region METHODS
/// <summary>
/// Start Attributes
/// </summary>
function InitializeComponents()
{
    CommunityId = window.location.href.match(/\?cmm=(\d+)/i);
    if (!CommunityId) return;
    CommunityId = CommunityId[1];
    if (!GM_getValue(CommunityId))
        AddTopic("");
        
    Module = document.getElementById("lbox");
    if (!Module) return;
    Module = Module.firstChild;
}

function GetPageTopicId()
{
    return (window.location.href.match(/&tid=(\d+)/)[1]);
}

/// <summary>
/// Save topic to be the chat
/// </summary>
/// <param name="TId">Topic Id</param>
/// <param name="RemoveIfExists">Remove if exists</param>
/// <return>Exists</return>
function AddTopic(TId, RemoveIfExists)
{
    if (GetTopicId() == "")
        GM_setValue(CommunityId, TId);
    else
        if (RemoveIfExists) GM_setValue(CommunityId, "");
        
    return GetTopicId() != "" ? true : false;
}

/// <summary>
/// Remove topic from the chat
/// </summary>
function RemoveTopic()
{
    AddTopic("");
}

/// <summary>
/// Get the chat topic
/// </summary>
function GetTopicId()
{
    return GM_getValue(CommunityId) || "";
}

/// <summary>
/// Create a Orkut button
/// </summary>
function CreateOrkutButton(text)
{
    var Container = document.getElementById("mboxfull").getElementsByTagName("td")[0];
    
    var ButtonContainer = document.createElement("div");
    ButtonContainer.id = "ChatContainer" + CommunityId;
    ButtonContainer.style.cssFloat = "right";
    
    var ButtonPlaceHolder = document.createElement("span");
    ButtonPlaceHolder.className = "grabtn";
    
    var Button = document.createElement("a");
    Button.id = "ChatButton" + CommunityId;
    Button.innerHTML = text;


    Button.className = "btn";
    Button.href = "javascript:;";
    
    ButtonPlaceHolder.appendChild(Button);
    ButtonContainer.appendChild(ButtonPlaceHolder);
    
    var BorderRight = document.createElement("span");
    BorderRight.className = "btnboxr";
    var PixImg = document.createElement("img");
    PixImg.height = "1";
    PixImg.width = "5";
    PixImg.src = "http://img1.orkut.com/img/b.gif";
    PixImg.alt = "";
    
    BorderRight.appendChild(PixImg);
    
    ButtonContainer.appendChild(BorderRight);
    
    Container.insertBefore(ButtonContainer, Container.getElementsByTagName("H1")[0]);
}

/// <summary>
/// Create a button to add or remove topic from chat
/// </summary>
function CreateButtonAddTopic()
{
    if (window.location.href.indexOf("CommMsgs.aspx?") == -1) return;
    
    var x = GetTopicId() != "" ? CHATREMOVE : CHATADD;
    
    CreateOrkutButton(ChatMessage[x]);
    
    document.getElementById("ChatButton" + CommunityId).addEventListener(
        "click",
        function ()
        {
            var b = AddTopic(GetPageTopicId(), true);
            this.innerHTML = b ? ChatMessage[CHATREMOVE] : ChatMessage[CHATADD];
            window.location.reload();
        },
        false);
}

/// <summary>
/// Create chat box bellow community info at left
/// </summary>
function CreateChatBox()
{
    if (window.location.href.match(/Communities\.aspx$/i)) return;
    if (!GetTopicId().match(/^\d{1,}$/)) return;
    var ChatContainer = document.createElement("div");
    ChatContainer.id = "chat" + CommunityId;
    ChatContainer.style.cssFloat = "left";
    ChatContainer.style.width = "143px";
    ChatContainer.style.border = "1px Solid Black";
    ChatContainer.style.position = "absolute";
    ChatContainer.style.zIndex = 100;
    ChatContainer.style.height = (ChatMaxHeight * 1/3) + "px";
    ChatContainer.style.maxHeight = (ChatMaxHeight) + "px";
    ChatContainer.style.minWidth = "100px";
    ChatContainer.style.minHeight = "54px";
    
    var ChatHeader = document.createElement("div");
    ChatHeader.className = "listdark";
    ChatHeader.style.textAlign = "center";
    ChatHeader.style.cursor = "move";
    
    /** Drag n' Drop **/
    ChatHeader.addEventListener("mousedown",
        function (e)
        {
            IsDrag = true;
            DragX = e.pageX;
            DragY = e.pageY;
            DragCurrentX = this.parentNode.offsetLeft;
            DragCurrentY = this.parentNode.offsetTop;
        },
        false);
        
    ChatHeader.addEventListener("mouseup",
        function (e)
        {
            IsDrag = false;
        },
        false);
        
    ChatHeader.addEventListener("mousemove",
        function (e)
        {
            if (IsDrag)
            {
                var x, y;
                x = e.pageX - DragX + DragCurrentX;
                y = e.pageY - DragY + DragCurrentY;
                this.parentNode.style.left = x;
                this.parentNode.style.top = y;
            }
        },
        false);
    
    var ChatLink = document.createElement("a");
    ChatLink.href = "/CommMsgs.aspx?cmm=" + CommunityId + "&tid=" + GetTopicId() + "&na=2&cache=" + (new Date().getTime()) + "#footer";
    ChatLink.innerHTML = "<small>Chat</small>";
    
    var ChatQReply = document.createElement("a");
    ChatQReply.innerHTML = "<small>QReply</small>";
    ChatQReply.addEventListener(
        "click",
        ChatQuickReply
        ,
        false);
    
    var ChatExpand = document.createElement("a");
    ChatExpand.innerHTML = "<small><small>[+]</small></small>";
    ChatExpand.addEventListener(
        "click",
        function ()
        {
            if (parseInt(this.parentNode.parentNode.style.width) >= 700)
            {
                this.parentNode.parentNode.style.width = "143px";
                this.innerHTML = "<small><small>[+]</small></small>";
            }
            else
            {
                this.parentNode.parentNode.style.width = "700px";
                this.innerHTML = "<small><small>[-]</small></small>";
            }
        }
        ,
        false);
    
    ChatHeader.appendChild(ChatLink);
    ChatHeader.appendChild(document.createTextNode(" | "));
    ChatHeader.appendChild(ChatQReply);
    ChatHeader.appendChild(document.createTextNode(" | "));
    ChatHeader.appendChild(ChatExpand);
    
    var ChatContent = document.createElement("div");
    ChatContent.id = "ChatMessageContainer";
    ChatContent.className = "listlight";
    ChatContent.innerHTML = "Loading...";
    ChatContent.style.height = (((parseInt(ChatContainer.style.height) - 22) * 100) / (parseInt(ChatContainer.style.height))) + "%";
    ChatContent.style.maxHeight = (parseInt(ChatContainer.style.maxHeight) - 22) + "px";
    ChatContent.style.minWidth = "96px";
    ChatContent.style.minHeight = "30px";
    ChatContent.style.overflowY = "scroll";
    
    /** Resize **/
    ChatContent.addEventListener("mousedown",
        function (e)
        {
            if ((e.pageX - this.parentNode.offsetLeft) > (this.parentNode.offsetWidth - 25)) return;
            IsDrag = true;
            DragX = e.pageX;
            DragY = e.pageY;
            DragCurrentX = this.parentNode.offsetLeft;
            DragCurrentY = this.parentNode.offsetTop;
        },
        false);
        
    ChatContent.addEventListener("mouseup",
        function (e)
        {
            IsDrag = false;
        },
        false);
        
    ChatContent.addEventListener("mousemove",
        function (e)
        {
            if (IsDrag)
            {
                var x, y;
                x = e.pageX - DragCurrentX;
                y = e.pageY - DragCurrentY;
                this.style.height = (((parseInt(y) - 22) * 100) / (parseInt(y))) + "%";
                this.parentNode.style.width = x;
                this.parentNode.style.height = y;
            }
        },
        false);
    
    ChatContainer.appendChild(ChatHeader);
    ChatContainer.appendChild(ChatContent);
    
    Module.parentNode.appendChild(ChatContainer);
    
    RequestUpdate();
    StartUpdater();
}

/// <summary>
/// Start Updater
/// </summary>
var _UpdateChat;
function StartUpdater()
{
    _UpdateChat = setInterval(RequestUpdate, 1000 * 15);
}
/// <summary>
/// Call ajax to update messages
/// </summary>
function RequestUpdate()
{
    var TId = GetTopicId();
    var CurrentUrl = window.location.href.match(/^(http:\/\/[^/]+)/)[0];
    var Url = CurrentUrl + "/CommMsgs.aspx?cmm=" + CommunityId + "&tid=" + TId + "&na=2&cache=" + (new Date().getTime());

    GM_xmlhttpRequest({
		method: 'GET',
		url: Url,
		onload: ReceiveMessages,
        onerror: ReceiveMessagesError
	});
}

function ReceiveMessagesError(Response)
{
    GM_log(Response.responseText);
}

/// <summary>
/// Ajax update handler
/// </summary>
function ReceiveMessages(Response)
{
    var Page = Response.responseText;
    var TemporaryContainer = document.createElement("div");
    TemporaryContainer.innerHTML = Page;
    var Elements = TemporaryContainer.getElementsByTagName("div");
    var El;
    for (var Element in Elements)
    {
        if (Elements[Element].id == "mboxfull")
        {
            El = Elements[Element];
            break;
        }
    }
    if (!El) return;
    Elements= El.getElementsByTagName("div");
    
    var Users = new Array();
    var Msgs = new Array();
    for (var Element in Elements)

    {
        if (Elements[Element].className == "listitem")

        {
            Users.push(Elements[Element].getElementsByTagName("H3")[0].innerHTML);
            Msgs.push(Elements[Element].getElementsByTagName("DIV")[1].innerHTML);
        }
    }
    
    var ChatMessageContainer = document.getElementById("ChatMessageContainer");
    ChatMessageContainer.innerHTML = "";
    for (var Info in Users)
    {
        ChatMessageContainer.innerHTML += "<small><b>" + Users[Info] + ":</b><br />" + Msgs[Info] + "<br /><br /></small>";
    }
    ChatMessageContainer.scrollTop = 9999999 + ChatMessageContainer.offsetHeight;
}
// #endregion

// #region SYSTEM
try
{
    InitializeComponents();
    CreateButtonAddTopic();
    CreateChatBox();
}
catch (ex) { }

// #endregion