 	<script language="javascript">
	function confirm_delete(){
		var $report = confirm("Are you sure you want to delete this record");					
		return $report;
	}
	
	
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

	function search()
	{
?>		<div id="search_form" align="center">
		<form action="?page=ledger_view&action=search_marks" method="post" />
        <table >
            <tr>
                <th colspan="3" style=" color:#000099"> Search marks</th>
            </tr>
            <tr>
				<td>Year</td>
				<td><select name="year" id="textbox"   onChange="showclassid(this.value)"/>
					<option>Select a Year</option>
					<?php
	                   $sql= "select DISTINCT Year from marks_2012 order by Year ASC";
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
                <td><select name="classid" id="textbox" />
					<option > Select Year first </option>
					</select>
				</td>
            </tr>
		
			
			<tr id="examtype_ajax">
				<td>Exam Type</td>
				<td><select name="exam_type" id="textbox" />
					<option>Select ClassID first</option>
					
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
	} // end of  function search	
	
	if($_REQUEST['action'] == "search_marks")
	{ 
		search(); // search button click vaye pachhi ko search function call
?>
		<div id="display_search">
        <form action="?page=ledger_view" method="post" style="border: inset" style="width:420px" >
        <?php
            echo $sql1= "select * from subject where ClassID='".$classid."' and ExamType='".$exam_type."' and Year='".$year."' ";
            $query1=mysql_query($sql1);
            
            $sql3= "select * from subject where ClassID='".$classid."' and ExamType='".$exam_type."' and Year='".$year."' ";
            $query3=mysql_query($sql3);
            
            
            
            echo "<table border=1 cellpadding=5 cellspacing=0>";
            echo "<tr><th colspan=7 style= color:#000099>Marks View</th></tr>";
         ?>
    
            
    
        <?php
            //echo "<tr style= color:#0000FF><td colspan=2></td><th>Subject</th><th>Theory</th><th>Practical</th><th>Total </th><th>Theory</th><th>Practical</th><th>Total </th>";
            echo "<tr style= color:#0000FF><td colspan=1></td>";
        ?> 
        <?php	
            $i=0;
            while($row=mysql_fetch_assoc($query1))
            {
        ?>		
                <td colspan="3"><?PHP echo  $row['Subject']; ?></td>
                
                
        <?php
            $testr[$i]=$row['ID'];
            $i++;
             }
              ?>
            </tr>
            
            <tr style="color: #0033CC">
                <td colspan="1"> SID</td>
                <?php
    
                    while($row=mysql_fetch_assoc($query3))
                    {
                ?>	
                
                    <td>Th</td>
                    <td>Pr</td>
                    <td>Tot</td>
                 <?php } ?>
            </tr>
            <?php
            
            $sqls="SELECT DISTINCT SID FROM marks_2012 WHERE ClassID='".$classid."' and ExamType='".$exam_type."' and Year='".$year."' order by SID ASC ";
            $querys=mysql_query($sqls);
            $nos=mysql_num_rows($querys);
            while($row5=mysql_fetch_assoc($querys)){
                $names_id[]=$row5['SID'];
            }
            for($qr=0;$qr<$nos;$qr++){
            ?>
            <tr>
                <td colspan="1"><?php echo $names_id[$qr] ; ?></td>
                <?php
                for($k=0;$k<count($testr);$k++){
                    $sql00="SELECT * FROM subject WHERE ID='".$testr[$k]."'";
                    $query00=mysql_query($sql00);
                    $testrow=mysql_fetch_assoc($query00);
                    $atr="SELECT * FROM marks_2012 WHERE SID='".$names_id[$qr]."' AND ClassID='".$classid."' AND ExamType='".$exam_type."' AND Year='".$year."' AND Subject='".$testrow['Subject']."'";
                    $query6=mysql_query($atr);
                    
                    while($row6=mysql_fetch_assoc($query6)){		
                            
                        
                        echo "<td>" .$row6['Obt_Theory'] ."</td>";
                        echo "<td>" . $row6['Obt_Practical'] . "</td>";
                        echo "<td>" . $row6['Obt_Total'] . "</td>";
                    }
                
                } 
            
        ?>	
                
            </tr>
    <?php } ?>
        </table> 
        </form>
        </div>
<?PHP
		
	} //else if action= search ko closing bracket
	else
	{
		search(); // form load huda ko search function call 
		
	}// elso ko end \
	print_r($testr2);
?>
