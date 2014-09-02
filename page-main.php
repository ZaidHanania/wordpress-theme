<?php
/**
 * Template Name: Full Pages
 */
?>
<head>
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<link rel="prefetch" href="<?php echo get_template_directory_uri() ?>/home.php" />
	<link rel="prerender" href="<?php echo get_template_directory_uri() ?>/home.php" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,200">
	<style>
	*{
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	body {
		margin: 0;
		padding: 0;
		font-family: 'Lato', sans-serif;
	}
		.wrapper{
			width: 100%;
			height: 100vh;
			margin: 0;
			background-size: cover ;
			background-repeat: no-repeat;
		}

		.overlay {
			position: absolute;
			margin: 0;
			padding: 0;
			height: 100vh;
			width: 100%;
			left: -1800px;
			top: 0;
			background-color: rgba(0,0,0,0.4);
			transform: skew(-40deg);
		}

		.fade {
			text-align: center;
			transform: skew(40deg);
			position: absolute;
			left: 40%;
			top: 30%;
			opacity: 0;
			color: white;
			cursor: pointer;
			transition: transform 0.5s ease-in;
		}

		.fade:hover {
			transform: skew(40deg) scale(1.05);
		}

		.fade h1{
			font-size: 60px;
			border-bottom: 2px solid white;
			border-top: 2px solid white;
			padding: 5px;
			font-weight: 400;

		}

		.fade h2{
			font-size: 40px;
			font-weight: 200;
		}

		svg.arrow {
			padding: 20px;
			position: absolute;
			bottom: 80px;
			right: 13%;
			height: 200px;
			fill: white;
			opacity: 0;
			cursor: pointer;
		}

	</style>
</head>
<body>

	
	<div class="wrapper" style="background: white url(<?php echo get_template_directory_uri() ?>/images/main.jpg) center no-repeat; background-size: cover;">
		<div class="overlay">
			<div class="fade">
				<h1><?php echo get_bloginfo('name'); ?></h1>
				<h2><?php echo get_bloginfo('description'); ?></h2>
			</div>
		</div>
	</div>

	<svg class="arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 44.088 94.67" enable-background="new 0 0 44.088 94.67" xml:space="preserve">
	<path d="M44.089,47.335L1.486,94.671L0,93.333l41.396-45.998L-0.001,1.337L1.485,0L44.089,47.335z"/>
	</svg>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.overlay').animate({
				left: '-400px'
			}, 1000, function(){
				$('.fade').animate({
						left: '+=50',
						opacity: '1'
					}, 400, function(){
						$('svg').animate({
							right: '-=50',
							opacity: '1'
						}, 500, function(){
							$('svg').animate({
								right: '+=30'
							}, 300);
						});
					});
			});

			$('svg.arrow').mouseenter(function(){
				$('svg').animate({
					right: '-=15'
				}, 300);
			});

			$('svg.arrow').mouseleave( function(){
				$('svg').animate({
					right: '+=15'
				}, 300);
			});

			$('svg, .fade').on('click', function(){
				$('.overlay').animate({
					left: '-=1400'
				},500, function(){
					$('svg.arrow').animate({
						right: '-=500'
					}, 500, function(){
						window.location.assign(window.location.href + 'blog');
					});
				});
			});

		});
	</script>


</body>
</html>
