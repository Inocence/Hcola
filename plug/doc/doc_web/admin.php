<?php


/*$config=include './Application/Common/Conf/config.php';

if ($_GET['key']!=$config['WEB_KEY']) {
	die(header("Location:/"));
}
*/
header("Location:Admin/Logreg/index/key/".$config['WEB_KEY']); 

?>