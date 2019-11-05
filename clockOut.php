<!DOCTYPE html>
<html>
<head>
    <title>Clock Out</title>
</head>

<script>
    <?php
    include "include/connect.php";
    $cwid = $_SESSION['CWID'];
    mysqli_query($link, "UPDATE HOURS_WORKED SET CLOCK_OUT = convert_tz(now(), 'UTC', 'America/Los_Angeles') WHERE CLOCK_OUT IS NULL AND CWID = $cwid");
    echo mysqli_error($link);
    ?>
    function clockOut()
    {
        alert("You are now clocked out. Have a good day!");
        window.open("home.php","_self");
    }

</script>

<body>
    <script>clockOut();</script>
</body>
</html>