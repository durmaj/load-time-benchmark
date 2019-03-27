<?php

class timeChecker
{
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

}