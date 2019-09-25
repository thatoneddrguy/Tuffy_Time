<!DOCTYPE html>
<html>
<head>
    <title>Tuffy Time Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
    <script>
        // constantly shows the time
        function showCurrentTime()
        {
            var current = new Date();
            var hours = current.getHours();
            var minutes = current.getMinutes();
            var seconds = current.getSeconds();
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12 // make it 12 hour format
            hours = hours ? hours : 12; // if its hour '0' it should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes; // if minutes is less than 10 then add 0
            seconds = seconds < 10 ? '0' + seconds : seconds; // same as minutes  
            var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            document.getElementById('txt').innerHTML = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            var t = setTimeout(showCurrentTime,500); //updates the timer every second
        }
    </script>
    <body>
        <div class="bg-image" id="txt">
            <script>showCurrentTime();</script>
        </div>
        <div class="bg-image"></div>
    </body>
</html>