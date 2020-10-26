<?php
	include "../db.php";
	include "../password.php";
	$userid = $_POST['email'];
	$userpw = $_POST['ps'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$c1Name = $_POST['c1Name'];
	$c2Name = $_POST['c2Name'];
	$c1Age = $_POST['c1Age'];
	$c2Age = $_POST['c2Age'];
	$sql = mq("insert into member (id, pw, phone, gender, c1Name, c2Name, c1Age, c2Age, point) VALUES ('$userid', '$userpw', '$phone', '$gender', '$c1Name', '$c2Name', $c1Age, $c2Age, 0)");
	?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/">