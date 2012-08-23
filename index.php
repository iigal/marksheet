<?PHP
		require_once "./required/class.php";
		if(isset($_SESSION['admin'])){
			echo 'redirecting... <br /> if you are not redirected within 5 seconds please <a href=\'main.php?page=main\'>click here</a>';
			refresh('./pages/main.php?page=main');
		}
		else{
		require_once './pages/mainval.php';
		require_once './required/database.php';
		/*connectdb(); */
		$con= new db_mysql();
		$action = $_GET['action'];
		if($action == "signin")
		{		
			$name = $_POST['txtUname'];
			$pass = $_POST['txtPass'];
			
			$sql = "SELECT * FROM `login` WHERE Username='$name' AND Pass_Word='$pass'";
	//		echo $sql;
	
			$rs = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_assoc($rs);
			$count = mysql_num_rows($rs);
			if( $count == 1){
			
				$_SESSION['admin'] = $name;
				$_SESSION['Level'] = $row['Level'];
				
				refresh('./pages/main.php?page=admin');
			}
		else{
			$error_message= "Username/Password Invalid";
		}
	}	
		?>
        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="css/css.css" type="text/css" charset="utf-8" />
	<?PHP  include_once "header.php"; ?>
</head>

<body>
  <div id="wrapper">

    <div id="header"> 
  
      <div id="logo">
        <h1>iigal's work</h1>
        <p>Online Marksheet System</p>
      </div>    
     </div>    
<style type="text/css">@import url(./css/css.css);</style>
  <body>
    <center>
      <div id="wrapper_index">

        <div id="body">
<form action="index.php?action=signin" method="post" name="frmAdminLogin">

	<center><table cellpadding="0" cellspacing="0" border="0">

				<tr><td colspan="3" height="14px"></td></tr>
		<tr>
			<td class="headin" colspan="3" height="22px"><b>Eagles Solution Login</b></td>
		</tr>
		
        <tr>
			<td colspan="3" height="5px"></td>
		</tr>
		
        <tr>
			<td class="label">UserName:</td>
			<td width="5px"></td>
			<td ><input class="txtBoxes" type="text" name="txtUname"></td>
		</tr>
		
		<tr>
			<td colspan="3" height="3px"></td>
		</tr>
		
		<tr>
			<td class="label">Password:</td>
			<td width="5px"></td>
			<td width="120px"><input class="txtBoxes" type="password" name="txtPass"></td>
		</tr>
		
		<tr>
			<td colspan="3" height="3px"></td>
		</tr>
		
		<tr>
			<td colspan="3" style="text-align:right;"><input class="buttons" type="submit" name="btnLogin" value="Sign In"  id="btn"></td>
		</tr>
		<tr>
			<td colspan="3" width="20">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" class="error">
			<?php	if(isset($error_message))
				print "<b><font face='Arial, Helvetica, sans-serif' size='2' color='#ff0000'>$error_message</font></b>"?></td>
		</tr>
	</table></center>
</form>
            </div>
          </div>
	
	
      <?PHP include ("./footer.php"); ?>
    </center>
  


</body>
  <?PHP  } ?>