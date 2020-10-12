<?php
    include "/db.php";
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>회원가입 및 로그인 사이트</title>
<link rel="stylesheet" type="text/css" href="/css/common.css" />
</head>
<body>
    <div id="webcam-container"></div>
    <div id="label-container"></div>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>
    <div id="container">
       <div id="login">
           <h1>Login window</h1>

           <center>
            <form action="./member/login_ok.php" method="POST">
                <input type="text" name="userId" placeholder="ID">
                <input type="password" name="userPw" placeholder="password">
                <button type="submit">login</button>
              </center>
            </form>
            <button id="button_login" onclick="location.href='./member/signup.php'">Sign Up</button>
       </div>
</body>
</html>
