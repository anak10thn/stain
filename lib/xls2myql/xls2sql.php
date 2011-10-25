<?php
require_once 'Excel2MySQL/excel2mysql.php';


$excel_file = "samplex.xls";

$excel2mysql = new Excel2MySQL( $excel_file  );
//$excel2mysql->setConvertArea( '$A$1:$E$5' );

$excel2mysql->setRowStart(1);
$excel2mysql->setColStart('A');

$excel2mysql->setColMapping(array('NAME'=>'member_name',
							'BIRTHDAY'=>'member_birthday',							
							'CITY'=>'member_city',
							'EMAIL'=>'member_email'));

$excel2mysql->connectDB ('localhost','root','','xls','member');
$excel2mysql->injectData();

?>
