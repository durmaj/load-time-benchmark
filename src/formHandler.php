<?php

require_once "urlValidator.php";
require_once "timeChecker.php";


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

    public function __construct()
    {
        $this->urlValidator = new urlValidator();
        $this->timeChecker = new timeChecker();

    }

    public function manageUrls($urls)
    {

        foreach ($urls as $url) {

            if (!$this->urlValidator->checkUrl($url)){
                echo "Wrong URL: " . $url;
                exit;
            } else {
                $loadTime = $this->timeChecker->checkLoadTime($url);
                echo $loadTime;
            };
        }
    }

}