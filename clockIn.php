<!DOCTYPE html>
<html>
<head>
    <title>Clock In</title>
</head>

<script>
    <?php
    include "include/connect.php";

    $cwid = $_SESSION['CWID'];
    $insert = mysqli_query($link, "INSERT INTO HOURS_WORKED (CWID, CLOCK_IN) VALUES ($cwid, convert_tz(now(), 'UTC', 'America/Los_Angeles'))"); 
    echo mysqli_error($link);
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