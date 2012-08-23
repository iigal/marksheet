 	<script language="javascript">
	function confirm_delete(){
		var $report = confirm("Are you sure you want to delete this record");					
		return $report;
	}
	</script>

<?PHP
  	include "../required/database.php";
	$db = new db_mysql;
	if($_REQUEST['id'])
		$id=$_REQUEST['id'];
	if($_POST['user'])
		$user=$_REQUEST['user'];
	if($_POST['pass'])
		$pass=$_POST['pass'];
	if($_POST['level'])
		$level=$_POST['level'];
	
	function search()
	{	//search form
?>		
		 <div id="search_form" align="center">
		<form action="?page=user&action=search_user" method="post" >
        <table >
            <tr>
                <th colspan="3" style=" color: #000099"> Search User</th>
            </tr>
            <tr><td></td></tr>
           <tr>
                <td>User Name</td>
                <td><select name="user" id="textbox" />
                	<option></option>
                    <?php
                    $sql= "select * from login order by Username ASC"; 
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_assoc($query))
                    {
                       echo "<option value=\"".$row['Username']."\">".$row['Username']."</option>";
                    }   
                    ?>
                    </select>
                </td>
            </tr>
 
 			<tr>
                <td>Level</td>
                <td><select name="level" id="textbox" />
                	<option></option>
                    <?php
                    $sql= "select DISTINCT Level from login order by Level ASC"; 
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_assoc($query))
                    {
                       echo "<option value=\"".$row['Level']."\">".$row['Level']."</option>";
                    }   
                    ?>
                    </select>
                </td>
            </tr>
 
            <tr>
                <td colspan="3"><input type="submit" value="Search" id="btn" /></td>
            </tr>
        </table>
        </form> 	
       </div>  <!--div close of id="insert_form"-->
