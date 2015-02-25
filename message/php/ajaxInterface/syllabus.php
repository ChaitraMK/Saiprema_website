<?php
include_once ('../classes/course.php');
include_once ('../classes/chapter.php');
include_once ('../classes/syllabus.php');
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

if ($_POST['operation'] == 'getAllChapterForCourse') {

	$ccode = Course::getCourseId($_POST['cname']);

	$data = Chapter::getAllChapterForCourse($ccode);

	header('Content-type: application/json');
	echo json_encode($data);
}

if ($_REQUEST["operation"] == "getAllSyllabus") {
	$data = Syllabus::getAllSyllabus();

	header('Content-type: application/json');
	echo json_encode($data);
}
if ($_REQUEST["operation"] == "createSyllabus") {
	$ccode    = Course::getCourseId($_POST['cname']);
	$chid     = Chapter::getChapterId($_POST['chname']);
	$response = Syllabus::checkSyllabus($ccode, $chid, $_POST['sycontent']);
	if ($response) {
		echo 0;
	} else {
		$response = Syllabus::createSyllabus($ccode, $chid, $_POST['sycontent']);
		echo 1;
	}

}

if ($_REQUEST["operation"] == "getSpecificSyllabus") {
	$data = Syllabus::getSpecificSyllabus($_POST['syid']);

	header('Content-type: application/json');
	echo json_encode($data);
}

if ($_POST['operation'] == 'updateSyllabus') {
	$ccode    = Course::getCourseId($_POST['cname']);
	$chid     = Chapter::getChapterId($_POST['chname']);
	$response = Syllabus::updateSyllabus($ccode, $chid, $_POST['sycontent'], $_POST['syid']);
	echo 1;

}

if ($_POST['operation'] == 'deleteSyllabus') {

	$data = Syllabus::deleteSyllabus($_POST['syid']);
	header('Content-type: application/json');
	echo json_encode($data);
}

?>
