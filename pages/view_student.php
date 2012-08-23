 
<?PHP
  	include "../required/database.php";
	$db = new db_mysql;
	if($_REQUEST['id'])
		$id=$_REQUEST['id'];
	if($_POST['fname'])
		$fname=$_POST['fname'];	
	if($_POST['lname'])
		$lname=$_POST['lname'];	
	if($_REQUEST['classid'])
		$classid=$_REQUEST['classid'];	
	if($_POST['class'])
		$class=$_POST['class'];
	if($_REQUEST['sec'])
		$sec=$_REQUEST['sec'];		
	if($_POST['roll'])
		$roll=$_POST['roll'];	
	if($_POST['sid'])
		$sid=$_POST['sid'];	
	if($_POST['dob'])
		$dob=$_POST['dob'];	
	if($_POST['gender'])
		$gender=$_POST['gender'];	
	if($_POST['address'])
		$address=$_POST['address'];	
	if($_POST['phone'])
		$phone=$_POST['phone'];	
	if($_POST['mobile'])
		$mobile=$_POST['mobile'];	
	if($_POST['email'])
		$email=$_POST['email'];	
	if($_POST['year'])
		$year=$_POST['year'];	

	function search()
	{	//search form
?>		<div id="search_form" align="center">
	 	<form action="?page=view_student&action=search_student" method="post" />
        <table >
            <tr>
                <th colspan="3" style=" color:#000099"> Search student</th>
            </tr>
            <tr>
                <td>Year</td>
                <td><select name="year" id="textbox" />
                 <option></option>
                    <?php
                    $sql= "select DISTINCT Year from student order by Year ASC"; 
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_assoc($query))
                    {
                       echo "<option value=\"".$row['Year']."\">".$row['Year']."</option>";
                    }   
                    ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Class ID</td>
                <td><select name="classid" id="textbox" />
                    <option></option>
                    <?php
                    $sql= "select DISTINCT ClassID from student order by ClassID ASC"; 
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_assoc($query))
                    {
                       echo "<option value=\"".$row['ClassID']."\">".$row['ClassID']."</option>";
                    }   
                    ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>First Name </td>
                <td><select name="fname" id="textbox" />
                  <option></option>
                    <?php
                    $sql= "select DISTINCT FirstName from student order by FirstName ASC"; 
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_assoc($query))
                    {
                       echo "<option value=\"".$row['FirstName']."\">".$row['FirstName']."</option>";
                    }   
                    ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Gender </td>
                <td><select name="gender" id="textbox" />
                   <option></option>
                    <?php
                    $sql= "select DISTINCT Gender from student order by Gender ASC"; 
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_assoc($query))
                    {
                       echo "<option value=\"".$row['Gender']."\">".$row['Gender']."</option>";
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
<?php
	} // closing bracket of search funtion
	
	function refresher()
	{
?>		<form action="?page=view_student" method="post">
        <table align="center" >
        <tr>
                <td colspan="3"><input type="submit" value="Refresh" id="btn"/></td>
            </tr>
        </table>
        </form> 
<?php
	} // closing bracket of refresher funtion
	
	if($_REQUEST['action'] == "search_student")
	{   
			search(); //search button click vaye pachhi ko search form call
		
            $sql= "select * from `student` where FirstName='".$fname."' or ClassID='".$classid."' or Gender='".$gender."' or Year='".$year."' ";
                
            $query=mysql_query($sql);
			
			echo "<div id='display_search' align='center'";
            echo "<table border=1 cellpadding=5 cellspacing=0>";
            echo "<tr><th colspan=14 style= color:#000099>View Student Info</th></tr>";
            echo "<tr style= color:#0000FF></td><th>First_Name</th><th>Last_Name</th><th>ClassID</th><th>Roll</th><th>Student_ID</th><th>DOB</th><th>Gender</th><th>Address</th><th>Phone</th><th>Mobile</th><th>Email</th><th>Year</th></tr>";
            while($row=mysql_fetch_assoc($query))
			{
		 ?>
                <tr>
                   
                    <td><?PHP echo $row['FirstName']; ?></td>
                    <td><?PHP echo $row['LastName']; ?></td> 
                    <td><?PHP echo $row['ClassID']; ?></td>
                    <td><?PHP echo $row['Roll']; ?></td>
                    <td><?PHP echo $row['SID']; ?></td>
                    <td><?PHP echo $row['DOB']; ?></td>
                    <td><?PHP echo $row['Gender']; ?></td> 
                    <td><?PHP echo $row['Address']; ?></td>
                    <td><?PHP echo $row['Phone']; ?></td>
                    <td><?PHP echo $row['Mobile']; ?></td>
                    <td><?PHP echo $row['Email']; ?></td>
                    <td><?PHP echo $row['Year']; ?></td>
                </tr>
<?PHP
			} // end of while
?>
        </table>
       
<?PHP 
		refresher(); //refresh funtion call
?>
		</div> <!--div close of id='display_search'-->	 
<?PHP 		
	} // closing bracket of if action=search_subject 
	else
	{
			search(); //search button click hunu aghi ko search form call
	?>
		<div id="display_search">
<?php			
		    $sql= "select * from student order by ID DESC";
            $query=mysql_query($sql);
			//echo "<div id='display_search' align='center'";
            echo "<table border=1 cellpadding=5 cellspacing=0>";
            echo "<tr><th colspan=14 style= color:#000099>View Student Info</th></tr>";
            echo "<tr style= color:#0000FF></td><th>First_Name</th><th>Last_Name</th><th>ClassID</th><th>Roll</th><th>Student_ID</th><th>DOB</th><th>Gender</th><th>Address</th><th>Phone</th><th>Mobile</th><th>Email</th><th>Year</th></tr>";
            while($row=mysql_fetch_assoc($query))
			{
		 ?>
                <tr>
                    <td><?PHP echo $row['FirstName']; ?></td>
                    <td><?PHP echo $row['LastName']; ?></td> 
                    <td><?PHP echo $row['ClassID']; ?></td>
                    <td><?PHP echo $row['Roll']; ?></td>
                    <td><?PHP echo $row['SID']; ?></td>
                    <td><?PHP echo $row['DOB']; ?></td>
                    <td><?PHP echo $row['Gender']; ?></td> 
                    <td><?PHP echo $row['Address']; ?></td>
                    <td><?PHP echo $row['Phone']; ?></td>
                    <td><?PHP echo $row['Mobile']; ?></td>
                    <td><?PHP echo $row['Email']; ?></td>
                    <td><?PHP echo $row['Year']; ?></td>
                </tr>
        <?PHP } // end of while
		?>
        </table>
       
       
<?php
		refresher(); //refresh funtion call
?>
		</div> <!--div close of id='display_search'-->	 
<?PHP 		
	} // end of else
?>
