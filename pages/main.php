<?PHP  	
		include "../required/class.php";
			
		if(!isset($_SESSION['admin']))
		{	
			 refresh("index.php");
		} 
		 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="../css/css.css" type="text/css" charset="utf-8" />
	<?PHP include_once "../header.php"; ?>
    
		<script language="javascript">    
         // javascript code for drop down menu 
        
        var timeout	= 500;
        var closetimer	= 0;
        var ddmenuitem	= 0;
        
        // open hidden layer
        function mopen(id)
        {	
            // cancel close timer
            mcancelclosetime();
        
            // close old layer
            if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
        
            // get new layer and show it
            ddmenuitem = document.getElementById(id);
            ddmenuitem.style.visibility = 'visible';
        
        }
        // close showed layer
        function mclose()
        {
            if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
        }
        
        // go close timer
        function mclosetime()
        {
            closetimer = window.setTimeout(mclose, timeout);
        }
        
        // cancel close timer
        function mcancelclosetime()
        {
            if(closetimer)
            {
                window.clearTimeout(closetimer);
                closetimer = null;
            }
        }
        
        // close layer when click-out
        document.onclick = mclose;
        
        </script>
</head>

<body>
  <div id="wrapper">

    <div id="header"> 
  
      <div id="logo">
        <h1>Eagles Solutions</h1>
        <p>Online Marksheet System</p>
      </div>
   
 	<?PHP 
 include "login.php";
 	?>
     </div>	
    <?php
	 
		if($_REQUEST['action'] == "logout"){
			SESSION_DESTROY();			
			refresh ("../index.php");	
		}
		else{   
	?>
    	<div id="menu_bar">
	<?PHP 
		 include "top_menu.php"; 
	?>
	    </div> 
    <div id="right">
    
		<?PHP  
		

		if(empty($_REQUEST['page'])|| ($_REQUEST['page'] == 'main')){
				echo "<h2 style='  border-bottom: 0px;
  padding-bottom: 0px;
  margin-bottom: 1em;'>You are welcome to admin page of Online Marksheet</h2>";
				include_once "admin.php";

			}
			else 
				include_once($_REQUEST['page'].".php");
				
		}
//				echo "<p style=\"color:#fa0000;font-weight:bold;\">requested page is: ".$_REQUEST['page']."</p>";
		?>
    </div>
    <div class="clear"></div>
    <div id="spacer"> </div>
	    <div class="clear"> </div>
    
    <div id="spacer"> </div>
	<?PHP  include_once "../footer.php"; ?>
  	</div>

</body>
</html>