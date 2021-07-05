<?php

/*
 * Author: doug@neverfear.org
 */

require("Dijkstra.php");
//panggil file dijkstra

function runTest($input_a,$input_b) {
	$conn = mysqli_connect("localhost","root","","greedy");

  if($conn){
  	 //echo "koneksi host berhasil.<br/>";
  }else{
  	 echo "koneksi gagal.<br/>";
  }

	$g = new Graph();
	//buat objek graph

	//contoh struktur graph
	//$g->addedge("a", "b", 4);

	$data =  mysqli_query($conn, "select * from jarak");
	//ambil data semua jarak yang ada
	while($d = mysqli_fetch_assoc($data))
	{
		//tambah data jarak ke objek graph $g
		$g->addedge($d['kec_awal'], $d['kec_tujuan'], $d['jarak']);
		$g->addedge($d['kec_tujuan'], $d['kec_awal'], $d['jarak']);
		//karena tipe rutenya satu arah jadi di bolak balik
		//ex: a ke b = 100 & b ke a = 100
	}

	list($distances, $prev) = $g->paths_from($input_a);
	//cari list jarak yang ada titik awal sesuai sama yg diinput $dari

	$path = $g->paths_to($prev, $input_b);
	//ambil rute terpendek dari titik awal $dari menuju titik yang ada $ke

	//print_r($path);
	return $path;
	//mengembalikan hasil rute terpendek

}

function runTestold($input_a,$input_b) {
	$g = new Graph();
	$g->addedge("a", "b", 4);
	$g->addedge("a", "d", 1);

	$g->addedge("b", "a", 74);
	$g->addedge("b", "c", 2);
	$g->addedge("b", "e", 12);

	$g->addedge("c", "b", 12);
	$g->addedge("c", "j", 12);
	$g->addedge("c", "f", 74);

	$g->addedge("d", "g", 22);
	$g->addedge("d", "e", 32);

	$g->addedge("e", "h", 33);
	$g->addedge("e", "d", 66);
	$g->addedge("e", "f", 76);

	$g->addedge("f", "j", 21);
	$g->addedge("f", "i", 11);

	$g->addedge("g", "c", 12);
	$g->addedge("g", "h", 10);

	$g->addedge("h", "g", 2);
	$g->addedge("h", "i", 72);

	$g->addedge("i", "j", 7);
	$g->addedge("i", "f", 31);
	$g->addedge("i", "h", 18);

	$g->addedge("j", "f", 8);


	list($distances, $prev) = $g->paths_from($input_a);

	$path = $g->paths_to($prev, $input_b);

	//print_r($path);
	return $path;

}


//runTest();
