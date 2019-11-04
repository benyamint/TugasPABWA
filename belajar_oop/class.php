<?php
$mysqli = new mysqli("localhost","root","","tugasweb");

if (mysqli_connect_error()){
	echo "koneksi database gagal" . mysqli_connect_error;
}
class siswa{
	public $koneksi;
	function __construct($mysqli){
		$this -> koneksi = $mysqli;
	}
	function set_siswa(){
		$ambildata = $this -> koneksi -> query("select * from siswa");
		while($pecah = $ambildata -> fetch_assoc()){
			$data[] = $pecah;
		}
		return $data;
	}
	function get_siswa($nama,$alamat,$foto){
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		move_uploaded_file($lokasifoto, "foto/$namafoto");
		$this -> koneksi -> query("insert into siswa (nama,alamat,foto) values ('$nama','$alamat','$namafoto')");
	}
	function hapus($id_siswa){
		$this -> koneksi -> query("DELETE from siswa where nama='$id_siswa'");
	}
	function getDataByNama($nama){
		$datanama = $this -> koneksi -> query("select * from siswa where nama='$nama';");
		return $datanama->fetch_array();
	}
	function update($nama,$alamat,$foto){
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		move_uploaded_file($lokasifoto, "foto/$namafoto");
		$this -> koneksi -> query("update siswa set nama='$nama', alamat='$alamat',foto='$namafoto' where nama='$nama'");
	}
}
$siswa = new siswa($mysqli);
?>