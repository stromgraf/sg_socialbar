<?php
/* sg_socialbar 131029 symstroem GbR-TN, Lizensiert unter GPL: http://www.gnu.org/licenses/gpl-3.0.html */
    require_once($oPlugin->cAdminmenuPfad.PFAD_PLUGIN_EXPORTFORMAT.'includes/class.Socials.php');
    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */
    $nAlleXStd = $GLOBALS['DB']->executeQuery('SELECT nAlleXStd FROM tcron WHERE kKEY=' . $exportformat->kExportformat . '',1);
    
    if ((int)$nAlleXStd->nAlleXStd > 1){
        $GLOBALS['DB']->executeQuery('UPDATE tcron SET nAlleXStd=1 WHERE kKEY=' . $exportformat->kExportformat . '',x);
    }
    
    $nLimitN = 0;
    $nLimitM = 0;

    if(isset($queue->nLimit_n)) {
        $nLimitN = $queue->nLimit_n;
    } elseif(isset($oJobQueue->nLimitN)) {
        $nLimitN = $oJobQueue->nLimitN;
    }
    if(isset($queue->nLimit_m)) {
        $nLimitM = $queue->nLimit_m;
    } elseif(isset($oJobQueue->nLimitM)) {
        $nLimitM = $oJobQueue->nLimitM;
        $oJobQueue->nInArbeit = 1;
        $oJobQueue->updateJobInDB();
    }

    //falls datei existiert, löschen
    if ($nLimitN==0 && file_exists(PFAD_ROOT.PFAD_EXPORT.$exportformat->cDateiname)) {
       unlink(PFAD_ROOT.PFAD_EXPORT.$exportformat->cDateiname);
    }
    

    
    
    
    
    $url = 'https://stromgraf.de';
    $screenName = 'stromgraf';

    $socials = new Socials($url, $screenName);

    $json = json_encode(array ('url'=>$url,'likeCount'=>$socials->likeCount,'plusOneCount'=>$socials->plusOneCount,'followerCount'=>$socials->followerCount,'zeitStempel'=>date('Y-m-d-H-i-s')));

    $f = fopen(PFAD_ROOT . PFAD_EXPORT . $exportformat->cDateiname, 'a');

    fwrite($f, $json);
    fclose($f); 
    
    if(isset($oJobQueue)) {
        $bCron = true;
    } else {
        $bCron = false;
    }
    
    if ($bCron === false){
         if(isset($queue)) {
            $GLOBALS["DB"]->executeQuery("update texportformat set dZuletztErstellt=now() where kExportformat=".$queue->kExportformat,4);
         } else {
            $GLOBALS["DB"]->executeQuery("update texportformat set dZuletztErstellt=now() where kExportformat=" . $oJobQueue->kKey, 4);
            $oJobQueue->deleteJobInDB();
        }

    }
    elseif ($bCron === true){
        if(isset($queue)) {
            $GLOBALS["DB"]->executeQuery("update texportqueue set nLimit_n=nLimit_n+".$nLimitM." where kExportqueue=".$queue->kExportqueue,4);
            $cURL = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?e=".$queue->kExportqueue."&back=admin";
            header ("Location: " . $cURL);
            exit;
        } elseif(isset($oJobQueue)) {
            updateExportformatQueueBearbeitet($oJobQueue);
            $oJobQueue->nInArbeit = 0;
            $oJobQueue->updateJobInDB();
        }
    }

?>
