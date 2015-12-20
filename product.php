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
			<li class='active'><a href='product.html'>한우</a></li>
			<li><a href='#'>공지사항/FAQ</a></li>
			<li><a href='#'>장바구니</a></li>
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
				<li class='active'><a href='#'>한우</a></li>
				<li><a href='#'>윗등심</a></li>
				<li><a href='#'>아랫등심</a></li>
				<li><a href='#'>업진살</a></li>
				<li><a href='#'>차돌박이</a></li>
				<li><a href='#'>목심</a></li>
				<li><a href='#'>안심</a></li>
				<li><a href='#'>양지</a></li>
				<li><a href='#'>채끌</a></li>
				<li><a href='#'>사골</a></li>
				<li><a href='#'>부채살</a></li>
			</ul>
		</div>
		<div id='list_1' style="display:inline">
			<br>
			<br>
			<br>
			<h1>한우</h1>
			<hr>
			<font size="5"><b>&ensp;&ensp;조건 검색</b></font><br>
			<form>
				<table>
					<tr><td>
			가격:
				<input type="radio" name="chk_info1" value="가격" ondblclick="this.checked=false">~10000
				<input type="radio" name="chk_info1" value="가격" ondblclick="this.checked=false">~30000
				<input type="radio" name="chk_info1" value="가격" ondblclick="this.checked=false">~50000
				<input type="radio" name="chk_info1" value="가격" ondblclick="this.checked=false">~100000<br>
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

			<div style="float: right;, margin-right:5%">
			SortBy
				<select name="sel_pro" >
					<option value="낮은가격순">선택</option>
					<option value="낮은가격순">낮은가격순</option>
					<option value="높은가격순">높은가격순</option>
					<option value="등급">등급</option>
				</select>
			</div>
			<br>
			<br>
			<hr>
			<table>

                <?php
                $servername = "localhost";
                $username = "changoul";
                $password = "changoul";
                $dbname = "Changoul";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                
                $sql = "SELECT title_no, name, price, picture, purpose FROM meat";
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
                    
                                <img src="<?php echo $row["picture"]?>" width="200" height="200" alt="gogi"><br>
                    
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

