<?PHP
//session_start();
	require_once "../required/class.php";
if(!isset($_SESSION['admin'])){
	refresh('./index.php');
}	
else{
?>

<style type="text/css">@import url("./css/cssAdmin.css");</style>
 <div id="wrapper1">	
<center><table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td class="subCaption" colspan="5" height="22px">Choose Something From Menu</td>
	</tr>
</table></center>
</div>
<?PHP } ?>