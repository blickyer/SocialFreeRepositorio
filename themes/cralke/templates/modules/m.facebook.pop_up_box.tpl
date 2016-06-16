<!-- Caja Me Gusta popup --><!-- Mini Mod by Rengo-->
{literal}
<script type='text/javascript'>
//<![CDATA[
jQuery.cookie = function (key, value, options) {
// key and at least value given, set cookie...
if (arguments.length > 1 && String(value) !== "[object Object]") {
options = jQuery.extend({}, options);
if (value === null || value === undefined) {
options.expires = -1;
}
if (typeof options.expires === 'number') {
var days = options.expires, t = options.expires = new Date();
t.setDate(t.getDate() + days);
}
value = String(value);
return (document.cookie = [
encodeURIComponent(key), '=',
options.raw ? value : encodeURIComponent(value),
options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
options.path ? '; path=' + options.path : '',
options.domain ? '; domain=' + options.domain : '',
options.secure ? '; secure' : ''
].join(''));
}
options = value || {};
var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};
//]]>
</script>
{/literal}
{literal}
<script type='text/javascript'>
jQuery(document).ready(function($){
if($.cookie('popup_user_login') != 'yes'){
$('#fanback').delay(3000).fadeIn('medium');
$('#Rengo, #fan-exit').click(function(){
$('#fanback').stop().fadeOut('medium');
});
}
$.cookie('popup_user_login', 'yes', { path: '/', expires: 7 });
});
</script>
{/literal}
<div id='fanback'>
<div id='fan-exit'>
</div>
<div id='JasperRoberts'>
<div id='Rengo'>
</div>
<div class='remove-borda'>
</div>
<iframe allowtransparency='true' frameborder='0' scrolling='no' src='//www.facebook.com/plugins/likebox.php?
href=http://www.facebook.com/GenerationCS&width=402&height=255&colorscheme=light&show_faces=true&show_border=false&stream=false&header=false'
style='border: none; overflow: hidden; margin-top: -19px; width: 402px; height: 230px;margin-left: 9px;'></iframe><center>
<span style="color:#a8a8a8;font-size:8px;" id="linkit">Mini Mod by <a rel="nofollow" style="color:#a8a8a8;font-size:8px;" href="http://www.phpost.net/foro/perfil/521888-rengo/">Rengo</a> - <a style="color:#a8a8a8;font-size:8px;" href="http://www.phpost.net/foro/">PHPost</a></span></center>
</div>
</div>
<!-- Fin Caja Me Gusta popup --><!-- Mini Mod By Rengo -->