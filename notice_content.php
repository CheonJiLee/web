<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatiblee" content="IE=edge,chrome=1" />
<!------상단메뉴용---------------------------->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="top_menu.js"></script>
<!------이미지슬라이드---------------------------->
	<link rel="stylesheet" href="sidebar.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="script.js"></script>
<!--textedit control-->
    <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.2.0/prototype.js"></script>
	<script src="textedit.js"></script>
    <link rel="stylesheet" href="table.css">
</head>
    
<body bgcolor="#FFFAF6">
<header>
    <div style="margin-left: 10%">
         <table>
             <tr> <td rowspan="3"> <img src="img/logo_top.png" width="500" height="300" alt="logo top"></td><td><td></td></td><td></td></tr>
            <tr><td rowspan="3"><img src="img/pink.png" width="100" height="300" alt="pink"></td><td></td><td></td><td><img src="img/pink.png" width="100" height="150" alt="pink"></td></tr>
            <tr><td></td><td></td><td><img src="img/call.png" width="400" height="100" alt="call"></td></td></td></tr>
         </table>
    </div>
    <div id='cssmenu' style="">
        <ul>
            <li><a href='index.html'>Home</a></li>
            <li><a href='intro.html'>회사소개</a></li>
            <li><a href='product.html'>한우</a></li>
            <li class='active'><a href='notice.php'>공지사항/FAQ</a></li>
            <li><a href='#'>장바구니</a></li>
        </ul>
    </div>
</header>
<br>
<br>
<br>
<br>
	<div id='content'>
        <form id="form" action="textedit.php" method="post">
		<table id="hor-minimalist-b" summary="Employee Pay Sheet">
            <thead>
            <?php
                $servername = "localhost";
                $username = "changoul";
                $password = "changoul";
                $dbname = "Changoul";
                $where = $_POST["title"];

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                
                $sql = "SELECT id, isnotice, title, date, writer, content FROM notice WHERE title='".$where."'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
            ?>
                <?php
                    $row = $result->fetch_assoc();
                    if($row["isnotice"] == '1')
                        echo "[공지] ";
                ?>
                    <input id="title" name="title" type="text" value="<?php echo $row["title"];?>" style="border: none; color: black; background-color: transparent;" disabled>
                <tr><th scope="col">작성자 : <?php echo $row["writer"];?></th>
                <th scope="col">등록일 : <?php echo $row["date"];?></th></tr>
                </thead>
            <tbody>             <tr><td></td><td></td></tr>
            <tr>             <td colspan="2"><font size="4"><br>
        <?php
            $myfile = fopen($row["content"], "r") or die("Unable to open file!");
            echo fread($myfile,filesize($row["content"]));
            fclose($myfile);
        ?>
        <?php
        }
        $conn->close();
        ?>
        <br></font>
            </td>
        </tr>  
        </tbody>
            </table>
        <br>
        <div style="float:right; margin-right: 10%">
            <input id="submit" type="submit" value="수정하기">
        </div>
        </form>
	</div>

</body>
</html>

