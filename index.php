<?php echo 'lol' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:300,400,200">
	<style>
		*{
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		h1 {
			font-weight: 400;
		}
		h2 {
			font-weight: 300;

		}
		body {
			margin: 0;
			padding: 0;
			color: white;
			font-family: 'Raleway', sans-serif;
		}
		.wrapper {
			background: url(images/blog.jpg);
			height: 100vh;
			width: 100%;
			padding-top: 130px;
		}

		.center {
			height: 80%;
			text-align: center;
			width: 60%;
			margin: 0 auto;
		}
		.left {
			width: 25%;
			display: inline-block;
			overflow: scroll;
			text-align: center;
			margin: 0;
		}

		.left h2 {
			transition: all 0.3s;
			border-radius: 3px;
			cursor: pointer;
		}

		.right {
			width: 0;
			/*width: 74%;*/
			display: inline-block;
			vertical-align: top;
			background: rgba(0,0,0,0.3);
			padding: 10px;
			opacity: 0;
			overflow: scroll;
			height: 100%;
			border-radius: 5px;
			margin: 0;
		}

		article {
			position: relative;
		}

		h1.blog {
			text-align: center;
			font-weight: 200;
			display: block;
			border-bottom: 2px solid white;
			padding: 10px;
		}

		p{
			width: 100%;
			text-align: left;
		}

		p.postPreview {
			display: none;
		}

	</style>
</head>
<body>
	<div class="wrapper">
		<div class="center">
			<div class="left">
					<h1 class="blog">Blog posts</h1>
					<h2 class="postTitle post1">Title One</h1>
					<h2 class="postTitle post2">Title Two</h1>
					<h2 class="postTitle post3">Title Three</h1>
					<h2 class="postTitle post4">Title Four</h1>
					<h2 class="postTitle post5">Title Five</h1>
					<h2 class="postTitle post6">Title Six</h1>		
			</div>
			<div class="right">
				<p class="postPreview post1 post2 post3"></p>
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	$(document).ready(function(){


		$('.postTitle').on('click', function(){
			$('.left h2').css('background', 'none');
			$(this).css('background', 'rgba(0,0,0,0.4)');
			var className = $(this).attr('class').replace('postTitle ', '');
			var title = $(this).html();
			$('.right').empty();
			$('.right').prepend('<h2>' + title + '</h2>')
			$('.right').animate({
				width: '74%',
			}, 900, function(){
				$('.right').animate({opacity: '1'}, 300);
				$('.' + className).fadeIn(300);
			});
		});


	});

</script>
</body>
</html>