<!-- Left Panel begin -->
<div id="nav">
    <ul>
    <?php //	if ($_SESSION['Level'] == 1) 
		//{
	?> 
		<li><a href="main.php?page=user&action=add_user">Add User</a></li>
        <li><a href="main.php?page=user">View User</a></li>
        
        <li><a href="main.php?page=class_entry&action=add_class">Add Class</a></li>
        <li><a href="main.php?page=class_entry">View Class</a></li>
     <?php //}
	 //else { ?>      
		<li><a href="main.php?page=exam_type&action=add_exam">Add Exam</a></li>
        <li><a href="main.php?page=exam_type">View Exam</a></li>
        
        <li><a href="main.php?page=subject_entry&action=add_subject">Add Subject</a></li>
        <li><a href="main.php?page=subject_entry">View Subject</a></li>
        
        <li><a href="main.php?page=student&action=add_student">Add Student</a></li>
        <li><a href="main.php?page=student">View Student</a></li>
        
        <li><a href="main.php?page=marks_entry">Marks Entry</a></li>
		<li><a href="main.php?page=marks_view">Marks View</a></li>  
        <li><a href="main.php?page=ledger_view">Ledger View</a></li>  
        
       <?php //} ?>
    </ul>
</div>
<!-- Left Panel end -->