<?php 	
	if ( ($_SESSION['Level'] == 1)  or ($_SESSION['Level'] == 2) )
	{
?> 
        <ul id="sddm">
            <li><a href="#" 
                onmouseover="mopen('m1')" 
                onmouseout="mclosetime()">User</a>
                <div id="m1" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                <a href="main.php?page=user&action=add_user">Add User</a>
                <a href="main.php?page=user">View User</a>    
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m2')" 
                onmouseout="mclosetime()">Class</a>
                <div id="m2" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                
                <a href="main.php?page=class_entry&action=add_class">Add Class</a>
                <a href="main.php?page=class_entry">View Class</a>
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m3')" 
                onmouseout="mclosetime()">Exam</a>
                <div id="m3" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                
                <a href="main.php?page=exam_type&action=add_exam">Add Exam</a>
                <a href="main.php?page=exam_type">View Exam</a>
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m4')" 
                onmouseout="mclosetime()">Subject</a>
                <div id="m4" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                    
                <a href="main.php?page=subject_entry&action=add_subject">Add Subject</a>
                <a href="main.php?page=subject_entry">View Subject</a>
                
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m5')" 
                onmouseout="mclosetime()">Student</a>
                <div id="m5" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                    
                <a href="main.php?page=student&action=add_student">Add Student</a>
                <a href="main.php?page=student">View Student</a>
                
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m6')" 
                onmouseout="mclosetime()">Marks</a>
                <div id="m6" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                 
                <a href="main.php?page=marks_entry">Marks Entry</a>
                <a href="main.php?page=marks_view">Marks View</a>  
                <a href="main.php?page=ledger_view">Ledger View</a>
                
                </div>
            </li>
            
        </ul>

<?php 	
	}
	elseif ($_SESSION['Level'] == 3) 
	{
?> 
        <ul id="sddm">
            <li><a href="#" 
                onmouseover="mopen('m2')" 
                onmouseout="mclosetime()">Class</a>
                <div id="m2" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                
                <a href="main.php?page=class_entry&action=add_class">Add Class</a>
                <a href="main.php?page=class_entry">View Class</a>
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m3')" 
                onmouseout="mclosetime()">Exam</a>
                <div id="m3" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                
                <a href="main.php?page=exam_type&action=add_exam">Add Exam</a>
                <a href="main.php?page=exam_type">View Exam</a>
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m4')" 
                onmouseout="mclosetime()">Subject</a>
                <div id="m4" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                    
                <a href="main.php?page=subject_entry&action=add_subject">Add Subject</a>
                <a href="main.php?page=subject_entry">View Subject</a>
                
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m5')" 
                onmouseout="mclosetime()">Student</a>
                <div id="m5" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                    
                <a href="main.php?page=student&action=add_student">Add Student</a>
                <a href="main.php?page=student">View Student</a>
                
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m6')" 
                onmouseout="mclosetime()">Marks</a>
                <div id="m6" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                 
                <a href="main.php?page=marks_entry">Marks Entry</a>
                <a href="main.php?page=marks_view">Marks View</a>  
                <a href="main.php?page=ledger_view">Ledger View</a>
                
                </div>
            </li>
            
        </ul>

<?php 	
	}
	elseif ($_SESSION['Level'] == 4) 
	{
?> 
        <ul id="sddm">
            <li><a href="#" 
                onmouseover="mopen('m2')" 
                onmouseout="mclosetime()">Class</a>
                <div id="m2" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                
                <a href="main.php?page=view_class">View Class</a>
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m3')" 
                onmouseout="mclosetime()">Exam</a>
                <div id="m3" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                
                <a href="main.php?page=view_exam">View Exam</a>
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m4')" 
                onmouseout="mclosetime()">Subject</a>
                <div id="m4" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                    
                <a href="main.php?page=view_subject">View Subject</a>
                
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m5')" 
                onmouseout="mclosetime()">Student</a>
                <div id="m5" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                
                <a href="main.php?page=view_student">View Student</a>
                
                </div>
            </li>
            <li><a href="#" 
                onmouseover="mopen('m6')" 
                onmouseout="mclosetime()">Marks</a>
                <div id="m6" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                 
                <a href="main.php?page=view_marks_view">Marks View</a>  
                <a href="main.php?page=ledger_view">Ledger View</a>
                
                </div>
            </li>
            
        </ul>

<?php 	
	}
	elseif ($_SESSION['Level'] == 5) 
	{
?> 
        <ul id="sddm">
            <li><a href="#" 
                onmouseover="mopen('m6')" 
                onmouseout="mclosetime()">Marks</a>
                <div id="m6" 
                    onmouseover="mcancelclosetime()" 
                    onmouseout="mclosetime()">
                 
                <a href="main.php?page=marks__individual_view">Marks View</a>  
                
                </div>
            </li>
            
        </ul>

<?php 	
	}
?>