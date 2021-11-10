<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
    #header {
    height: 55em;
    margin: 10 11em;
}

/*
.menu-list-container {
    margin: 0;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
}
*/

#menu-bar {
	height: 64px;
	background-color: #2dc4cf27;
 
}

.menu-list-container {
	display: table;   /* Allow the centering to work */
	margin: 0 auto;
    
}

.main-menu-list {
	min-width: 696px;
	list-style: none;
	padding-top: 20px;

	}
	ul.main-menu-list li {
		display: inline;
	}


</style>

</head>
<body>
   <?php
    //echo "<p>lol</p>";
   ?>

<div id="header" style="position: relative;">
   <div style="float:left; height: 60px; ">
                    <a href="http://localhost/Competitive-programming-platform/index.php"><img alt="Competitive Programming Platform" title="Thank You" src="./CP platform.png"  style="display: block; margin-left:auto; margin_right: auto; width: 60%; height:160px" ></a>
    </div>
    
    <div id="login" style="text-align: right;">
      <a href=""> sign in </a>

    </div>
<br>

    <div id="menu-bar">
    <div class="menu-list-container">
    <ul class="main-menu-list">
                <li class="current"><a href="/">Home</a></li>
                <li class=""><a href="/top">Top</a></li>
                <li class=""><a href="/contests">Contests</a></li>
                <li class=""><a href="/gyms">Gym</a></li>
                <li class=""><a href="/problemset">Problemset</a></li>
                <li class=""><a href="/groups">Groups</a></li>
                <li class=""><a href="/ratings">Rating</a></li>
                <li class=""><a href="/edu/courses"><span class="edu-menu-item">Edu</span></a></li>
                <li class=""><a href="/apiHelp">API</a></li>
                <li class=""><a href="/calendar">Calendar</a></li>
                <li class=""><a href="/help">Help</a></li>
    </ul>
      <!--  <form method="post" action="/search"><input type="hidden" name="csrf_token" value="500463444a364ebfc680e2f21fe0ce44">
            <input class="search" name="query" data-isplaceholder="true" value="">
        <input type="hidden" name="_tta" value="415"></form>  -->
    <br style="clear: both;">
</div>
</div>
   


    

</body>
</html>