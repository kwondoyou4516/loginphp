<?php
	include "/db.php";
?>
<html>
<head>
    <title>Sign Up</title>
    <meta charset="UTF8">
    <style>
        body {
            margin: 0px;
        }
    </style>
</head>

<body>
    <h1 id="title">Sign Up </h1>
    <form method="post" action="./member_ok.php">
        ID : <input name='email' type='email' placeholder='eyes01@goodeye.com'/><br>
        password : <input type='password' size=10 name='ps' maxlength=40 placeholder='1234'/><br>
        Phone number : <input type='text' size=10 name='phone' maxlength=11 placeholder='01012341234'/><br>
        Please select your gender
        <input type=radio name=gender value="Male" checked> Male <input type=radio name=gender value="Female"> Female<br>
        <input type='text' name = 'c1Name' placeholder='HongGilDong'> Age (up to 20 years old) <input name='c1Age' type='text' maxlength=2/><br>
        <input type='text' name = 'c2Name' placeholder='HongGilDong'> Age (up to 20 years old) <input name='c2Age' type='text' maxlength=2/><br>
        <button type="submit">Sign Up</button>
        <input type=reset value="cancel">
    </form>
</body>

</html>
