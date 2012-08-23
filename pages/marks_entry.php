 	
<?PHP
  	include "../required/database.php";
	$db = new db_mysql;
	if(isset($_REQUEST['mid']))
		$mid=$_REQUEST['mid'];
	if(isset($_POST['classid']))
		$classid=$_POST['classid'];	
	if(isset($_POST['class']))
		$class=$_POST['class'];
	if(isset($_POST['sid']))
		$sid=$_POST['sid'];	
	if(isset($_POST['subject']))
		$subject=$_POST['subject'];	
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
	
	 $sql= "select * from `subject` where ClassID='".$classid1."' and ExamType='".$exam_type1."' and Year='".$year1."'";
	 $query=mysql_query($sql);
    
		
	function search()
	{
?>	 	<div id="search_form" align="center">
		<form action="?page=marks_entry&action=search_marks" method="post" />
		<table >
			<tr>
				<th colspan="3" style=" color:#000099"> Generate Marksheet</th>
			</tr>
			<tr>
				<td>Year</td>
				<td><select name="year1" id="textbox"   onChange="showclassid(this.value)"/>
					<option>Select a Year</option>
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
                        
                        <tr id="student_ajax">
				<td>Student</td>
				<td><select name="student1" id="textbox" />
					<option>Select Exam Type First</option>
					
					</select>
				</td>
			</tr>
	 
			<tr>
				<td colspan="3"><input type="submit" value="Generate Marksheet" id="btn" /></td>
			</tr>
		</table>
		</form> 
        </div>  <!--div close of id="insert_form"-->
        
	<script language="javascript">
	function confirm_delete(){
		var $report = confirm("Are you sure you want to delete this record");					
		return $report;
	}
	
	<?php 
	if(isset($_POST['year1']))
		$year1=$_POST['year1'];
	if(isset($_POST['classid1']))
		$classid1=$_POST['classid1'];	
	if(isset($_POST['exam_type1']))
		$exam_type1=$_POST['exam_type1'];		
	
	$sql000= "select * from `subject` where ClassID='".$classid1."' and ExamType='".$exam_type1."' and Year='".$year1."'";
	$query000=mysql_query($sql000);
	while($roww=mysql_fetch_assoc($query000))
	{
	?>
    
	function startCalc_<?php echo $roww['Subject']; ?>(){
	  interval_<?php echo $roww['Subject']; ?> = setInterval("calc_<?php echo $roww['Subject']; ?>()",1);
	}
	function calc_<?php echo $roww['Subject']; ?>(){
	  one= document.insert_a.<?php echo $roww['Subject']; ?>_th.value;
	  two = document.insert_a.<?php echo $roww['Subject']; ?>_pr.value; 
	  document.insert_a.<?php echo $roww['Subject']; ?>_tot.value = (one * 1) + (two * 1);
	}
	function stopCalc_<?php echo $roww['Subject']; ?>(){
	  clearInterval(interval_<?php echo $roww['Subject']; ?>);
	}

	<?php } ?>
	
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
	xmlhttp.open("GET","getclassid_marks.php?year="+str,true);
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
	xmlhttp.open("GET","getexamtype_marks.php?classid="+str+"&year="+str1,true);
	xmlhttp.send();
	}
        
        function showstudent(str, str1)
	{
	if (str=="")
	  {
	  document.getElementById("student_ajax").innerHTML="";
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
		document.getElementById("student_ajax").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","getstudent.php?year="+str+"&classid="+str1,true);
	xmlhttp.send();
	}
	
	
	
	</script>


<?php
	}// end of function search
	          
	if($_REQUEST['action'] == "do_add_marks")
	{
        $tbl_gain=$_REQUEST['tbl_array'];
        $Subject_Array2=explode(",",$tbl_gain);

        for($sn=0;$sn<=count($tbl_gain);$sn++)
        {	
            $th=$Subject_Array2[$sn]."_th";
            $ps_th=$_POST[$th];

            $pr=$Subject_Array2[$sn]."_pr";
            $ps_pr=$_POST[$pr];

            $tot=$Subject_Array2[$sn]."_tot";
            $ps_tot=$_POST[$tot];
            $sql_check_field = "SELECT * FROM marks_2012 WHERE SID='".$sid."' and ExamType='".$exam_type."' and Subject='".$Subject_Array2[$sn]."'";
            $query_check_field=mysql_query($sql_check_field);
            if(mysql_num_rows($query_check_field)==0):
                // save by passing array in a function
                $Save_Array=array("SID"=>$sid,"ClassID"=>$classid,"Subject"=>$Subject_Array2[$sn],"Obt_Theory"=>$ps_th,"Obt_Practical"=>$ps_pr,"Obt_Total"=>$ps_tot,"ExamType"=>$exam_type,"Year"=>$year);
                $db->insert("marks_2012",$Save_Array);
            elseif(mysql_num_rows($query_check_field)==1):
                $Data = array("Obt_Theory"=>$ps_th,"Obt_Practical"=>$ps_pr,"Obt_Total"=>$ps_tot);
                $Keys = array("SID='$sid'","ClassID='$classid'","Subject='$Subject_Array2[$sn]'","ExamType='$exam_type'","Year='$year'");
                $db->update("marks_2012",$Keys,$Data);
            else:
                echo "There is a serious problem with the data so contact the author of this service.";
            endif;
            
            
            


            /*if ($result=='1'){
                    echo "subject info inserted";
            }else{
                    echo "Error inserting subject info";
            }*/
            }//for loop end			
        } // if action = do_add_marks ko ending brackect
	
	elseif($_REQUEST['action'] == "search_marks")
	{
		search(); //search button click vaye pachhi ko search form call  
?>
		<div id="display_search">
        <form name="insert_a" action="?page=marks_entry&action=do_add_marks" method="post" >
		<?php 
				 echo "<table border=1 cellpadding=5 cellspacing=0>";
                echo "<tr><th colspan=7 style= color:#000099>Marks Entry</th></tr>";	
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
                    <td><input type="text" name="exam_type" size="15"  value="<?php echo $exam_type1; ?>" readonly="readonly"/></td>
                </tr>
            
                <tr>
                    <td>Student ID </td>
                   <!-- <td><input type="text" name="sid" /> </td>-->
                    <td><input type="text" name="sid" size="15"  value="<?php echo $sid; ?>" readonly="readonly"/>
                      </td>
                </tr>
            </table>
            </td>
            </tr>
	
			<?php
				
                $sql= "select * from `subject` where ClassID='".$classid1."' and ExamType='".$exam_type1."' and Year='".$year1."' ";
                
                $query=mysql_query($sql);
            
                echo "<tr style= color:#0000FF><th>Subject</th><th>Theory</th><th>Practical</th><th>Total </th><th>Theory</th><th>Practical</th><th>Total </th>";
            	//passing array for top ko $_POST
                $i=0;
                while($row=mysql_fetch_assoc($query))
				{
					$Subject_Array[$i]=$row['Subject'];
					$i++;
                                        $sql_obtained_marks = "SELECT * FROM marks_2012 WHERE SID='".$sid."' and ExamType='".$exam_type1."' and Subject='".$row['Subject']."'";
                                        $query_obtained_marks=mysql_query($sql_obtained_marks);
                                        if(mysql_num_rows($query_obtained_marks)==1):
                                           while($row_obtained_marks=mysql_fetch_assoc($query_obtained_marks)){
                                                $value_th = $row_obtained_marks['Obt_Theory'];
                                                $value_pr = $row_obtained_marks['Obt_Practical'];
                                                $value_total = $row_obtained_marks['Obt_Total'];
                                           }
                                        else:
                                            $value_th=0;
                                            $value_pr=0;
                                            $value_total=0;
                                        endif;
                                        ?>
			<tr>
				<td><input type="text" name="<?PHP echo $row['Subject']; ?>" value="<?PHP echo $row['Subject']; ?>" readonly="readonly" /></td>
				<td><?PHP echo $row['Theory']; ?></td>
				<td><?PHP echo $row['Practical']; ?></td>
				<td><?PHP echo $row['Total']; ?></td>
				<td><input type="text" name="<?PHP echo $row['Subject'].'_th'; ?>" size="10"  value="<?php echo $value_th; ?>" onFocus="startCalc_<?php  echo $row['Subject']; ?>();" onBlur="stopCalc_<?php  echo $row['Subject']; ?>();" /></td>
				<td><input type="text" name="<?PHP echo $row['Subject'].'_pr'; ?>"  size="10" value="<?php echo $value_pr; ?>" onFocus="startCalc_<?php  echo $row['Subject']; ?>();" onBlur="stopCalc_<?php  echo $row['Subject']; ?>();"/></td>
				<td><input type="text" name="<?PHP echo $row['Subject'].'_tot'; ?>" size="10" value="<?php echo $value_total; ?>"/></td>
			</tr>
			<?PHP }
			
				//if($query=='1')
				//{
					$single_value = implode(",", $Subject_Array);
					echo '</table><input type="hidden" name="tbl_array" value="'. $single_value.'"/>' ;
					
		 		//}
			?>
            <table align="center" >
            <tr>
                <td colspan="3"><input type="submit" value="Add Marks" id="btn"/></td>
            </tr>
            </table>
		</form>
        </div> <!-- close of div display_search -->
	
<?PHP 
	} 
	else
	{
		search(); //search button click hunu aghi ko search form call
	} ?>
