	    <td>Exam Type</td>
			<?php
				$yr=$_GET['year'];
				$clsid=$_GET['classid'];
			?>
           
					
        <td><select name="exam_type1" id="textbox" id="textbox" onChange="showsid(this.value,'<?php echo $yr; ?>','<?php echo $clsid; ?>')" />
        	<option>Select an Exam Type</option>
			<?php
				include "../required/database.php";
							$db = new db_mysql;

				 $sql= "select  DISTINCT ExamType from marks_2011 where Year='".$yr."' and ClassID='".$clsid."' order by  ExamType ASC "; 
								
				$query=mysql_query($sql);
				while($row=mysql_fetch_assoc($query))
				{
				  echo "<option value=\"".$row['ExamType']."\">".$row['ExamType']."</option>";
				}   
				 
			?>
				</select>
      	 </td>
        
         
        