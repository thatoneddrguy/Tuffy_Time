<!DOCTYPE html>
<html>

<script>
    <?php
        session_start();
        session_destroy();
        //header('location: index.php');
    ?>
    function logOut()
    {
        alert("You are now logged out. Thank you for using Tuffy Time!");
        window.open("index.php","_self");
    }

</script>

<body>
    <script>logOut()</script>
</body>
</html>