<!DOCTYPE html>
<html>
<head>
    <title>Clock In</title>
</head>


<script>
    <?php
    include "include/connect.php";
    $date = date('Y-m-d H:i:s');
    echo $date; 
    $insert = mysqli_query($link, "INSERT INTO HOURS_WORKED (CWID, CLOCK_IN) VALUES (111222333, convert(datetime, $date))"); 
    echo mysqli_error($link);
    ?>

    function clockIn()
    {
        alert("You are now clocked in!");
        //window.open("home.php","_self");
    }

</script>

<body>
    <script>clockIn();</script>
</body>
</html>