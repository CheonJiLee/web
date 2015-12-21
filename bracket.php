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

    <?php
    $cookie_name = "gogi_bracket";
    if (isset($_GET["num"])) {
        if(!isset($_COOKIE[$cookie_name])) {
            $cookie_value = $_GET["num"];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            echo "<meta http-equiv='refresh' content='0;bracket.php'>"; 
        } else {
            $cookie_value = $_COOKIE[$cookie_name]."//".$_GET["num"];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            echo "<meta http-equiv='refresh' content='0;bracket.php'>"; 
        }
    } elseif($_SERVER["REQUEST_METHOD"] == "POST") {
        // set the expiration date to one hour ago
        setcookie($cookie_name, "", time() - 3600);
        echo "<meta http-equiv='refresh' content='0;bracket.php'>"; 
    }
    ?>

</head>

<body bgcolor="FFFAF6">
<header>
	<div style="margin-left: 10%">
		<table>
			<tr> <td rowspan="3"> <img src="img/logo_top.png" width="500" height="300"></td><td><td></td></td><td></td></tr>
			<tr><td rowspan="3"><img src="img/pink.png" width="100" height="300"></td><td></td><td></td><td><img src="img/pink.png" width="100" height="150"></td></tr>
			<tr><td></td><td></td><td><img src="img/call.png" width="400" height="100"></td></td></td></tr>
		</table>
	</div>
	<div id='cssmenu'>
		<ul>
			<li><a href='index.html'>Home</a></li>
			<li><a href='intro.html'>회사소개</a></li>
			<li><a href='product.php'>한우</a></li>
			<li><a href='notice.php'>공지사항/FAQ</a></li>
			<li class='active'><a href='bracket.php'>장바구니</a></li>
		</ul>
	</div>
</header>
<br>
<br>
<br>
<br>
	<div id='content'>
		<div id='list_1' style="display:inline">
			<h1>장바구니</h1>
			<hr>
			<table>

                <?php
                $servername = "203.253.146.133:3306";
                $username = "changoul";
                $password = "changoul";
                $dbname = "Changoul";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if (!isset($_COOKIE[$cookie_name])){
                    $sql = " ";
                }else {
                    $pieces = explode("//", $_COOKIE[$cookie_name]);
                    
                    $where = " WHERE title_no='".$pieces[0]."'";

                    for($i = 1; $i < count($pieces); $i++){
                        $where = $where." OR title_no='".$pieces[$i]."'";
                    }
                    $sql = "SELECT title_no, name, price, picture, purpose FROM meat".$where;
                }
                $result = $conn->query($sql);
                $sum = 0;

                if (isset($result->num_rows)) {
                    // output data of each row
                    
                    $row = $result->fetch_assoc();
                    while($row) {
                    ?>
                    <tr>
                    <?php
                        for($i = 0; $i < 4 && $row; $i++) {
                    ?>
                        <td>
                    
                                <img src="<?php echo $row["picture"]?>" width="200" height="200" alt="gogi"><br>
                    
                        <?php
                                echo $row["name"]. "<br>" . $row["price"]. "원<br>" . $row["purpose"]. "</td>";
                                $sum = $sum + $row["price"];
                                ?>
                    
                    
                        </td> 
                        <?php
                            $row = $result->fetch_assoc();
                        }
                        ?>
                    </tr>
                    <?php
                        }
                    }
                    ?>   
			</table>
            <hr>
            <div><font size="4">&ensp;&ensp;&ensp;장바구니 전체 삭제</font>
                <form method="post" action="bracket.php">
                <input type="submit" value="ok" style="width:50px;">
                </form>
                <font size="6">&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;총 금액 : <?php echo $sum?></font><br>

                <form>

                    <font size="4">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        &ensp;&ensp;&ensp;&ensp;쇼핑을 계속 하시겠습니까? </font>
                    <a href="product.php"><button type="button" style="width:50px;">ok</button></a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </form>
            </div>
		</div>

	</div>

</body>
</html>

