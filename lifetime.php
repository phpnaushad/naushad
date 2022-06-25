<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  
<style media="screen">
body {
    text-align: center;
    padding: 100px 60px;
    background: #90cbf3;
    font-family: sans-serif;
    font-weight: lighter;
}

#timer {
    font-size: 3em;
    font-weight: 100;
    color: white;
    padding: 20px;
    width: 700px;
    color: white;
    
}

#timer div {
    display: inline-block;
    min-width: 90px;
    padding: 15px;
    background: #020b43;
    border-radius: 10px;
    border: 2px solid #030d52;
    margin: 15px;
}

#timer div span {
    color: #ffffff;
    display: block;
    margin-top: 15px;
    font-size: .35em;
    font-weight: 400;
}
</style>
</head>

<body>
<div id="timer"></div>

<script type="text/javascript">
function updateTimer() {   
//.toISOString().split('T')[0]   
   // var dob = new Date("<?php echo $dob; ?>");  // MM-DD-YYYY	
    
    var dob = new Date("12-01-1990");  // MM-DD-YYYY	
	//alert(dob);
    var dob_new = dob.setDate(dob.getDate()+36500); // add 100 year (365*100)
	//alert(dob_new);
    var now = new Date(dob_new);   
	//alert(now);
    var future = Date.parse(now);
    //alert(future);
    var now = new Date();
	//alert(now);
    var diff =  future - now;
	//alert(diff);

    var years = Math.floor(diff / (1000 * 60 * 60 * 24 * 30 * 12));
    var months = Math.floor(diff / (1000 * 60 * 60 * 24 * 30));

    var days = Math.floor(diff / (1000 * 60 * 60 * 24));
    var hours = Math.floor(diff / (1000 * 60 * 60));
    var mins = Math.floor(diff / (1000 * 60));
    var secs = Math.floor(diff / 1000);

    var ys = years;
    var ms = months - years * 12;
    var d = days - months * 30;
    //d = days;
    var h = hours - days * 24;
    var m = mins - hours * 60;
    var s = secs - mins * 60;

    document.getElementById("timer")
        .innerHTML =
        '<div>' + ys + '<span>Years</span></div>' +
        '<div>' + ms + '<span>Months</span></div>' +       
        '<div>' + d + '<span>Days</span></div>' +
        '<div>' + h + '<span>Hours</span></div>' +
        '<div>' + m + '<span>Minutes</span></div>' +
        '<div>' + s + '<span>Seconds</span></div>';
}
setInterval('updateTimer()', 1000);
</script>

</body>
</html>
