{strip}<!-- sg_socialbar 131029 symstroem GbR-TN, Lizensiert unter GPL: http://www.gnu.org/licenses/gpl-3.0.html -->    
    {if !$exclusiveContent}
        {literal}
            <script type="text/javascript">          
$(document).ready(function(){{/literal}$.getJSON('{$sg_frontend_url}subJson.php?',{literal}{url:{/literal}'{$sg_shop_url}'{literal},screenName:{/literal}'{$sg_tw_screenName}'{literal}}).done(function(data){$('#sg_gplus').html(data.gCount);$('#sg_fb').html(data.fbCount);$('#sg_twitter').html(data.followCount)})});
            </script>
        {/literal}       
    <div id="sg_socialbar_wrapper">
        <div id="sg_socialbar">
            <div id="sg_socials">
                <ul>                    
                    <li><a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=de&url={$sg_shop_url}" title="plus one f&uuml;r stromgraf.de auf Google+"><div  id="sg_gplus" >0</div></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={$sg_shop_url}" title="stromgraf.de auf Facebook liken"><div id="sg_fb" >0</div></a></li>
                    <li><a target="_blank" href="https://twitter.com/intent/follow?original_referer={$sg_shop_url}&region=follow_link&screen_name=stromgraf&tw_p=followbutton&variant=2.0" title="stromgraf.de auf Twitter folgen"><div id="sg_twitter">0</div></a></li>                    
                </ul>
            </div>
            <div id="sg_socialbar_links">
                <ul>					
                    <li><a href="rss" title="RSS-Feed f&uuml;r den stromgraf-Blog"><div id="sg_rss"></div></a></li>
                    <li><a href="news.php" title="zum Blog"><div>BLOG</div></a></li>
                    <li><a href="forum" title="Tauschen Sie sich im Forum aus!"><div>FORUM</div></a></li>                    
                    <li><a href="b2b" title="B2B Angebot f&uuml;r Installateure, Solarteure, Elektriker"><div>B2B ANGEBOTE</div></a></li>
                    <li>
                        <a href="warenkorb.php" title="zum Warenkorb">
                            <div id="sg_basket">
                                WARENKORB<br />
                            {if $WarenkorbArtikelanzahl >= 1}
                                <span>{$WarenkorbArtikelanzahl} Artikel f&uuml;r {$WarenkorbWarensumme[0]}</span>
                            {/if}
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
{/if}{/strip}