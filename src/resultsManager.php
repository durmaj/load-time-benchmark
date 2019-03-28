<?php

class resultsManager
{
    public function manageResults($results, $comparision)
    {
        $txt = self::generateReportContent($results, $comparision);

        self::generateTxtLog($txt);

        if (!empty($comparision['faster'])) {
            self::sendEmail($txt);
        }

        self::showResults($txt);
    }

    public function generateReportContent($results, $comparision)
    {
        $header = "Website load time benchmark <br><br>";
        $date = "Report date:" . date("H:i:s d-j-Y") . "<br><br>";
        $intro = "Benchmark results: <br>";

        $txt = $header . $date . $intro;

        foreach ($results as $url => $time){
            $txt .= "$url - load time: $time miliseconds <br>";
        }

        $txt .= "<br>
                 Differences in load times comparing to your main website: <br><br>";

        if (!empty($comparision['faster'])) {
            $txt .= "Faster websites: <br>";

            foreach ($comparision['faster'] as $fasterWebsite => $time) {
                $txt .= "$fasterWebsite - $time miliseconds faster load time <br>";
            }

            $txt .= "<br><br>";
        }


        if (!empty($comparision['slower'])) {
            $txt .= "Slower websites: <br>";

            foreach ($comparision['slower'] as $slowerWebsite => $time) {
                $txt .= "$slowerWebsite - $time miliseconds slower load time <br>";
            }
        }
        return $txt;
    }

    public function generateTxtLog($txt)
    {

        $logFile = fopen("log.txt", "w");
        fwrite($logFile, str_replace("<br>", "\r\n", $txt));
        fclose($logFile);

        return true;
    }

    public function sendEmail($txt)
    {
        mail('m.durmaj@gmail.com', 'Website benchmark report', $txt);

        return true;
    }

    public function sendSMS()
    {
        $message = "Your website is significantly slower than competitors. Please check the log file.";

//        $smsApi->sendSMS; //Mockup.

        return true;
    }

    public function showResults($txt)
    {
        echo $txt;
    }

}