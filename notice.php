<?php
$servername = "localhost";
$username = "changoul";
$password = "changoul";
$dbname = "Changoul";
$where = $_POST["title"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT id, isnotice, title, date, writer, content FROM notice WHERE title='".$where."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if($_POST["private"] == "true")
        {
            $isprivate = 1;
        } else{
            $isprivate = 0;
        }
        // output data of each row
        $sql = "UPDATE notice SET title='".$_POST["title"]."', writer='".$_POST["writer"]."', content='".$_POST["content"]."', password='".$_POST["password"]."', isprivate=".$isprivate."  WHERE id=".$_POST["id"];

        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        $sql = "SELECT max(id) as max_id from notice";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row["max_id"] + 1;
            }
        }
        if($_POST["private"] == "true")
        {
            $isprivate = 1;
        } else{
            $isprivate = 0;
        }
          
        $sql = "INSERT INTO notice (id, title, date, writer, content, password, isprivate) VALUES (".$id.", '".$_POST["title"]."', '".date("Y-m-d")."', '".$_POST["writer"]."', '".$_POST["content"]."', '".$_POST["password"]."', ".$isprivate.")";

        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>

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
    
    <link rel="stylesheet" href="table.css">
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
        <form method="post" action="notice_content.php">
		<table id="hor-minimalist-b" summary="Employee Pay Sheet">
            <?php
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "SELECT id, isnotice, title, date, writer FROM notice";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
            ?>
            <thead>
			<tr>
                <td>No</td>
                <td>제목</td>
                <td>작성자</td>
                <td>등록일</td>
            </tr>
            </thead>
            <tbody>
            <?php
                    while($row = $result->fetch_assoc()) {
                        ?>
            <tr>
                <td>
                <?php
                    if($row["isnotice"] == 1){
                        echo "[공지]";
                    }else {
                        echo $row["id"];
                    }?>
                </td>
                <td>
                <input style="border: none; background-color: transparent;" type="submit" name="title" value="<?php echo $row["title"];?>">
                </td>
                <td>
                <?php echo $row["writer"];?>
                </td>
                <td>
                <?php echo $row["date"];?>
                </td>
            </tr>
                <?php
                    }
                }
                $conn->close();
            ?>
            </tbody>
		</table>
        </form>
        <a href="newtext.php"><button>글작성</button></a>
	</div>

</body>
</html>

