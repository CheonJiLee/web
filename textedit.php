<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatiblee" content="IE=edge,chrome=1" />
<!--상단메뉴용-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="top_menu.js"></script>
<!--이미지슬라이드-->
	<link rel="stylesheet" href="sidebar.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="script.js"></script>
<!--textedit control-->
    <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.2.0/prototype.js"></script>
	<script src="newtext.js"></script>
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
        <form id="form" action="notice.php" method="post">
		<table>
            <?php
                $servername = "203.253.146.133:3306";
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
                    $row = $result->fetch_assoc();
                    // output data of each row
            ?>
            <tr>
                <td>
                    id : <input id="id" name="id" type="text" value="<?php echo $row["id"];?>" disabled style="background-color: #FFFAF6">
                </td>
            </tr>
			<tr>
                <td>
                    제목 : <input id="title" name="title" type="text" value="<?php echo $row["title"];?>" style="background-color: #FFFAF6">
                </td>
            </tr>
            <tr>
                <td>작성자 : <input id="writer" name="writer" type="text" value="<?php echo $row["writer"];?>" style="background-color: #FFFAF6">
                </td>
            </tr>
            <tr>
                <td>비밀번호 : <input id="password" name="password" type="text" value="" style="background-color: #FFFAF6">
                비밀글 <input id="private" type="checkbox">
                </td>
            </tr>
		</table>
        <textarea id="content" name="content" rows="10" cols="45" style="background-color: #FFFAF6">
        <?php
            $myfile = fopen($row["content"], "r") or die("Unable to open file!");
            echo fread($myfile,filesize($row["content"]));
            fclose($myfile);
        ?>
        </textarea>
        <?php
        }
        $conn->close();
        ?>
        <input id="submit" type="submit" value="수정하기">
        </form>
	</div>

</body>
</html>
