<?php

	/*
	
	Author: Glenn Pili
	Date Created: 07-04-2015
	Description: Call this class to paginate the grid

	*/
	
	class Pagination {

		private $data;

		public function __construct() { }

		public function Paginate($values, $per_page) {
			
			$total_values = count($values);

			if(isset($_GET['page'])) {
				$current_page = $_GET['page'];
			} else {
				$current_page = 1;
			}

			$counts = ceil($total_values / $per_page);
			$param1 = ($current_page - 1) * $per_page;
			$this->data = array_slice($values, $param1, $per_page);

			for($x = 1; $x <= $counts; $x++) {
				$numbers[] = $x;
			}

			return $numbers;

		}

		public function FetchResult() {
			$resultValues = $this->data;
			return $resultValues;
		}

	}

?>