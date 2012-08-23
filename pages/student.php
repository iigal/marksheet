 	<script language="javascript">
	function confirm_delete(){
		var $report = confirm("Are you sure you want to delete this record");					
		return $report;
	}
	
	function showclass(str)
	{
	if (str=="")
	  {
	  document.getElementById("class_ajax").innerHTML="";
	  return;
	  }  
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("class_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","getclass.php?year="+str,true);
	xmlhttp.send();
	}
	
	function showsection(str, str1)
	{
	if (str=="")
	  {
	  document.getElementById("section_ajax").innerHTML="";
	  return;
	  }  
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("section_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","getsection.php?class="+str+"&year="+str1,true);
	xmlhttp.send();
	}
	
	function showclassid(str, str1, str2)
	{
	if (str=="")
	  {
	  document.getElementById("classid_ajax").innerHTML="";
	  return;
	  }  
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("classid_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","getclassid.php?sec="+str+"&year="+str1+"&class="+str2,true);
	xmlhttp.send();
	}
	
	function generate_sid()
	{
		var $yr= document.insert.elements.year;
		var $clsid = document.insert.elements.classid;
      	var $rollno = document.insert.elements.roll;
		var $s_id= document.insert.elements.sid;
		
		$s_id.value=( $yr.value+"-"+$clsid.value+"-"+ $rollno.value);
		
		
    }
	</script>

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
	 	<form action="?page=student&action=search_student" method="post" />
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
?>		<form action="?page=student" method="post">
        <table align="center" >
        <tr>
                <td colspan="3"><input type="submit" value="Refresh" id="btn"/></td>
            </tr>
        </table>
        </form> 
