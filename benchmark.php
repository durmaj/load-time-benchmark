<?php
 require_once 'src/formHandler.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $urls = $_GET;

        $formHandler = new formHandler();
        $formHandler->manageUrls($urls);

    }