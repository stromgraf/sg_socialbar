{strip}<!-- sg_socialbar 131029 symstroem GbR-TN, Lizensiert unter GPL: http://www.gnu.org/licenses/gpl-3.0.html -->
{literal}
<script type='text/javascript'>
$(document).ready(function(){{/literal}$.getJSON('{$sg_frontend_url}subJson.php?',{literal}{url:""+document.URL+""}).done(function(a){$('#sg_subgplus').html(a.gCount);$('#sg_subfb').html(a.fbCount);$('#sg_subtwitter').html(a.twCount)})});
</script>
{/literal}
{if !$exclusiveContent}        
            <div id="sg_subsocials">
                <ul>                  
                    <li><a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=de&url={$sg_shop_url}/{if $sg_ist_artikel == true}{$Artikel->cURL}{elseif sg_ist_news == true}{$oNewsArchiv->cSeo}{/if}" title="plus one f&uuml;r {if $sg_ist_artikel == true}{$Artikel->cName}{elseif sg_ist_news == true}{$oNewsArchiv->cBetreff}{/if} auf Google+"><div  id="sg_subgplus" >0</div></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={$sg_shop_url}/{if $sg_ist_artikel == true}{$Artikel->cURL}{elseif sg_ist_news == true}{$oNewsArchiv->cSeo}{/if}" title="{if $sg_ist_artikel == true}{$Artikel->cName}{elseif sg_ist_news == true}{$oNewsArchiv->cBetreff}{/if} auf Facebook liken"><div id="sg_subfb" >0</div></a></li>
                    <li><a target="_blank" href="https://twitter.com/intent/tweet?original_referer={$sg_shop_url}/{if $sg_ist_artikel == true}{$Artikel->cURL}{elseif sg_ist_news == true}{$oNewsArchiv->cSeo}{/if}&source=tweetbuttont&url={$sg_shop_url}/{if $sg_ist_artikel == true}{$Artikel->cURL}{elseif sg_ist_news == true}{$oNewsArchiv->cSeo}{/if}" title="{if $sg_ist_artikel == true}{$Artikel->cName}{elseif sg_ist_news == true}{$oNewsArchiv->cBetreff}{/if} auf Twitter teilen"><div id="sg_subtwitter">0</div></a></li>
                </ul>
            </div>
            <div class="clear"></div>
{/if}{/strip}