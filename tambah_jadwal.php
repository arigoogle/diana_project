<?php
require_once 'libs/konek.php';
require_once 'libs/helper.php';

function generateJadwal( $day = null )
{
    
    // jika hari reguler, maka perkuliahan dimulai dari jam ...
    // jika hari jumat, maka perkuliahan dimulai dari jam...
    // cara menentukan jam perkuliahan adalah
    //  - cek hari saat ini apa
    //  - random jam awal 
    //  - tambah jam awal dengan jumlah sks.
    //  - 1 sks = 50 menit
  
    $perkuliahanReguler = array( "08:00:00", "10:00:00", "11:00:00", "14:00:00" ); 
    $perkuliahanRegulerJumat = array( "08:00:00", "09:00:00", "13:00:00" ); 

    $qMatakuliah = mysql_query( "SELECT * FROM tb_matakuliah" );
    $jmlDosen = mysql_num_rows( mysql_query("SELECT * FROM tb_dosen") );
    
    $counterDosen = 0;
    //kosongkan table tb_jadwal yang digenerate otomatis
    $delete = mysql_query("DELETE FROM tb_jadwal WHERE is_auto_generate='1'");

    if( $delete ) {

      while( $r = mysql_fetch_array( $qMatakuliah ) ) {

        if( $counterDosen >= $jmlDosen ) {
          $counterDosen = 0;
        }

        if( $day == null ) {
         
          $number = range( 0, 4 );
          shuffle( $number );
          $selectedDay = $number[0]; 
        }

        if( $selectedDay === 4 ) {

          $numberJam = range(0, 2);
          shuffle( $numberJam );
          $startJam = $perkuliahanRegulerJumat[ $numberJam[0] ];
        } else {

          $numberJam = range(0, 3);
          shuffle( $numberJam );
          $startJam = $perkuliahanReguler[ $numberJam[0] ];
        }

        //data matakuliah
        $id_matakuliah = $r['id_mk'];
        $nama_matakuliah = $r['nama_mk'];
        $sks = $r['sks'];
        $perSks = 50;

        $totalJam = $perSks * $sks;
        
        $startTime = date("H.i", strtotime( $startJam ) );
        $endTimeRaw = strtotime("+$totalJam minutes", strtotime( $startJam ));
        $endTime = date("H.i", $endTimeRaw);
        $time = $startTime . " - " . $endTime; 

        $id_kelas = dataKelas();
        $id_dosen = dataDosen( $counterDosen );
        
        // echo "Matakuliah $nama_matakuliah akan berada dikelas $id_kelas dengan dosen $id_dosen di hari $selectedDay dimulai pukul $startJam - $endTime<br>\n";
        
        $query = mysql_query("INSERT INTO tb_jadwal(id_mk, id_dosen, id_kelas, pukul, hari, is_auto_generate) VALUES('$id_matakuliah', '$id_dosen', '$id_kelas', '$time', '$selectedDay', '1')");
        $counterDosen++;

        // echo "matakuliah $nama_matakuliah berhasil dimasukkan <br>";
      }
    }

    doChangesData('0');
    header('location:jadwal.php?e=n');

} generateJadwal();