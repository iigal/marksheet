	   
     
      
      <td>Class ID</td>
      <?php 
		  $yr=$_GET['year'];
		  $clsid=$_GET['classid'];
	  ?>
      
      <td><select name="classid" id="textbox" onChange="showexamtype(this.value,'<?php echo $yr; ?>')" />
          <option>Select a ClassID</option>
					<?php
							include "../required/database.php";
							$db = new db_mysql;

						
						$sql= "select DISTINCT ClassID from marks_2011 where Year='".$yr."' order by ClassID ASC";
						$query=mysql_query($sql);
						while($row=mysql_fetch_assoc($query))
						{
						   echo "<option value=\"".$row['ClassID']."\">".$row['ClassID']."</option>";
						}   
					?>
					</select>
		</td>