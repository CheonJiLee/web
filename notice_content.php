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
		<h1><u>공지사항 & Questions</u></h1>
		<br>
        <hr>
		<br>
		<br>
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
                    // output data of each row
            ?>
			<tr>
                <td>
                <?php
                    $row = $result->fetch_assoc();
                    if($row["isnotice"] == '1')
                        echo "[공지] ";
                    echo $row["title"];
                ?>
                </td>
                <td>작성자 : <?php echo $row["writer"];?></td>
                <td>등록일 : <?php echo $row["date"];?></td>
            </tr>
		</table>
        <?php
                echo $row["content"];
                ?>
        <?php
        }
        $conn->close();
        ?>
	</div>

</body>
</html>

