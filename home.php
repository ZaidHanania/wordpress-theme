<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?><?php is_front_page() ? bloginfo('description') : wp_title('|'); ?></title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,300,200">
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
			font-family: 'Lato', sans-serif;
		}
		.wrapper {
			height: 100vh;
			width: 100%;
			padding-top: 0px;
			background-repeat: no-repeat;
			background-size: cover;
		}

		.center {
			/*height: 80%;*/
			text-align: center;
			width: 55%;
			margin: 0 auto;
			display: none;
		}
		.left {
			width: 34%;
			display: inline-block;
			overflow: scroll;
			text-align: center;
			margin: 0;
		}

		.left h2 {
			margin: 0;
			font-size: 22px;
			transition: all 0.3s;
			border-radius: 3px;
			cursor: pointer;
			border: 1px solid transparent;
			margin-bottom: 8px;
		}

		.left h2:hover {
			border: 1px solid white;
			/*background-color: rgba(0,0,0,0.4);*/
		}

		.right {
			margin-left: 2%;
			width: 0;
			/*width: 74%;*/
			display: inline-block;
			vertical-align: top;
			background: rgba(0,0,0,0.4);
			opacity: 0;
			overflow: scroll;
			height: 100%;
			/*display: none;*/
			border-radius: 5px;
			transition: all 0.3s;
			/*margin-top: 70px;*/
			/*margin-top: 101px;*/
		}

		.right:hover {
			background: rgba(0,0,0,0.5);
		}

		.right h2 {
			font-weight: 400;
		}

		h1.blog {
			text-align: center;
			font-weight: 400;
			display: block;
			border-bottom: 2px solid white;
			padding: 10px;
		}

		a {
			text-decoration: none;
			color: skyblue;
			transition: color 0.3s;
		}

		a:hover {
			color: #57AEEB;
		}

		p{
			width: 100%;
			text-align: left;
		}

		p.postPreview {
			font-weight: 300;
		}

		svg.menuIcon {
			fill: white;
			position: absolute;
			top: 10px;
			left: 10px;
			width: 60px;
		}

		.toggle {
		  width: 34px;
		  height: 30px;
		  margin: 10px auto;
		  position: absolute;
		  top: 8px;
		  left: 20px;
		}

		.toggle div {
		  width: 100%;
		  height: 2px;
		  background: white;
		  margin: 6px auto;
		  transition: all 0.3s;
		  backface-visibility: hidden;
		}

		.toggle.on .one {
		  transform: rotate(45deg) translate(5px, 5px);
		}

		.toggle.on .two {
		  opacity: 0;
		}

		.toggle.on .three {
		  transform: rotate(-45deg) translate(6px, -7px);
		}

		.menu {
			width: 170px;
			height: 100vh;
			/*background-color: rgba(255,255,255,0.3);*/
			position: absolute;
			top: 0;
			left: -300px;
			padding-top: 100px;
		}

		.menu ul {
			margin: 0;
			padding: 0;
		}

		.menu ul li a {
			color: white;
			font-size: 16px;
			padding: 10px 50px;
			display: block;
			transition: background 0.4s;
		}

		.menu ul li a:hover {
			background: rgba(255,255,255,0.3);
		}

	</style>
</head>
<body>

	<?php    /**
		* Displays a navigation menu
		* @param array $args Arguments
		*/
		$args = array(
			'theme_location' => '',
			'menu' => '',
			'container' => 'div',
			'container_class' => 'menu menu-{menu-slug}-container',
			'container_id' => '',
			'menu_id' => '',
			'echo' => true,
			'fallback_cb' => 'wp_page_menu',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
			'depth' => 0,
			'walker' => ''
		);
	
		wp_nav_menu( $args ); ?>


	<div class="toggle">
	  <div class="one"></div>
	  <div class="two"></div>
	  <div class="three"></div>
	</div>


	<div class="wrapper" style="background: white url(<?php echo get_template_directory_uri() ?>/images/blog.jpg) center no-repeat; background-size: cover;">
		<div class="center">
		<h1 class="blog">Blog posts</h1>

			<div class="left">

				<?php 
				$i = 0;
				if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php $title = get_the_title();  ?>
				  <h2 data-url="<?php the_permalink(); ?>" data-content="<?php echo apply_filters('the_content', substr(get_the_content(), 0, 400) ); ?>" class="postTitle post<?php echo $i; ?>"><?php echo $title; $i++; ?></h2>
				<?php endwhile; // end the loop?>	
			</div>
			<div class="right">
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>

function hide(item){
	$('.menu').animate({
 	 	left: '-300px'
	  }, 300, function(){
	  	$('.toggle').fadeOut('slow');
	  	$('.right').slideUp('slow');
	  	$('.center').fadeOut('slow');
	  	$('.wrapper').animate({
	  		'padding-top': '0px'
	  	}, 800, function(){
	  		window.location.assign(item.attr('href'));
	  	});
	  });
};

	$(document).ready(function(){
		$('.toggle').hide().fadeIn('slow');
		$('.center').fadeIn('slow');
		$('.wrapper').animate({
			'padding-top': '140px'
		}, 800);
		$('.postTitle').on('click', function(){
			
			if($(this).css('background') === 'rgba(0, 0, 0, 0.4) none repeat scroll 0% 0% / auto padding-box border-box') return;

			var post = $(this);
			var $right = $('.right');

			$('.left h2').css('background', 'none');
			$(this).css('background', 'rgba(0,0,0,0.4)');
			var className = $(this).attr('class').replace('postTitle ', '');
			var title = $(this).html();
	
			var data = $(this).attr('data-content');
			data = data.replace('<p>', '<p class="postPreview ' + className + '">');
			data = data.replace('</p>', '...</p>');
			
			$right.css('opacity', '0');

				$right.animate({
					width: '63%',
					padding: '15px'
				}, 400, function(){
					$right.empty().append(data).append('<a href="' + post.attr('data-url') + '"> Read full post </a>').animate({opacity: '1'}, 400);
				});
		});

	$(".toggle").click(function() {

	$(this).toggleClass("on");
		if($('.menu').css('left') === '0px')
		$('.menu').animate({
	 	 	left: '-300px'
		  }, 300);
		if ($('.menu').css('left') === '-300px')
			$('.menu').animate({
	 	 	left: '0'
		  }, 300);
	});


	$('a').on('click', function(e){
		e.preventDefault();
		hide($(this));
	});

	$('.right').on('click', 'a', function(e){
		e.preventDefault();
		console.log($(this));
		hide($(this));
	});


		
});

</script>
</body>
</html>