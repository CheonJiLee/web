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
	<script src="textedit.js"></script>
</head>

<body>
<header>
	<img src="img/title.png" width="500" height="300" alt="shop mark">빈 이미지와, 회사 마크와 간략한 문>
	<div id='cssmenu'>
		<ul>
			<li class='active'><a href='index.html'>Home</a></li>
			<li><a href='#'>회사소개</a></li>
			<li><a href='product.html'>한우</a></li>
			<li><a href='notice.php'>공지사항/FAQ</a></li>
			<li><a href='#'>장바구니</a></li>
		</ul>
	</div>
</header>
<br>
<br>
<br>
<br>
	<div id='content'>
		<br>
		<br>
		<br>
		<h1><u>글 수정</u></h1>
		<br>
        <hr>
		<br>
		<br>
        <form id="form" action="notice.php" method="post">
		<table>
            <?php
                $servername = "localhost";
                $username = "changoul";
                $password = "changoul";
                $dbname = "Changoul";
                $where = "당일 주문 당일 발송 안내 ";
                //$where = $_POST["title"];

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
                    제목 : <input id="title" type="text" value="<?php echo $row["title"];?>">
                </td>
            </tr>
            <tr>
                <td>작성자 : <input id="title" type="text" value="<?php echo $row["writer"];?>">
                </td>
            </tr>
            <tr>
                <td>비밀번호 : <input id="password" name="password" type="text" value="">
                비밀글 <input id="private" type="checkbox">
                </td>
            </tr>
		</table>
        <textarea id="content" name="content" rows="10" cols="45"><?php echo $row["content"];?></textarea>
        <?php
        }
        $conn->close();
        ?>
        </form>
	</div>

</body>
</html>
