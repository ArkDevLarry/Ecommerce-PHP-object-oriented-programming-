<?php $this->view("includes/header",FRNTND,$data) ?>

<body>
	<div class="container text-center">
		<div class="logo-404">
			<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
		</div>
		<div class="content-404">
			<img src=<?= ASSET.FRNTND."images/404/404.png"?> style="max-width: 50%;" class="img-responsive" alt="" />
			<h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
			<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
			<h2><a href="index.html">Bring me back Home</a></h2>
		</div>
	</div>

  
    <script src=<?= ASSET.FRNTND."js/jquery.js" ?>></script>
	<script src=<?= ASSET.FRNTND."js/bootstrap.min.js" ?>></script>
	<script src=<?= ASSET.FRNTND."js/jquery.scrollUp.min.js" ?>></script>
	<script src=<?= ASSET.FRNTND."js/price-range.js" ?>></script>
    <script src=<?= ASSET.FRNTND."js/jquery.prettyPhoto.js" ?>></script>
    <script src=<?= ASSET.FRNTND."js/main.js" ?>></script>
</body>
</html>