<?php
/* sg_socialbar 131029 symstroem GbR-TN, Lizensiert unter GPL: http://www.gnu.org/licenses/gpl-3.0.html */
if (isset($_GET['url'])){    
    
    $twString = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . urlencode($_GET['url']));        
    $twJson = json_decode($twString, true);   
    
    $gHtml =  file_get_contents( 'https://plusone.google.com/_/+1/fastbutton?url=' . urlencode($_GET['url']));
    $gDoc = new DOMDocument();
    $gDoc->loadHTML($gHtml);
    $gCounter = $gDoc->getElementById('aggregateCount');    
    
    $fbString = file_get_contents('http://graph.facebook.com/?ids=' . urlencode($_GET['url']));
    $fbJson = json_decode($fbString, true);
    
    if ($fbJson[$_GET['url']]['shares'] === NULL){
        $fbJson[$_GET['url']]['shares'] = 0;
    }
    
    $socialCount = array('twCount'=>$twJson['count'], 'gCount'=>$gCounter->nodeValue, 'fbCount'=>$fbJson[$_GET['url']]['shares']);
    
    echo json_encode($socialCount);    
                
}

?>
