	    <td>Section</td>
			<?php
				$yr=$_GET['year'];
				$cls=$_GET['class'];
			?>
        <td><select name="sec" id="textbox"  onChange="showclassid(this.value,'<?php echo $yr; ?>','<?php echo $cls; ?>')"/>
        	<option>Select a Section</option>
			<?php
				include "../required/database.php";
							$db = new db_mysql;

				$sql= "select * from class where Year='".$yr."' and Class='".$cls."' order by Section ASC "; 
								
				$query=mysql_query($sql);
				while($row=mysql_fetch_assoc($query))
				{
				  echo "<option value=\"".$row['Section']."\">".$row['Section']."</option>";
				}   
				 
			?>
				</select>
      	 </td>
        
         
        