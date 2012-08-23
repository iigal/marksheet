 	<script language="javascript">
	
	function showclassid(str)
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
	xmlhttp.open("GET","getclassid_marks2.php?year="+str,true);
	xmlhttp.send();
	}
	
	function showexamtype(str, str1)
	{
	if (str=="")
	  {
	  document.getElementById("examtype_ajax").innerHTML="";
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
		document.getElementById("examtype_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","getexamtype_marks2.php?classid="+str+"&year="+str1,true);
	xmlhttp.send();
	}
	
	
	function showsid(str, str1, str2)
	{
	if (str=="")
	  {
	  document.getElementById("sid_ajax").innerHTML="";
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
		document.getElementById("sid_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","getsid_marks2.php?exam_type="+str+"&year="+str1+"&classid="+str2,true);
	xmlhttp.send();
	}
	</script>

<?PHP
  	include "../required/database.php";
	$db = new db_mysql;
	if(isset($_REQUEST['id']))
		$id=$_REQUEST['id'];
	if(isset($_POST['classid']))
		$classid=$_POST['classid'];	
	if(isset($_POST['class']))
		$class=$_POST['class'];
	if(isset($_POST['sid']))
		$sid=$_POST['sid'];	
	if(isset($_POST['subject']))
		$subject=$_POST['subject'];	
	if(isset($_POST['obt_theory']))
		$obt_theory=$_POST['obt_theory'];	
	if(isset($_POST['obt_practical']))
		$obt_practical=$_POST['obt_practical'];	
	if(isset($_POST['obt_total']))
		$obt_total=$_POST['obt_total'];			
	if(isset($_POST['exam_type']))
		$exam_type=$_POST['exam_type'];	
	if(isset($_POST['year']))
		$year=$_POST['year'];
		
	if(isset($_POST['year1']))
		$year1=$_POST['year1'];
	if(isset($_POST['classid1']))
		$classid1=$_POST['classid1'];	
	if(isset($_POST['exam_type1']))
		$exam_type1=$_POST['exam_type1'];		
	if(isset($_POST['sid1']))
		$sid1=$_POST['sid1'];	
	
	
	
	function search()
	{
?>		<div id="search_form" align="center">
		<form action="?page=view_marks_view&action=search_marks" method="post" />
        <table >
            <tr>
                <th colspan="3" style=" color:#000099"> Search marks</th>
            </tr>
            <tr>
                <td>Year</td>
                <td><select name="year1" id="textbox" onChange="showclassid(this.value)" />
                    <option>Select a Year</option>
                    <?php
                        $sql= "select DISTINCT Year from marks_2011 order by Year ASC";
                        $query=mysql_query($sql);
                        while($row=mysql_fetch_assoc($query))
                        {
                          echo "<option value=\"".$row['Year']."\">".$row['Year']."</option>";
                        }   
                    ?>
                    </select>
                </td>
            </tr>
        
             <tr id="classid_ajax">
                <td>Class ID</td>
                <td><select name="classid1" id="textbox" />
					<option > Select Year first </option>
					</select>
				</td>
            </tr>
		
			
			<tr id="examtype_ajax">
				<td>Exam Type</td>
				<td><select name="exam_type1" id="textbox" />
					<option>Select ClassID first</option>
					
					</select>
				</td>
			</tr>
	 
            <tr id="sid_ajax">
                <td>Student ID</td>
                <td><select name="sid1" id="textbox" />
                    <option>Select Exam Type First</option>
                 
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
    } // closing of search function
	       
	
	if($_REQUEST['action'] == "search_marks")
	{ 
		search(); //search button click vaye pachhi ko search form call
?>
		<div id="display_search" align="center">
        <form action="?page=view_marks_view" method="post" />
        <?php
            //sql for extracting data from two tables subject and marks_2011
            $sql= "select * from subject S , marks_2011 M where M.ClassID='".$classid1."' and M.SID='".$sid1."' and M.ExamType='".$exam_type1."' and M.Year='".$year1."' and S.ClassID=M.ClassID and S.Year=M.Year and S.ExamType=M.ExamType and S.Subject=M.Subject";
            
            $query=mysql_query($sql);
			
            echo "<table border=1 cellpadding=5 cellspacing=0>";
            echo "<tr><th colspan=9 style= color:#000099>Marks View</th></tr>";
         ?>
        	 <tr>
			 <td colspan="9" >
			 <table border='0'>
                <tr>
                    <td>Year</td>
                    <td><input type="text" name="year" size="15" value= "<?php echo $year1; ?>" readonly="readonly" /></td> 
                </tr>
        
                <tr>
                    <td>Class ID</td>
                    <td><input type="text" name="classid" size="15" value= "<?php echo $classid1; ?> " readonly="readonly"/></td>
                </tr>
        
                <tr>
                    <td>Exam Type </td>
                    <td><input type="text" name="exam_type" size="15" value="<?php echo $exam_type1; ?>" readonly="readonly"/></td>
                </tr>
        
                <tr>
                    <td>Student ID </td>
                    <td><input type="text" name="sid" size="15" value="<?php echo $sid1; ?>" readonly="readonly" /></td>
                </tr>
                
            </table>
            </td>
            </tr>
        
        <?php
			$result_counter=0;
			$total_counter=0;
			$counter=0;
			$pass_th=0;
			$pass_pr=0;
            echo "<tr style= color:#0000FF></td><th>Subject</th><th>Theory</th><th>Practical</th><th>Total </th><th>Theory</th><th>Practical</th><th>Total </th>";
            while($row=mysql_fetch_assoc($query))
            {
        ?>
            <tr>
                
                <td><?PHP echo $row['Subject']; ?></td>
                <td><?PHP echo $row['Theory']; ?></td>
                <td><?PHP echo $row['Practical']; ?></td>
                <td><?PHP echo $row['Total']; ?></td>
                <td><?PHP echo $row['Obt_Theory']; ?></td>
                <td><?PHP echo $row['Obt_Practical']; ?></td>
                <td><?PHP echo $row['Obt_Total']; ?></td>
            </tr>
        <?PHP
				if($row['Practical']==0)
				{
					if($row['Obt_Total']<40) // To check whether pass or fail if no practical
					{	$result_counter=1; }
				}
				else
				{
					$pass_th=($row['Obt_Theory']/$row['Theory'])*100; //To convert obtained theory in percent for checking of pass or fail
					$pass_pr=($row['Obt_Practical']/$row['Practical'])*100; //To convert obtained practical in percent for checking of pass or fail
					
					if($pass_th<40 or $pass_pr<40) // To check whether pass or fail
					{	$result_counter=1; }
				 }	
				$total_counter=$total_counter + $row['Obt_Total'];
				
				$counter=$counter+ $row['Total'];
            } //while ko closing bracketf(
		
				if($result_counter==1){
						echo "<tr><td colspan=9>Result : Fail</td></tr>";}
				else
				{		
						$percent=($total_counter/$counter)*100;
						
						echo "<tr>";
						echo "<td colspan='9'>";
						echo "<table border='0'>";
							echo "<tr><td colspan=9>Result : Pass</td></tr>";
							echo "<tr><td colspan=9>Total :".$total_counter. "</td></tr>";
							echo "<tr><td colspan=9>Percent :".$percent. "%</td></tr>";
							
							if($percent>=80)
								echo "<tr><td colspan=9>Division : Distinction</td></tr>";
							elseif($percent<80 and $percent>=60)
								echo "<tr><td colspan=9>Division : First</td></tr>";
							elseif($percent<60 and $percent>=50)
								echo "<tr><td colspan=7>Division : Second</td></tr>";
							else
								{echo "<tr><td colspan=7>Division : Third</td></tr>";}
						echo "</table>";
						echo "</td>";	
						echo "</tr>";
						
				}
				
        ?>
        	</table> 
        </form>
        </div>
<?PHP 
		
	} //else if action= search ko closing bracket
	else
	{
		search(); // form load huda ko search form call
		
	}// elso ko end 
?>
