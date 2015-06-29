<?php  
	require_once 'libs/konek.php';
	if ( isset( $_GET['id_dosen'] ) ) 
	{
		mysql_query("DELETE FROM tb_dosen WHERE id_dosen = '$_GET[id_dosen]'");
		mysql_query("DELETE FROM tb_ampu_dosen WHERE id_dosen = '$_GET[id_dosen]'");
	}

	header("location:dosen.php")
?>