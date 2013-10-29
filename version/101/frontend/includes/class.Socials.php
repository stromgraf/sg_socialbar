<?php
/* sg_socialbar 131029 symstroem GbR-TN, Lizensiert unter GPL: http://www.gnu.org/licenses/gpl-3.0.html */
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Socials {
    
    public $url;
    private $screenName;
    
    public $tweetCount;
    public $followerCount;
    
    public $likeCount;
    public $plusOneCount;
    
    
    function __construct($url, $screenName, $getTweetCount = false){       
        
        if (isset($url) && $this->checkUrl($url)){
           $this->url = $url;
           $this->getLikes();
           $this->getPlusOnes();
           if ($getTweetCount === true){
               $this->getTweets();
           }
        }
        else{
            throw new Exception('Keine oder fehlerhafte URL angegeben.');
        }
        
        if (isset($screenName)){
            $this->screenName = $screenName;
            $this->getFollower();       
        }
        else{
            throw new Exception('Kein Screenname angegeben.');
        }
    
    
    }
    function __destruct(){    
        
    }
    
    /*
     * Twitterfunktionen
     */
    private function getTweets() { 
        
        $jsonString = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . urlencode($this->url));        
        $json = json_decode($jsonString, true);

        $this->tweetCount = intval( $json['count'] );
    }
    
    private function getFollower() { 

        $jsonString = file_get_contents('https://cdn.api.twitter.com/1/users/show.json?screen_name=' . $this->screenName);
        $json = json_decode($jsonString, true);

        $this->followerCount =  intval( $json['followers_count'] );
    }

    private function getLikes() {

        $jsonString = file_get_contents('http://graph.facebook.com/?ids=' . urlencode($this->url));
        $json = json_decode($jsonString, true);

        $this->likeCount = intval( $json[$this->url]['shares'] );
    }

    private function getPlusOnes() {
        $html =  file_get_contents( 'https://plusone.google.com/_/+1/fastbutton?url=' . urlencode($this->url));
        $doc = new DOMDocument();
        $doc->loadHTML($html);
        $counter = $doc->getElementById('aggregateCount');
        $this->plusOneCount = $counter->nodeValue;
    }
    
    private function checkUrl($url){
        
        $re1='((?:http|https)(?::\\/{2}[\\w]+)(?:[\\/|\\.]?)(?:[^\\s"]*))';
        
        if (preg_match("/".$re1."/is", $url)) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>
