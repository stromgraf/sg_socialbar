<?php
/* sg_socialbar 131029 symstroem GbR-TN, Lizensiert unter GPL: http://www.gnu.org/licenses/gpl-3.0.html */
require_once($oPlugin->cFrontendPfad.'includes/class.Socials.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $dateiName = 'main_socials.txt';
    
if (file_exists(PFAD_ROOT.PFAD_EXPORT.$dateiName)) {
       unlink(PFAD_ROOT.PFAD_EXPORT.$dateiName);
    }
    $url = 'https://stromgraf.de';
    $screenName = 'stromgraf';

    $socials = new Socials($url, $screenName);

    $json = json_encode(array ('likeCount'=>$socials->likeCount,'plusOneCount'=>$socials->plusOneCount,'followerCount'=>$socials->followerCount));

    $f = fopen(PFAD_ROOT . PFAD_EXPORT . $dateiName, 'a');

    fwrite($f, $json);
    fclose($f);
?>
