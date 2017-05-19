<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>CSSスタイル</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=2.0,user-scalable=yes">
	<link rel="stylesheet" href="/common/css/common.min.css">
	<!--[if lt IE 9]>
		<script src="/common/js/html5shiv.js"></script>
		<script src="/common/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<section class="m-20 m-40-md">
	<h1 class="fz-16 fz-20 fw-b mb-20">カラー</h1>
	<ul>
		<?php
		for($i = 1; $i <= 20; $i++){
		?>
		<li class="mb-10"><span class="c-<?php echo $i ?>">c-<?php echo $i ?></span>　　<span class="d-ib p-5 bgc-<?php echo $i ?>">bgc-<?php echo $i ?></span></li>
		<?php
		}	//End for
		?>
	</ul>
</section>

<section class="m-20 m-40-md">
	<h1 class="fz-16 fz-20 fw-b mb-20">Tiny MCE（見出し）</h1>
	<div class="mce-content-body mb-20">
		<?php
		for($i = 1; $i <= 3; $i++){
		?>
		<h2 class="mce-headline-1">mce-headline-1</h2>
		<?php
		}	//End for
		?>
	</div><!-- /.mce-content-body -->
	<h1 class="fz-16 fz-20 fw-b mb-20">Tiny MCE（ボタン）</h1>
	<div class="mce-content-body mb-20">
		<?php
		for($i = 1; $i <= 3; $i++){
		?>
		<a class="mce-button-<?php echo $i ?>">mce-button-<?php echo $i ?></a>　
		<?php
		}	//End for
		?>
	</div><!-- /.mce-content-body -->

	<h1 class="fz-16 fz-20 fw-b mb-20">Tiny MCE（リスト）</h1>
	<div class="mce-content-body mb-20">
		<ul>
			<li>ulリスト</li>
			<li>ulリスト</li>
			<li>ulリスト</li>
		</ul>
		<ol>
			<li>olリスト</li>
			<li>olリスト</li>
			<li>olリスト</li>
		</ol>
	</div><!-- /.mce-content-body -->

</section>



</body>
</html>