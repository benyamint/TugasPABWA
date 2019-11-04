<?php
class siswa{
	public $nama = "Fulan";
	public $usia = "17 tahun";
	public $alamat = "Jl. OOP Sukarame Bandar Lampung";
	public $foto = "";
	public $id_siswa = "12345";
	


}

$siswa = new siswa();
echo $siswa -> nama;
echo "<br>";
echo $siswa -> alamat;
?>