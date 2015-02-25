<?php
include_once ("config.php");

class CourseData {
	var $cid;
	var $ccode;
	var $cname;
	var $cdetails;
	function __construct($cid, $ccode, $cname, $cdetails) {
		$this->cid      = $cid;
		$this->ccode    = $ccode;
		$this->cname    = $cname;
		$this->cdetails = $cdetails;

	}

}

class Course {
	function __construct() {

	}

	public static function getCourseCode() {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}

		$sql       = "SELECT max(ccode) as c FROM `course`";
		$rs_result = mysql_query($sql) or die("error");
		$row       = mysql_fetch_assoc($rs_result);

		return $row['c'];
		mysql_close($con);
	}

	public static function createCourse($ccode, $cname, $cdetails) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "INSERT INTO `course`(`ccode`,`cname`,`cdetails`) VALUES('".$ccode."','".$cname."','".$cdetails."')" or die("error create");

		mysql_query($sql) or die("error");

		mysql_close($con);

	}

	public static function checkCourse($cname) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql       = "SELECT 1 FROM `course`  WHERE  cname='".$cname."' ";
		$rs_result = mysql_query($sql) or die("error");
		$data      = array();
		while ($row = mysql_fetch_assoc($rs_result)) {
			$data[] = $row;
		}
		return $data;

	}

	public static function getAllCourse() {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql       = "SELECT * FROM `course`  ";
		$rs_result = mysql_query($sql) or die("error");
		$data      = array();
		while ($row = mysql_fetch_assoc($rs_result)) {
			$data[] = $row;
		}
		return $data;

	}

	public static function getSpecificCourse($cid) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql       = "SELECT * FROM `course`  WHERE  cid='".$cid."' ";
		$rs_result = mysql_query($sql) or die("error");
		$row       = mysql_fetch_assoc($rs_result);

		return $row;

	}

	public static function updateCourse($ccode, $cname, $cdetails) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "UPDATE `course` SET `cname`='".$cname."',`cdetails`='".$cdetails."' WHERE `ccode`='".$ccode."'";

		mysql_query($sql) or die("error");

		mysql_close($con);

	}

	public static function deleteCourse($cid) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "DELETE  FROM `course` WHERE `cid`='".$cid."'";

		mysql_query($sql) or die("error");

		mysql_close($con);

	}

	public static function getCourseId($cname) {
		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$db = mysql_select_db(DBNAME, $con);

		$sql       = "SELECT ccode FROM `course` WHERE `cname`='".$cname."'";
		$rs_result = mysql_query($sql) or die("error");
		$data      = array();
		$row       = mysql_fetch_assoc($rs_result);
		return $row['ccode'];
	}
}
/*public static function checkAllProductType($ccode) {

$con = mysql_connect(DBHOST, DBUSER, DBPASS);
$db  = mysql_select_db(DBNAME, $con);
if (mysqli_connect_errno()) {
echo "Failed to connect to Server: ".mysqli_connect_error();
return;
}
$sql = "SELECT * FROM  `course` WHERE   `ccode` != '".$ccode."'";

$rs_result = mysql_query($sql) or die("error");
$data      = array();
while ($row = mysql_fetch_assoc($rs_result)) {
$data[] = $row;
}
return $data;

}

public static function getAllType($ccode) {

$con = mysql_connect(DBHOST, DBUSER, DBPASS);
$db  = mysql_select_db(DBNAME, $con);
if (mysqli_connect_errno()) {
echo "Failed to connect to Server: ".mysqli_connect_error();
return;
}
$sql       = "SELECT cname FROM `course`  WHERE  ccode ='".$ccode."' ";
$rs_result = mysql_query($sql) or die("error");
$data      = array();
while ($row = mysql_fetch_assoc($rs_result)) {
$data[] = $row;
}
return $data;

}*/

?>
