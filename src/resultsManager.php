<?php


class resultsManager
{
    public function manageResults($results)
    {
        $txt = self::generateReportContent($results);
        self::generateTxtLog($txt);

        return true;
    }

    public function generateReportContent($results)
    {
        $header = "Website load time benchmark <br>";
        $date = "Report date:" . date("H:i:s d-j-Y") . "<br><br>";
        $intro = "Benchmark results: <br>";

        $txt = $header . $date . $intro;

        foreach ($results as $url => $time){
            $txt .= "$url - load time: $time <br>";
        }

        //        print_r($txt);

        return $txt;
    }

    public function generateTxtLog($txt)
    {
        $logFile = fopen("log.txt", "w");
        fwrite($logFile, str_replace("<br>", "\r\n", $txt));
        fclose($logFile);

        header('Content-type: application/txt');
        header('Content-Disposition: attachment; filename="log.txt"');
        readfile('log.txt');
        unlink("log.txt");


    }

    public function sendEmail($txt)
    {

    }

}