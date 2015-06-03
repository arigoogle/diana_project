<?php
require_once 'libs/konek.php';
require_once 'libs/helper.php';

function generateJadwal( $day = null )
{
    $arrayDay = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat");

    $qMatakuliah = mysql_query( "SELECT * FROM tb_matakuliah" );
    while( $r = mysql_fetch_array( $qMatakuliah ) ) {

      if( $day == null ) {
       
        $number = range( 0, 4 );
        shuffle( $number );
        $selectedDay = $arrayDay[ $number[0] ]; 
      }


      //data matakuliah
      $id_matakuliah = $r['id_mk'];
      $nama_matakuliah = $r['nama_mk'];
      $sks = $r['sks'];

      $id_kelas = dataKelas();
      $id_dosen = dataDosen();
      
      echo "Matakuliah $nama_matakuliah akan berada dikelas $id_kelas dengan dosen $id_dosen di hari $selectedDay\n";

    }

} generateJadwal();