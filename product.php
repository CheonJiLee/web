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
	<img src="img/title.png" width="500" height="300">빈 이미지와, 회사 마크와 간략한 문>
	<div id='cssmenu'>
		<ul>
			<li class='active'><a href='index.html'>Home</a></li>
			<li><a href='#'>회사소개</a></li>
			<li><a href='product.html'>한우</a></li>
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
				<li><a href='#'>삼겹살</a></li>
				<li><a href='#'>목심</a></li>
				<li><a href='#'>앞다리</a></li>
				<li><a href='#'>뒷다리</a></li>
				<li><a href='#'>갈비</a></li>
				<li><a href='#'>등갈비</a></li>
				<li><a href='#'>항정</a></li>
				<li><a href='#'>가브리</a></li>
				<li><a href='#'>갈매기</a></li>
				<li><a href='#'>등심</a></li>
				<li><a href='#'>안심</a></li>
				<li><a href='#'>사태</a></li>
				<li><a href='#'>등뼈</a></li>
				<li><a href='#'>사골</a></li>
				<li><a href='#'>종합세트</a></li>
			</ul>
		</div>
		<div id='list_1' style="display:inline">
			<br>
			<br>
			<br>
			<h1><u>삼겹살</u></h1>
			<br>
			------------------------------------------------<br>
			조건 검색란 만들기<br>
			상태:
			<input type="radio" name="chk_info1" value="냉장">냉장
			<input type="radio" name="chk_info1" value="냉동">냉동<br>
			용도:
			<input type="radio" name="chk_info2" value="국거리">국거리
			<input type="radio" name="chk_info2" value="구이">구이
			<input type="radio" name="chk_info2" value="조림">조림
			<input type="radio" name="chk_info2" value="훈제">훈제<br>
			등급:
			<input type="radio" name="chk_info3" value="A++">A++
			<input type="radio" name="chk_info3" value="A+">A+
			<input type="radio" name="chk_info3" value="A">A
			<input type="radio" name="chk_info3" value="B+">B+
			<input type="radio" name="chk_info3" value="etc">그 외<br>
			------------------------------------------------
			<p><p>SortBy<select name="sel_pro" >
			<option value="낮은가격순">낮은가격순</option>
			<option value="높은가격순">높은가격순</option>
			<option value="제조일">제조일</option>
			<option value="등급">등급</option>
		</select>
			<br>
			<br>
			<table>
				<tr>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
				</tr>
				<tr>
					<td>
						<center>고기에 대한 설명<br>
						<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
					<td>
						<center>고기에 대한 설명<br>
						<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
					<td>
						<center>고기에 대한 설명<br>
						<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
					<td>
						<center>고기에 대한 설명<br>
						<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
				</tr>
				<tr>
					<td>
						<center>고기에 대한 설명<br>
							<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
					<td>
						<center>고기에 대한 설명<br>
							<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
					<td>
						<center>고기에 대한 설명<br>
							<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
					<td>
						<center>고기에 대한 설명<br>
							<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
					<td>
						<img src="img/a1.png" width="200" height="200">
					</td>
				</tr>
				<tr>
					<td>
						<center>고기에 대한 설명<br>
							<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
					<td>
						<center>고기에 대한 설명<br>
							<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
					<td>
						<center>고기에 대한 설명<br>
							<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
					<td>
						<center>고기에 대한 설명<br>
							<input type="button" value="장바구니 담기" onclick="location.href='#' "></center>
					</td>
				</tr>
			</table>


		</div>

	</div>

</body>
</html>

