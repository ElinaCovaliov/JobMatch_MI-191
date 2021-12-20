<?php
    require_once "config.php";
 
	$query=mysqli_query($link,"SELECT COUNT(ac.id_companie) FROM anunturi_companie ac WHERE ac.id_companie = 10");
	$row = mysqli_fetch_row($query);
 
	$rows = $row[0];
 
	$page_rows = 1;//pe pagina
 
	$last = ceil($rows/$page_rows);
 
	if($last < 1){
		$last = 1;
	}
 
	$pagenum = 1;
 
	if(isset($_GET['pageNumber'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pageNumber']);
	}
 
	if ($pagenum < 1) { 
		$pagenum = 1; 
	} 
	else if ($pagenum > $last) { 
		$pagenum = $last; 
	}   
 
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
 
	$getAnnounces=mysqli_query($link,"SELECT ac.id_anunt, ac.titlu, ac.poza_anunt, ac.salariu, ac.descriere, v.valuta, lo.raion AS locatie FROM anunturi_companie ac INNER JOIN valuta v ON v.id_valuta = ac.id_valuta INNER JOIN locatie lo ON lo.id_locatie = ac.id_locatie WHERE ac.id_companie = {$_SESSION["id_companie"]} $limit");
 
	$paginationCtrls = '';
 
	if($last != 1){
 
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?pageNumber='.$previous.'" class="page-link">&laquo; Previous</a></li>';
 
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?pageNumber='.$i.'" class="page-link">'.$i.'</a></li>';
			}
	    }
    }
 
	$paginationCtrls .= "<li class='page-item active'> <a class='page-link' href='#'>".$pagenum." <span class='sr-only'>(current)</span></a> </li>";
 
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?pageNumber='.$i.'" class="page-link">'.$i.'</a></li>';
		if($i >= $pagenum+4){
			break;
		}
	}
 
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<li class="page-item"><a href="'.$_SERVER['PHP_SELF'].'?pageNumber='.$next.'" class="page-link">Next &raquo;</a></li>';
    }
	}

?>