<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="index.php?controller=Index"><img src="images/logo.png" alt="Quwius"></a>
			<ul method='get'>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<div id="lead-in">
		<h1>Feed Your Curiosity,<br>
				Take Online Courses from UWI</h1>

			<form name="course_search" method="post" action="index.php?controller=">
				<div class="wide-thick-bordered" >
				<input class="c-banner-search-input" type="text" name="formSearch" value="" placeholder="Find the right course for you">
				<button class="c-banner-search-button"></button>
				</div>
			</form>
		</div>
		<header></header>
		<main>
			<h1>Most Popular</h1>

			<?php
				$i = -1;
				foreach($popular as $k=>$c):
					$i++;
				if (($i % 4) == 0): ?>
					<div class="centered">
						<?php
						endif; ?>
						<section>
							<a href="#"><img src="images/<?php echo $c[4]?>" alt="<?php echo $c[0]?>" title="<?php echo $c[0]?>">
							<span class="course-title"><?php echo $c[0]?></span>
							<span>Course Instructor</span></a>
						</section>
						<?php
							if (($i % 4) == 3): ?>
					</div>
					<?php 
						endif;
					endforeach; ?>
			</div>
			
			
			<h1>Learner Recommended</h1>
			<div class="centered">
				<section>
				<a href="#"><img src="images/ai.jpg" alt="Learner first Course" title="Artificial Intelligence">
				<span class="course-title">Artificial Intelligence</span>
				<span>Course Instructor</span></a>
				</section>
				<section>
				<a href="#"><img src="images/networksecurity.jpg" alt="Learner Second Course" title="Network and Security">
				<span class="course-title">Networks &amp; Security</span>
				<span>Course Instructor</span></a>
				</section>
				<section>
				<a href="#"><img src="images/humandisease.jpg" alt="Learner Third Course" title="Biochemistry of Human Disease">
				<span class="course-title">Biochemistry of Human Disease</span>
				<span>Course Instructor</span></a>
				</section>
				<section>
				<a href="#"><img src="images/genetics.jpg" alt="Learner Fourth Course" title="Introduction to Genetics">
				<span class="course-title">Introduction to Genetics</span>
				<span>Course Instructor</span></a>
				</section>
			</div>
			<div class="centered">
			<section>
				<a href="#"><img src="images/mathematics.jpg" alt="Learner Fifth Course" title="Basic Mathematics">
				<span class="course-title">Basic Mathematics</span>
				<span>Course Instructor</span></a>
			</section>
			<section>
				<a href="#"><img src="images/electronics.jpg" alt="Learner Sixth Course" title="Introduction to Electronics">
				<span class="course-title">Introduction to Electronics</span>
				<span>Course Instructor</span></a>
			</section>
			<section>
				<a href="#"><img src="images/oop.jpg" alt="Learner Seventh Course" title="Object-Oriented Programming">
				<span class="course-title">Object-Oriented Programming</span>
				<span>Course Instructor</span></a>
			</section>
			<section>
				<a href="#"><img src="images/physics.jpg" alt="Learner Eigth Course" title="Computational Physics">
				<span class="course-title">Computational Physics</span>
				<span>Course Instructor</span></a>
			</section>
			</div>
			<footer>
				<nav>
					<ul>
						<li>&copy;2018 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>