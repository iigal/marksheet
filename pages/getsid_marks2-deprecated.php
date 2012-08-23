         <td>Student ID</td>
         <?php
				$yr=$_GET['year'];
				$clsid=$_GET['classid'];
				$examtype=$_GET['exam_type'];
			?>
                <td><select name="sid1" id="textbox" />
                    <option>Select a SID</option>
                    <?php
							
                          	include "../required/database.php";
							$db = new db_mysql;
					
						
                        $sql= "select DISTINCT SID from marks_2011 where Year='".$yr."' and ClassID='".$clsid."' and ExamType='".$examtype."' order by SID ASC";
                        $query=mysql_query($sql);
                        while($row=mysql_fetch_assoc($query))
                        {
                              echo "<option value=\"".$row['SID']."\">".$row['SID']."</option>";
                        }   
                    ?>
                    </select>
                    
                </td>
        