<?php 
    function cek_session(){
        $ci = & get_instance();
        $session = $ci->session->userdata('username');
		//print_r($session);die();
        if ($session == ''){
            redirect(base_url());
        }
    }

    function filter($str){
        return strip_tags(htmlentities($str, ENT_QUOTES, 'UTF-8'));
    }

    function rupiah($total){
        return number_format($total, 0, ".", ".");
    }

    function pembulatan($uang)
    {
     $puluhan = substr($uang);
     if($puluhan<50)
     $akhir = $uang - $puluhan;
     else
     $akhir = $uang + (100-$puluhan);
     return $akhir;
    }

    function bonus($nilai,$bagi,$kali)
    {
     $nil=($nilai/$bagi);
     return floor($nil)*$kali;
    }

    function active()
    {
     return random_string('alnum', 50);
    }

    function code()
    {
     return rand(1000,10000);
    }

    function terbilang($x){
      $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
      if ($x < 12)
        return " " . $abil[$x];
      elseif ($x < 20)
        return Terbilang($x - 10) . " Belas";
      elseif ($x < 100)
        return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
      elseif ($x < 200)
        return " Seratus" . Terbilang($x - 100);
      elseif ($x < 1000)
        return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
      elseif ($x < 2000)
        return " Seribu" . Terbilang($x - 1000);
      elseif ($x < 1000000)
        return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
      elseif ($x < 1000000000)
        return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
    }

    function cetak($str){
        return strip_tags(htmlentities($str, ENT_QUOTES, 'UTF-8'));
    }

    function cetak_meta($str,$mulai,$selesai){
        return strip_tags(html_entity_decode(substr(str_replace('"','',$str),$mulai,$selesai), ENT_COMPAT, 'UTF-8'));
    }

    function sensor($teks){
        $ci = & get_instance();
        $query = $ci->db->query("SELECT * FROM katajelek");
        foreach ($query->result_array() as $r) {
            $teks = str_replace($r['kata'], $r['ganti'], $teks);       
        }
        return $teks;
    }  

    function getSearchTermToBold($text, $words){
        preg_match_all('~[A-Za-z0-9_äöüÄÖÜ]+~', $words, $m);
        if (!$m)
            return $text;
        $re = '~(' . implode('|', $m[0]) . ')~i';
        return preg_replace($re, '<b style="color:red">$0</b>', $text);
    }

    function tgl_indo($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;       
    } 
	
	function tgl_i($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
			$hari = hari($tgl);
            return $hari.', '.$tanggal.' '.$bulan.' '.$tahun;       
    } 
	
	function tgl_long($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = Bulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
			$hari = hari_long($tgl);
            return $hari.', '.$tanggal.' '.$bulan.' '.$tahun;       
    } 

    function tgl_simpan($tgl){
            $tanggal = substr($tgl,0,2);
            $bulan = substr($tgl,3,2);
            $tahun = substr($tgl,6,4);
            return $tahun.'-'.$bulan.'-'.$tanggal;       
    }

    function tgl_view($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = substr($tgl,5,2);
            $tahun = substr($tgl,0,4);
            return $tanggal.'-'.$bulan.'-'.$tahun;       
    }

    function tgl_grafik($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.'_'.$bulan;       
    }   

    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    } 

     function Random($length = 3) {
        return substr(str_shuffle("01234567890"), 0, $length);
    } 

    function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    function hari($date){
    $daftar_hari = array(
	 'Sunday' => 'Ming',
	 'Monday' => 'Sen',
	 'Tuesday' => 'Sel',
	 'Wednesday' => 'Rab',
	 'Thursday' => 'Kam',
	 'Friday' => 'Jum',
	 'Saturday' => 'Sab'
	);
	//$date="2012/05/03";
	$namahari = date('l', strtotime($date));
	return $daftar_hari[$namahari];
    }
	
	function hari_long($date){
    $daftar_hari = array(
	 'Sunday' => 'Minggu',
	 'Monday' => 'Senin',
	 'Tuesday' => 'Selasa',
	 'Wednesday' => 'Rabu',
	 'Thursday' => 'Kamis',
	 'Friday' => 'Jumat',
	 'Saturday' => 'Sabtu'
	);
	//$date="2012/05/03";
	$namahari = date('l', strtotime($date));
	return $daftar_hari[$namahari];
    }

    function getBulan($bln){
                switch ($bln){
                    case 1: 
                        return "Jan";
                        break;
                    case 2:
                        return "Feb";
                        break;
                    case 3:
                        return "Mar";
                        break;
                    case 4:
                        return "Apr";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Jun";
                        break;
                    case 7:
                        return "Jul";
                        break;
                    case 8:
                        return "Agu";
                        break;
                    case 9:
                        return "Sep";
                        break;
                    case 10:
                        return "Okt";
                        break;
                    case 11:
                        return "Nov";
                        break;
                    case 12:
                        return "Des";
                        break;
                }
            } 

    function bulan($bln){
                switch ($bln){
                    case 1: 
                        return "Januari";
                        break;
                    case 2:
                        return "Februari";
                        break;
                    case 3:
                        return "Maret";
                        break;
                    case 4:
                        return "April";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Juni";
                        break;
                    case 7:
                        return "Juli";
                        break;
                    case 8:
                        return "Agustus";
                        break;
                    case 9:
                        return "September";
                        break;
                    case 10:
                        return "Oktober";
                        break;
                    case 11:
                        return "November";
                        break;
                    case 12:
                        return "Desember";
                        break;
                }
            } 

