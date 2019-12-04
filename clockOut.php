<!DOCTYPE html>
<html>
<head>
    <title>Clock Out</title>
</head>

<script>
    <?php
    include "include/connect.php";

    $cwid = $_SESSION['CWID'];

    // check if user already clocked out
    $result = mysqli_query($connection->link, "SELECT * FROM HOURS_WORKED WHERE CLOCK_OUT IS NULL AND CLOCK_IN IS NOT NULL AND CWID = $cwid");
    if (mysqli_num_rows($result) == 0)
    {
        // user already clocked out
        header('location: home.php');
    }

    else
    {
        mysqli_query($connection->link, "UPDATE HOURS_WORKED SET CLOCK_OUT = convert_tz(now(), 'UTC', 'America/Los_Angeles') WHERE CLOCK_OUT IS NULL AND CWID = $cwid");
        echo mysqli_error($connection->link);
    }

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