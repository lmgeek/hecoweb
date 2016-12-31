<!--<html>
<body>
<script language="JavaScript">
//Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
function autofitIframe(id){
if (!window.opera && document.all && document.getElementById){
id.style.height=id.contentWindow.document.body.scrollHeight;
} else if(document.getElementById) {
id.style.height=id.contentDocument.body.scrollHeight+"px";
}
}
</script>
<iframe id="miFrame" src="index.php" width="100%" height="0" frameborder="1" transparency="transparency" onload="autofitIframe(this);"></iframe>
</body>
</html>-->


<p>Click on link bellow to change iframe content:</p>
<a href="http://www.bing.com" target="search_iframe">Bing</a> -
<a href="http://en.wikipedia.org" target="search_iframe">Wikipedia</a> -
<a href="http://google.com" target="search_iframe">Google</a> (not allowed in inframe)

<iframe src="http://en.wikipedia.org" width="100%" height="100%" name="search_iframe"></iframe>