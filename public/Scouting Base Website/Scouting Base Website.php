<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Scouting Base 1.0</title>
<style>

	#mainTitleWords {
		
 position: relative;
  left: 460px;
  
  
  	
	}
	
	#mainTitle {
  position: relative;
  background-color:gray; 
  height:100px;    
	    
	}
	
	#menu {
	 
	 position:relative;
	 
	 background-color:black;
	  height:50px;
	    
	    
	    
	}
	
	#field {
	    
	  position:relative;
	  color:white;
	  font-size:30px;
	  top:5px;  
	    
	    
	}
		
	
</style>
</head>

<body>
	<div id = "mainTitle">
	  <h1 id =mainTitleWords> Welcome to the Scouting Website</h1>
    </div>

	<div id = "menu"> 

	<p id = "field"> Field </p>
	
	</div>

	<div id = "firstForm"> 
	
	<form action="/action_page.php">

Match Number: <input type="text" id ="matchNumber"><br>

Team Number: <input type="text" id ="teamNumber"><br>

<p> Alliance </p>

<div id = "alliance">

<input type="radio" id ="red" value="red"> Red

<input type="radio" id="blue" value="blue"> Blue<br>

</div>

<p> Automonus </p>

Number of Power Cells Held:<br> 
<input type="number" id="numberOfPowerCellsHeld"><br>

Bottom Port:<br> 
<input type="text" id ="bottomPort"><br>

Top Port:<br> 
<input type="number" id="topPort"><br>


<br>
<br>		
<br>

Teleop<br>

<br>
Bottom Port:<br>
<input type="text" id ="bottomPort2"><br>

Top Port<br>
<input type="number" id="topPort2"><br>

<br>

Shield Generator<br>
<input type="number" id="topPort2"><br>

<br>
<br>
<br>
<br>
<input type="submit" value="Submit">

</form>
	
	</div>
	
	
</body>
</html>
