<?php

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=kadai_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//２．データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai_table");
$status = $stmt->execute();

//３．データ表示
$view1="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view1 .= '<li class="li-oshirase">';
    $view1 .= '<a href="second.php?id='.$result["id"].'">';
    $view1 .= '<h3 class="o-naiyou">'.$result["naiyou"].'&nbsp;&nbsp;&nbsp;'.$result["state"].'</h3>';
		$view1 .= '</a>';
    $view1 .= '</li>';
		$view2 = $result["indate"];
  }
}

// 4.データ切断
$status = null;
$stmt = null;

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="keywords" content=",,,">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="X-FRAME-OPTIONS" content="SAMEORIGIN" />
	<title>プログラミングができる学習宿泊ホテル</title>
	<link href="css/reset.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">

<header>
	<div class="head1">
			<div class="logo">
				<img src="img/header/logo.jpg" alt="ロゴ" class="imglogo">
				<p>表参道で学習できるプログラミングホテル</p>
			</div>
			<div class="logo-tonari">
				<div class="yoyakua">
					<a href="#" class="yoyaku">宿泊予約</a>
				</div>
				<p>TEL：03-5413-5045</p>
			</div>
	</div>
	<div class="head2">
		<ul class="head-ul">
			<a href="#"><li class="head-li">HOME</li</a>
			<a href="#syukuhaku"><li class="head-li">ご宿泊</li></a>
			<a href="#osusume"><li class="head-li">おすすめプラン</li></a>
			<a href="#lounge"><li class="head-li">施設紹介</li></a>
			<a href="#syuhen"><li class="head-li">周辺施設＆観光</li></a>
			<a href="#concept"><li class="head-li">コンセプト</li></a>
			<a href="#saiyou"><li class="head-li">採用情報</li></a>
			<a href="#otoi"><li class="head-li">お問い合わせ</li></a>
		</ul>
	</div>
</header>

<div class="img1"></div>

<div class="main1"><a name="syukuhaku"></a>
	<div class="title">
		<p>ご滞在希望日程</p>
	</div>
	<form class="mainform" action="insert.php" method="post">
		<ul class="ulform">
			<li>お名前&nbsp;&nbsp;&nbsp;<input type="text" name="name" placeholder="名前入力欄"></li>
			<li>メールアドレス&nbsp;&nbsp;&nbsp;<input type="text" name="email" placeholder="アドレス入力欄"></li>
			<li>男性人数&nbsp;&nbsp;&nbsp;<input type="number" name="men" value="男性人数" class="number"></li>
			<li>女性人数&nbsp;&nbsp;&nbsp;<input type="number" name="women" value="女性人数" class="number"></li>
			<input type="submit" name="button" value="お問い合わせ" class="button1">
		</ul>
	</form>
</div>

<div class="main2"><a name="concept"></a>
	<div class="main-nakami">
		<div class="main2-sc1">
			<p>ようこそプログラミング学習ができるホテル</p>
			<p>omotesandoへ。</p>
		</div>
		<div class="main2-sc2">
			<p>せまい、だけど清潔、快適、ネットも使える。</p>
			<p>ホテル運営上のあらゆるムダを省き、業界初、なんとプログラミング未経験者でも大歓迎！</p>
			<p>海外からのバックパッカーや宿泊コストなどを極力切り詰めたいという皆様を応援します。</p>
		</div>
	</div>
</div>

<div class="main3"><a name="lounge"></a>
	<div class="main-nakami">
		<div class="main2-sc1">
			<p>Lounge</p></a>
		</div>
		<div class="main2-sc2">
			<p>静かに学びたい方は特別なスペースを。</p>
			<p>訪れてくださったお客様に思いっきり楽しんでいただきたい。</p>
			<p>そんな思いから当ホテル内にLoungeを開設いたしました。</p>
		</div>
		<div class="main-button">
			<a href="#" class="button-nakami">＞&nbsp;&nbsp;詳しく見る</a>
		</div>
	</div>
</div>

