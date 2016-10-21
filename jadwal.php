<?php
// error_reporting(0);

header('Content-Type: application/json');

$nim = $_GET['q'];

$date2 = date("d/m/y", mktime(0, 0, 0, '1', '8', date('y')));
if (date('d/m/y') > $date2) {
	$ajaran = date('y').(date('y')+1);
}else{
	$ajaran = (date('y')-1).date('y');
}

$request = array(
	'http' => array(
	    'method' 	=> 'GET',

	    'header'	=>	"X-Requested-With: XMLHttpRequest\n
			    		Host: igracias.telkomuniversity.ac.id\n
			    		Referer: https://igracias.telkomuniversity.ac.id/registration/index.php?pageid=18726\n
			    		Connection: keep-alive"
	)
);

$context = stream_context_create($request);

$html = file_get_contents('https://igracias.telkomuniversity.ac.id/libraries/ajax/ajax.schedule.php?act=viewStudentSchedule&studentId='.$nim.'&sEcho=1&iColumns=6&sColumns=&iDisplayStart=0&iDisplayLength=20&mDataProp_0=0&mDataProp_1=1&mDataProp_2=2&mDataProp_3=3&mDataProp_4=4&mDataProp_5=5&sSearch=&bRegex=false&sSearch_0=&bRegex_0=false&bSearchable_0=true&sSearch_1=&bRegex_1=false&bSearchable_1=true&sSearch_2=&bRegex_2=false&bSearchable_2=true&sSearch_3=&bRegex_3=false&bSearchable_3=true&sSearch_4=&bRegex_4=false&bSearchable_4=true&sSearch_5=&bRegex_5=false&bSearchable_5=true&iSortCol_0=0&sSortDir_0=asc&iSortingCols=1&bSortable_0=true&bSortable_1=true&bSortable_2=true&bSortable_3=true&bSortable_4=true&bSortable_5=true&schoolYear='.$ajaran.'%2F1', false, $context);

echo $html;
?>