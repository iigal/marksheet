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
		<form action="?page=view_exam&action=search_exam" method="post" />
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
?>		<form action="?page=view_exam" method="post">
		<table align="center" >
		<tr>
				<td colspan="3"><input type="submit" value="Refresh" id="btn"/></td>
			</tr>
		</table>
		</form> 
<?php
	} // closing bracket of refresher funtion
		
	   if($_REQUEST['action'] == "search_exam")
{
  		search(); //search button click vaye pachhi ko search form call
        
		$sql= "select * from `exam` where ExamType='".$exam_type."' or ClassID='".$classid."' or Year='".$year."'";
        $query=mysql_query($sql);
		
		echo "<div id='display_search' align='center'";
        echo "<table border=1 cellpadding=5 cellspacing=0>";
        echo "<tr><th colspan=5 style= color:#000099>View Exam Type</th></tr>";
        echo "<tr style= color:#0000FF></td><th>ClassID</th><th>Exam_Type</th><th>Year</th></tr>";
        while($row=mysql_fetch_assoc($query)){ ?>
            <tr>
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
		echo "<div id='display_search' align='center'";
        echo "<table border=1 cellpadding=5 cellspacing=0>";
        echo "<tr><th colspan=5style= color:#000099>View Exam Type</th></tr>";
        echo "<tr style= color:#0000FF></td><th>Class_ID</th><th>Exam_Type</th><th>Year</th></tr>";
        while($row=mysql_fetch_assoc($query)){ ?>
            <tr>
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
