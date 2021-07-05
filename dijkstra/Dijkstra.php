<?php

require_once("PriorityQueue.php");
//panggil file PriorityQueue

class Edge {
	// class untuk buat rute ex: a -> b = 800
	public $start;
	public $end;
	public $weight;

	public function __construct($start, $end, $weight) {
		$this->start = $start;
		$this->end = $end;
		$this->weight = $weight;
	}
}

class Graph {

	public $nodes = array();
	//nge buat arra buat nyimpen node rute

	public function addedge($start, $end, $weight = 0) {
		if (!isset($this->nodes[$start])) {
			$this->nodes[$start] = array();
		}
		array_push($this->nodes[$start], new Edge($start, $end, $weight));
		//masukkan rute
	}

    public function removenode($index) {
			//hapus data ganda
		array_splice($this->nodes, $index, 1);
	}
	//hapus kalau ada node yang ganda


	public function paths_from($from) {
		//fungsi untuk membuat jalur
		$dist = array();
		$dist[$from] = 0;
		//cari rute yg ada titik awal

		$visited = array();
		//daftar rute yang saat ini dicek
		$previous = array();
		//daftar rute yang sudah dicek

		$queue = array();
		//daftar semua rute yang bisa dilalui lewat titik awal

		$Q = new PriorityQueue("compareWeights");
		$Q->add(array($dist[$from], $from));
		//semua rute yang ada disimpan untuk dibandingkan

		$nodes = $this->nodes;

		while($Q->size() > 0) {
			//cek semua rute yg ada jaraknya
			list($distance, $u) = $Q->remove();
			//hapus jalur sebagai indikasi sudah dicek
			if (isset($visited[$u])) {
				continue;
				//apakah rute saat ini bisa dilewati melalui titik saat ini
			}
			$visited[$u] = True;

			if (!isset($nodes[$u])) {
				print "Peringatan: '$u' tidak ditemukan dalam list node\n";
				//kalau node tidak terdaftar beri peringatan
				break;
			}

			foreach($nodes[$u] as $edge) {

				$alt = $dist[$u] + $edge->weight;
				$end = $edge->end;
				if (!isset($dist[$end]) || $alt < $dist[$end]) {
					$previous[$end] = $u;
					$dist[$end] = $alt;
					$Q->add(array($dist[$end], $end));
					//daftarkan semua rute yg telah dilalui dari titik awal beserta bobotnya
				}
			}
		}
		return array($dist, $previous);
		//kembalikan semua hasil rute yg bisa dilalui
	}

	public function paths_to($node_dsts, $tonode) {
		//fungsi untuk mencari jalur ke suatu tujuan
		$current = $tonode;
		$path = array();

		if (isset($node_dsts[$current])) {
			array_push($path, $tonode);
			//kalau ada variablenya maka masukkan ke daftar jalur
		}
		while(isset($node_dsts[$current])) {
			$nextnode = $node_dsts[$current];
			//menuju ke rute berikutnya dari titik saat ini sampai ketemu titik tujuan
			array_push($path, $nextnode);

			$current = $nextnode;
		}
		//kembalikan hasil rute jalurnya
		return array_reverse($path);

	}

	public function getpath($from, $to) {
		//fungsi buat dapatkan jalur menuju titik tujuan
		list($distances, $prev) = $this->paths_from($from);
		return $this->paths_to($prev, $to);
	}

}

function compareWeights($a, $b) {
	//fungsi untuk membandingkan bobot jarak
	return $a->data[0] - $b->data[0];
}
