	    <td>Student</td>
			<?php
				$yr=$_GET['year'];
				$clsid=$_GET['classid'];
			?>
           
					
        <td><select name="sid" id="textbox" />
        	<option>Select Student</option>
			<?php
				include "../required/database.php";
							$db = new db_mysql;

				 $sql= "select  DISTINCT SID,Roll,FirstName,LastName from student where Year='".$yr."' and ClassID='".$clsid."' order by  Roll ASC "; 
								
				$query=mysql_query($sql);
				while($row=mysql_fetch_assoc($query))
				{
				  echo "<option value=\"".$row['SID']."\">".$row['Roll']."-".$row['FirstName']." ".$row['LastName']."</option>";
				}   
				 
			?>
				</select>
      	 </td>
        
         
        