<?php
	} // closing bracket of refresher funtion
	
	if($_REQUEST['action'] == "add_student")
	{
?>      <div id="insert_form" align="center">
		<!-- page load huda ko insert form-->        
		<form name="insert" action="?page=student&action=do_add_student" method="post"/>
            <table>
                <tr>
                    <th colspan="3" style=" color: #000099"> Insert student info</th>
                </tr>
                <tr>
                    <td>Year</td>
                    <td><select name="year" id="textbox"  onChange="showclass(this.value)"/>
						<option> Select a year </option>
						<?php
						$sql= "select DISTINCT Year from class order by Year ASC"; 
						$query=mysql_query($sql);
						while($row=mysql_fetch_assoc($query))
						{
						   echo "<option value=\"".$row['Year']."\">".$row['Year']."</option>";
						}   
						?>
						</select>
					</td>
                </tr>
                
                <tr id="class_ajax">
                    <td>Class</td>
                    <td><select name="class" id="textbox" />
                        <option > Select year first </option>
                        </select>
                    </td>
                </tr>
                <tr id="section_ajax" >
                    <td>Section</td>
                    <td><select name="sec" id="textbox" />
                        <option > Select class first </option>
                        </select>
                    </td>
                </tr>
                
               <tr id="classid_ajax">
                    <td>Class ID</td>
                    <td><select name="classid" id="textbox" />
                        <option > Select section first </option>
                        </select>
                    </td>
                </tr>
                
                 <tr>
                    <td>First Name </td>
                    <td><input type="text" name="fname" id="textbox"/></td>
                </tr>
                
                
                <tr>
                    <td>Last Name </td>
                    <td><input type="text" name="lname" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Roll </td>
                    <td><input type="text" name="roll" id="textbox" onblur="generate_sid();" onKeyUp="generate_sid();this.blur();this.focus();" onChange="generate_sid();"/></td>
                </tr>
                
                <tr>
                    <td>Student ID </td>
                    <td><input type="text" name="sid" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>DOB </td>
                    <td><input type="text" name="dob" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Gender </td>
                    <td><select name="gender" id="textbox"/>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Address </td>
                    <td><input type="text" name="address" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Mobile </td>
                    <td><input type="text" name="mobile" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Email </td>
                    <td><input type="text" name="email" id="textbox"/></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" value="Submit" id="btn"/></td>
                </tr>
            </table>
		</form> 
        <!-- Page load huda kheriko insert form ko end-->
        </div> <!--div close of id="insert_form" -->

<?php
	} //closing bracket of if action=add_student
    
	elseif($_REQUEST['action'] == "do_add_student")
	{
		if($classid !="" and $fname != "" )
		{
			//For not duplicate value
			$sql= "select * from student where ClassID='".$classid."' and Roll='".$roll."' and  Year='".$year."' ";
			$query = mysql_query($sql);
			$count = mysql_num_rows($query);
			if($count==0)
			{
				$sql = "INSERT INTO `student` (
							`FirstName` ,
							`LastName` ,
							`ClassID` ,
							`Roll` ,
							`SID` ,
							`DOB` ,
							`Gender` ,
							`Address` ,
							`Phone` ,
							`Mobile` ,
							`Email` ,
							`Year`
							)
							VALUES (
							'". $fname."', '". $lname."', '". $classid."', '". $roll."', '". $sid."','". $dob."', '". $gender."', '". $address."', '". $phone ."', '". $mobile."', '". $email."' , '". $year."')";
		
				$result=mysql_query($sql);
				if ($result=='1'){
					echo "student info inserted";
				}else{
					echo "Error inserting student info";
				}
			} // closing of if count=0
				else{echo "Already Exists Roll no.";}	
		} //closing bracket of empty valuse check
		else
			echo "fields empty";
	} //closing bracket of if action=do_add_student


	elseif($_REQUEST['action'] == "edit_student")
	{ 
	
		$sql= "select * from student where ID=".$id;
		$query=mysql_query($sql);
		while($row=mysql_fetch_assoc($query))
		{
?>			<div id="insert_form" align="center">
            <!--edit form start -->
            <form  name="insert" action="?page=student&action=do_edit_student&id=<?PHP echo $row['ID']; ?>" method="post">
            <table>
                 <tr>
                        <th colspan="3" style=" color: #000099"> Edit Student Info</th>
                  </tr>
                  <tr><td></td></tr>
                 <tr>
                    <td>Year</td>
                    <td><input type="text" name="year" value="<?PHP echo $row['Year'];  ?>" id="textbox" readonly="readonly" /></td>
                </tr>
                <!--
                <tr>
                    <td>Class</td>
                    <td><input type="text" name="class" value="<?PHP //echo $row['Class'];  ?>" id="textbox" /></td>
                </tr>-->
                
                <tr>
                    <td>Class ID</td>
                    <td><input type="text" name="classid" value="<?PHP echo $row['ClassID'];  ?>" id="textbox" readonly="readonly"/></td>
                </tr>
                
                <tr>
                    <td>First Name </td>
                    <td><input type="text" name="fname" value="<?PHP echo $row['FirstName'];  ?>" id="textbox"/></td>
                </tr>
                
                
                <tr>
                    <td>Last Name </td>
                    <td><input type="text" name="lname" value="<?PHP echo $row['LastName'];  ?>" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Roll </td>
                    <td><input type="text" name="roll" value="<?PHP echo $row['Roll'];  ?>" id="textbox" onblur="generate_sid();" onKeyUp="generate_sid();this.blur();this.focus();" onChange="generate_sid();"/></td>
                </tr>
                
                <tr>
                    <td>Student ID </td>
                    <td><input type="text" name="sid" value="<?PHP echo $row['SID'];  ?>" id="textbox" readonly="readonly"/></td>
                </tr>
                
                <tr>
                    <td>DOB </td>
                    <td><input type="text" name="dob" value="<?PHP echo $row['DOB'];  ?>" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Gender </td>
                    <td><select name="gender" id="textbox"/>
                            <option><?PHP echo $row['Gender'];  ?> </option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Address </td>
                    <td><input type="text" name="address" value="<?PHP echo $row['Address'];  ?>" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value="<?PHP echo $row['Phone'];  ?>" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Mobile </td>
                    <td><input type="text" name="mobile" value="<?PHP echo $row['Mobile'];  ?>" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Email </td>
                    <td><input type="text" name="email" value="<?PHP echo $row['Email'];  ?>" id="textbox"/></td>
                </tr>
   	           <tr>
                    <td colspan="3"><input type="submit" value="Edit" id="btn" /></td>
                </tr>
            </table>
            </form> <!--edit form end -->
             </div>  <!-- div close of id="insert_form"-->
<?PHP
		} //closing bracket of while
	} //closing bracket of if action=edit_student

	elseif($_REQUEST['action'] == "do_edit_student")
	{
		$sql= "update `student` set `FirstName` = '".$fname."' , `LastName` = '".$lname."' , `ClassID` = '".$classid."' , `Roll` = '".$roll."' , `SID` = '".$sid."' , `DOB` = '".$dob."' , `Gender` = '".$gender."' , `Address` = '".$address."' , `Phone` = '".$phone."' , `Mobile` = '".$mobile."' , `Email` = '".$email."'  ,  `Year` = '".$year."' where ID='".$id."'";
			
		$result=mysql_query($sql);
		if ($result=='1'){
			echo "Student Info Edited";
		}else{
			echo "Error editing student info";
		}
	} //closing bracket of if action=do_edit_student
	
	elseif($_REQUEST['action'] == "del_student")
	{ 	
		$sql= "delete from `student` where ID='".$id."'";
			
		$result=mysql_query($sql);
		if ($result=='1'){
			echo "student info Deleted";
		}else{
			echo "Error deleting student info ";
		}
	
		refresh("main.php?page=student"); 
	}
	elseif($_REQUEST['action'] == "search_student")
	{   
			search(); //search button click vaye pachhi ko search form call
		
            $sql= "select * from `student` where FirstName='".$fname."' or ClassID='".$classid."' or Gender='".$gender."' or Year='".$year."' ";
                
            $query=mysql_query($sql);
			
			echo "<div id='display_search' align='center'>";
            echo "<table border=1 cellpadding=5 cellspacing=0>";
            echo "<tr><th colspan=14 style= color:#000099>View Student Info</th></tr>";
            echo "<tr style= color:#0000FF><td colspan=2></td><th>First_Name</th><th>Last_Name</th><th>ClassID</th><th>Roll</th><th>Student_ID</th><th>DOB</th><th>Gender</th><th>Address</th><th>Phone</th><th>Mobile</th><th>Email</th><th>Year</th></tr>";
            while($row=mysql_fetch_assoc($query))
			{
		 ?>
                <tr>
                    <td><a href="main.php?page=student&action=edit_student&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
                    <td><a href="main.php?page=student&action=del_student&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
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
			echo "<div id='display_search' align='center'>";
            echo "<table border=1 cellpadding=5 cellspacing=0>";
            echo "<tr><th colspan=14 style= color:#000099>View Student Info</th></tr>";
            echo "<tr style= color:#0000FF><td colspan=2></td><th>First_Name</th><th>Last_Name</th><th>ClassID</th><th>Roll</th><th>Student_ID</th><th>DOB</th><th>Gender</th><th>Address</th><th>Phone</th><th>Mobile</th><th>Email</th><th>Year</th></tr>";
            while($row=mysql_fetch_assoc($query))
			{
		 ?>
                <tr>
                    <td><a href="main.php?page=student&action=edit_student&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
                    <td><a href="main.php?page=student&action=del_student&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
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
        </div>
       
<?php
		refresher(); //refresh funtion call
?>
		</div> <!--div close of id='display_search'-->	 
<?PHP 		
	} // end of else
?>
