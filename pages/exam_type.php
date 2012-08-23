 	<script language="javascript">
	function confirm_delete()
	{
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
	if($_POST['exam_type'])
		$exam_type=$_POST['exam_type'];	
	
	function search()
	{	//search form
?>		<div id="search_form" align="center">
		<form action="?page=exam_type&action=search_exam" method="post" />
        <table >
            <tr>
                <th colspan="3" style=" color:#000099"> Search Exam</th>
            </tr>
            <tr>
                <td>Year</td>
                <td><select name="year" id="textbox" />
                 <option></option>
                    <?php
                    $sql= "select DISTINCT Year from exam order by Year ASC"; 
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
                    $sql= "select DISTINCT ClassID from exam order by ClassID ASC"; 
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
                <td>Exam Type</td>
                <td><select name="exam_type" id="textbox" />
                	<option></option>
                    <?php
                    $sql= "select DISTINCT ExamType from exam order by ExamType ASC"; 
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
?>		<form action="?page=exam_type" method="post">
		<table align="center" >
		<tr>
				<td colspan="3"><input type="submit" value="Refresh" id="btn"/></td>
			</tr>
		</table>
		</form> 
<?php
	} // closing bracket of refresher funtion
		
	if($_REQUEST['action'] == "add_exam")
	{
?>      <div id="insert_form" align="center">
		<!--insert form start-->	
        <form action="?page=exam_type&action=do_add_exam" method="post" />
        <table>
            <tr>
                <th colspan="3" style=" color: #000099"> Insert Exam Type</th>
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
                <td>Exam Type</td>
                <td><input type="text" name="exam_type" id="textbox" /></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Submit" id="btn"/></td>
            </tr>
        </table>
    	</form> <!--insert form end-->
        </div> <!--div close of id="insert_form" -->
<?Php
	}
	elseif($_REQUEST['action'] == "do_add_exam")
	{
		if($classid !="" and $exam_type != "" and $year != "")
		{
			//For not duplicate value
			$sql= "select * from exam where ClassID='".$classid."' and ExamType='".$exam_type."' and Year='".$year."'";
			$query = mysql_query($sql);
			$count = mysql_num_rows($query);
			if($count==0)
			{
				$sql = "INSERT INTO `exam` (
							`ClassID` ,
							`ExamType` ,
							`Year` 
							)
							VALUES (
							'". $classid."', '". $exam_type."', '". $year ."')";
		
				$result=mysql_query($sql);
				if ($result=='1'){
					echo "Exam Type inserted";
				}else{
					echo "Error inserting exam type";
				}
			} // closing of if count=0
				else{echo "Already Exists Data";}
		} // closing of empty value check
		else
			echo "fields empty";
	} // closing of if action= do_edit_exam


	elseif($_REQUEST['action'] == "edit_exam")
	{ 
	
		$sql= "select * from exam where ID=".$id;
		$query=mysql_query($sql);
		while($row=mysql_fetch_assoc($query))
		{
?>			<div id="insert_form" align="center">
            <!--edit form start -->
            <form action="?page=exam_type&action=do_edit_exam&id=<?PHP echo $row['ID']; ?>" method="post">
            <table>
				  <tr>
                        <th colspan="3" style=" color: #000099"> Edit Exam Type</th>
                  </tr>
                  <tr><td></td></tr>
                    <tr id="classid_ajax">
                        <td>Class ID</td>
                        <td><select name="classid" id="textbox"  />
                            <option ><?PHP echo $row['ClassID'];  ?></option>
                            </select>
                        </td>
                    </tr>
                    
                      
                    <tr>
                        <td>Exam Type</td>
                        <td><input type="text" name="exam_type" value="<?PHP echo $row['ExamType'];  ?>" id="textbox"/></td>
                    </tr>
                
                 <tr>
                    <td>Year</td>
                    <td><select name="year" id="textbox"  onChange="showclass(this.value)"/>
						<option> <?PHP echo $row['Year'];  ?> </option>
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
                
                <tr><td colspan="2" style="color:#0033CC"><blink>Choose Year, Class and Section for ClassID<blink> </td></tr>
                		
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
            |    <tr>
                    <td colspan="3"><input type="submit" value="Edit" id="btn" /></td>
                </tr>
            </table>
            </form> <!--edit form end -->
             </div>  <!-- div close of id="insert_form"-->
<?PHP 
		}//closing bracket of while
	}//closing bracket of if action =edit_exam

