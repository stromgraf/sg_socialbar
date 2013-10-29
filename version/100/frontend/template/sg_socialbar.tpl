<!-- sg_socialbar 131029 symstroem GbR-TN, Lizensiert unter GPL: http://www.gnu.org/licenses/gpl-3.0.html -->
{if !$exclusiveContent}
		<div id="sg_socialbar_wrapper">
			<div id="sg_socialbar">
				<div class="sg_socials">
					<ul>
						<li class="sg_gplus">
							<div class="g-plusone" data-size="medium" data-href="https://stromgraf.de"></div>
						</li>
						<li class="sg_fb">
							<div class="fb-like" data-href="https://stromgraf.de" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false" data-font="verdana"></div>
						</li>
						<li class="sg_twitter">
							<a href="https://twitter.com/stromgraf" class="twitter-follow-button" data-show-count="true" data-lang="de" data-show-screen-name="false" data-dnt="false">folgen</a>
						</li>
						<li>
							<a href="https://plus.google.com/105864139750372588138?prsrc=3" style="text-decoration:none;" title="stromgraf.de Google+ Profil">
								<img src="https://ssl.gstatic.com/images/icons/gplus-32.png" alt="" style="border:0; width:20px; height:20px;"/>
							</a>
						</li>
						<li>
							<a href="/rss" title="stromgraf.de Blog RSS-Feed">
								<img src="{$currentTemplateDir}themes/{$Einstellungen.template.theme.theme_default}/images/feed-icon-28x28.png" width="20px" height="20px" border="0" alt="RSS-Feed des Blogs abonnieren" title="RSS-Feed des Blogs abonnieren" />
							</a>
						</li>
					</ul>
				</div>
				<div id="sg_socialbar_links">
					<ul>					
						<li><a href="forum" title="Tauschen Sie sich im Forum aus!">FORUM</a></li>
						<li><a href="news.php" title="zum Blog">BLOG</a></li>
						<li><a href="b2b" title="B2B Angebot f�r Installateure, Solarteure, Elektriker">B2B ANGEBOTE</a></li>
						<li>
							<a href="warenkorb.php" title="zum Warenkorb">
								<span>WARENKORB</span>
							</a><br />
							{if $WarenkorbArtikelanzahl >= 1}
								<small><span style="font-size:0.9em; vertical-align:top;">{$WarenkorbArtikelanzahl} Artikel f�r {$WarenkorbWarensumme[0]}</span></small>
							{/if}
						</li>
						<li>
							<a href="warenkorb.php" title="zum Warenkorb">
								<img src="{$sg_social_dir}/img/sg_social_basket.png" />
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
{/if}