<?php

include_once ("config.php");

class StudentsData {
	var $sid;
	var $fname;
	var $lname;
	var $gender;
	var $desig;
	var $work;
	var $add;
	var $mno;
	var $almno;
	var $email;
	var $fpaid;
	var $rfee;
	var $adate;
	var $edate;
	var $fdate;

	function __construct($sid, $fname, $lname, $gender, $desig, $work, $add, $mno, $almno, $email, $fpaid, $rfee,
		$adate, $edate, $fdate) {

		$this->sid    = $sid;
		$this->fname  = $fname;
		$this->lname  = $lname;
		$this->gender = $gender;
		$this->desig  = $desig;
		$this->work   = $work;
		$this->add    = $add;
		$this->mno    = $mno;
		$this->almno  = $almno;
		$this->email  = $email;
		$this->fpaid  = $fpaid;
		$this->rfee   = $rfee;
		$this->adate  = $adate;
		$this->edate  = $edate;
		$this->fdate  = $fdate;

	}
}

class Students {
	function __construct() {

	}

	public static function createStudent($fname, $lname, $gender, $desig, $work, $add, $mno, $almno, $email, $fpaid,
		$rfee, $adate, $edate, $fdate) {
		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "INSERT INTO `students`(`fname`,`lname`,`gender`,`desig`,`work`,`add`,`mno`,`almno`,`email`,`fpaid`,`rfee`,`adate`,`edate`,`fdate`) VALUES('".$fname."','".$lname."','".$gender."','".$desig."','".$work."',
      '".$add."','".$mno."','".$almno."','".$email."','".$fpaid."','".$rfee."','".$adate."','".$edate."','".$fdate."')" or die("error");

		mysql_query($sql) or die("error");

		mysql_close($con);
	}

	public static function getAllStudents() {
		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$db = mysql_select_db(DBNAME, $con);

		$sql       = "SELECT * FROM `students` ";
		$rs_result = mysql_query($sql) or die("error");

		$data = array();
		while ($row = mysql_fetch_assoc($rs_result)) {
			$data[] = $row;
		}
		return $data;
	}

	public static function getSpecificStudent($sid) {

		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$db = mysql_select_db(DBNAME, $con);

		$sql       = "SELECT * FROM `students`  WHERE  sid='".$sid."' ";
		$rs_result = mysql_query($sql) or die("error");
		$row       = mysql_fetch_assoc($rs_result);

		return $row;

	}

	public static function updateStudent($sid, $fname, $lname, $add, $mno, $almno, $email, $fpaid,
		$rfee, $adate, $edate, $fdate) {
		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		$db  = mysql_select_db(DBNAME, $con);

		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$sql = "UPDATE `students` SET `fname`='".$fname."',`lname`='".$lname."',`add`='".$add."',`mno`='".$mno."',`almno`='".$almno."',`email`='".$email."',`fpaid`='".$fpaid."',`rfee`='".$rfee."',`adate`='".$adate."',`edate`='".$edate."',`fdate`='".$fdate."'  WHERE `sid`='".$sid."'";

		mysql_query($sql) or die("error");

		mysql_close($con);

	}

	public static function deleteStudent($sid) {
		$con   = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
		$query = "DELETE  FROM `students` WHERE `sid`='".$sid."'";
		mysqli_query($con, $query) or die("error");
		mysqli_close($con);
	}

	public static function getAllStudentContact() {
		$con = mysql_connect(DBHOST, DBUSER, DBPASS);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to Server: ".mysqli_connect_error();
			return;
		}
		$db = mysql_select_db(DBNAME, $con);

		$sql       = "SELECT mno FROM `students` ";
		$rs_result = mysql_query($sql) or die("error");

		$data = array();
		while ($row = mysql_fetch_assoc($rs_result)) {
			$data[] = $row;
		}
		return $data;
	}
}

?>
