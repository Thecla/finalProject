<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/style.css" media="all" />
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>
</head>
<body>
<div class="main_wrapper">
		<div class="header">
		<div id="menubar">
		<img id="logo" src="images/logo.jpg" style="height:100px; width:200px" />
		<img id="cuealogo" src="images/cuealogo.jpg" style="height:100px; width:200px float:right" />
		</div>
		</div>
		<div class="menubar">		
			</div>
		</div>
		<div class="content_wrapper" style="" >
				<div id="content_area" style="margin-top:50px;height:400px;" >
<h1>Report Page</h1>
<p><h2 style="color:#003333;">Click on the button to open the dropdown menu and select a report.</h2></p>

<div class="dropdown">
<button onclick="myFunction()" class="dropbtn" style="background:#293f50;">Select Report to Print</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="Anyname.php">Patient Reports</a>
    <a href="prescriptionReports.php">Prescription Details</a>
    <a href="#contact">Contact</a>
  </div>
</div>
</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<div id="footer">
		<h2 style="text-align:center; padding-top:30px; ">&copy; tcqy2k@gmail.com 2016</h2>
		</div>
	</div>
</body>
</html>