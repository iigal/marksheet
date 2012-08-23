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
?>		<form action="?page=view_class" method="post">
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
	if($_REQUEST['action'] == "search_class")
	{   
		search(); // Search buttoon click gare pachhiko search function call
		
		$sql= "select * from `class` where Class='".$class."' or Section='".$sec."' or ClassID='".$classid."' or Year='".$year."'";
		$query=mysql_query($sql);
		
		echo "<div id='display_search' align='center'";
		echo "<table border=1 cellpadding=5 cellspacing=0>";
		echo "<tr><th colspan=6 style= color:#000099>Class</th></tr>";
		echo "<tr style= color:#0000FF></td><th>Year</th><th>Class</th><th>Section</th><th>ClassID</th></tr>";
		while($row=mysql_fetch_assoc($query))
		{
	 ?>
			<tr>
				
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
		echo "<div id='display_search' align='center'";
		echo "<table border=1 cellpadding=5 cellspacing=0>";
		echo "<tr><th colspan=6style= color:#000099>View Class</th></tr>";
		echo "<tr style= color:#0000FF> </td><th>Year</th><th>Class</th><th>Section</th><th>ClassID</tr>";
		while($row=mysql_fetch_assoc($query))
		{
	 ?>
			<tr>
				
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