<div class="main4"><a name="syuhen"></a>
	<div class="main-nakami">
		<div class="main2-sc1">
			<p>周辺施設</p>
		</div>
		<div class="main2-sc2">
			<p>行きたいところへ、思い立てばすぐ。</p>
			<p>当ホテルから表参道周辺、青山、外苑一丁目など様々な場所に簡単にアクセスができます。</p>
			<p>当ホテル周辺の観光箇所や穴場スポットなどご紹介。</p>
		</div>
		<div class="main-button">
			<a href="#" class="button-nakami">＞&nbsp;&nbsp;詳しく見る</a>
		</div>
	</div>
</div>


<div class="plan">
	<div class="plan-nakami"><a name="osusume"></a>
		<p class="planp">おすすめプラン</p>
		<img src="img/top/plan_title_bg.png" alt="線" width="210px" height="20px">
	 <ul class="ul-plan">
		 <li class="li-plan">
				<p>カプセルルーム</p>
				<p style="color:pink; font-size:13px;">女性専用</p>
				<img src="img/top/plan_img_01.png" alt="女性専用" class="plan-img">
		 </li>
		 <li class="li-plan">
				<p>カプセルルーム</p>
				<p style="color:blue; font-size:13px;">男性専用</p>
				<img src="img/top/plan_img_02.png" alt="男性専用" class="plan-img">
		 </li>
		 <li class="li-plan">
				<p>スーペリア　カプセルルーム</p>
				<p style="color:blue; font-size:13px;">男性専用</p>
				<img src="img/top/plan_img_03.png" alt="男性専用" class="plan-img">
		 </li>
	 </ul>
 </div>
</div>

<div class="oshirase">
		<div class="oshirase-nakami">
			<p class="oship">プログラミングができる学習宿泊ホテル&nbsp;&nbsp;予約状況</p>
			<p class="oship1"><?= $view2 ?>現在</p>
		<div class="oshirase-list">
			<ul class="ul-oshirase">
				<?= $view1 ?>
			</ul>
		</div>
		<p class="oship2">＞お部屋を詳しく見る</p>
	</div>
</div>

<div class="link">
	<div class="link-nakami">
		<div class="link-yt">
			<iframe width="465" height="285" src="https://www.youtube.com/embed/B6sFoxe3gpA" frameborder="0" allowfullscreen></iframe>
			<iframe width="465" height="285" src="https://www.youtube.com/embed/dOC7FfkIjUI" frameborder="0" allowfullscreen></iframe>
		</div><a name="saiyou"></a>
		<ul class="linkul">
			<a href="#" class="linka"><li class="linkli1">アメニティ</li></a>
			<a href="#" class="linka"><li class="linkli2">お得情報</li></a>
			<a href="#" class="linka"><li class="linkli3">コンセプト</li></a>
			<a href="#" class="linka"><li class="linkli4">採用情報</li></a>
		</ul>

		<div class="sns"><a href="otoi"></a>
			<ul class="snsul">
				<li class="snsli-f"><a href="https://www.facebook.com/"><img src="img/footer/fb.png" alt="facebook" width="70" height="70"></a></li>
				<li class="snsli-i"><a href="https://www.instagram.com/?hl=ja"><img src="img/footer/insta.png" alt="insta" width="70" height="70"></a></li>
				<li class="snsli-t"><a href="https://twitter.com/?lang=ja"><img src="img/footer/tw.png" alt="tw" width="80" height="80"></a></li>
		 </ul>
		</div>
	</div>
</div>

<footer>
	<div class="foot">
		<div class="logo">
			<img src="img/header/logo.jpg" alt="ロゴ" class="logofoot">
		</div>
		<div class="logo-tonari2">
			<p>株式会社デジタルっぽい株式会社：東京都港区北青山3-5-6 青朋ビル2F</p>
			<p>Copyright (C) 2017プログラミングができる学習宿泊ホテル. All Rights Reserved.</p>
		</div>
	</div>
</footer>


</div>
	<!-- end# wrapper -->

	<!-- jquery script -->
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="js/common.js"></script>
	<script type="text/javascript">
	jQuery(function($) {
		var nav = $('.head2'),
		offset = nav.offset();
		$(window).scroll(function () {
		  if($(window).scrollTop() > offset.top) {
		    nav.addClass('fixed');
		  } else {
		    nav.removeClass('fixed');
		  }
		});
	});
	</script>
</body>
</html>