elseif($_REQUEST['action'] == "do_edit_exam")
{
	//For not duplicate value
	$sql= "select * from exam where ClassID='".$classid."' and ExamType='".$exam_type."' and Year='".$year."'";
	$query = mysql_query($sql);
	$count = mysql_num_rows($query);
	if($count==0)
	{
		$sql= "update `exam` set `ClassID` = '".$classid."' , `ExamType` = '".$exam_type."' , `Year` = '".$year."' where ID='".$id."'";
			
		$result=mysql_query($sql);
		if ($result=='1'){
			echo "Exam type Edited";
		}else{
			echo "Error editing exam type";
		}
	}
			else{echo "Already Exists ClassID";}	
}

elseif($_REQUEST['action'] == "del_exam")
{ 	
	$sql= "delete from `exam` where ID='".$id."'";
		
	$result=mysql_query($sql);
	if ($result=='1'){
		echo "Exam type Deleted";
	}else{
		echo "Error deleting exam type";
	}

	refresh("main.php?page=exam_type"); 
}
elseif($_REQUEST['action'] == "search_exam")
{
  		search(); //search button click vaye pachhi ko search form call
        
		$sql= "select * from `exam` where ExamType='".$exam_type."' or ClassID='".$classid."' or Year='".$year."'";
        $query=mysql_query($sql);
		
		echo "<div id='display_search' align='center'";
        echo "<table border=1 cellpadding=5 cellspacing=0>";
        echo "<tr><th colspan=5 style= color:#000099>View Exam Type</th></tr>";
        echo "<tr style= color:#0000FF><td colspan=2></td><th>ClassID</th><th>Exam_Type</th><th>Year</th></tr>";
        while($row=mysql_fetch_assoc($query)){ ?>
            <tr>
                <td><a href="main.php?page=exam_type&action=edit_exam&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
                <td><a href="main.php?page=exam_type&action=del_exam&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
                <td><?PHP echo $row['ClassID']; ?></td>
                <td><?PHP echo $row['ExamType']; ?></td>
                <td><?PHP echo $row['Year']; ?></td>
            </tr>
<?PHP } ?>
    </table>

<?PHP 
	 refresher(); //refresh funtion call
?>
		</div> <!--div close of id='display_search'-->	 
<?PHP 
} 
else{
		search(); //search button click hunu aghi ko search form call
       
		$sql= "select * from exam order by ID DESC";
        $query=mysql_query($sql);
		echo "<div id='display_search' align='center'>";
        echo "<table border=1 cellpadding=5 cellspacing=0>";
        echo "<tr><th colspan=5style= color:#000099>View Exam Type</th></tr>";
        echo "<tr style= color:#0000FF> <td colspan=2></td><th>Class_ID</th><th>Exam_Type</th><th>Year</th></tr>";
        while($row=mysql_fetch_assoc($query)){ ?>
            <tr>
                <td><a href="main.php?page=exam_type&action=edit_exam&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
                <td><a href="main.php?page=exam_type&action=del_exam&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
                <td><?PHP echo $row['ClassID']; ?></td>
                <td><?PHP echo $row['ExamType']; ?></td>
                <td><?PHP echo $row['Year']; ?></td>
            </tr>
    <?PHP } ?>
    </table>
    
<?php
        refresher(); //refresh funtion call
?>
		</div> <!--div close of id='display_search'-->	 
<?PHP 		
    }
?>
