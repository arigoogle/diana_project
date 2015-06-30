<?php
session_start();
require_once 'libs/konek.php';
require_once 'libs/helper.php';


    
// jika hari reguler, maka perkuliahan dimulai dari jam ...
// jika hari jumat, maka perkuliahan dimulai dari jam...
// cara menentukan jam perkuliahan adalah
//  - cek hari saat ini apa
//  - random jam awal 
//  - tambah jam awal dengan jumlah sks.
//  - 1 sks = 50 menit

$perkuliahanReguler = array( "2015-06-06 08:00:00", "2015-06-06 10:00:00", "2015-06-06 11:00:00", "2015-06-06 14:00:00" ); 
$perkuliahanRegulerJumat = array( "2015-06-06 08:00:00", "2015-06-06 09:00:00", "2015-06-06 13:00:00" ); 

$qMatakuliah = mysql_query( "SELECT * FROM tb_matakuliah" );
// $jmlDosen = mysql_num_rows( mysql_query("SELECT * FROM tb_dosen") );

$counterDosen = 0;
$dosenAda = true;
//kosongkan table tb_jadwal yang digenerate otomatis
$delete = mysql_query("DELETE FROM tb_jadwal WHERE is_auto_generate='1'");

if( $delete ) {

  while( $r = mysql_fetch_array( $qMatakuliah ) ) {

    //data matakuliah
    $id_matakuliah = $r['id_mk'];
    $nama_matakuliah = $r['nama_mk'];
    $sks = $r['sks'];
    $perSks = 50;

    $totalJam = $perSks * $sks;

    $jmlDosen = dataDosen( null, $id_matakuliah, 'jumlah_dosen' );
    if( $jmlDosen !== false ) {
      
      if( $counterDosen >= $jmlDosen ) {
        
        $counterDosen = 0;
      }
    } else {
      
      $dosenAda = false;
    }

    $number = range( 0, 4 );
    shuffle( $number );
    $selectedDay = $number[0]; 

    if( $selectedDay === 4 ) {

      $numberJam = range(0, 2);
      shuffle( $numberJam );
      if( $sks > 4 )
        $startJam = $perkuliahanRegulerJumat[ 3 ];
      else
        $startJam = $perkuliahanRegulerJumat[ $numberJam[0] ];

    } else {

      $numberJam = range(0, 3);
      shuffle( $numberJam );
      $startJam = $perkuliahanReguler[ $numberJam[0] ];
    }
    
    $startTimeRaw = strtotime( $startJam );
    $endTimeRaw = strtotime("+$totalJam minutes", $startTimeRaw);

    $id_kelas = dataKelas();
    $id_dosen = dataDosen( $counterDosen, $id_matakuliah, 'id_dosen' );
    // echo "Matakuliah $nama_matakuliah berdurasi $totalJam menit akan berada dikelas $id_kelas dengan dosen $id_dosen di hari $selectedDay dimulai pukul $startTime - $endTime<br>\n";
    $_SESSION['totalJam'] = $totalJam;
    $_SESSION['id_kelas'] = $id_kelas;
    $_SESSION['hari'] = $selectedDay;
    $_SESSION['jumlah_kelas'] = dataKelas('jumlah_kelas');
    // echo $id_kelas . '<<<br>';
    createJadwal( $id_matakuliah, $id_dosen, $id_kelas, $startTimeRaw, $endTimeRaw, $selectedDay );
    $counterDosen++;
  }
}

/**
 * Untuk mencari jadwal yang kosong dan memasukkannya ke database. Fungsi ini mengandung fungso rekursif
 */
function createJadwal( $id_mk, $id_dosen, $id_kelas, $jam_awal, $jam_akhir, $hari )
{

  if( checkKelasJam( $hari, $id_dosen, $id_kelas, $jam_awal, $jam_akhir ) ) {

    // echo "Matakuliah $id_mk dengan dosen $id_dosen di kelas $id_kelas pukul $pukul pada hari $hari telah berhasil dimasukkan <br>";
    $query = mysql_query("INSERT INTO tb_jadwal(id_mk, id_dosen, id_kelas, jam_awal, jam_akhir, hari, is_auto_generate) VALUES('$id_mk', '$id_dosen', '$id_kelas', '$jam_awal', '$jam_akhir', '$hari', '1')");
  } else {

    $id_kelas = (int)$id_kelas + 1;
    $id_kelas = cariKelas( $id_kelas );
    if( $id_kelas === false ) {
      
      if( $hari < 4 ) {

        $hari += 1;
        if( (int)$hari !== (int)$_SESSION['hari'] ) {

          $batasJumat = strtotime( "2015-06-06 11:30:00" );
          if( $hari === 4 && $jam_akhir > $batasJumat ) {

            $jam_awal = strtotime("2015-06-06 13:00:00");
            $lamaPerkuliahan = $_SESSION['totalJam'];
            $jam_akhir = strtotime("+lamaPerkuliahan minutes", $jam_awal);
          }
          createJadwal( $id_mk, $id_dosen, $_SESSION['id_kelas'], $jam_awal, $jam_akhir, $hari );
        } else {
          return false;
        }

      } else {
        
        $hari = 0;
        createJadwal( $id_mk, $id_dosen, $_SESSION['id_kelas'], $jam_awal, $jam_akhir, $hari );
      }
    } else {

      createJadwal( $id_mk, $id_dosen, $id_kelas, $jam_awal, $jam_akhir, $hari );
    }
  }
}

/**
 * Untuk pengecekan apakah kelas dan jam dari jadwal bersangkutan sudah ada di database atau belum
 * @return boolean  true => Jika jadwal bersangkutan bisa dipakai
 *                  false => Jadwal bersangkutan tidak bisa dipakai
 */
function checkKelasJam( $hari, $id_dosen, $id_kelas, $startTime=null, $endTime=null )
{

    $return = array();
    $cek1 = mysql_num_rows( mysql_query("SELECT * FROM tb_jadwal WHERE hari='$hari' AND id_kelas='$id_kelas' AND jam_awal<='$endTime'") );
    if( $cek1 === 0 )
      $return[] = 'true';
    else
      $return[] = 'false';

    $cek2 = mysql_num_rows( mysql_query("SELECT * FROM tb_jadwal WHERE hari='$hari' AND id_dosen='$id_dosen' AND jam_awal<='$endTime'") );
    if( $cek2 > 0 )
      $return[] = 'false';
    else
      $return[] = 'true';

    if( in_array('false', $return) )
      return false;
    else
      return true;
}

/**
 * Mencari kelas kosong.
 */
function cariKelas( $id_kelas ) {

  $id_kelas = (int)$id_kelas;
  // echo $id_kelas . ' - ' . $_SESSION['jumlah_kelas'] . ' <br>'; 
  if( $id_kelas !== (int)$_SESSION['id_kelas'] ) {

    return false;
  } else {

    if( $id_kelas >= (int)$_SESSION['jumlah_kelas'] ) {
      
      return 1;
    }
    
    return $id_kelas; 
  }

}

doChangesData('0');
header('location:jadwal.php?e=n');