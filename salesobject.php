<?php

	include_once 'database.php';
	
	class SalesObject {

		// Private variables
		private $conn;
		private $table_name = "SALES";

		// Public Variables
		public $branch_main_id;
		public $sales_id;
		public $sales_date;
		public $total_cash_sales;
		public $total_card_sales;
		public $total_sales;
		public $green_confection_sales;
		public $food_cost;
		public $total_promo_sales;
		public $others;
		public $remarks;
		public $total_cash_on_hand;
		public $created_by;
		public $created_date;
		public $updated_by;
		public $updated_date;

		// Foreign Public Variables
		public $branch_name;

		public function __construct() {
			$db = new Database();
			$this->conn = $db->getConnection();
		}

		public function  selectAll() {

			$queryString = "SELECT SALES_ID, T1.BRANCH_MAIN_ID, T2.BRANCH_NAME, SALES_DATE, TOTAL_CASH_SALES, TOTAL_CARD_SALES, TOTAL_SALES, GREEN_CONFECTION_SALES," . 
				" FOOD_COST, TOTAL_PROMO_SALES, OTHERS, REMARKS, TOTAL_CASH_ON_HAND, T1.CREATED_BY, T1.CREATED_DATE, T1.UPDATED_BY, T1.UPDATED_DATE FROM $this->table_name" .
				" T1 INNER JOIN BRANCH_MAIN T2 WHERE T1.BRANCH_MAIN_ID = T2.BRANCH_MAIN_ID ORDER BY SALES_DATE ASC";

			$stmt = $this->conn->prepare($queryString);
			$stmt->execute();

			return $stmt; 
		}

	}

?>