<?php
/**
 * Melakukan pemeriksaan apakah telah terjadi perubahan data atau tidak.
 * @return string  1 = jika terjadi perubahan data | 0 = tidak terjadi perubahan data
 */
function hasChange() {

	$query = mysql_query("SELECT option_value FROM tb_option WHERE option_key='changes_data'");
	$r = mysql_fetch_array( $query );
	
	return $r['option_value'];
}

/**
 * Mengubah status changes_data pada table tb_option
 * @param 	string 	$value    :  nilai status >> 1(default) = telah terjadi perubahan data | 0 = tidak terjadi perubahan data
 */
function doChangesData( $value='1' )
{

	$query = mysql_query("UPDATE tb_option SET option_value='$value' WHERE option_key='changes_data'");
	return $query;
}

function dataKelas( $return = 'id_kelas' )
{
	
	$query = mysql_query( "SELECT * FROM tb_kelas");
	$kelas = array();
	while( $r=mysql_fetch_array( $query ) ) {

		$kelas[] = $r['id_kelas'];
	}

	if( $return == 'id_kelas' ) {

		$max = count( $kelas ) - 1;
		$output = range(0, $max);
		shuffle( $output );
		return $kelas[ $output[0] ];
	} else {

		return count( $kelas );	
	}
}

function dataDosen( $index = null, $id_mk, $return = 'id_dosen' )
{
	
	//cari dosen yang bisa mengajar mk bersangkutan
	$ampu = mysql_query( "SELECT * FROM tb_ampu_dosen WHERE id_mk LIKE '%\"$id_mk\"%'" );
	if( $ampu ) {
		// echo "SELECT * FROM tb_ampu_dosen WHERE id_mk LIKE '%\"$id_mk%\"'";
		$dosen = array();
		while ( $r = mysql_fetch_array( $ampu ) ) {
			$dosen[] = $r['id_dosen'];
		}

		if( $return == 'id_dosen' ) {
			if( isset( $dosen[ $index ] ) )
				return $dosen[ $index ];
			else
				return $out =array_rand( $dosen );
		} else {
			return count( $dosen );
		}
	}

	return 0;
}

function kodeHari( $kode )
{
    
    $arrayDay = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat");
	return $arrayDay[ $kode ];
}

?>