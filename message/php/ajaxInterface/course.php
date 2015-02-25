<?php
include_once ('../classes/course.php');

if ($_REQUEST["operation"] == "getAllCourse") {
	$data = Course::getAllCourse();

	header('Content-type: application/json');
	echo json_encode($data);
}

if ($_REQUEST["operation"] == "getCourseCode") {
	$data = Course::getCourseCode();

	header('Content-type: application/json');
	echo json_encode($data);
}
if ($_REQUEST["operation"] == "createCourse") {

	$response = Course::checkCourse($_POST['cname']);
	if ($response) {
		echo 0;
	} else {
		$response = Course::createCourse($_POST['ccode'], $_POST['cname'], $_POST['cdetails']);
		echo 1;
	}

}

if ($_REQUEST["operation"] == "getSpecificCourse") {
	$data = Course::getSpecificCourse($_POST['cid']);

	header('Content-type: application/json');
	echo json_encode($data);
}

if ($_POST['operation'] == 'updateCourse') {

	$response = Course::updateCourse($_POST['ccode'], $_POST['cname'], $_POST['cdetails']);
	echo 1;

}

if ($_POST['operation'] == 'deleteCourse') {

	$data = Course::deleteCourse($_POST['cid']);
	header('Content-type: application/json');
	echo json_encode($data);
}

?>
