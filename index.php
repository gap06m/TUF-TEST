<?php 

	include_once 'pagination.php';

	$pag = new Pagination();
	$data = array('Hey', 'Hello', 'Awesome', 'Awesome class', 'good video');

	$numbers = $pag->Paginate($data, 2);
	$result = $pag->FetchResult();

	foreach ($result as $r) {
		echo '<div>'.$r.'</div>';
	}

	foreach ($numbers as $num) {
		echo '<a href="index.php?page='.$num.'">'.$num.'</a>';
	}

?>