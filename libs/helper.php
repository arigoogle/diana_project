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

	$query = mysql_query("UPDATE tb_option WHERE option_key='changes_data' SET option_value='$value'");
	return $query;
}

?>