<?php  
	require_once 'libs/konek.php';
	if (isset($_GET['id_mk'])) 
	{
		mysql_query("DELETE FROM tb_matakuliah WHERE id_mk = '$_GET[id_mk]'");
	}

	header("location:matkul.php")
?>