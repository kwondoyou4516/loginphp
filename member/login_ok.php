<meta charset="utf-8" />
<?php	
	include "../db.php";
	include "../password.php";
	if($_POST["userid"] == "" || $_POST["userpw"] == ""){
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}else{
    echo '<script>console.log("login ok")</script>';
	$password = $_POST['userpw'];
	$sql = mq("select * from member where id='".$_POST['userid']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['pw'];

	if($password==$hash_pw)
	{
		$_SESSION['userid'] = $member["id"];
		$_SESSION['userpw'] = $member["pw"];
		echo "<script>alert('{$_SESSION['userid']} 님 환영합니다.'); location.href='/page/main.php';</script>";
	}else{
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
}
?>