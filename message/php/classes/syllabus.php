<?php
include_once ("config.php");

class SyllabusData {
	var $syid;
	var $chid;
	var $ccode;
	var $sycontent;

	function __construct($syid, $chid, $ccode, $sycontent) {
		$this->syid      = $syid;
		$this->chid      = $chid;
		$this->ccode     = $ccode;
		$this->sycontent = $sycontent;

	}

}

class Syllabus {
	function __construct() {

	}

	/*public static function getCourseCode() {

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
	}*/

	public static function createSyllabus($ccode, $chid, $sycontent) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "INSERT INTO `syllabus`(`ccode`,`chid`,`sycontent`,`sydate`) VALUES('".$ccode."','".$chid."','".$sycontent."','".date('Y-m-d')."')" or die("error create");

		mysql_query($sql) or die("error");

		mysql_close($con);

	}

	public static function checkSyllabus($ccode, $chid, $sycontent) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql       = "SELECT 1 FROM `course` AS c,`chapter` AS ch,`syllabus` AS sy  WHERE c.ccode=ch.ccode AND ch.ccode=sy.ccode AND c.ccode=sy.ccode AND  ch.chid=sy.chid AND (sy.sycontent='".$sycontent."' OR sy.ccode='".$ccode."' OR sy.chid='".$chid."') ";
		$rs_result = mysql_query($sql) or die("error");
		$data      = array();
		$row       = mysql_fetch_assoc($rs_result);
		return $row;
	}

	public static function getAllSyllabus() {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql       = "SELECT * FROM `course` AS c,`chapter` AS ch,`syllabus` AS sy  WHERE c.ccode=ch.ccode AND ch.ccode=sy.ccode AND c.ccode=sy.ccode AND  ch.chid=sy.chid  ";
		$rs_result = mysql_query($sql) or die("error");
		$data      = array();
		while ($row = mysql_fetch_assoc($rs_result)) {
			$data[] = $row;
		}
		return $data;

	}

	public static function getSpecificSyllabus($syid) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql       = "SELECT * FROM `course` AS c,`chapter` AS ch,`syllabus` AS sy  WHERE c.ccode=ch.ccode AND ch.ccode=sy.ccode AND c.ccode=sy.ccode AND  ch.chid=sy.chid AND syid='".$syid."' ";
		$rs_result = mysql_query($sql) or die("error");
		$row       = mysql_fetch_assoc($rs_result);

		return $row;

	}

	public static function updateSyllabus($ccode, $chid, $sycontent, $syid) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "UPDATE `syllabus` SET `ccode`='".$ccode."',`chid`='".$chid."',`sycontent`='".$sycontent."',`sydate`='".date('Y-m-d')."' WHERE `syid`='".$syid."'";

		mysql_query($sql) or die("error");

		mysql_close($con);

	}

	public static function deleteSyllabus($syid) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "DELETE  FROM `syllabus` WHERE `syid`='".$syid."'";

		mysql_query($sql) or die("error");

		mysql_close($con);

	}
}
/*public static function getCourseId($cname) {
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
