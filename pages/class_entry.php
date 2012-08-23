<script language="javascript">
	function confirm_delete()
	{
		var $report = confirm("Are you sure you want to delete this record");					
		return $report;
	}
	
	function generate_classid()
	{
		var $clsid = document.insert.elements.classid;
      	var $cls= document.insert.elements.class;
     	var $clssec = document.insert.elements.sec;
		var $cls1=0;
		if (($cls.value != ""))
        {		
			if (($cls.value == "Nursary" ))
        	{	
				$cls1="100";
			}	
			if (($cls.value == "LKG" ))
        	{	
				$cls1="200";
			}	
			if (($cls.value == "UKG" ))
        	{	
				$cls1="300";
			}	
			if (($cls.value == "One"))
        	{	
				$cls1="001";
			}	
			if (($cls.value == "Two" ))
        	{	
				$cls1="002";
			}	
			if (($cls.value == "Three" ))
        	{	
				$cls1="003";
			}	
			if (($cls.value == "Four" ))
        	{	
				$cls1="004";
			}	
			if (($cls.value == "Five" ))
        	{	
				$cls1="005";
			}	
			if (($cls.value == "Six" ))
        	{	
				$cls1="006";
			}	
			if (($cls.value == "Seven" ))
        	{	
				$cls1="007";
			}	
			if (($cls.value == "Eight" ))
        	{	
				$cls1="008";
			}	
			if (($cls.value == "Nine" ))
        	{	
				$cls1="009";
			}	
			if (($cls.value == "Ten" ))
        	{	
				$cls1="010";
			}	
			if (($clssec.value == ""))
        	{	
				$clssec1="000";
			}
			if (($clssec.value != "" ))
        	{	
				//$clssec1=$clssec;
				$clsid.value=( $cls1+"-"+ $clssec.value);
			}	
			else {
			$clsid.value=( $cls1+"-000");}
		}
		
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
	
	function refresher()
	{
?>		<form action="?page=class_entry" method="post">
		<table align="center" >
		<tr>
				<td colspan="3"><input type="submit" value="Refresh" id="btn"/></td>
			</tr>
		</table>
		</form> 
<?PHP
	}
	
	function search()
	{
?>		 <div id="search_form" align="center">
		<form action="?page=class_entry&action=search_class" method="post" />
			<table >
				<tr>
					<th colspan="3" style=" color:#000099"> Search Class</th>
				</tr>
				<tr>
					<td>Year</td>
					<td><select name="year" id="textbox" />
                    	<option></option>
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
				<tr>
					<td>Class</td>
					<td><select name="class" id="textbox" />
                    	<option></option>
						<?php
						$sql= "select DISTINCT Class from class order by Class ASC"; 
						$query=mysql_query($sql);
						while($row=mysql_fetch_assoc($query))
						{
						   echo "<option value=\"".$row['Class']."\">".$row['Class']."</option>";
						}   
						?>
						</select>
					</td>
				</tr>
                <tr>
					<td>Section</td>
					<td><select name="sec" id="textbox" />
                    	<option></option>
						<?php
						$sql= "select DISTINCT Section from class order by Section ASC"; 
						$query=mysql_query($sql);
						while($row=mysql_fetch_assoc($query))
						{
						    echo "<option value=\"".$row['Section']."\">".$row['Section']."</option>";
						}   
						?>
						</select>
					</td>
				</tr>
				<tr >
					<td>Class ID</td>
					<td><select name="classid" id="textbox" />
                    	<option></option>
						<?php
						$sql= "select DISTINCT ClassID from class order by ClassID ASC"; 
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
					<td colspan="3"><input type="submit" value="Search" id="btn" /></td>
				</tr>
			</table>
		</form> 
         </div>  <!--div close of id="insert_form"-->
<?php
	} // end of function search
	if($_REQUEST['action'] == "add_class")
	{
?>       <div id="insert_form" align="center"> 
        <form name="insert" action="?page=class_entry&action=do_add_class" method="post" />
        <table>
            <tr>
                <th colspan="3" style=" color: #000099"> Insert Class</th>
            </tr>
            <tr>
                <td>Year</td>
                <td><input type="text" name="year" id="textbox" /></td>
            </tr>
            <tr>
                <td>Class</td>
                <!--<td><input type="text" name="class" id="textbox"  onblur="generate_classid();" onKeyUp="generate_classid();this.blur();this.focus();" onChange="generate_classid();"/></td>-->
                <td><select name="class" id="textbox" onblur="generate_classid();" onKeyUp="generate_classid();this.blur();this.focus();" onChange="generate_classid();" >
                	<option>Select a Class</option>
                    <option>Nursary</option>
                    <option>LKG</option>
                    <option>UKG</option>
                    <option>One</option>
                    <option>Two</option>
                    <option>Three</option>
                    <option>Four</option>
                    <option>Five</option>
                    <option>Six</option>
                    <option>Seven</option>
                    <option>Eight</option>
                    <option>Nine</option>
                    <option>Ten</option>
                </select>
                </td> 
            </tr>
            <tr>
                <td>Section</td>
                <td><input type="text" name="sec" id="textbox"  onblur="generate_classid();" onKeyUp="generate_classid();this.blur();this.focus();" onChange="generate_classid();"/></td>
            </tr>
            <tr>
                <td>Class ID</td>
                <td><input type="text" name="classid" id="textbox" /></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Submit" id="btn"/></td>
            </tr>
        </table>
        </form> 
         </div> <!--div close of id="insert_form" -->
<?php
	} // closing bracket of if action= add_user

	//add class start
	elseif($_REQUEST['action'] == "do_add_class")
	{
		if($classid !="" and $class != "" and $year != "")
		{
				if($sec == "")    //if there no section
					$sec = "No Sec";	
			
			//For not duplicate value
				$sql= "select * from class where ClassID='".$classid."' and Year='".$year."'";
				$query = mysql_query($sql);
				$count = mysql_num_rows($query);
				if($count==0)
				{
				$sql = "INSERT INTO `class` (
						`Year` ,
						`Class` ,
						`Section` ,
						`ClassID`  
						)
						VALUES (
						'". $year."', '". $class."', '". $sec ."' , '". $classid ."')";
	
				
				$result=mysql_query($sql);
					if ($result=='1'){
						echo "Class inserted";
					}else{
						echo "Error inserting class";
					}
					//refresh("main.php?page=category");
					} // end of if duplicate value check
					else{echo "Already Exists Class ID";}
			} // end of if to check empty values
			else
				echo "fields empty";
	}//do add class end

	//edit class form start
	elseif($_REQUEST['action'] == "edit_class")
	{ 
	
		$sql= "select * from class where ID=".$id;
		$query=mysql_query($sql);
		while($row=mysql_fetch_assoc($query))
		{
?>			 <div id="insert_form" align="center">
            <form name="insert" action="?page=class_entry&action=do_edit_class&id=<?PHP echo $row['ID']; ?>" method="post">
            <table>
                <tr>
                    <th colspan="3" style=" color: #000099"> Insert Class</th>
                </tr>
                  <tr><td></td></tr>
               <tr>
                    <td>Year</td>
                    <td><input type="text" name="year" value="<?PHP echo $row['Year'];  ?>" id="textbox" /></td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td><select name="class" id="textbox" onblur="generate_classid();" onKeyUp="generate_classid();this.blur();this.focus();" onChange="generate_classid();" >
                        <option><?PHP echo $row['Class'];  ?></option>
                        <option>Nursary</option>
                        <option>LKG</option>
                        <option>UKG</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                        <option>Four</option>
                        <option>Five</option>
                        <option>Six</option>
                        <option>Seven</option>
                        <option>Eight</option>
                        <option>Nine</option>
                        <option>Ten</option>
                    </select>
                    </td> 
                </tr>
                <tr>
                    <td>Section</td>
                    <td><input type="text" name="sec" value="<?PHP echo $row['Section'];  ?>" id="textbox" onblur="generate_classid();" onKeyUp="generate_classid();this.blur();this.focus();" onChange="generate_classid();"/></td>
                </tr>

                <tr>
                    <td>Class ID</td>
                    <td><input type="text" name="classid" value="<?PHP echo $row['ClassID'];  ?>"  readonly="readonly"id="textbox"/></td>
                </tr>

            
                <tr>
                    <td colspan="3"><input type="submit" value="Edit" id="btn" /></td>
                </tr>
            </table>
            </form>
             </div>  <!-- div close of id="insert_form"-->
<?PHP
		} // end of while
	} //edit class form end

	//edit function start
	elseif($_REQUEST['action'] == "do_edit_class")
	{
		$sql= "select * from class where ClassID='".$classid."' and Year='".$year."'";
		$query = mysql_query($sql);
		$count = mysql_num_rows($query);
		
		if($count==0)
		{
			if($sec == "")    //if there no section
					$sec = "No Sec";	
		
			$sql= "update `class` set `Year` = '".$year."', `Class` = '".$class."' , `Section` = '".$sec."' , `ClassID` = '".$classid."'  where ID='".$id."'";
			$result=mysql_query($sql);
			if ($result=='1'){
				echo "Class Edited";
			}else{
				echo "Error editing class";
			}
		}
			else{echo "Already Exists ClassID";}	
		//refresh("main.php?page=category");
	}//edit function end
	
	//delete class start
	elseif($_REQUEST['action'] == "del_class")
	{ 	
		$sql= "delete from `class` where ID='".$id."'";
			
		$result=mysql_query($sql);
		if ($result=='1'){
			echo "Class Deleted";
		}else{
			echo "Error deleting cclass";
		}
	
		refresh("main.php?page=class_entry"); 
	}//delete class end


	elseif($_REQUEST['action'] == "search_class")
	{   
		search(); // Search buttoon click gare pachhiko search function call
		
		$sql= "select * from `class` where Class='".$class."' or Section='".$sec."' or ClassID='".$classid."' or Year='".$year."'";
		$query=mysql_query($sql);
		
		echo "<div id='display_search' align='center'";
		echo "<table border=1 cellpadding=5 cellspacing=0>";
		echo "<tr><th colspan=6 style= color:#000099>Class</th></tr>";
		echo "<tr style= color:#0000FF><td colspan=2></td><th>Year</th><th>Class</th><th>Section</th><th>ClassID</th></tr>";
		while($row=mysql_fetch_assoc($query))
		{
	 ?>
			<tr>
				<td><a href="main.php?page=class_entry&action=edit_class&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
				<td><a href="main.php?page=class_entry&action=del_class&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
				<td><?PHP echo $row['Year']; ?></td>
                <td><?PHP echo $row['Class']; ?></td>
                <td><?PHP echo $row['Section']; ?></td>
                <td><?PHP echo $row['ClassID']; ?></td>
			</tr>
	<?PHP } // end of while loop
	?>
	</table>
<?PHP
	refresher();// funtion refresher cALL
?>    
    
    </div> <!--div close of id='display_search'-->

<?PHP 
	} // closing bracket of if action= search_class 
	else{
		search(); // page load huda ko search funtion call
		$sql= "select * from class order by ID DESC";
		//	echo $sql;
		$query=mysql_query($sql);
		echo "<div id='display_search' align='center'>";
		echo "<table border=1 cellpadding=5 cellspacing=0>";
		echo "<tr><th colspan=6 style= color:#000099>View Class</th></tr>";
		echo "<tr style= color:#0000FF> <td colspan=2></td><th>Year</th><th>Class</th><th>Section</th><th>ClassID</tr>";
		while($row=mysql_fetch_assoc($query))
		{
	 ?>
			<tr>
				<td><a href="main.php?page=class_entry&action=edit_class&id=<?PHP echo $row['ID']; ?>"><img src="../images/edit.png" /></td>
				<td><a href="main.php?page=class_entry&action=del_class&id=<?PHP echo $row['ID']; ?>" onclick="return confirm_delete()"><img src="../images/delete.png" /></td>
				<td><?PHP echo $row['Year']; ?></td>
                <td><?PHP echo $row['Class']; ?></td>
                <td><?PHP echo $row['Section']; ?></td>
                <td><?PHP echo $row['ClassID']; ?></td>
			</tr>
	<?PHP
		 }// closing bracket of while
	?>
		</table>
    <?PHP
		refresher();// funtion refresher cALL
	?>    
        
         </div> <!--div close of id='display_search'-->

    

<?php
	}// closing bracket of else
?>
