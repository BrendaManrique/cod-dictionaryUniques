<!DOCTYPE html>
<html lang="es">
<head> 
	<title>Code challenge</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Code challenge"/>
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
	<link rel="author" type="text/plain" href="data/humans.txt" />
	<link rel="stylesheet" type="text/css"  href="css/style.css" /> 
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif] -->

</head>
<body>
	<header>
		<h1>
			<a class="fade" href="index.html">
				Code challenge - PHP
			</a>
		</h1>
		<nav>
			<ul>
				<li><a href="https://github.com/BrendaManrique"  target="_blank">Github</a></li>
				<li><a href="https://www.linkedin.com/in/brendastephanie" target="_blank">LinkedIn</a></li>
				<li><a href="http://brendamanrique.com" target="_blank">Portfolio</a></li>
			</ul>
		</nav>
	</header>
	<section id="container">
		<section id="principal">
			<article id="box">
				<h1>DESCRIPTION</h1><hr>
				<p>Given a list of words (see the included 'words.txt' list), generate two output files, 'uniques' and 'fullwords'. The 'uniques' output file should contain every sequence of four letters that appears in exactly one word of the dictionary, with one sequence of four letters per line, alphabetized. The 'fullwords' file should contain the corresponding full, original words that contain the sequences in the 'uniques' file, in the same order, again one per line.</p>
				<p>This code should finish running in under 2 seconds. </p>
				<p>If anything in these instructions seems ambiguous, make the best decision you can, and explain your decision. Please write in PHP or explain why you chose not to.</p>
			</article>
			<ul class="options">
			
			
				<li><a id="btnUnique"  href="run.php" value="T">Generate uniques</a></li>
				<li><a id="btnAll"  href="run.php" value="F">Generate all</a></li>
			</ul>

		<p id="containerOutput"><!-- currently it's empty --></p>
		</section>
		
		
	</section>
	<footer>
		Code challenge - Brenda Truong 2015
	</footer>
	<!-- including jQuery from the google cdn -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	 <script type="text/javascript" src="js/custom.js"></script> 
</body>
</html>