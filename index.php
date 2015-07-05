<?php 

	include_once 'pagination.php';
	include_once 'salesobject.php';	

	$salesobject = new SalesObject();
	$stmt = $salesobject->selectAll();

	$num = $stmt->rowCount();	

	echo "<table border='1px'>";
        echo "<tr>";
        	echo "<th>ID</th>";
        	echo "<th>Branch</th>";
            echo "<th>Date</th>";
            echo "<th>Green Confection</th>";
            echo "<th>Total Card Sales</th>";
            echo "<th>Total Sales</th>";          
        echo "</tr>";	

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        	$data[] = $row;        	
        }

        $pag = new Pagination();	

		$numbers = $pag->Paginate($data, 5);
		$result = $pag->FetchResult();    

		foreach ($result as $r) {
			echo "<tr>";
	            echo "<td>" . $r['SALES_ID'] . "</td>";
	            echo "<td>" . $r['BRANCH_NAME'] . "</td>";
	            echo "<td>" . DateTime::createFromFormat('Y-m-d H:i:s', $r['SALES_DATE'])->format('Y/m/d') . "</td>";	                
	            echo "<td class='money'>" . $r['GREEN_CONFECTION_SALES'] . "</td>";
	            echo "<td class='money'>" . $r['TOTAL_CARD_SALES'] . "</td>";
	            echo "<td class='money'>" . $r['TOTAL_SALES'] . "</td>";	               		 
	        echo "</tr>";
		}

	echo "</table>";

	echo "<div style='width: 500px; overflow-x:auto; overflow-y:hidden;'>";

	foreach ($numbers as $num) {
		echo '<a href="index.php?page='.$num.'">' . $num . '|' . '</a>';
	}

	echo "</div>"

?>