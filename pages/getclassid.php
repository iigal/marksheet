			
            <td>Class ID</td>
        	<?php
				$yr=$_GET['year'];
				$cls=$_GET['class'];
				$section=$_GET['sec'];
				$clsid=$_GET['classid'];
			?>
            <td><select name="classid" id="textbox"  onChange="showexamtype(this.value,'<?php echo $yr; ?>','<?php echo $clsid; ?>')" />
            <option>Select a ClassID</option>
			<?php
                          	include "../required/database.php";
				$db = new db_mysql;

			$sql= "select * from class where Year='".$yr."' and Class='".$cls."' and Section='".$section."' "; 
								
				$query=mysql_query($sql);
				while($row=mysql_fetch_assoc($query))
				{
				 	echo "<option value=\"".$row['ClassID']."\">".$row['ClassID']."</option>";
				} 			
			?>
			</select>
		</td>
         