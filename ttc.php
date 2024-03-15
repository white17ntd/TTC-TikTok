<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
/***[ Màu ]***/
$xnhac = "\033[1;96m";
$do = "\033[1;91m";
$luc = "\033[1;92m";
$vang = "\033[1;93m";
$xduong = "\033[1;94m";
$hong = "\033[1;95m";
$trang = "\033[1;97m";
/***[ USERAGENT ]***/
$_SESSION['useragent'] = 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36';
/***[ Delay ]***/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
	$_SESSION['load'] = 2000;
	$_SESSION['delay'] = 150000;
} else {
	$_SESSION['load'] = 0;
	$_SESSION['delay'] = 50000;
}
/**:*[ Đánh Dấu Bản Quyền ]***/
$thuong = $luc . "[" . $trang . "</>\033[1;92m] " . $xnhac;
/***[ Time & IP ]***/
$current_date = date("d/m/Y");
$user_ip = $vipcom.vn/ip/raw.php;

$thanhngang = $trang . "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
//$logo = logo_kov();

$logo = "\033[1;96m
 ██╗    ██╗██╗  ██╗██╗████████╗███████╗    ███╗   ██╗███╗   ██╗
 ██║    ██║██║  ██║██║╚══██╔══╝██╔════╝    ████╗  ██║████╗  ██║
 ██║ █╗ ██║███████║██║   ██║   █████╗      ██╔██╗ ██║██╔██╗ ██║
 ██║███╗██║██╔══██║██║   ██║   ██╔══╝      ██║╚██╗██║██║╚██╗██║
 ╚███╔███╔╝██║  ██║██║   ██║   ███████╗    ██║ ╚████║██║ ╚████║
  ╚══╝╚══╝ ╚═╝  ╚═╝╚═╝   ╚═╝   ╚══════╝    ╚═╝  ╚═══╝╚═╝  ╚═══╝
