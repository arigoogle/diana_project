<?php

function hasChange() {

	$query = mysql_query("SELECT option_value FROM tb_option WHERE option_key='changes_data'");
	$r = mysql_fetch_array( $query );
	
	return $r['option_value'];
}

function doChangesData( $value='1' )
{
	$query = mysql_query("UPDATE tb_option WHERE option_key='changes_data' SET option_value='$value'");
	return $query;
}

?>