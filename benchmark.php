<?php
 require_once 'src/formHandler.php';

 /*
  * workflow:
  * 1. form submit goes to benchmark.php
  * 2. formhandler gives all url-s to the urlvalidator
  * 3. if urls are valid, formhandler gives the urls to timechecker
  * 4. formhandler passes the results to resultsmanager
  * 5. resultsmanager passes results to logger and if needed to smssender
  * 6. formhandler shows the page with result
  *
  */

    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $urls = $_GET;

        $formHandler = new formHandler();
        $formHandler->manageUrls($urls);

    }