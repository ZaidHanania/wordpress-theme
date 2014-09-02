<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?><?php is_front_page() ? bloginfo('description') : wp_title('|'); ?></title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,200">
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
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
		background-repeat: no-repeat;
		background-size: cover;
		padding-top: 100vh;
	}

	.toggle {
		cursor: pointer;
		display: none;
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
		display: none;
		width: 170px;
		height: 300px;
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
		text-decoration: none;
		color: white;
		font-size: 16px;
		padding: 10px 50px;
		display: block;
		transition: background 0.4s;
	}

	.menu ul li a:hover {
		background: rgba(255,255,255,0.3);
	}

	.post {
		opacity: 0;
		position: absolute;
		left: 0;
		right: 0;
		margin: 0 auto;
		width: 50%;
		height: 80%;
		padding: 10px 40px;
		background: rgba(0,0,0,0.4);
		border-radius: 5px;
		transition: background 0.4s;
		overflow: scroll;
	}

	h2.postTitle {
		text-align: center;
		font-weight: 400;
	}

	.post p {
		font-size: 18px;
		font-weight: 300;
	}

	.post:hover {
		background: rgba(0,0,0,0.6);;
	}

	.info h3 {
		font-size: 12px;
		margin: 5px;
	}
	
	.info a {
		text-decoration: none;
		margin: 0;
		padding: 0 5px;
		font-size: 12px;
		color: skyblue;
		transition: color 0.3s;
	}

	.info a:hover {
		color: #57AEEB;
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
	
	<a href="#" class="toggle">
	  <div class="one"></div>
	  <div class="two"></div>
	  <div class="three"></div>
	</a>

	<div class="wrapper" style="background: white url(<?php echo get_template_directory_uri() ?>/images/single.jpg) center no-repeat; background-size: cover;">
		<div class="post">
	      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<h2 class="postTitle"><?php the_title() ?></h2>
			<?php the_content(); ?>
			<div class="info">

				<?php the_tags('<h3>Tags:</h3>', '', ''); ?>


				 <h3>Categories:</h3>
				 <?php
				 $categories = get_the_category();
				 $separator = ' ';
				 $output = '';
				 if($categories){
				 	foreach($categories as $category) {
				 		$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
				 	}
				 echo trim($output, $separator);
				 }
				 ?>
				 </div>
		
	      <?php endwhile; // end of the loop. ?>
	     

		</div>
	</div>
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	$(document).ready(function(){

		$('.toggle').fadeIn('slow');

		$('.wrapper').animate({
			'padding-top': '40px'
		}, 800);
		$('.post').animate({
			opacity: '1'
		}, 800);

		$(".toggle").click(function(e) {
			e.preventDefault();
			$('.menu').fadeIn();
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

	});



</script>
</body>
</html>