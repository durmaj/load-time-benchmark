<?php

class urlValidator
{
    /*TODO: sth wrong here.
     * checks if provided URL is valid
     */
    public function checkUrl($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }
    }

}