\033[1;91m   .!?JJJ7^         .~?JJ?7~    \033[1;93mAdmin\033[1;97m : \033[1;96mWhite NN
\033[1;91m  .?YJ~~7Y5J^      ~JY?~^!YY?   \033[1;93mInfo\033[1;97m : \033[1;96mfb.com/ntd.wnn
\033[1;91m  ^YY:   :J557   .7YJ^    7YY^  \033[1;93mGitHub\033[1;97m : \033[1;96m@white17ntd
\033[1;91m  ^YY:     !55J.:JY7.     7YY:  \033[1;93mInfo Tool\033[1;97m : \033[1;96mTTC TikTok
\033[1;91m  .JY7      ^Y5YYJ^      :Y5J       
\033[1;91m   ^YY~      :Y55J.     :Y5Y:       
\033[1;91m    ^?Y7^..:~JJ!J55?~^~?5PJ:    \033[1;93mNgày/Tháng/Năm \033[1;97m: \033[1;96m$current_date
\033[1;91m      ^7????7^.  ^7Y555Y7^      \033[1;93mIP Của Bạn \033[1;97m: \033[1;96m$user_ip
";


if (!$sock = @fsockopen('www.google.com', 80)) {
	echo 'Vui lòng bật kết nối mạng';
	exit;
}

/***[ Clear + Thông Số Admin ]***/
if (file_exists('luutim.txt')) {
	fopen("luutim.txt", "a+");
}
if (file_exists('luusub.txt')) {
	fopen("luusub.txt", "a+");
}
@system('clear');
echo $logo . "\n";

while (true) {
	if (file_exists("logtooltiktok.txt")) {
		$_SESSION['token'] = fread(fopen("logtooltiktok.txt", "r"), filesize("logtooltiktok.txt"));
		$login = logintoken();
		if ($login == true) {
			echo $thuong . $xnhac . "Nhập " . $vang . "[" . $trang . "1" . $vang . "] " . $xnhac . "Đăng nhập tài khoản ".$trang."[".$vang.$_SESSION['user'].$trang."]\n";
			echo $thuong . $xnhac . "Nhập " . $vang . "[" . $trang . "2" . $vang . "] " . $xnhac . "Để Thay Token TTC\n";
			echo $thuong . "Nhập số: " . $vang;
			$chon_tk = trim(fgets(STDIN));
			if ($chon_tk == "2") {
				if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
					@system("rm logtooltiktok.txt");
				} else {
					@system("del logtooltiktok.txt");
				}
			} else if ($chon_tk == "1") {
			} else {
				echo $do . " Nhập Sai Vui Lòng Nhập Lại !!!\n";
				continue;
			}
		} else {
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
				@system("rm logtooltiktok.txt");
			} else {
				@system("del logtooltiktok.txt");
			}
		}
	}
	if (!file_exists("logtooltiktok.txt")) {

		echo  $thuong . " Nhập Token TTC: " . $vang;
		$tokenacc = trim(fgets(STDIN));
		$file = fopen("logtooltiktok.txt", "w+");
		fwrite($file, '' . $tokenacc);
		fclose($file);
	}
	$_SESSION['token'] = fread(fopen("logtooltiktok.txt", "r"), filesize("logtooltiktok.txt"));
	$login = logintoken();
	if ($login == true) {
		echo $xnhac . " Đăng Nhập Thành Công.       \n";
		break;
	} else {
		echo $do . " Access_Token TTC Sai \n";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
			@system("rm logtooltiktok.txt");
		} else {
			@system("del logtooltiktok.txt");
		}
		echo $thanhngang;
	}
}
$xu = coin($thanh_dep);


echo "\n Vào nơi cấu hình tương tác chéo, cấu hình acc muốn chạy rồi vào đây ấn enter: "; trim(fgets(STDIN));
@system('clear');
echo $logo . "\n";

$xu = coin($thanh_dep);
echo $thuong . $xnhac . "Tên Tài Khoản: " . $vang . $_SESSION['user'] . "\n";
echo $thuong . $xnhac . "Xu hiện tại: " . $vang . $xu . "\n";
echo $thanhngang;
$dem = 0;
while (true) {
	echo $thuong . $xnhac . "Nhập " . $do . "[" . $vang . "1" . $do . "]" . $xnhac . " Nhiệm Vụ Tim \n";
	echo $thuong . $xnhac . "Nhập " . $do . "[" . $vang . "2" . $do . "]" . $xnhac . " Nhiệm Vụ Follow\n";
	echo $thuong . $xnhac . "Nhập " . $do . "[" . $vang . "3" . $do . "]" . $xnhac . " Làm Lại Tim \n";
	echo $thuong . $xnhac . "Nhập " . $do . "[" . $vang . "4" . $do . "]" . $xnhac . " Làm Lại Follow \n";
	echo $thuong . $xnhac . "Nhập Số Để Chạy Nhiệm Vụ: $vang";
	$nhiemvu = trim(fgets(STDIN));
	echo $thuong . $xnhac . "Nhập Thời Gian Delay: $vang";
	$delay = trim(fgets(STDIN));
	echo $thanhngang;
	while (true) {
		if ($nhiemvu == 1) {
			$listtim = get_tiktok("");
			if (count($listtim) == 0) {
				echo $do . " Đã Hết Nhiệm Vụ Tim             \r";
				sleep(2);
				break;
			}
			for ($lap = 0; $lap < count($listtim); $lap++) {
				$id = $listtim[$lap]["idpost"];
				$link = $listtim[$lap]["link"];

				$_user_id = explode('https://www.tiktok.com/@', $linklike)[1];
				if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
					@system('xdg-open ' . $link);
				} else {
					@system('cmd /c start ' . $link);
				}
				$xu = coin($thanh_dep);
				$dem++;

				$kl = "\r\e[1;32m[>\e[1;33mWNN-TOOL\e[1;32m<]\033[1;32m [\033[1;33m".$dem."\033[1;92m] [\033[1;36m".date("H:i:s")."\033[1;32m] [\033[1;33m TIM \033[1;32m] \033[1;32m".">> \033[1;37m@".$link." \n";



				for ($i = 0; $i < strlen($kl); $i++) {
					echo $kl[$i];
					usleep(1500);
				}
				delay($delay);
				$list = $list . $id . ",";
				if ($dem % 10 == 0) {
					$list = substr($list, 0, (strlen($list) - 1));
					$nhantien = nhantien($list, "");
					if ($nhantien["mess"]) {
						$xujob = $nhantien["sodu"];
						$xu = $xu + $xujob;

						echo $thanhngang;
						echo "\r\e[1;33m⌠\e[1;32mThành công\e[1;33m⌡\033[1;33m +".$xujob." xu\033[1;37m | \033[92mTổng xu:\033[1;33m $xu\n";
						echo $thanhngang;

					} else {
						echo $do . $nhantien["error"] . "          \n";
						fwrite(fopen("luutim.txt", "a+"), $list . ",");
						sleep(1);
					}
					$list = '';
				}
			}
		} else if ($nhiemvu == 2) {
			$listsub = get_tiktok("/subcheo");
			if (count($listsub) == 0) {
				echo $do . " Đã Hết Nhiệm Vụ Follow          \r";
				sleep(2);
				break;
			}
			for ($lap = 0; $lap < count($listsub); $lap++) {
				$id = $listsub[$lap]["idpost"];
				$link = $listsub[$lap]["link"];
				if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
					@system('xdg-open https://www.tiktok.com/@' . $link);
				} else {
					@system('cmd /c start https://www.tiktok.com/@' . $link);
				}
				$xu = coin($thanh_dep);
				$dem++;
				
				$kl = "\r\e[1;32m[>\e[1;33mWNN-TOOL\e[1;32m<]\033[1;32m [\033[1;33m".$dem."\033[1;92m] [\033[1;36m".date("H:i:s")."\033[1;32m] [\033[1;33mFOLLOW\033[1;32m] \033[1;32m".">> \033[1;37m@".$link." \n";
				
				for ($i = 0; $i < strlen($kl); $i++) {
					echo $kl[$i];
					usleep(1500);
				}
				delay($delay);
				$list = $list . $id . ",";
				if ($dem % 10 == 0) {
					$list = substr($list, 0, (strlen($list) - 1));
					$nhantien = nhantien($list, "/subcheo");
					if ($nhantien["mess"]) {
						$xujob = $nhantien["sodu"];
						$xu = $xu + $xujob;

						echo $thanhngang;
						echo "\r\e[1;33m⌠\e[1;32mThành công\e[1;33m⌡\033[1;33m +".$xujob." xu\033[1;37m | \033[92mTổng xu:\033[1;33m $xu\n";
						echo $thanhngang;

					} else {
						sleep(1);
						fwrite(fopen("luusub.txt", "a+"), $list . ",");
						echo $do . $nhantien["error"] . "          \n";
					}
					$list = '';
				}
			}
		} else if ($nhiemvu == 3) {
			$dem = 0;
			$list = explode(',', file_get_contents("luutim.txt"));
			for ($lap = 0; $lap < (count($list) - 1); $lap++) {
				$id = $list[$lap];
				echo $thanh_xau . $luc . $id . "     \r";
				usleep(10000);
				$nhantien = nhantien($id, "");
				if ($nhantien["mess"]) {
					$stt += 1;
				}
			}
			$xu = coin($thanh_dep);

			echo $thanhngang;
			echo "\r\e[1;33m⌠\e[1;32mThành công\e[1;33m⌡\033[1;33m +".($stt * 500)." xu\033[1;37m | \033[92mTổng xu:\033[1;33m $xu\n";
			echo $thanhngang;


			if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
				system("rm luutim.txt");
			} else {
				system("del luutim.txt");
			}
			die;
		} else if ($nhiemvu == 4) {
			$dem = 0;
			$list = explode(',', file_get_contents("luusub.txt"));
			for ($lap = 0; $lap < (count($list) - 1); $lap++) {
				$id = $list[$lap];
				echo $thanh_xau . $luc . $id . "     \r";
				usleep(10000);
				$nhantien = nhantien($id, "/subcheo");
				if ($nhantien["mess"]) {
					$stt += 1;
				}
			}
			$xu = coin($thanh_dep);

			echo $thanhngang;
			echo "\r\e[1;33m⌠\e[1;32mThành công\e[1;33m⌡\033[1;33m +".($stt * 1000)." xu\033[1;37m | \033[92mTổng xu:\033[1;33m $xu\n";
			echo $thanhngang;


			if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
				system("rm luusub.txt");
			} else {
				system("del luusub.txt");
			}
			die;
		} else {
			echo $do . " Vui Lòng Chọn 1 Nhiệm Vụ (1 hoặc 2 hoặc 3 hoặc 4).     \n";
			echo $thanhngang;
			break;
		}
	}
}
/***#####################[ FUNCTION ]#################### ***/
function logintoken()
{
	$data = 'access_token=' . $_SESSION['token'];
	$head[] = 'Content-type: application/x-www-form-urlencoded';
	$ch   = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => 'https://tuongtaccheo.com/logintoken.php',
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_COOKIEJAR => "TTC.txt",
		CURLOPT_COOKIEFILE => "TTC.txt",
		CURLOPT_USERAGENT => $_SESSION['useragent'],
		CURLOPT_ENCODING => TRUE
	));
	$login = json_decode(curl_exec($ch));
	if ($login->status == 'success') {
		$xu = $login->data->sodu;
		$_SESSION['user'] = $login->data->user;
		$js = fopen($_SESSION['user'] . ".txt", "w+");
		file_put_contents($_SESSION['user'] . ".txt", file_get_contents("TTC.txt"));
		return $xu;
	} else {
		return false;
	}
}
function cauhinh($idtik)
{
	$data = "iddat[]=" . $idtik . "&loai=tt";
	$head = array(
		"Host: tuongtaccheo.com",
		"content-length: " . strlen($data),
		"accept: */*",
		"origin: https://tuongtaccheo.com",
		"x-requested-with: XMLHttpRequest",
		"user-agent: Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.152 Mobile Safari/537.36",
		"content-type: application/x-www-form-urlencoded; charset=UTF-8",
		"referer: https://tuongtaccheo.com/cauhinh/index.php"
	);
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => 'https://tuongtaccheo.com/cauhinh/datnick.php',
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_COOKIEFILE => $_SESSION['user'] . ".txt",
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_ENCODING => TRUE
	));
	$access = curl_exec($ch);
	if (strpos($access, 'Chưa đăng nhập !!!') !== false) {
		$login = logintoken();
		if ($login == true) {
			echo " COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THÀNH CÔNG \n";
		} else {
			echo " COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THẤT BẠI \n";
			die;
		}
	} else {
		return $access;
	}
}
function get_tiktok($type)
{
	$url  = "https://tuongtaccheo.com/tiktok/kiemtien" . $type . "/getpost.php";
	$head = array(
		"Host: tuongtaccheo.com",
		"accept: application/json, text/javascript, *" . "/" . "*; q=0.01",
		"x-requested-with: XMLHttpRequest",
		"user-agent: Mozilla/5.0 (Linux; Android 10; Mi 9T Pro) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/12.1 Chrome/79.0.3945.136 Mobile Safari/537.36",
		"referer: https://tuongtaccheo.com/tiktok/kiemtien/"
	);
	$ch   = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POST => 1,
		CURLOPT_HTTPGET => true,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_COOKIEFILE => $_SESSION['user'] . ".txt",
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_ENCODING => TRUE
	));
	$data = json_decode(curl_exec($ch), true);
	return $data;
}
function nhantien($id, $type)
{
	while (true) {
		$url  = "https://tuongtaccheo.com/tiktok/kiemtien" . $type . "/nhantien.php";
		$data = "id=" . $id;
		$head = array(
			"Host: tuongtaccheo.com",
			"content-length: " . strlen($data),
			"x-requested-with: XMLHttpRequest",
			"user-agent: Mozilla/5.0 (Linux; Android 10; Mi 9T Pro) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/12.1 Chrome/79.0.3945.136 Mobile Safari/537.36",
			"content-type: application/x-www-form-urlencoded; charset=UTF-8",
			"origin: https://tuongtaccheo.com",
			"referer: https://tuongtaccheo.com/tiktok/kiemtien/"
		);
		$ch   = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_FOLLOWLOCATION => TRUE,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_COOKIEFILE => $_SESSION['user'] . ".txt",
			CURLOPT_HTTPHEADER => $head,
			CURLOPT_ENCODING => TRUE
		));
		$data = curl_exec($ch);
		if ($data == '0') {
			$login = logintoken();
			if ($login == true) {
				echo "\033[1;92m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THÀNH CÔNG \n";
				continue;
			} else {
				echo "\033[1;91m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THẤT BẠI \n";
				die;
			}
		} else {
			return json_decode($data, true);
		}
	}
}
function coin($thanh_dep)
{
	while (true) {
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => 'https://tuongtaccheo.com/home.php',
			CURLOPT_PORT => "443",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_SSL_VERIFYPEER => true,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_COOKIEFILE => $_SESSION['user'] . ".txt",
		));
		$access = curl_exec($ch);
		curl_close($ch);
		$xu = explode('"soduchinh">', explode('</strong>', $access)[0])[1];
		if (strpos($access, "Chào mừng") == false) {
			$login = logintoken();
			if ($login == true) {
				echo "\033[1;92m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THÀNH CÔNG \n";
				continue;
			} else {
				echo "\033[1;91m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THẤT BẠI \n";
				die;
			}
		} else if ($xu !== '') {
			return $xu;
		} else {
			echo "\033[1;91m Lỗi Không Xác Định                  \r";
		}
	}
}
function delay($loai)
{
	$so = 0;
	$delay = $loai  * 15;
	for ($x = 0; $x < $delay; $x++) {
		if ($x % 15 == 0) {
			$so++;
		}
		global $mau19;
		global $mau18;
		global $mau17;
		global $mau16;
		global $mau15;
		global $mau14;
		global $mau13;
		global $mau12;
		global $mau11;
		global $mau10;
		global $mau9;
		global $mau8;
		global $mau7;
		global $mau6;
		global $mau5;
		global $mau4;
		global $mau3;
		global $mau2;
		global $mau1;
		$maurand = "\033[1;9" . rand(1, 7) . "m";
		$mau19 = $mau18;
		$mau18 = $mau17;
		$mau17 = $mau16;
		$mau16 = $mau15;
		$mau15 = $mau14;
		$mau14 = $mau13;
		$mau13 = $mau12;
		$mau12 = $mau11;
		$mau11 = $mau10;
		$mau10 = $mau9;
		$mau9  =  $mau8;
		$mau8  =  $mau7;
		$mau7  =  $mau6;
		$mau6  =  $mau5;
		$mau5  =  $mau4;
		$mau4  =  $mau3;
		$mau3  =  $mau2;
		$mau2  =  $mau1;
		$mau1  =  $maurand;
		echo "\r                   \r";
		echo "\r\e[1;95m    😈" . $mau1 . "W" . $mau2 . "H" . $mau3 . "I" . $mau4 . "T" . $mau5 . "E" . $mau6 . " T" . $mau7 . "O" . $mau8 . "O" . $mau9 . "L😈       T" . $mau10 . "T" . $mau11 . "C" . $mau12 . "-" . $mau13 . "T" . $mau14 . "T" . $mau15 . " >" . $mau16 . ">" . $mau17 . " | " . $mau18 . "$so" . $mau19 . " |           \r";
		usleep(13000);
		echo "\r                   \r";
		echo "\r\e[1;95m    😈" . $mau1 . "W" . $mau2 . "H" . $mau3 . "I" . $mau4 . "T" . $mau5 . "E" . $mau6 . " T" . $mau7 . "O" . $mau8 . "O" . $mau9 . "L😈       T" . $mau10 . "T" . $mau11 . "C" . $mau12 . "-" . $mau13 . "T" . $mau14 . "T" . $mau15 . " >" . $mau16 . ">" . $mau17 . " | " . $mau18 . "$so" . $mau19 . " |           \r";
		usleep(13500);
		echo "\r                   \r";
		echo "\r\e[1;95m    😈" . $mau1 . "W" . $mau2 . "H" . $mau3 . "I" . $mau4 . "T" . $mau5 . "E" . $mau6 . " T" . $mau7 . "O" . $mau8 . "O" . $mau9 . "L😈       T" . $mau10 . "T" . $mau11 . "C" . $mau12 . "-" . $mau13 . "T" . $mau14 . "T" . $mau15 . " >" . $mau16 . ">" . $mau17 . " | " . $mau18 . "$so" . $mau19 . " |           \r";
		usleep(13000);
		echo "\r                   \r";
		echo "\r\e[1;95m    😈" . $mau1 . "W" . $mau2 . "H" . $mau3 . "I" . $mau4 . "T" . $mau5 . "E" . $mau6 . " T" . $mau7 . "O" . $mau8 . "O" . $mau9 . "L😈       T" . $mau10 . "T" . $mau11 . "C" . $mau12 . "-" . $mau13 . "T" . $mau14 . "T" . $mau15 . " >" . $mau16 . ">" . $mau17 . " | " . $mau18 . "$so" . $mau19 . " |           \r";
		usleep(13500);
		echo "\r                   \r";
		echo "\r\e[1;95m    😈" . $mau1 . "W" . $mau2 . "H" . $mau3 . "I" . $mau4 . "T" . $mau5 . "E" . $mau6 . " T" . $mau7 . "O" . $mau8 . "O" . $mau9 . "L😈       T" . $mau10 . "T" . $mau11 . "C" . $mau12 . "-" . $mau13 . "T" . $mau14 . "T" . $mau15 . " >" . $mau16 . ">" . $mau17 . " | " . $mau18 . "$so" . $mau19 . " |           \r";
		usleep(13000);
		echo "\r";
		echo " \r";
	}
	echo "\r\e[1;95m    😈WHITETOOL😈    TTC TikTok                  \r";
}