<?php	} // closing bracket of search funtion
	
	if($_REQUEST['action'] == "add_user")
	{
?>       <div id="insert_form" align="center">
        <!-- Add user form start-->     
        <form action="?page=user&action=do_add_user" method="post"  >
        <table>
            <tr>
                <th colspan="3" style=" color: #000099"> Insert New User</th>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>User Name </td>
                <td><input type="text" name="user" id="textbox" /></td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input  type="password" name="pass" id="textbox" /></td>
            </tr>
            <tr>
                <td>Level </td>
                <td><input type="text" name="level" id="textbox" /></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Submit" id="btn"/></td>
            </tr>
        </table>
        </form> 
        <!-- Add user form end-->    
        </div> <!--div close of id="insert_form" -->
<?Php
	}
	elseif($_REQUEST['action'] == "do_add_user")
	{
		if($user !="" and $pass != "" and $level != "")
		{
				//For not duplicate value
				$sql= "select * from login where Username='".$user."'";
				$query = mysql_query($sql);
				$count = mysql_num_rows($query);
				if($count==0)
				{
					$Save_Array=array("Username"=>$user,"Pass_Word"=>$pass,"Level"=>$level);
					$db->insert("login",$Save_Array);
					/*
					$sql = "INSERT INTO `login` (
						`Username` ,
						`Pass_Word` ,
						`Level` 
						)
						VALUES (
						'". $user."', '". $pass ."', '". $level ."')";
	
			
					$result=mysql_query($sql);
					if ($result=='1')
					{
						echo "New User inserted <br/>";
					}
					else
					{
						echo "Error inserting user";
					} */
					//refresh("main.php?page=user&action=add_user");
				}
				else{echo "Already Exists Username";}
		} // field  empty chha ki chhaina vanne ko closing bracket
		else
			echo "fields empty";
	}// if action= do_add_user ko closing bracket
	
	elseif($_REQUEST['action'] == "edit_user")
	{ 
		$sql= "select * from login where ID=".$id;
		$query=mysql_query($sql);
		while($row=mysql_fetch_assoc($query))
		{
?>
        <div id="insert_form" align="center">
        <!-- Edit user form start-->    
        <form action="?page=user&action=do_edit_user&id=<?PHP echo $row['ID']; ?>" method="post">
        <table>
            <tr>
                <th colspan="3" style=" color: #000099"> Edit User</th>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>User Name</td>
                <td><input type="text" name="user" value="<?PHP echo $row['Username'];?>" readonly="readonly" id="textbox"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" value="<?PHP echo $row['Pass_Word'];  ?>" id="textbox"/></td>
            </tr>
        	<tr>
                <td>Level</td>
                <td><input type="text" name="level" value="<?PHP echo $row['Level'];  ?>" id="textbox"/></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Edit" id="btn" /></td>
            </tr>
        </table>
        </form>
        <!-- Edit user form end-->    
        </div>  <!-- div close of id="insert_form"-->

<?PHP 	} //closing bracket of while 
	} //closing bracket of if action==edit_user

	elseif($_REQUEST['action'] == "do_edit_user")
	{
	   	//$sql= "select * from login where Username='".$user."'";
		//$query = mysql_query($sql);
		//$count = mysql_num_rows($query);
		
		$sql= "update `login` set `Pass_Word` = '".$pass."' , `Level` = '".$level."' where ID='".$id."'";
			
		$result=mysql_query($sql);
		if ($result=='1'){
			echo "User Edited";
		}
		else
		{
			echo "Error editing user";
		}
		//refresh("main.php?page=category");
	}//closing bracket of if action==do_edit_user

	elseif($_REQUEST['action'] == "del_user")
	{ 	
		$sql= "delete from `login` where ID='".$id."'";
		$result=mysql_query($sql);
		if ($result=='1')
		{
			echo "User Deleted";
		}
		else
		{
			echo "Error deleting user";
		}
		//refresh("main.php?page=user"); 
	}
	elseif($_REQUEST['action'] == "search_user")
	{ 
		search(); //search button click vaye pachhi ko search form call
		
		$sql= "select * from `login` where Username='".$user."' or Level='".$level."'";
		$query=mysql_query($sql);
	 
		echo "<div id='display_search' align='center'>";
		echo "<table border=1 cellpadding=5 cellspacing=0>";
		echo "<tr><th colspan=5 style= color:#000099>User</th></tr>";
		echo "<tr style= color:#0000FF><td colspan=2></td><th>User Name</th><th>Password</th><th>Level</th></tr>";
		while($row=mysql_fetch_assoc($query))
		{
 ?>
			<tr>
				<td><a href="main.php?page=user&action=edit_user&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
				<td><a href="main.php?page=user&action=del_user&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
				<td><?PHP echo $row['Username']; ?></td>
				<td><?PHP echo $row['Pass_Word']; ?></td>
                <td><?PHP echo $row['Level']; ?></td>  
			</tr>
<?PHP
		} //closing bracket of while
?>
		</table>
        </div> <!--div close of id='display_search'-->
       
<?PHP 
	} //closing bracket of if action==search_user
	else
	{
?>	
<?php		search(); //search button click hunu aghi ko search form call
		
		$sql= "select * from login order by Username ASC";
		$query=mysql_query($sql);
		echo "<div id='display_search' align='center'>";
		echo "<table border=1 cellpadding=5 cellspacing=0>";
		echo "<tr><th colspan=5 style= color:#000099>User</th></tr>";
		echo "<tr style= color:#0000FF><td colspan=2></td><th>User Name</th><th>Password</th><th>Level</th></tr>";
		while($row=mysql_fetch_assoc($query))
		{
?>
			<tr>
				<td><a href="main.php?page=user&action=edit_user&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
				<td><a href="main.php?page=user&action=del_user&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
				<td><?PHP echo $row['Username']; ?></td>
				<td><?PHP echo $row['Pass_Word']; ?></td>
                <td><?PHP echo $row['Level']; ?></td>
			</tr>
<?PHP
		}//closing bracket of while
?>
		</table>
        </div> <!--div close of id='display_search'-->
   
<?php
	}//closing bracket of else
?>
