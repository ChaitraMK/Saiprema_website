<?php
include_once ("config.php");

class ChapterData {
	var $chid;
	var $ccode;
	var $chnum;
	var $chname;

	function __construct($chid, $ccode, $chnum, $chname) {
		$this->chid   = $chid;
		$this->ccode  = $ccode;
		$this->chnum  = $chnum;
		$this->chname = $chname;

	}

}

class Chapter {
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

	public static function createChapter($ccode, $chnum, $chname) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "INSERT INTO `chapter`(`ccode`,`chnum`,`chname`) VALUES('".$ccode."','".$chnum."','".$chname."')" or die("error create");

		mysql_query($sql) or die("error");

		mysql_close($con);

	}

	public static function checkChapter($ccode, $chnum, $chname) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql       = "SELECT 1 FROM `course` AS c,`chapter` AS ch  WHERE c.ccode=ch.ccode AND (ch.chname='".$chname."' OR ch.chnum='".$chnum."') AND c.ccode='".$ccode."' ";
		$rs_result = mysql_query($sql) or die("error");
		$data      = array();
		$row       = mysql_fetch_assoc($rs_result);
		return $row;
	}

	public static function getAllChapter() {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql       = "SELECT * FROM `course` AS c,`chapter` AS ch  WHERE c.ccode=ch.ccode ";
		$rs_result = mysql_query($sql) or die("error");
		$data      = array();
		while ($row = mysql_fetch_assoc($rs_result)) {
			$data[] = $row;
		}
		return $data;

	}

	public static function getSpecificChapter($chid) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql       = "SELECT * FROM `course` AS c,`chapter` AS ch  WHERE c.ccode=ch.ccode AND chid='".$chid."' ";
		$rs_result = mysql_query($sql) or die("error");
		$row       = mysql_fetch_assoc($rs_result);

		return $row;

	}

	public static function updateChapter($ccode, $chnum, $chname) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "UPDATE `chapter` SET `ccode`='".$ccode."',`chnum`='".$chnum."',`chname`='".$chname."' WHERE `ccode`='".$ccode."'";

		mysql_query($sql) or die("error");

		mysql_close($con);

	}

	public static function deleteChapter($chid) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "DELETE  FROM `chapter` WHERE `chid`='".$chid."'";

		mysql_query($sql) or die("error");

		mysql_close($con);

	}

	public static function getChapterId($chname) {
		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$db = mysql_select_db(DBNAME, $con);

		$sql       = "SELECT chid FROM `chapter` WHERE `chname`='".$chname."'";
		$rs_result = mysql_query($sql) or die("error");
		$data      = array();
		$row       = mysql_fetch_assoc($rs_result);
		return $row['chid'];
	}

	public static function getAllChapterForCourse($ccode) {
		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$db = mysql_select_db(DBNAME, $con);

		$sql = "SELECT * FROM `chapter`  WHERE  ccode='".$ccode."' ";

		$rs_result = mysql_query($sql) or die("error");
		$data      = array();
		while ($row = mysql_fetch_assoc($rs_result)) {
			$data[] = $row;
		}
		return $data;
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
