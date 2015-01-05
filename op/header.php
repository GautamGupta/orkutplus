<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' xmlns:b='http://www.google.com/2005/gml/b' xmlns:data='http://www.google.com/2005/gml/data' xmlns:expr='http://www.google.com/2005/gml/expr'>


<b:if cond='data:blog.pageType == &quot;item&quot;'>
<b:section id='titleTag'>
<b:widget id='Blog2' locked='false' title='Blog Posts' type='Blog'>
<b:includable id='nextprev'/>
<b:includable id='backlinks' var='post'/>
<b:includable id='post' var='post'><data:post.title/></b:includable>
<b:includable id='commentDeleteIcon' var='comment'/>
<b:includable id='status-message'/>
<b:includable id='feedLinks'/>
<b:includable id='comment-form' var='post'>
  <div class='comment-form'>
    <a name='comment-form'/>
    <h4 id='comment-post-message'><data:postCommentMsg/></h4>
    <p><data:blogCommentMessage/></p>
    <a expr:href='data:post.commentFormIframeSrc' id='comment-editor-src' style='display: none'/>
    <iframe allowtransparency='true' class='blogger-iframe-colorize' frameborder='0' height='275' id='comment-editor' scrolling='auto' src='' width='100%'/>
    <data:post.iframeColorizer/>
  </div>
</b:includable>
<b:includable id='backlinkDeleteIcon' var='backlink'/>
<b:includable id='feedLinksBody' var='links'/>
<b:includable id='postQuickEdit' var='post'/>
<b:includable id='comments' var='post'/>
<b:includable id='main' var='top'><title><b:loop values='data:posts' var='post'><b:include data='post' name='post'/></b:loop></title></b:includable>
</b:widget>
</b:section>
<b:else/>
<title>Html Orkut &#187; Adding Spice To Your Orkut Life</title>
</b:if>

  <head>

    <b:include data='blog' name='all-head-content'/>

<META expr:content='data:blog.pageTitle' name='keywords'/>
<META expr:content='data:blog.pageTitle' name='description'/>

<meta content='Html Orkut provides graphics, greetings, glitters, animation, widgets, Flash games, generators, flash cards for  Orkut, Hi5, Myspace, Facebook, Friendster Users' name='description'> </meta>

<meta content='Orkut, Graphics, Glitters, Animation, Flash, Cards, Birthday, New Year, Games, Widgets, Generators, MySpace, Hi5, Friendster' name='keywords'> </meta>

<link href='http://htmlthemes2.googlepages.com/ho.ico' rel='icon' type='image/x-icon'/>

<link href='http://htmlthemes2.googlepages.com/ho.ico' rel='shortcut icon' type='image/x-icon'/>

<script src='http://cdn.gigya.com/wildfire/js/wfapiv2.js'> </script>
<style>
    <b:if cond='data:blog.pageType == &quot;item&quot;'>
        span.fullpost {display:inline;}
    <b:else/>
        span.fullpost {display:none;}
    </b:if>
</style>
<!-- Style to implement "Read more on this Article" link in all the posts (End) -->

<script src='http://files.<REDACTED>.com.googlepages.com/mootools.v1.11.js' type='text/javascript'/>

 </head>
    <body>
  <div id='outer-wrapper'><div id='wrap2'>
    <!-- links para navegadores de texto -->
    <span id='skiplinks' style='display:none;'>
      <a href='#main'>ir a principal </a> |
      <a href='#sidebar'>Ir a lateral</a>
    </span>

<!-- (Cabecera) -->
    <div id='header-wrapper'>
      <b:section class='header' id='header' maxwidgets='9' showaddelement='no'>
<b:widget id='Header1' locked='true' title='Html Orkut (Header)' type='Header'>
<b:includable id='title'>
  <b:if cond='data:blog.url == data:blog.homepageUrl'>
    <data:title/>
  <b:else/>
    <a expr:href='data:blog.homepageUrl'><data:title/></a>
  </b:if>
</b:includable>
<b:includable id='description'>
  <div class='descriptionwrapper'>
    <p class='description'><span><data:description/></span></p>
  </div>
