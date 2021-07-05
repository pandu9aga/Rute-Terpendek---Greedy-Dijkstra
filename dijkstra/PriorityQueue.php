<?php

class PriorityList {
	//class construct untuk daftar jalur menuju titik selanjutnya
	public $next;
	public $data;
	function __construct($data) {
		$this->next = null;
		$this->data = $data;
	}
}

class PriorityQueue {

	private $size; //ukuran
	private $liststart; //rute yang saat ini dilalui
	private $comparator; //rute pembanding

	function __construct($comparator) {
		$this->size = 0;
		$this->liststart = null;
		$this->listend = null;
		$this->comparator = $comparator;
	}

	function add($x) {
		$this->size = $this->size + 1;
		//tambah rute yang dilalui
		if($this->liststart == null) {
			//kalau rute menuju titik berikutnya masih belum ada tambah ke daftar
			$this->liststart = new PriorityList($x);
		} else {
			//kalau sudah ada bandingkan dengan rute yg lain
			$node = $this->liststart;
			$comparator = $this->comparator;
			$newnode = new PriorityList($x);
			$lastnode = null;
			$added = false;
			while($node) {
				//lakukan semua perbandingan
				if ($comparator($newnode, $node) < 0) {
					//kalau belum pernah dibandingkan, maka bandingkan
					$newnode->next = $node;
					if ($lastnode == null) {
						//kalau belum sampai titik terakhir terus lanjutkan perbandingan
						$this->liststart = $newnode;
					} else {
						//kalau sudah sampai titik terakhir, isi variabel titik terakhir dari titik saat ini
						$lastnode->next = $newnode;
					}
					$added = true;
					break;
				}
				//ganti isi titik variable terakhir ke titik saat ini
				$lastnode = $node;
				//ganti isi variable titik saat ini ke titik berikutnya
				$node = $node->next;
			}
			if (!$added) {
				//kalau sudah sampai titik terakhir masukkan semua titik yg telah dilalui pada rute kali ini
				//tidak perlu nyari titik baru lagi
				$lastnode->next = $newnode;
			}
		}

	}

	function debug() {
		//nge test
		$node = $this->liststart;
		$i = 0;
		if (!$node) {
			//kalo gk ada node
			print "<< Tidak ada nodes >>\n";
			return;
		}
		while($node) {
			//kalo ada tampilkan jalurnya
			print "[$i]=" . $node->data[1] . " (" . $node->data[0] . ")\n";
			$node = $node->next;
			$i++;
		}
	}

	function size() {
		//dapetin bobot jarak
		return $this->size;
	}

	function peak() {
		//dapetin titik puncak/awal start
		return $this->liststart->data;
	}

	function remove() {
		$x = $this->peak();
		$this->size = $this->size - 1;
		$this->liststart = $this->liststart->next;
		//menuju rute berikutnya, hapus jalur yg sudah dilalui
		return $x;
	}
}
