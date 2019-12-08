<?php
     include "include/connect.php";

    $current_page = basename($_SERVER['PHP_SELF']);
	$clock_in = 1;  // 0 for clocked out, 1 for clocked in

    // assuming connect.php was included before header.php
    $result = mysqli_query($connection->link, "SELECT * FROM HOURS_WORKED WHERE CLOCK_OUT IS NULL AND CWID=".$_SESSION['CWID'].";");

    // if there are no results where CLOCK_OUT is blank, then we know the user is clocked out.
    if(mysqli_num_rows($result) == 0)
    {
            $clock_in = 0;
    }
    if ($clock_in == 1)
    {
        http_response_code(200);
    }
    else
    {
        http_response_code(303);
    }
    //echo "json_encode($clock_in);";
?>