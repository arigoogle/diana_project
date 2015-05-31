<?php  
	require_once 'libs/konek.php';
	if (isset($_GET['id_user'])) 
	{
		mysql_query("DELETE FROM tb_user WHERE id_user = '$_GET[id_user]'");
	}

	header("location:user.php")
?>