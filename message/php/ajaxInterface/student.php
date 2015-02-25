<?php
include_once ('../classes/course.php');
include_once ('../classes/chapter.php');
include_once ('../classes/syllabus.php');
include_once ('../classes/student.php');

if ($_REQUEST["operation"] == "getAllStudents") {
	$data = Students::getAllStudents();

	header('Content-type: application/json');
	echo json_encode($data);
}
if ($_REQUEST["operation"] == "createStudent") {

	$obj = Students::createStudent($_POST['fname'], $_POST['lname'], $_POST['gender'], $_POST['desig'],
		$_POST['work'], $_POST['add'], $_POST['mno'], $_POST['almno'], $_POST['email'], $_POST['fpaid'], $_POST['rfee'],
		$_POST['adate'], $_POST['edate'], $_POST['fdate']);

	echo 1;
}

if ($_REQUEST["operation"] == "getSpecificStudent") {
	$data = Students::getSpecificStudent($_POST['sid']);

	header('Content-type: application/json');
	echo json_encode($data);
}

if ($_POST['operation'] == 'updateStudent') {

	$obj = Students::updateStudent($_POST['sid'], $_POST['fname'], $_POST['lname'],
		$_POST['add'], $_POST['mno'], $_POST['almno'], $_POST['email'], $_POST['fpaid'], $_POST['rfee'],
		$_POST['adate'], $_POST['edate'], $_POST['fdate']);
	echo 1;

}

if ($_POST['operation'] == 'deleteStudent') {

	$data = Students::deleteStudent($_POST['sid']);
	header('Content-type: application/json');
	echo json_encode($data);
}

if ($_REQUEST["operation"] == "getAllStudentContact") {
	$data = Students::getAllStudentContact();

	header('Content-type: application/json');
	echo json_encode($data);
}

?>
