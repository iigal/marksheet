 	<script language="javascript">
	function confirm_delete(){
		var $report = confirm("Are you sure you want to delete this record");					
		return $report;
	}
	
	//funtion for caluculation of total by adding theory + practical start
	function startCalc(){
	  interval = setInterval("calc()",1);
	}
	function calc(){
	  one= document.insert.elements.theory.value;
	  two = document.insert.elements.practical.value; 
	  document.insert.elements.total.value = (one * 1) + (two * 1);
	}
	function stopCalc(){
	  clearInterval(interval);
	}
	//funtion for caluculation of total by adding theory + practical end
	
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
	
	function showexamtype(str, str1)
	{
	if (str=="")
	  {
	  document.getElementById("exam_type_ajax").innerHTML="";
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
		document.getElementById("exam_type_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","getexamtype.php?classid="+str+"&year="+str1,true);
	xmlhttp.send();
	}
	</script>

<?PHP
  	include "../required/database.php";
	$db = new db_mysql;
	if($_REQUEST['id'])
		$id=$_REQUEST['id'];
	if($_POST['year'])
		$year=$_POST['year'];
	if($_POST['class'])
		$class=$_POST['class'];
	if($_REQUEST['sec'])
		$sec=$_REQUEST['sec'];	
	if($_REQUEST['classid'])
		$classid=$_REQUEST['classid'];	
	if($_POST['subject'])
		$subject=$_POST['subject'];	
	if($_POST['theory'])
		$theory=$_POST['theory'];
	if($_POST['practical'])
		$practical=$_POST['practical'];
	if($_POST['total'])
		$total=$_POST['total'];
	if($_POST['exam_type'])
		$exam_type=$_POST['exam_type'];		
	
	function search()
	{	//search form
?>		<div id="search_form" align="center">
		<form action="?page=subject_entry&action=search_subject" method="post" />
        <table >
            <tr>
                <th colspan="3" style=" color:#000099"> Search subject</th>
            </tr>
            <tr>
                <td>Year</td>
                <td><select name="year" id="textbox" />
                 <option></option>
                    <?php
                    $sql= "select DISTINCT Year from subject order by Year ASC"; 
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
                    $sql= "select DISTINCT ClassID from subject order by ClassID ASC"; 
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
                <td>Subject </td>
                <td><select name="subject" id="textbox" />
                  <option></option>
                    <?php
                    $sql= "select DISTINCT Subject from subject order by Subject ASC"; 
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_assoc($query))
                    {
                       echo "<option value=\"".$row['Subject']."\">".$row['Subject']."</option>";
                    }   
                    ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Exam Type </td>
                <td><select name="exam_type" id="textbox" />
                   <option></option>
                    <?php
                    $sql= "select DISTINCT ExamType from subject order by ExamType ASC"; 
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_assoc($query))
                    {
                       echo "<option value=\"".$row['ExamType']."\">".$row['ExamType']."</option>";
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
?>		<form action="?page=subject_entry" method="post">
        <table align="center" >
        <tr>
                <td colspan="3"><input type="submit" value="Refresh" id="btn"/></td>
            </tr>
        </table>
        </form> 
<?php
	} // closing bracket of refresher funtion
	
	if($_REQUEST['action'] == "add_subject")
	{
?>     	<div id="insert_form" align="center">
		<form  name="insert" action="?page=subject_entry&action=do_add_subject" method="post" />
            <table>
                <tr>
                    <th colspan="3" style=" color: #000099"> Insert subject n marks</th>
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
                 <tr id="exam_type_ajax">
                    <td>Exam Type</td>
                    <td><select name="exam_type" id="textbox" />
                        <option > Select ClassID  first </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Subject </td>
                    <td><input type="text" name="subject" id="textbox" /></td>
                </tr>
                
                <tr>
                    <td>Theory </td>
                    <td><input type="text" name="theory" id="textbox"  onFocus="startCalc();" onBlur="stopCalc();" /></td>
                </tr>
                
                <tr>
                    <td>Practical </td>
                    <td><input type="text" name="practical" id="textbox"  onFocus="startCalc();" onBlur="stopCalc();" /></td>
                </tr>
                
                <tr>
                    <td>Total </td>
                    <td><input type="text" name="total" id="textbox"  /></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" value="Submit" id="btn"/></td>
                </tr>
            </table>
        </form> 
        <!-- Page load huda kheriko insert form ko end-->
        </div> <!--div close of id="insert_form" -->
<?php
	} // closing bracket of if action=add_subject
	
	elseif($_REQUEST['action'] == "do_add_subject")
	{
		if($classid !="" and $subject != ""  and $theory != "" and $practical != "" and $total != "" and $exam_type != ""  and $year != "")
		{
			//For not duplicate value
			$sql= "select * from subject where ClassID='".$classid."' and Subject='".$subject."' and ExamType='".$exam_type."' and Year='".$year."'";
			$query = mysql_query($sql);
			$count = mysql_num_rows($query);
			if($count==0)
			{
				$sql = "INSERT INTO `subject` (
							`ClassID` ,
							`Subject` ,
							`Theory` ,
							`Practical` ,
							`Total` ,
							`ExamType` ,
							`Year` 
							)
							VALUES (
							'". $classid."', '". $subject."', '". $theory."','". $practical."', '". $total."', '". $exam_type."', '". $year ."')";
		
				$result=mysql_query($sql);
				if ($result=='1')
				{
					echo "Subject Marks Inserted";
				}
				else
				{
					echo "Error inserting subject marks";
				}
			} // closing of if count=0
				else{echo "Already Exists Data";}
		} //closing bracket of empty field check
		else
			echo "fields empty";
	} //closing bracket of if action=do_add_subject


	elseif($_REQUEST['action'] == "edit_subject")
	{ 
		$sql= "select * from subject where ID=".$id;
		$query=mysql_query($sql);
		while($row=mysql_fetch_assoc($query))
		{
?>			<div id="insert_form" align="center">
            <!--edit form start -->
            <form name="insert" action="?page=subject_entry&action=do_edit_subject&id=<?PHP echo $row['ID']; ?>" method="post">
            <table>
                  <tr>
                        <th colspan="3" style=" color: #000099"> Edit Subject and Marks</th>
                  </tr>
                  <tr><td></td></tr>
                 <tr>
                    <td>Year</td>
                    <td><input type="text" name="year" value="<?PHP echo $row['Year'];  ?>" id="textbox"  readonly="readonly"/></td>
                </tr>
                <!--
                <tr>
                    <td>Class</td>
                    <td><input type="text" name="class" value="<?PHP // echo $row['Class'];  ?>" id="textbox" /></td>
                </tr> -->
                
                <tr>
                    <td>Class ID</td>
                    <td><input type="text" name="classid" value="<?PHP echo $row['ClassID'];  ?>" id="textbox" readonly="readonly"/></td>
                </tr>
                
                <tr>
                    <td>Subject </td>
                    <td><input type="text" name="subject" value="<?PHP echo $row['Subject'];  ?>" id="textbox"/></td>
                </tr>
                
                <tr>
                    <td>Exam Type </td>
                    <td><input type="text" name="exam_type" value="<?PHP echo $row['ExamType'];  ?>" id="textbox" readonly="readonly"/></td>
                </tr>
                
                <tr>
                    <td>Theory </td>
                    <td><input type="text" name="theory" value="<?PHP echo $row['Theory'];  ?>" id="textbox"  onFocus="startCalc();" onBlur="stopCalc();"/></td>
                </tr>
                
                <tr>
                    <td>Practical </td>
                    <td><input type="text" name="practical" value="<?PHP echo $row['Practical'];  ?>" id="textbox"  onFocus="startCalc();" onBlur="stopCalc();"/></td>
                </tr>
                
                <tr>
                    <td>Total </td>
                    <td><input type="text" name="total" value="<?PHP echo $row['Total'];  ?>" id="textbox"/></td>
                </tr>
            
                <tr>
                    <td colspan="3"><input type="submit" value="Edit" id="btn" /></td>
                </tr>
            </table>
            </form> <!--edit form end -->
			 </div>  <!-- div close of id="insert_form"-->
<?PHP 
		} //closing bracket of while
	} //closing bracket of if action=edit_subject

	elseif($_REQUEST['action'] == "do_edit_subject")
	{
		//For not duplicate value
			/*$sql= "select * from subject where ClassID='".$classid."' and Subject='".$subject."' and ExamType='".$exam_type."' and Year='".$year."'";
			$query = mysql_query($sql);
			$count = mysql_num_rows($query);
			if($count==0)
			{*/
				$sql= "update `subject` set `ClassID` = '".$classid."' , `Subject` = '".$subject."' , `Theory` = '".$theory."' , `Practical` = '".$practical."' , `Total` = '".$total."' , `ExamType` = '".$exam_type."' , `Year` = '".$year."' where ID='".$id."'";
					
				$result=mysql_query($sql);
				if ($result=='1'){
					echo "Subject and Marks Edited";
				}else{
					echo "Error editing subject";
				}
			 /* }
				else{echo "Already Exists Data";}	*/
	}

	elseif($_REQUEST['action'] == "del_subject")
	{ 	
		$sql= "delete from `subject` where ID='".$id."'";
			
		$result=mysql_query($sql);
		if ($result=='1'){
			echo "subject Deleted";
		}else{
			echo "Error deleting subject ";
		}
	
		refresh("main.php?page=subject_entry"); 
	}
	elseif($_REQUEST['action'] == "search_subject")
	{   
		search();	//search button click vaye pachhi ko search form call	 
		$sql= "select * from `subject` where Subject='".$subject."' or ClassID='".$classid."' or ExamType='".$exam_type."' or Year='".$year."'";
		
		$query=mysql_query($sql);
		
		echo "<div id='display_search' align='center'>";
		echo "<table border=1 cellpadding=5 cellspacing=0>";
		echo "<tr><th colspan=10 style= color:#000099>View Subject and Marks</th></tr>";
		echo "<tr style= color:#0000FF><td colspan=2></td><th>ClassID</th><th>Subject</th><th>Theory</th><th>Practical</th><th>Total</th><th>Exam_Type</th><th>Year</th></tr>";
		while($row=mysql_fetch_assoc($query))
		{
?>
			<tr>
				<td><a href="main.php?page=subject_entry&action=edit_subject&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
				<td><a href="main.php?page=subject_entry&action=del_subject&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
				<td><?PHP echo $row['ClassID']; ?></td>
				<td><?PHP echo $row['Subject']; ?></td>
				<td><?PHP echo $row['Theory']; ?></td>
				<td><?PHP echo $row['Practical']; ?></td>
				<td><?PHP echo $row['Total']; ?></td> 
				<td><?PHP echo $row['ExamType']; ?></td>
				<td><?PHP echo $row['Year']; ?></td>
			</tr>
	<?PHP } ?>
	</table>

<?PHP 
	refresher();
?>
		</div> <!--div close of id='display_search'-->	 
<?PHP 	
	} //closing bracket of if action=search_subject
	else
	{
			search(); //search button click hunu aghi ko search form call
			$sql= "select * from subject order by ID DESC";
			//	echo $sql;
			$query=mysql_query($sql);
			echo "<div id='display_search' align='center'>";
			echo "<table border=1 cellpadding=5 cellspacing=0>";
			echo "<tr><th colspan=10 style= color:#000099>View Subject and Marks</th></tr>";
			echo "<tr style= color:#0000FF><td colspan=2></td><th>ClassID</th><th>Subject</th><th>Theory</th><th>Practical</th><th>Total</th><th>Exam_Type</th><th>Year</th></tr>";
			while($row=mysql_fetch_assoc($query))
			{
?>
				<tr>
					<td><a href="main.php?page=subject_entry&action=edit_subject&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
					<td><a href="main.php?page=subject_entry&action=del_subject&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
					<td><?PHP echo $row['ClassID']; ?></td>
					<td><?PHP echo $row['Subject']; ?></td>
					<td><?PHP echo $row['Theory']; ?></td>
					<td><?PHP echo $row['Practical']; ?></td>
					<td><?PHP echo $row['Total']; ?></td> 
					<td><?PHP echo $row['ExamType']; ?></td>
					<td><?PHP echo $row['Year']; ?></td>
				</tr>
<?PHP
			} //closing bracket of while
?>
		</table>

<?php
		refresher();
?>
		</div> <!--div close of id='display_search'-->	 
<?PHP 
	} // close of else
?>
