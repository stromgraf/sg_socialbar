<?php
    /* sg_socialbar 131029 symstroem GbR-TN, Lizensiert unter GPL: http://www.gnu.org/licenses/gpl-3.0.html */
    /*
     * darstellung der daten für hauptsocialbar, und ggfs fuer sub_socials (artikel oder newsseite)
     */

    $urlFrontend = URL_SHOP . "/" . PFAD_PLUGIN . $oPlugin->cVerzeichnis . "/" . PFAD_PLUGIN_VERSION . $oPlugin->nVersion . "/" . PFAD_PLUGIN_FRONTEND;
    pq('head')->prepend('<link type="text/css" href="' . $urlFrontend . 'template/css/sg_socials_min.css" rel="stylesheet">');
    pq('body')->prepend($smarty->fetch($oPlugin->cFrontendPfad . 'template/sg_socialbar.tpl'));
    
    
    if (gibSeitenTyp() === 1 || $smarty->_tpl_vars['AktuelleSeite'] === 'NEWSDETAIL'){        
        pq('h1:first-child')->after($smarty->fetch($oPlugin->cFrontendPfad . 'template/sg_subsocials.tpl'));
    }
?>