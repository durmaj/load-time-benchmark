<?php


class resultsManager
{
    public function manageResults($results)
    {
        self::generateReportContent($results);


        return true;
    }

    public function generateReportContent($results)
    {
        $header = "Website load time benchmark \n ";
        $date = "Report date:" . date("H:i:s d-j-Y") . "\n\n";
        $intro = "Benchmark results: \n";

        $txt = $header . $date . $intro;

        foreach ($results as $url => $time){
            $txt .= "$url - load time: $time \n";
        }

        print_r($txt);

    }

    public function generateTxtLog($results)
    {

    }

    public function sendEmail()
    {

    }

}