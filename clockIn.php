<!DOCTYPE html>
<html>
<head>
    <title>Clock In</title>
</head>

<script>
    <?php
    include "include/connect.php";

    $cwid = $_SESSION['CWID'];

    // check if user already clocked in
    $result = mysqli_query($link, "SELECT * FROM HOURS_WORKED WHERE CLOCK_IN IS NOT NULL AND CLOCK_OUT IS NULL AND CWID = $cwid");
    if (mysqli_num_rows($result) == 0)
    {
        $insert = mysqli_query($link, "INSERT INTO HOURS_WORKED (CWID, CLOCK_IN) VALUES ($cwid, convert_tz(now(), 'UTC', 'America/Los_Angeles'))");
    }
    else    
    {   
        // user already clocked in
        header('location: home.php');
    }
    ?>
    function clockIn()
    {
        alert("You are now clocked in!");
        window.open("home.php","_self");
    }

</script>

<body>
    <script>clockIn();</script>
</body>
</html>