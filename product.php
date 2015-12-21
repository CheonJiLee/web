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
			<li class='active'><a href='product.php'>한우</a></li>
			<li><a href='notice.php'>공지사항/FAQ</a></li>
			<li><a href='bracket.php'>장바구니</a></li>
		</ul>
	</div>
</header>
<br>
<br>
<br>
<br>
	<div id='content'>
		<div id='sidebar' style="display:inline">
			<ul>
				<li class='active'><a href='product.php'>한우</a></li>
				<li><a href='product.php?name=윗등심'>윗등심</a></li>
				<li><a href='product.php?name=아랫등심'>아랫등심</a></li>
				<li><a href='product.php?name=업진살'>업진살</a></li>
				<li><a href='product.php?name=차돌박이'>차돌박이</a></li>
				<li><a href='product.php?name=목심'>목심</a></li>
				<li><a href='product.php?name=안심'>안심</a></li>
				<li><a href='product.php?name=양지'>양지</a></li>
				<li><a href='product.php?name=채끝'>채끝</a></li>
				<li><a href='product.php?name=사골'>사골</a></li>
				<li><a href='product.php?name=부채살'>부채살</a></li>
			</ul>
		</div>
		<div id='list_1' style="display:inline">
			<br>
			<br>
			<br>
			<h1>한우</h1>
			<hr>
			<font size="5"><b>&ensp;&ensp;조건 검색</b></font><br>
			<form method="post" action="product.php">
				<table>
					<tr><td>
			가격:
				<input type="radio" name="chk_info1" value="10000" ondblclick="this.checked=false">~10000
				<input type="radio" name="chk_info1" value="30000" ondblclick="this.checked=false">~30000
				<input type="radio" name="chk_info1" value="50000" ondblclick="this.checked=false">~50000
				<input type="radio" name="chk_info1" value="100000" ondblclick="this.checked=false">~100000<br>
					</td>
						<td rowspan="3"><input type="submit" class="search" value="검색"style="height:80px; width:80px;"></td></tr>
					<tr><td>
			용도:
				<input type="radio" name="chk_info2" value="국거리" ondblclick="this.checked=false">국거리
				<input type="radio" name="chk_info2" value="구이" ondblclick="this.checked=false">구이
				<input type="radio" name="chk_info2" value="조림" ondblclick="this.checked=false">조림
				<input type="radio" name="chk_info2" value="샤브샤브" ondblclick="this.checked=false">샤브샤브<br>
						</td></tr>
					<tr><td>
			등급:
				<input type="radio" name="chk_info3" value="A++" ondblclick="this.checked=false">A++
				<input type="radio" name="chk_info3" value="A+" ondblclick="this.checked=false">A+
				<input type="radio" name="chk_info3" value="A" ondblclick="this.checked=false">A
						</td></tr>
				</table>
			</form>
			<br>
			<br>
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

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(isset($_POST["chk_info1"])){
                        if(isset($where)){
                            $where = $where." AND price < ".$_POST["chk_info1"];
                        } else {
                            $where = " WHERE price < ".$_POST["chk_info1"];
                        }
                    }
                    if(isset($_POST["chk_info2"])){
                        if(isset($where)){
                            $where = $where." AND purpose = '".$_POST["chk_info2"]."'";
                        } else {
                            $where = " WHERE purpose = '".$_POST["chk_info2"]."'";
                        }
                    }
                    if(isset($_POST["chk_info3"])){
                        if(isset($where)){
                            $where = $where." AND ranking = '".$_POST["chk_info3"]."'";
                        } else {
                            $where = " WHERE ranking = '".$_POST["chk_info3"]."'";
                        }
                    }
                    if(isset($where))
                        $sql = "SELECT title_no, name, price, picture, purpose FROM meat".$where;
                    else
                        $sql = "SELECT title_no, name, price, picture, purpose FROM meat";
                } elseif (isset($_GET["name"])) {
                    $where = " WHERE name = '".$_GET["name"]."'";

                    $sql = "SELECT title_no, name, price, picture, purpose FROM meat".$where;
                }else {
                    $sql = "SELECT title_no, name, price, picture, purpose FROM meat";
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    
                    $row = $result->fetch_assoc();
                    while($row) {
                    ?>
                    <tr>
                    <?php
                        for($i = 0; $i < 4 && $row; $i++) {
                    ?>
                        <td>
                    
                                <a href="bracket.php?name=<?php echo $row["name"];?>"><img src="<?php echo $row["picture"]?>" width="200" height="200" alt="gogi"></a><br>
                    
                        <?php
                                echo $row["name"]. "<br>" . $row["price"]. "원<br>" . $row["purpose"]. "</td>";
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
		</div>

	</div>

</body>
</html>

