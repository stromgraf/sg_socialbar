<?php
/* sg_socialbar 131029 symstroem GbR-TN, Lizensiert unter GPL: http://www.gnu.org/licenses/gpl-3.0.html */	
    pq('head')->prepend("
		<style type='text/css'>
			#sg_socialbar_wrapper {
				background:#000;
				font-family:'Ubuntu', Verdana, sans-serif;
				font-weight:400;
				font-size:1.2em;
				color:#fff;
				width:100%;
				height:40px;
				margin:0;
				padding:0;
			}
			#sg_socialbar {
				margin:0px auto;
				width:938px;
				height:28px;
				padding:6px;
				position:relative;
				z-index:999;
			}
			.sg_socials {
				float:left;
				height:28px;
			}
			.sg_socials ul {
				display:block;
				margin:3px 0 0 0 !important;
				padding:0 !important;			
			}
			.sg_socials li {
				float:left;
				margin:0 10px 0 0 !important;
				padding:0 !important;
				height:24px;
			}
			.sg_gplus {
				width:90px;
			}
			.sg_fb {
				width:143px;
			}
			.sg_twitter {
				width:130px;
			}
			#sg_socialbar_links {
				float:right;
				padding:5px;
			}
			#sg_socialbar_links ul {
				display:block;
			}
			#sg_socialbar_links li{
				float:left;
				line-height:1em;
			}
			#sg_socialbar_links li{
				margin: 0 16px 0 16px !important;
			}
			#sg_socialbar_links li:first-child{
				margin:0 16px 0 0 !important;
			}
			#sg_socialbar_links li:last-child{
				margin:0 0 0 0 !important;
			}		
			#sg_socialbar_links a{
				color:#fff;
			}
			#sg_socialbar_links li img {
				margin-top:-5px;
			}
		</style>
		");
	pq('body')->append(
	
	'<script> //namespace clientseite hinzuf�gen
			$(document).ready(function(){
			if(document.namespaces) {
				//IE
				document.namespaces.add("fb", "https://graph.facebook.com/schema/og/#");

				if (typeof(console) != "undefined" && console) {
					   console.log("IE: FB NameSpace added");
				   }
			} else {
				//Other Browsers
				var htmlRoot = jQuery(jQuery("html").get(0));
				if(typeof(htmlRoot.attr("xmlns:fb")) == "undefined") {
					htmlRoot.attr("xmlns:fb","https://graph.facebook.com/schema/og/#");
					if (typeof(console) != "undefined" && console) {
						console.log("FB NameSpace added");
					}
				}
			}
			window.___gcfg = {lang: "de"}; // google+
			var socials = ["https://apis.google.com/js/plusone.js", "https://platform.twitter.com/widgets.js", "https://connect.facebook.net/de_DE/all.js#xfbml=1"];	
			for (var i = 0; i < socials.length; i++) {
				var po = document.createElement("script");
				po.type = "text/javascript";
				po.async = true;
				po.src = socials[i];
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(po, s);
			}
		});
		</script>'
	);
?>