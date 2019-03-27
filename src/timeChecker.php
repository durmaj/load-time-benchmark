<?php

require_once "resultsManager.php";

class timeChecker
{

    private $resultsManager;

    public function __construct()
    {
        $this->resultsManager = new resultsManager();
    }

    /*
     * checks the load time for provided URL
     */
    public function checkLoadTime($url)
    {
        $time = microtime( true);
        file_get_contents($url);
        $time = microtime( true) - $time;

        return round($time * 1000); //output in miliseconds
    }

    public function calculateDifference($results, $mainUrl)
    {
        $compared = [];

        foreach ($results as $url => $time){

            if ($url != $mainUrl){
                if ($results[$mainUrl] > $time){

                    $difference = $results[$mainUrl] - $time;
                    $compared['faster'][$url] = $difference;

                    if($difference > 2*$results[$mainUrl]){
                        $this->resultsManager->sendSMS();
                    }

                } else {
                    $time - $difference = $results[$mainUrl];
                    $compared['slower'][$url] = $difference;
                }
            }
        }

        return $compared;
    }

}