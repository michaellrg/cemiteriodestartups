<?php

	$db_host = "localhost"; 
	$db_user = "root";  
	$db_pass = ''; 
	$db_name = "startups";

    $connect = mysql_connect($db_host,$db_user,$db_pass);
        if ($connect) {
            //echo "Done";
            $dbselect=mysql_select_db($db_name);
            if ($dbselect) {
                //echo "Database Selected";
            }else{
                //echo "Database Locked";
                }
            }else{
                //echo "Your Doomed";
		  }

    $per_page = 20;

    $pages_query = mysql_query("SELECT count(*) AS id from startup");
        if($pages_query){
                // echo "Get Total number of pages to be shown from total result";
                $pages = ceil(mysql_result($pages_query, 0)/$per_page);
                //get current page from URL, f not present set it to 1
                $page = (isset($_GET['page']))? (int)$_GET['page'] : 1;
                //calculate actual page with respect to Mysql
                $start = ($page - 1) * $per_page;
                //execute a mysql query to retrieve all result from current page by using LIMIT keyword
                //if query fails stop further execution and show mysql error
                $query = mysql_query("SELECT * from startup LIMIT $start, $per_page");
                }

            else{
                echo "Not Yet";
            }
?>