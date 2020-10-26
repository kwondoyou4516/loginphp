<?php  
	include "/db.php";
?>

<head>
    <title>Sign Up</title>
    <meta charset="UTF8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <h1 id="title">Sign Up </h1>
    <form method="post" action="./member_ok.php" style="width : 50%">
        <div class="form-group">
            <label>ID</label>
            <input name='email' type='email' placeholder='eyes01@goodeye.com' class="form-control" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type='password' size=10 name='ps' maxlength=40 placeholder='1234'class="form-control" />
        </div>
        <div class="form-group">
            <label>Phone number</label>
            <input type='text' size=10 name='phone' maxlength=11 placeholder='01012341234'class="form-control" />
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type=radio name=gender value="Male" checked/> Male <input type=radio name=gender value="Female"> Female
        </div>
        <div class="form-group">
            <input type='text' name = 'c1Name' placeholder='KwonDoYu'> Age (up to 20 years old) <input name='c1Age' type='text' maxlength=2/>
        </div>
        <div class="form-group">
            <input type='text' name = 'c2Name' placeholder='HongGilDong'> Age (up to 20 years old) <input name='c2Age' type='text' maxlength=2/>
        </div>
        <button type="submit" class="btn btn-outline-primary">Sign Up</button>
        <input type=reset class="btn btn-outline-danger" value="Reset">
    </form>
</body>
