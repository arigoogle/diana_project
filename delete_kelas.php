<?php  
	require_once 'libs/konek.php';
	if (isset($_GET['id_kelas'])) 
	{
		mysql_query("DELETE FROM tb_kelas WHERE id_kelas = '$_GET[id_kelas]'");
	}

	header("location:kelas.php")
?>