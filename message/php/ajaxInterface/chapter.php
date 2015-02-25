<?php
include_once ('../classes/course.php');
include_once ('../classes/chapter.php');
if ($_REQUEST["operation"] == "getAllCourse") {
	$data = Course::getAllCourse();

	header('Content-type: application/json');
	echo json_encode($data);
}

if ($_REQUEST["operation"] == "getAllChapter") {
	$data = Chapter::getAllChapter();

	header('Content-type: application/json');
	echo json_encode($data);
}

/*if ($_REQUEST["operation"] == "getChapterNum") {
$data = Course::getCourseCode();

header('Content-type: application/json');
echo json_encode($data);
}*/
if ($_REQUEST["operation"] == "createChapter") {
	$ccode = Course::getCourseId($_POST['cname']);

	$response = Chapter::checkChapter($ccode, $_POST['chnum'], $_POST['chname']);
	if ($response) {
		echo 0;
	} else {
		$response = Chapter::createChapter($ccode, $_POST['chnum'], $_POST['chname']);
		echo 1;
	}

}

if ($_REQUEST["operation"] == "getSpecificChapter") {
	$data = Chapter::getSpecificChapter($_POST['chid']);

	header('Content-type: application/json');
	echo json_encode($data);
}

if ($_POST['operation'] == 'updateChapter') {
	$ccode    = Course::getCourseId($_POST['cname']);
	$response = Chapter::updateChapter($ccode, $_POST['chnum'], $_POST['chname']);
	echo 1;

}

if ($_POST['operation'] == 'deleteChapter') {

	$data = Chapter::deleteChapter($_POST['chid']);
	header('Content-type: application/json');
	echo json_encode($data);
}

?>
