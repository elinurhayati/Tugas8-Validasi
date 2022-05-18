<?php 
	/* Membuat koneksi database*/
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'formulir_peserta_didik';

	$conn = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($conn));


	/* Ketika button submit diklik */
	if(isset($_POST['btnsubmit'])){
		/* Fungsi untuk insert data ke tabel */
		$submit = mysqli_query($conn, "INSERT INTO data_formulir(jenis_daftar, tgl_daftar, tgl_masuk, nis, no_peserta_ujian, paud, tk, skhun, ijazah, hobi, cita2, nama, jenis_kelamin, nisn, nik, tempat_lahir, tgl_lahir, agama, keb_khusus, jalan, rt, rw, dusun, kelurahan_desa, kecamatan, kode_pos, tempat_tinggal, transportasi, no_hp, no_tlp, email, penerima_kps, no_kps, kewarganegaraan) VALUES ('$_POST[jenis_daftar]', '$_POST[tgl_daftar]', '$_POST[tglmasuk]', '$_POST[nis]', '$_POST[npu]', '$_POST[paud]', '$_POST[tk]', '$_POST[skhun]', '$_POST[ijazah]', '$_POST[hobi]', '$_POST[cita]', '$_POST[nama]', '$_POST[jk]', '$_POST[nisn]', '$_POST[nik]', '$_POST[tempatlahir]', '$_POST[tgllahir]', '$_POST[agama]', '$_POST[bk]', '$_POST[alamat]', '$_POST[rt]', '$_POST[rw]', '$_POST[namadusun]', '$_POST[desa]', '$_POST[kecamatan]', '$_POST[pos]', '$_POST[tinggal]', '$_POST[transportasi]', '$_POST[hp]', '$_POST[tlp]', '$_POST[email]', '$_POST[kps]', '$_POST[nokps]', '$_POST[kwn]')");

		/* Ketika submit berhasil*/
		if($submit){
			echo "<script> 
					alert('Data Registrasi Peserta Didik Berhasil Tersimpan');
					document.location = 'data_pendaftaran.php';
				</script>";
		}
		/* Ketika submit gagal*/
		else{
			echo "<script> 
					alert('Oops Data Registrasi Peserta Didik Gagal Tersimpan');
					document.location = 'data_pendaftaran.php';
				</script>";
		}
	}
?>

<DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymus">
	<style>
	</style>
</head>

