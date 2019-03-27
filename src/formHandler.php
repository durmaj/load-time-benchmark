<?php

require_once "urlValidator.php";
require_once "timeChecker.php";
require_once "resultsManager.php";


class formHandler
{

    /*
     * Gets all urls from form and performs:
     * 1. validity check
     * 2. load time test
     * 3. passing results to resultsManager
     */

    private $urlValidator;
    private $timeChecker;
    private $resultsManager;

    public function __construct()
    {
        $this->urlValidator = new urlValidator();
        $this->timeChecker = new timeChecker();
        $this->resultsManager = new resultsManager();
    }

    public function manageUrls($urls)
    {
        $results = [];

        foreach ($urls as $url) {

            if (!$this->urlValidator->checkUrl($url)){
                echo "Wrong URL: " . $url;
                exit;
            } else {
                $loadTime = $this->timeChecker->checkLoadTime($url);
                $results[$url] = $loadTime;
            };
        }

        $this->resultsManager->manageResults($results);

//        var_dump($results);
    }

}