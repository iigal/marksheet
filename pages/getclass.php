	   
        <td>Class</td>
        <?php $yr=$_GET['year']; ?>
		<td><select name="class" id="textbox" onChange="showsection(this.value,'<?php echo $yr; ?>')"/>
        <option>Select a Class</option>
			<?php
				include "../required/database.php";
							$db = new db_mysql;

				
				
				$sql= "select DISTINCT Class from class where Year='".$yr."' order by Class ASC "; 
				$query=mysql_query($sql);
				while($row=mysql_fetch_assoc($query))
				{
				   echo "<option value=\"".$row['Class']."\">".$row['Class']."</option>";
				}   
			?>
			</select>
		</td>
      