function cek_terakhir($datetime, $full = false) {
	 $today = time();    
     $createdday= strtotime($datetime); 
     $datediff = abs($today - $createdday);  
     $difftext="";  
     $years = floor($datediff / (365*60*60*24));  
     $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
     $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
     $hours= floor($datediff/3600);  
     $minutes= floor($datediff/60);  
     $seconds= floor($datediff);  
     //year checker  
     if($difftext=="")  
     {  
       if($years>1)  
        $difftext=$years." Tahun";  
       elseif($years==1)  
        $difftext=$years." Tahun";  
     }  
     //month checker  
     if($difftext=="")  
     {  
        if($months>1)  
        $difftext=$months." Bulan";  
        elseif($months==1)  
        $difftext=$months." Bulan";  
     }  
     //month checker  
     if($difftext=="")  
     {  
        if($days>1)  
        $difftext=$days." Hari";  
        elseif($days==1)  
        $difftext=$days." Hari";  
     }  
     //hour checker  
     if($difftext=="")  
     {  
        if($hours>1)  
        $difftext=$hours." Jam";  
        elseif($hours==1)  
        $difftext=$hours." Jam";  
     }  
     //minutes checker  
     if($difftext=="")  
     {  
        if($minutes>1)  
        $difftext=$minutes." Menit";  
        elseif($minutes==1)  
        $difftext=$minutes." Menit";  
     }  
     //seconds checker  
     if($difftext=="")  
     {  
        if($seconds>1)  
        $difftext=$seconds." Detik";  
        elseif($seconds==1)  
        $difftext=$seconds." Detik";  
     }  
     return $difftext;  
	}
	
	function number_format_short($n, $precision = 1 ) {
    	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision, ",", ",");
		$suffix = '';
	} else if ($n < 900000) {
		// 0,9k-850k
		$n_format =  number_format($n /1000, $precision, ",", ",");
		$suffix = ' Rb';
	} else if ($n < 900000000) {
		// 0,9m-850m
		$n_format = number_format($n /1000000, $precision, ",", ",");
		$suffix = ' Jt';
	}

	if ( $precision > 0 ) {
		$dotzero =','.str_repeat('0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}

	return $n_format . $suffix;
	}
	
	function resi() {
    $result = '';
    for($i = 0; $i < 12; $i++) {
        $result .= mt_rand(0, 9);
    }
    return $result;
	}
	
	function hp($nohp) { 
         if(substr(trim($nohp), 0, 3)=='628'){
             $hp = substr(trim($nohp), 3);
         }
         elseif(substr(trim($nohp), 0, 2)=='08'){
             $hp = substr(trim($nohp), 2);
		 }
	return $hp;
	}