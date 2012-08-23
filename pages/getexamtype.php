	    <td>Exam Type</td>
			<?php
				$yr=$_GET['year'];
				$clsid=$_GET['classid'];
			?>
        <td><select name="exam_type" id="textbox" />
        	<option>Select an Exam Type</option>
			<?php
				include "../required/database.php";
							$db = new db_mysql;

				 $sql= "select * from exam where Year='".$yr."' and ClassID='".$clsid."' order by ClassID ASC "; 
								
				$query=mysql_query($sql);
				while($row=mysql_fetch_assoc($query))
				{
				  echo "<option value=\"".$row['ExamType']."\">".$row['ExamType']."</option>";
				}   
				 
			?>
				</select>
      	 </td>
        
         
        