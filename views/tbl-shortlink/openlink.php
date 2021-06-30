<script language='javascript'>

function openlink() 
{
            
	var link = document.getElementById("link").href;
	window.open(link, '_blank');
   window.location.href= "index";
}
 window.onload = openlink;
</script>

<a style="display:none" id="link" href="<?=$model->oringnal_link?>" target="_blank"></a>

