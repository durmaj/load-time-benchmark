**Load time benchmark**

It is a small PHP browser-available script designed to compare the load time of provided URL-s. It's working out-of-the-box, without need to install any other bundles.

**USAGE:**

Just install the app on your localhost or server, go to the index.html and paste the URLs. That's all. You'll get the results in the browser an in the log.txt file. The log.txt report is saved in the main directory of application.


 **Application workflow:**
 
 1. form submit goes to benchmark.php
 2. formhandler gives all url-s to the urlvalidator
 3. if urls are valid, formhandler gives the urls to timechecker
 4. formhandler passes the results to resultsmanager
 5. resultsmanager passes results to logger and if needed to smssender
 6. formhandler shows the page with result 