<body>
	<?php
	$error_nis = "";
	$error_skhun = "";
	$error_ijazah = "";
	$error_nama = "";
	$error_npu = "";
	$error_nisn = "";
	$error_nik = "";
	$error_pos = "";
	$error_hp = "";
	$error_tlp = "";
	$error_nokps = "";

	$nis = "";
	$skhun = "";
	$ijazah = "";
	$nama = "";
	$npu = "";
	$nisn = "";
	$nik = "";
	$pos = "";
	$hp = "";
	$tlp = "";
	$nokps = "";

	/* Mendeklarasikan validasi */
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["nis"])){
			$error_nis = "NIS tidak boleh kosong";
		} else{
			$nis = cek_input($_POST["nis"]);
			if(!is_numeric($nis)){
				$error_nis = 'NIS hanya boleh angka';
			}
		}
		if(empty($_POST["skhun"])){
			$error_skhun = "SKHUN tidak boleh kosong";
		} else{
			$skhun = cek_input($_POST["skhun"]);
			if(!is_numeric($skhun)){
				$error_skhun = 'SKHUN hanya boleh angka';
			}
		}
		if(empty($_POST["ijazah"])){
			$error_ijazah = "Ijazah tidak boleh kosong";
		} else{
			$ijazah = cek_input($_POST["ijazah"]);
			if(!is_numeric($ijazah)){
				$error_ijazah = 'Ijazah hanya boleh angka';
			}
		}
		if(empty($_POST["npu"])){
			$error_npu = "Nomor Peserta tidak boleh kosong";
		} else{
			$npu = cek_input($_POST["npu"]);
			if(!is_numeric($ninpus)){
				$error_npu = 'Nomor Peserta hanya boleh angka';
			}
		}
		if(empty($_POST["nama"])){
			$error_nama = "Nama tidak boleh kosong";
		} else {
			$nama = cek_input($_POST["nama"]);
			if(!preg_match("/^[a-zA-Z]*$/", $nama)){
				$nameErr = "Inputan hanya boleh huruf dan spasi";
			}
		}
		if(empty($_POST["nisn"])){
			$error_nisn = "NISN tidak boleh kosong";
		} else{
			$nisn = cek_input($_POST["nisn"]);
			if(!is_numeric($nisn)){
				$error_nisn = 'NISN hanya boleh angka';
			}
		}
		if(empty($_POST["nik"])){
			$error_nik = "NIK tidak boleh kosong";
		} else{
			$nik = cek_input($_POST["nik"]);
			if(!is_numeric($nik)){
				$error_nik = 'NIK hanya boleh angka';
			}
		}
		if(empty($_POST["pos"])){
			$error_pos = "Kode Pos tidak boleh kosong";
		} else{
			$pos = cek_input($_POST["pos"]);
			if(!is_numeric($pos)){
				$error_pos= 'Kode Pos hanya boleh angka';
			}
		}
		if(empty($_POST["hp"])){
			$error_hp = "No. HP tidak boleh kosong";
		} else{
			$hp = cek_input($_POST["hp"]);
			if(!is_numeric($hp)){
				$error_hp = 'No. HP hanya boleh angka';
			}
		}
		if(empty($_POST["tlp"])){
			$error_tlp = "No. Telepon tidak boleh kosong";
		} else{
			$tlp = cek_input($_POST["tlp"]);
			if(!is_numeric($tlp)){
				$error_tlp = 'No. Telepon hanya boleh angka';
			}
		}
		if(empty($_POST["nokps"])){
			$error_nokps = "Nomor KPS tidak boleh kosong";
		} else{
			$nokps = cek_input($_POST["nokps"]);
			if(!is_numeric($nokps)){
				$error_nokps = 'Nomor KPS hanya boleh angka';
			}
		}

	}

	function cek_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>
	<div class = "container mt-3 ">
		<h1 class="text-center "> FORMULIR PESERTA DIDIK </h1>

		<!-- Awal Card Form -->
		<div class="card mt-4 mb-5">
			<!--Header-->
			<div class="card-header bg-danger text-white fs-5 fw-semibold">
	    		Registrasi Peserta Didik
	  		</div>
	  		<!--body-->
	  		<div class="card-body">
	    		<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	    			
	    			<div class = "form-group">
		    			<label class="fw-semibold">Jenis Pendaftaran</label>
		    			<select class= " form-control " name="jenis_daftar">
		    				<option value="Siswa Baru">Siswa Baru</option>
		    				<option value="Siswa Pindahan">Siswa Pindahan</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Tanggal Pendaftaran</label>
		    			<input type = "date" name="tgl_daftar" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Tanggal Masuk Sekolah</label>
		    			<input type = "date" name="tglmasuk" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">NIS</label>
		    			<input type = "text" name="nis" class="form-control <?php echo ($error_nis !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $nis; ?>"> <span class="warning"> <?php echo $error_nis; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Nomor Peserta Ujian</label>
		    			<input type = "text" name="npu" class="form-control <?php echo ($error_npu !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $npu; ?>"> <span class="warning"> <?php echo $error_npu; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Apakah Pernah PAUD</label>
		    			<select class= " form-control" name="paud">
		    				<option value="Ya">Ya</option>
		    				<option value="Tidak">Tidak</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Apakah Pernah TK</label> <br>
		    			<select class= " form-control" name="tk">
		    				<option value="Ya">Ya</option>
		    				<option value="Tidak">Tidak</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">No. Seri SKHUN Sebelumnya</label>
		    			<input type = "text" name="skhun" class="form-control <?php echo ($error_skhun !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $skhun; ?>"> <span class="warning"> <?php echo $error_skhun; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">No. Seri Ijazah Sebelumnya</label>
		    			<input type = "text" name="ijazah" class="form-control <?php echo ($error_ijazah !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $ijazah; ?>"> <span class="warning"> <?php echo $error_ijazah; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Hobi</label>
		    			<select class= " form-control" name="hobi">
		    				<option value="Olah Raga">Olah Raga</option>
		    				<option value="Kesenian">Kesenian</option>
		    				<option value="Membaca">Membaca</option>
		    				<option value="Menulis">Menulis</option>
		    				<option value="Traveling">Traveling</option>
		    				<option value="Lainnya">Lainnya</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2 mb-4">
		    			<label class="fw-semibold">Cita - Cita</label>
		    			<select class= " form-control" name="cita">
		    				<option value="PNS">PNS</option>
		    				<option value="TNI/POLRI">TNI/POLRI</option>
		    				<option value="Guru/Dosen">Guru/Dosen</option>
		    				<option value="Dokter">Dokter</option>
		    				<option value="Politikus">Politikus</option>
		    				<option value="Wiraswasta">Wiraswasta</option>
		    				<option value="Seni/Lukis/Artis/Sejenis">Seni/Lukis/Artis/Sejenis</option>
		    				<option value="Lainnya">Lainnya</option>
		    			</select>
	    			</div>

	  		<div class="card-header bg-danger text-white fs-5 fw-semibold">
	    		Data Pribadi
	  		</div>

	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Nama Lengkap</label>
		    			<input type = "text" name="nama" class="form-control <?php echo ($error_nama !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $nama; ?>"> <span class="warning"> <?php echo $error_nama; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Jenis Kelamin</label> <br>
		    			<select class= " form-control" name="jk">
		    				<option value="Laki-Laki">Laki-Laki</option>
		    				<option value="Perempuan">Perempuan</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">NISN</label>
		    			<input type = "text" name="nisn" class="form-control <?php echo ($error_nisn !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $nisn; ?>"> <span class="warning"> <?php echo $error_nisn; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">NIK</label>
		    			<input type = "text" name="nik" class="form-control <?php echo ($error_nik !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $nik; ?>"> <span class="warning"> <?php echo $error_nik; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Tempat Lahir</label>
		    			<input type = "text" name="tempatlahir" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Tanggal Lahir</label>
		    			<input type = "date" name="tgllahir" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Agama</label>
		    			<select class= " form-control" name="agama">
		    				<option value="Islam">Islam</option>
		    				<option value="Kristen/Protestan">Kristen/Protestan</option>
		    				<option value="Katholik">Katholik</option>
		    				<option value="Hindu">Hindu</option>
		    				<option value="Budha">Budha</option>
		    				<option value="Kong Hu Chu">Kong Hu Chu</option>
		    				<option value="Lainnya">Lainnya</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Berkebutuhan Khusus</label>
		    			<select class= " form-control" name="bk">
		    				<option value="Tidak">Tidak</option>
		    				<option value="Netra">Netra</option>
		    				<option value="Rungu">Rungu</option>
		    				<option value="Grahita Ringan">Grahita Ringan</option>
		    				<option value="Grahita Sedang">Grahita Sedang</option>
		    				<option value="Daksa Ringan">Daksa Ringan</option>
		    				<option value="Daksa Sedang">Daksa Sedang</option>
		    				<option value="Laras">Laras</option>
		    				<option value="Wicara">Wicara</option>
		    				<option value="Tuna Ganda">Tuna Ganda</option>
		    				<option value="Hiper Aktif">Hiper Aktif</option>
		    				<option value="Cerdas Istimewa">Cerdas Istimewa</option>
		    				<option value="Bakat Istimewa">Bakat Istimewa</option>
		    				<option value="Kesulitan Belajar">Kesulitan Belajar</option>
		    				<option value="Narkoba">Narkoba</option>
		    				<option value="Indigo">Indigo</option>
		    				<option value="Down Syndrome">Down Syndrome</option>
		    				<option value="Autis">Autis</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Alamat Jalan</label>
		    			<input type = "text" name="alamat" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">RT</label>
		    			<input type = "text" name="rt" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">RW</label>
		    			<input type = "text" name="rw" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Nama Dusun</label>
		    			<input type = "text" name="namadusun" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Nama Kelurahan/Desa</label>
		    			<input type = "text" name="desa" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Kecamatan</label>
		    			<input type = "text" name="kecamatan" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Kode Pos</label>
		    			<input type = "text" name="pos" class="form-control <?php echo ($error_pos !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $pos; ?>"> <span class="warning"> <?php echo $error_pos; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Tempat Tinggal</label>
		    			<select class= " form-control" name="tinggal">
		    				<option value="Bersama Orang Tua">Bersama Orang Tua</option>
		    				<option value="Wali">Wali</option>
		    				<option value="Kos">Kos</option>
		    				<option value="Asrama">Asrama</option>
		    				<option value="Panti Asuhan">Panti Asuhan</option>
		    				<option value="Lainnya">Lainnya</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Moda Transportasi</label>
		    			<select class= " form-control" name="transportasi">
		    				<option value="Jalan Kaki">Jalan Kaki</option>
		    				<option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
		    				<option value="Kendaraan Umum/Angkot/Pete-Pete">Kendaraan Umum/Angkot/Pete-Pete</option>
		    				<option value="Jemputan Sekolah">Jemputan Sekolah</option>
		    				<option value="Kereta Api">Kereta Api</option>
		    				<option value="Ojek">Ojek</option>
		    				<option value="Andong/Bendi/Sado/Dokar/Delman/Becak">Andong/Bendi/Sado/Dokar/Delman/Becak</option>
		    				<option value="Perahu Penyeberangan/Rakit/Getek">Perahu Penyeberangan/Rakit/Getek</option>
		    				<option value="Lainnya">Lainnya</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Nomor HP</label>
		    			<input type = "text" name="hp" class="form-control <?php echo ($error_hp !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $hp; ?>"> <span class="warning"> <?php echo $error_hp; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Nomor Telepon</label>
		    			<input type = "text" name="tlp" class="form-control <?php echo ($error_tlp !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $tlp; ?>"> <span class="warning"> <?php echo $error_tlp; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Email Pribadi</label>
		    			<input type = "text" name="email" class="form-control" placeholder=""></input>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">Penerima KPS/PKH/KIP</label> <br>
		    			<select class= " form-control" name="kps">
		    				<option value="Ya">Ya</option>
		    				<option value="Tidak">Tidak</option>
		    			</select>
	    			</div>
	    			<div class = "form-group mt-2">
		    			<label class="fw-semibold">No. KPS/KKS/PKH/KIP</label>
		    			<input type = "text" name="nokps" class="form-control <?php echo ($error_nokps !="" ? "is-invalid" : "" ); ?>" placeholder="" value="<?php echo $nokps; ?>"> <span class="warning"> <?php echo $error_nokps; ?> </span></input>
	    			</div>
	    			<div class = "form-group mt-2 mb-3">
		    			<label class="fw-semibold">Kewarganegaraan</label> <br>
		    			<select class= " form-control" name="kwn">
		    				<option value="WNI">WNI</option>
		    				<option value="WNA">WNA</option>
		    			</select>
	    			</div>

	    			<button type = "submit" class = "btn btn-success" name = "btnsubmit">Submit</button>
	    			<button type = "reset" class = "btn btn-warning" name = "btnreset">Reset</button>
	    		</form>
	  		</div>

		</div>
		<!-- Akhir Card Form -->
	</div>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>