</b:includable>
<b:includable id='main'>

  <b:if cond='data:useImage'>
    <b:if cond='data:imagePlacement == &quot;REPLACE&quot;'>
      <!--Show just the image, no text-->
      <div id='header-inner'>
        <a expr:href='data:blog.homepageUrl' style='display: block'>
          <img expr:alt='data:title' expr:height='data:height' expr:id='data:widget.instanceId + &quot;_headerimg&quot;' expr:src='data:sourceUrl' expr:width='data:width' style='display: block'/>
        </a>
      </div>
    <b:else/>
      <!--
      Show image as background to text. You can't really calculate the width
      reliably in JS because margins are not taken into account by any of
      clientWidth, offsetWidth or scrollWidth, so we don't force a minimum
      width. This results in a margin-width's worth of pixels being cropped,
      which is probably better than having them overflow out of the div.
      -->
      <b:if cond='data:blog.languageDirection == &quot;rtl&quot;'>
        <div expr:style='&quot;background-image: url(\&quot;&quot; + data:sourceUrl + &quot;\&quot;); &quot;                        + &quot;background-position: right; &quot;                        + &quot;background-repeat: no-repeat; &quot;' id='header-inner'>
          <div class='titlewrapper' style='background: transparent'>
            <h1 class='title' style='background: transparent; border-width: 0px'>
              <b:include name='title'/>
            </h1>
          </div>
          <b:include name='description'/>
        </div>
      <b:else/>
        <div expr:style='&quot;background-image: url(\&quot;&quot; + data:sourceUrl + &quot;\&quot;); &quot;                        + &quot;background-position: left; &quot;                        + &quot;background-repeat: no-repeat; &quot;' id='header-inner'>
          <div class='titlewrapper' style='background: transparent'>
            <h1 class='title' style='background: transparent; border-width: 0px'>
              <b:include name='title'/>
            </h1>
          </div>
          <b:include name='description'/>
        </div>
      </b:if>
    </b:if>
  <b:else/>
    <!--No header image -->
    <div id='header-inner'>
      <div class='titlewrapper'>
        <h1 class='title'>
          <b:include name='title'/>
        </h1>
      </div>
      <b:include name='description'/>
    </div>
  </b:if>
</b:includable>
</b:widget>
</b:section>

<div id='header_r'>
&lt;form action=&quot;http://www.google.com/cse&quot; id=&quot;cse-search-box&quot;&gt;
  &lt;div&gt;
    &lt;input type=&quot;hidden&quot; name=&quot;cx&quot; value=&quot;007418682267555033411:sl1hftrsxx0&quot; /&gt;
    &lt;input type=&quot;hidden&quot; name=&quot;ie&quot; value=&quot;UTF-8&quot; /&gt;
    &lt;input type=&quot;text&quot; name=&quot;q&quot; size=&quot;38&quot; /&gt;
    &lt;input type=&quot;submit&quot; name=&quot;sa&quot; value=&quot;Search&quot; /&gt;
  &lt;/div&gt;
&lt;/form&gt;
&lt;script type=&quot;text/javascript&quot; src=&quot;http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en&quot;&gt;&lt;/script&gt;</div>
<div id='header_r_ads'/>&lt;img src=&quot;http://img297.imageshack.us/img297/8770/donegp2.gif&quot;/&gt;</div>

<!-- menu -->
<div id='nav'>
    <div id='nav_l'>
    <div class='menu'><ul>
		<li class='home'><a alt='Home' expr:href='data:blog.homepageUrl'>Home</a></li>
		<li class='page_item page-item-2'><a href='http://www.htmlorkut.com/search/label/Greetings' title='Browse some of the best hand picked greetings'>Greetings</a></li>
		<li class='page_item page-item-2'><a href='http://www.htmlorkut.com/search/label/Widgets' title='Browse some amazing widgets'>Widgets</a></li>
		<li class='page_item page-item-2'><a href='http://www.htmlorkut.com/search/label/Generators' title='Browse some amazing and exclusive Generators'>Generators</a></li>
<li class='page_item page-item-2'><a href='http://www.htmlorkut.com/search/label/Orkut%20Themes' title='Browse over 1000 Orkut Themes'>Orkut Themes</a></li>
<li class='page_item page-item-2'><a href='http://www.htmlorkut.com/search/label/Musical%20Scraps' title='Music in Your Scraps'>Musical Scraps</a></li>
<li class='page_item page-item-2'><a href='http://www.htmlorkut.com/search/label/ASCII%20Art' title='ASCII Art Collection'>ASCII Art</a></li>
<li class='page_item page-item-2'><a href='http://www.htmlorkut.com/search/label/Games' title='Over 600 HQ Flash Games'>Flash Games</a></li>
<li class='page_item page-item-2'><a href='http://www.htmlorkut.com/2008/05/help-guide-and-tutorials-htmlorkutcom.html'>Help Guide</a></li><li class='page_item page-item-2'><a href='http://www.htmlorkut.com/2008/05/contact-us.html' title='Contact Us'>Contact Us</a></li></ul></div> <!-- menu -->

	</div><!-- nav_l -->
</div>

<!-- (Contenedor) -->
    <div id='content-wrapper'>
