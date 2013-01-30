<link href="css/style.css" rel="stylesheet" type="text/css">
<?
include ("auth.php");
if (($_POST['login']=="admin")&&($_POST['pass']=="admin")) 
		{
		session_start();
		$_SESSION['name_sesion_a'] = "admin";
		}else{
if (($_POST['login']=="test")&&($_POST['pass']=="test")) 
		{
		session_start();
		$_SESSION['name_sesion_a'] = "test";
		}		}
if (!$_SESSION['name_sesion_a'])
	{
		echo "
		<center>
		 <h3><b> јвторизуйтесь <br><br><br> <table width=100%> <form action='index.php' method='post' > <b>
			<tr><td width=45% ><b style='float:right;'>¬вед≥ть лог≥н </td><td><input name='login' size='41' type='text'></td></tr>
			<tr><td width=45%><b style='float:right;'>¬вед≥ть пароль </td><td><input name='pass' size='41' type='password'></td></tr>
			<tr><td></td><td><input style='float:center;' type='submit' value='¬х≥д'></td></tr></table></form>";
	}else
	{
	

include ("menu.php");
}

?>