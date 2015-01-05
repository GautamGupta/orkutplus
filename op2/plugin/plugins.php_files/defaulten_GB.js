(function() {
var _UDS_CONST_LOCALE = 'en-GB';
var _UDS_CONST_SHORT_DATE_PATTERN = 'DMY'; 
var _UDS_MSG_SEARCHER_IMAGE = ('Image'); 
var _UDS_MSG_SEARCHER_WEB = ('Web'); 
var _UDS_MSG_SEARCHER_BLOG = ('Blog'); 
var _UDS_MSG_SEARCHER_VIDEO = ('Video'); 
var _UDS_MSG_SEARCHER_LOCAL = ('Local'); 
var _UDS_MSG_SEARCHCONTROL_SAVE = ('save'); 
var _UDS_MSG_SEARCHCONTROL_KEEP = ('keep'); 
var _UDS_MSG_SEARCHCONTROL_INCLUDE = ('include'); 
var _UDS_MSG_SEARCHCONTROL_COPY = ('copy'); 
var _UDS_MSG_SEARCHCONTROL_CLOSE = ('close'); 
var _UDS_MSG_SEARCHCONTROL_SPONSORED_LINKS = ('Sponsored Links'); 
var _UDS_MSG_SEARCHCONTROL_SEE_MORE = ('see more...'); 
var _UDS_MSG_SEARCHCONTROL_WATERMARK = ('clipped from Google'); 
var _UDS_MSG_SEARCHER_CONFIG_SET_LOCATION = ('Search location'); 
var _UDS_MSG_SEARCHER_CONFIG_DISABLE_ADDRESS_LOOKUP = ('Disable address lookup'); 
var _UDS_MSG_SEARCHER_NEWS = ('News'); 
function _UDS_MSG_MINUTES_AGO(AGE_MINUTES_AGO) {return ('' + AGE_MINUTES_AGO + ' minutes ago');} 
var _UDS_MSG_ONE_HOUR_AGO = ('1 hour ago'); 
function _UDS_MSG_HOURS_AGO(AGE_HOURS_AGO) {return ('' + AGE_HOURS_AGO + ' hours ago');} 
function _UDS_MSG_NEWS_ALL_N_RELATED(NUMBER) {return ('all ' + NUMBER + ' related');} 
var _UDS_MSG_NEWS_RELATED = ('Related Articles'); 
var _UDS_MSG_BRANDING_STRING = ('powered by Google'); 
var _UDS_MSG_SORT_BY_DATE = ('Sort by date'); 
var _UDS_MSG_MONTH_ABBR_JAN = ('Jan'); 
var _UDS_MSG_MONTH_ABBR_FEB = ('Feb'); 
var _UDS_MSG_MONTH_ABBR_MAR = ('Mar'); 
var _UDS_MSG_MONTH_ABBR_APR = ('Apr'); 
var _UDS_MSG_MONTH_ABBR_MAY = ('May'); 
var _UDS_MSG_MONTH_ABBR_JUN = ('Jun'); 
var _UDS_MSG_MONTH_ABBR_JUL = ('Jul'); 
var _UDS_MSG_MONTH_ABBR_AUG = ('Aug'); 
var _UDS_MSG_MONTH_ABBR_SEP = ('Sep'); 
var _UDS_MSG_MONTH_ABBR_OCT = ('Oct'); 
var _UDS_MSG_MONTH_ABBR_NOV = ('Nov'); 
var _UDS_MSG_MONTH_ABBR_DEC = ('Dec'); 
var _UDS_MSG_DIRECTIONS = ('directions'); 
var _UDS_MSG_CLEAR_RESULTS = ('clear results'); 
var _UDS_MSG_SHOW_ONE_RESULT = ('show one result'); 
var _UDS_MSG_SHOW_MORE_RESULTS = ('show more results'); 
var _UDS_MSG_SHOW_ALL_RESULTS = ('show all results'); 
var _UDS_MSG_SETTINGS = ('settings'); 
var _UDS_MSG_SEARCH = ('search'); 
var _UDS_MSG_SEARCH_UC = ('Search'); 
var _UDS_MSG_POWERED_BY = ('powered by'); 
function _UDS_MSG_LOCAL_ATTRIBUTION(LOCAL_RESULTS_PROVIDER) {return ('Business listings provided by ' + LOCAL_RESULTS_PROVIDER);} 
var _UDS_MSG_SEARCHER_BOOK = ('Book'); 
function _UDS_MSG_FOUND_ON_PAGE(FOUND_ON_PAGE) {return ('Page ' + FOUND_ON_PAGE);} 
function _UDS_MSG_TOTAL_PAGE_COUNT(PAGE_COUNT) {return ('' + PAGE_COUNT + ' pages');} 
var _UDS_MSG_SEARCHER_BY = ('by'); 
var _UDS_MSG_SEARCHER_CODE = ('Code'); 
var _UDS_MSG_UNKNOWN_LICENSE = ('Unknown Licence'); 
var _UDS_MSG_SEARCHER_GSA = ('Search Appliance'); 
var _UDS_MSG_SEARCHCONTROL_MORERESULTS = ('More results'); 
var _UDS_MSG_SEARCHCONTROL_PREVIOUS = ('Previous'); 
var _UDS_MSG_SEARCHCONTROL_NEXT = ('Next'); 
var _UDS_MSG_GET_DIRECTIONS = ('Get directions'); 
var _UDS_MSG_GET_DIRECTIONS_TO_HERE = ('To here'); 
var _UDS_MSG_GET_DIRECTIONS_FROM_HERE = ('From here'); 
var _UDS_MSG_CLEAR_RESULTS_UC = ('Clear results'); 
var _UDS_MSG_SEARCH_THE_MAP = ('search the map'); 
var _UDS_MSG_SCROLL_THROUGH_RESULTS = ('scroll through results'); 
var _UDS_MSG_EDIT_TAGS = ('edit tags'); 
var _UDS_MSG_TAG_THIS_SEARCH = ('tag this search'); 
var _UDS_MSG_SEARCH_STRING = ('search string'); 
var _UDS_MSG_OPTIONAL_LABEL = ('optional label'); 
var _UDS_MSG_DELETE = ('delete'); 
var _UDS_MSG_DELETED = ('deleted'); 
var _UDS_MSG_CANCEL = ('cancel'); 
var _UDS_MSG_UPLOAD_YOUR_VIDEOS = ('upload your own video'); 
var _UDS_MSG_IM_DONE_WATCHING = ('I have finished watching this'); 
var _UDS_MSG_CLOSE_VIDEO_PLAYER = ('close video player'); 
var _UDS_MSG_NO_RESULTS = ('No Results'); 
var _UDS_MSG_LINKEDCSE_ERROR_RESULTS = ('This Custom Search Engine is loading. Try again in a few seconds.'); 
var _UDS_MSG_COUPONS = ('Coupons'); 
var _UDS_MSG_BACK = ('back'); 
var _UDS_MSG_SUBSCRIBE = ('Subscribe'); 
var _UDS_MSG_SEARCHER_PATENT = ('Patent'); 
var _UDS_MSG_USPAT = ('US Pat.'); 
var _UDS_MSG_USPAT_APP = ('US Pat. App'); 
var _UDS_MSG_PATENT_FILED = ('Filed'); 
var _UDS_MSG_ADS_BY_GOOGLE = ('Ads by Google'); 
var _UDS_MSG_SET_DEFAULT_LOCATION = ('Set default location'); 
var _UDS_MSG_NEWSCAT_TOPSTORIES = ('Top Stories'); 
var _UDS_MSG_NEWSCAT_WORLD = ('World'); 
var _UDS_MSG_NEWSCAT_NATION = ('Nation'); 
var _UDS_MSG_NEWSCAT_BUSINESS = ('Business'); 
var _UDS_MSG_NEWSCAT_SCITECH = ('Sci/Tech'); 
var _UDS_MSG_NEWSCAT_ENTERTAINMENT = ('Entertainment'); 
var _UDS_MSG_NEWSCAT_HEALTH = ('Health'); 
var _UDS_MSG_NEWSCAT_SPORTS = ('Sports'); 
var _UDS_MSG_NEWSCAT_POLITICS = ('Politics');
var e=null,g=true,h=encodeURIComponent,j=google_exportSymbol,k=window,m=google,n=navigator,o=document,q="appendChild",r="length",s="language",t="style",v="status",w="loader",y="ServiceBase",z={};z.blank="&nbsp;";z.image=_UDS_MSG_SEARCHER_IMAGE;z.web=_UDS_MSG_SEARCHER_WEB;z.blog=_UDS_MSG_SEARCHER_BLOG;z.video=_UDS_MSG_SEARCHER_VIDEO;z.local=_UDS_MSG_SEARCHER_LOCAL;z.news=_UDS_MSG_SEARCHER_NEWS;z.book=_UDS_MSG_SEARCHER_BOOK;z.patent="Patent";z["ads-by-google"]=_UDS_MSG_ADS_BY_GOOGLE;z.save=_UDS_MSG_SEARCHCONTROL_SAVE;
z.keep=_UDS_MSG_SEARCHCONTROL_KEEP;z.include=_UDS_MSG_SEARCHCONTROL_INCLUDE;z.copy=_UDS_MSG_SEARCHCONTROL_COPY;z.close=_UDS_MSG_SEARCHCONTROL_CLOSE;z["sponsored-links"]=_UDS_MSG_SEARCHCONTROL_SPONSORED_LINKS;z["see-more"]=_UDS_MSG_SEARCHCONTROL_SEE_MORE;z.watermark=_UDS_MSG_SEARCHCONTROL_WATERMARK;z["search-location"]=_UDS_MSG_SEARCHER_CONFIG_SET_LOCATION;z["disable-address-lookup"]=_UDS_MSG_SEARCHER_CONFIG_DISABLE_ADDRESS_LOOKUP;z["sort-by-date"]=_UDS_MSG_SORT_BY_DATE;z.pbg=_UDS_MSG_BRANDING_STRING;
z["n-minutes-ago"]=_UDS_MSG_MINUTES_AGO;z["n-hours-ago"]=_UDS_MSG_HOURS_AGO;z["one-hour-ago"]=_UDS_MSG_ONE_HOUR_AGO;z["all-n-related"]=_UDS_MSG_NEWS_ALL_N_RELATED;z["related-articles"]=_UDS_MSG_NEWS_RELATED;z["page-count"]=_UDS_MSG_TOTAL_PAGE_COUNT;var A=[];A[0]=_UDS_MSG_MONTH_ABBR_JAN;A[1]=_UDS_MSG_MONTH_ABBR_FEB;A[2]=_UDS_MSG_MONTH_ABBR_MAR;A[3]=_UDS_MSG_MONTH_ABBR_APR;A[4]=_UDS_MSG_MONTH_ABBR_MAY;A[5]=_UDS_MSG_MONTH_ABBR_JUN;A[6]=_UDS_MSG_MONTH_ABBR_JUL;A[7]=_UDS_MSG_MONTH_ABBR_AUG;A[8]=_UDS_MSG_MONTH_ABBR_SEP;
A[9]=_UDS_MSG_MONTH_ABBR_OCT;A[10]=_UDS_MSG_MONTH_ABBR_NOV;A[11]=_UDS_MSG_MONTH_ABBR_DEC;z["month-abbr"]=A;z.directions=_UDS_MSG_DIRECTIONS;z["clear-results"]=_UDS_MSG_CLEAR_RESULTS;z["show-one-result"]=_UDS_MSG_SHOW_ONE_RESULT;z["show-more-results"]=_UDS_MSG_SHOW_MORE_RESULTS;z["show-all-results"]=_UDS_MSG_SHOW_ALL_RESULTS;z.settings=_UDS_MSG_SETTINGS;z.search=_UDS_MSG_SEARCH;z["search-uc"]=_UDS_MSG_SEARCH_UC;z["powered-by"]=_UDS_MSG_POWERED_BY;z.sa=_UDS_MSG_SEARCHER_GSA;z.by=_UDS_MSG_SEARCHER_BY;
z.code=_UDS_MSG_SEARCHER_CODE;z["unknown-license"]=_UDS_MSG_UNKNOWN_LICENSE;z["more-results"]=_UDS_MSG_SEARCHCONTROL_MORERESULTS;z.previous=_UDS_MSG_SEARCHCONTROL_PREVIOUS;z.next=_UDS_MSG_SEARCHCONTROL_NEXT;z["get-directions"]=_UDS_MSG_GET_DIRECTIONS;z["to-here"]=_UDS_MSG_GET_DIRECTIONS_TO_HERE;z["from-here"]=_UDS_MSG_GET_DIRECTIONS_FROM_HERE;z["clear-results-uc"]=_UDS_MSG_CLEAR_RESULTS_UC;z["search-the-map"]=_UDS_MSG_SEARCH_THE_MAP;z["scroll-results"]=_UDS_MSG_SCROLL_THROUGH_RESULTS;
z["edit-tags"]=_UDS_MSG_EDIT_TAGS;z["tag-search"]=_UDS_MSG_TAG_THIS_SEARCH;z["search-string"]=_UDS_MSG_SEARCH_STRING;z["optional-label"]=_UDS_MSG_OPTIONAL_LABEL;z["delete"]=_UDS_MSG_DELETE;z.deleted=_UDS_MSG_DELETED;z.cancel=_UDS_MSG_CANCEL;z["upload-video"]=_UDS_MSG_UPLOAD_YOUR_VIDEOS;z["im-done"]=_UDS_MSG_IM_DONE_WATCHING;z["close-player"]=_UDS_MSG_CLOSE_VIDEO_PLAYER;z["no-results"]=_UDS_MSG_NO_RESULTS;z["linked-cse-error-results"]=_UDS_MSG_LINKEDCSE_ERROR_RESULTS;z.back=_UDS_MSG_BACK;
z.subscribe=_UDS_MSG_SUBSCRIBE;z["us-pat"]="US Pat.";z["us-pat-app"]="US Pat. App";z["us-pat-filed"]="Filed";var _json_cache_defeater_=(new Date).getTime(),_json_request_require_prep=g;function B(a,c){if(C("msie")&&D("msie 6.0")){var d=E(this,F,[a,c]);k.setTimeout(d,0)}else F(a,c)}function G(a){_json_request_require_prep=false;B(a,e);_json_request_require_prep=g}
function F(a,c){var d=o.getElementsByTagName("head")[0],f=o.createElement("script");f.type="text/javascript";f.charset="utf-8";var b=_json_request_require_prep?a+"&key="+m[w].ApiKey+"&v="+c:a;if(C("msie")||C("safari")||C("konqueror"))b=b+"&nocache="+_json_cache_defeater_++;f.src=b;var i=function(){f.onload=e;f.parentNode.removeChild(f);delete f},p=function(l){var u=(l?l:k.event).target?(l?l:k.event).target:(l?l:k.event).srcElement;if(u.readyState=="loaded"||u.readyState=="complete"){u.onreadystatechange=
e;i()}};if(n.product=="Gecko")f.onload=i;else f.onreadystatechange=p;d[q](f)}function E(a,c,d){return function(){return c.apply(a,d)}}function H(a){var c=o.createElement("div");if(a)c.className=a;return c}function C(a){if(a in I)return I[a];return I[a]=n.userAgent.toLowerCase().indexOf(a)!=-1}function D(a){if(a in J)return J[a];return J[a]=n.appVersion.toLowerCase().indexOf(a)!=-1}var I={},J={};var K,M,N,O,P,Q,aa;
function ba(){if(k.n){K=g;if(k.XMLHttpRequest)M=g;else N=g}else if(k.opera)O=g;else if(o.childNodes&&!o.all&&!n.taintEnabled){P=g;if(n.userAgent.indexOf("iPhone")>0)Q=g}else if(o.getBoxObjectFor!=e)aa=g}ba();if(!R)var R=j;if(!ca)var ca=google_exportProperty;
m[s].d={AFRIKAANS:"af",ALBANIAN:"sq",AMHARIC:"am",ARABIC:"ar",ARMENIAN:"hy",AZERBAIJANI:"az",BASQUE:"eu",BELARUSIAN:"be",BENGALI:"bn",BIHARI:"bh",BULGARIAN:"bg",BURMESE:"my",CATALAN:"ca",CHEROKEE:"chr",CHINESE:"zh",CHINESE_SIMPLIFIED:"zh-CN",CHINESE_TRADITIONAL:"zh-TW",CROATIAN:"hr",CZECH:"cs",DANISH:"da",DHIVEHI:"dv",DUTCH:"nl",ENGLISH:"en",ESPERANTO:"eo",ESTONIAN:"et",FILIPINO:"tl",FINNISH:"fi",FRENCH:"fr",GALICIAN:"gl",GEORGIAN:"ka",GERMAN:"de",GREEK:"el",GUARANI:"gn",GUJARATI:"gu",HEBREW:"iw",
HINDI:"hi",HUNGARIAN:"hu",ICELANDIC:"is",INDONESIAN:"id",INUKTITUT:"iu",ITALIAN:"it",JAPANESE:"ja",KANNADA:"kn",KAZAKH:"kk",KHMER:"km",KOREAN:"ko",KURDISH:"ku",KYRGYZ:"ky",LAOTHIAN:"lo",LATVIAN:"lv",LITHUANIAN:"lt",MACEDONIAN:"mk",MALAY:"ms",MALAYALAM:"ml",MALTESE:"mt",MARATHI:"mr",MONGOLIAN:"mn",NEPALI:"ne",NORWEGIAN:"no",ORIYA:"or",PASHTO:"ps",PERSIAN:"fa",POLISH:"pl",PORTUGUESE:"pt-PT",PUNJABI:"pa",ROMANIAN:"ro",RUSSIAN:"ru",SANSKRIT:"sa",SERBIAN:"sr",SINDHI:"sd",SINHALESE:"si",SLOVAK:"sk",SLOVENIAN:"sl",
SPANISH:"es",SWAHILI:"sw",SWEDISH:"sv",TAJIK:"tg",TAMIL:"ta",TAGALOG:"tl",TELUGU:"te",THAI:"th",TIBETAN:"bo",TURKISH:"tr",UKRAINIAN:"uk",URDU:"ur",UZBEK:"uz",UIGHUR:"ug",VIETNAMESE:"vi",UNKNOWN:""};R("google.language.Languages",m[s].d);
var S={AFRIKAANS:"af",AMHARIC:"am",ARMENIAN:"hy",AZERBAIJANI:"az",BASQUE:"eu",BELARUSIAN:"be",BENGALI:"bn",BIHARI:"bh",BURMESE:"my",CHEROKEE:"chr",DHIVEHI:"dv",ESPERANTO:"eo",ICELANDIC:"is",GEORGIAN:"ka",GUARANI:"gn",GUJARATI:"gu",INUKTITUT:"iu",KANNADA:"kn",KAZAKH:"kk",KHMER:"km",KURDISH:"ku",KYRGYZ:"ky",LAOTHIAN:"lo",MACEDONIAN:"mk",MALAYALAM:"ml",MONGOLIAN:"mn",MARATHI:"mr",MALAY:"ms",NEPALI:"ne",ORIYA:"or",PASHTO:"ps",PERSIAN:"fa",PUNJABI:"pa",SANSKRIT:"sa",SINDHI:"sd",SINHALESE:"si",SWAHILI:"sw",
TAJIK:"tg",TAMIL:"ta",TELUGU:"te",TIBETAN:"bo",URDU:"ur",UZBEK:"uz",UIGHUR:"ug"},T={},U={},V=100;function da(a,c){var d="id"+V++;U[d]=function(f){var b=c(f);a(b);delete U[d]};return"google.language.callbacks."+d}function W(a,c){var d="id"+V++;U[d]=function(f,b,i,p,l){var u=c(f,b,i,p,l);a(u);delete U[d]};return"google.language.callbacks."+d}m[s].k=function(a){return T[a]};R("google.language.isTranslatable",m[s].k);
function ea(a,c){var d="horizontal";if(c&&c.type)d=c.orientation;var f=z["powered-by"],b=m[w][y]+"/css/small-logo"+(K&&!M?".gif":".png"),i=['<div style="font-family:arial,sans-serif;','font-size:11px;margin-bottom:1px" class="gBrandingText">',f,'</div><div><img src="',b,'"/></div>'],p=['<span style="vertical-align:middle;font-family:arial,sans-serif;','font-size:11px;" class="gBrandingText">',f,'<img style="padding-left:1px;vertical-align:',K?'bottom;" ':'middle;" ','src="',b,'"/></span>'],l=d=="horizontal"?
p:i,u=l.join(""),x=H();x.className="gBranding";x[t].color="#676767";if(l==i)x[t].textAlign="center";x.innerHTML=u;if(a){var L=e;(L=typeof a=="string"?o.getElementById(a):a)&&L[q]&&L[q](x)}return x}function fa(){var a;for(a in m[s].d)T[m[s].d[a]]=g;for(a in S)T[S[a]]=false}fa();j("google.language.callbacks",U);j("google.language.getBranding",ea);j("google.language.HORIZONTAL_BRANDING","horizontal");j("google.language.VERTICAL_BRANDING","vertical");j("google.language.CurrentLocale",_UDS_CONST_LOCALE);
j("google.language.ShortDatePattern",_UDS_CONST_SHORT_DATE_PATTERN);m[s].l=function(a,c,d){var f=da(c,ga),b=ha(a,f,d);G(b)};R("google.language.suggest",m[s].l);function ha(a,c,d){var f="http://www.google.com/complete/search";f+="?json=t&jsonp="+c+"&client=uds";if(d)f+="&hl="+h(d);f+="&q="+h(a);return f}function ga(a){var c={};c.query=a[0];c.suggestions=[];var d=a[1],f=a[2],b=0;for(;b<d[r];b++){var i={};i.name=d[b];i.count=parseInt(f[b].replace(",",""),10);i.results=f[b];c.suggestions.push(i)}return c};m[s].f={TEXT:"text",HTML:"html"};R("google.language.ContentType",m[s].f);m[s].translate=function(a,c,d,f){var b,i=e;if(typeof a=="string")b=a;else if(a.text&&a.type){b=a.text;i=a.type}else throw"Invalid first argument";if(!ia(b,f)){var p=W(f,X),l=ja(b,c+"|"+d,p,i);B(l,m[s].Version)}};R("google.language.translate",m[s].translate);function ia(a,c){if(a[r]<=5120)return false;var d=X(e,e,400,"the string to be translated exceeds the maximum length allowed",e);c(d);return g}
function ja(a,c,d,f){var b=m[w][y]+"/Gtranslate?callback="+d;b+="&context=22";b+="&q="+h(a);b+="&langpair="+h(c);if(f)b+="&format="+h(f);return b}function X(a,c,d,f){var b={};b.status={code:d};if(f)b[v].message=f;if(d!=200){b.error=b[v];b.translation=""}else{b.translation=c.translatedText;if(c.detectedSourceLanguage)b.detectedSourceLanguage=c.detectedSourceLanguage}return b}m[s].i=function(a,c){var d=W(c,ka),f=la(a,d);B(f,m[s].Version)};R("google.language.detect",m[s].i);
function la(a,c){var d=m[w][y]+"/GlangDetect?callback="+c;d+="&context=22";d+="&q="+h(a);return d}function ka(a,c,d,f){var b={};b.status={code:d};if(f)b[v].message=f;if(d!=200){b.error=b[v];b.language=""}else{b.language=c[s];b.isReliable=c.isReliable;b.confidence=c.confidence}return b};var ma={"en|ar":"arabic","en|hi":"indic","en|kn":"indic","en|ml":"indic","en|ta":"indic","en|te":"indic"};m[s].m=function(a,c,d,f){if(typeof f!="function")throw"Invalid callback";if(!!na(a,c,d,f)){var b=W(f,Y),i=oa(a,c+"|"+d,b);B(i,m[s].Version)}};R("google.language.transliterate",m[s].m);function oa(a,c,d){var f=m[w][y]+"/Gtransliterate?callback="+d;f+="&context=22";f+="&langpair="+h(c);var b=0;for(;b<a[r];b++)f+="&q="+h(a[b]);return f}
function pa(a,c){if(!a||!c)return undefined;return ma[a+"|"+c]}
function na(a,c,d,f){var b="";if(typeof a!="object"||!a[r])b="Words needs to be an array.";else if(a[r]<1)b="No words to transliterate.";else if(a[r]>5)b="Number of words to transliterate exceeds the limit of 5";else if(c)if(d)pa(c,d)||(b="Transliteration not supported for the language pair. Source Language - "+c+" Destination Language - "+d+".");else b="Destination language not specified.";else b="Source language not specified.";if(b[r]>0){var i=Y(e,e,400,b,e);k.setTimeout(function(){f(i)},0);return false}return g}
function Y(a,c,d,f){var b={};b.status={code:d};if(f)b[v].message=f;if(d!=200){b.error=b[v];b.transliterations=[]}else b.transliterations=c.transliterations;return b};var qa={hi:g,kn:g,ml:g,ta:g,te:g};m[s].c={h:0,g:1,e:2};m[s].j=function(a){a=a.toLowerCase();return a in qa?ra(a):m[s].c.e};R("google.language.FontRenderingStatus.SUPPORTED",m[s].c.g);R("google.language.FontRenderingStatus.UNSUPPORTED",m[s].c.h);R("google.language.FontRenderingStatus.UNKNOWN",m[s].c.e);R("google.language.isFontRenderingSupported",m[s].j);
function ra(a){switch(a){case "ml":var c=[],d="\u0d23\u0d4d\u0d23\u0d28\u0d4d\u0d31";c.push({a:"\u0d23\u0d28\u0d4d\u200d",b:d});d="\u0d23\u0d4d\u0d23\u0d28\u0d4d\u200d\u0d31";c.push({a:"\u0d23\u0d28\u0d4d\u200d",b:d});return Z(c);case "hi":var f="\u0915\u094d\u0930\u0930\u094d\u0925",b="\u0915\u0925";return Z([{a:f,b:b}]);case "kn":var f="\u0c95\u0ccd\u0cb2",b="\u0c95";return Z([{a:f,b:b}]);case "te":var f="\u0c15\u0c4d\u0c32",b="\u0c15";return Z([{a:f,b:b}]);case "ta":var f="\u0b95\u0bcd",b="\u0b95";
return Z([{a:f,b:b}])}}function Z(a){var c=0;for(;c<a[r];c++){var d=a[c];if(sa(d.a,d.b))return g}return false}function sa(a,c){var d=o.createElement("span");d[t].fontSize="10px";ta(d,0.1);o.body[q](d);d.innerHTML=a;var f=$(d).width;d.innerHTML=c;var b=$(d).width;o.body.removeChild(d);return f==b}function ta(a,c){var d=a[t];if("opacity"in d)d.opacity=c;else if("MozOpacity"in d)d.o=c;else if("filter"in d)d.filter="alpha(opacity="+c*100+")"}
function $(a){if(a[t].display!="none")return{width:a.offsetWidth,height:a.offsetHeight};var c=a[t],d=c.display,f=c.visibility,b=c.position;c.visibility="hidden";c.position="absolute";c.display="";var i=a.offsetWidth,p=a.offsetHeight;c.display=d;c.position=b;c.visibility=f;return{width:i,height:p}};
google.loader.loaded({"module":"language","version":"1.0","components":["default"]});
google.loader.eval.language = function() {eval(arguments[0])}})()