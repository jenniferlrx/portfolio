<?php 
$err = "";
$contactResponse='';
if($_POST){	
	if(!$_POST['email']){
		$err.="Your email address is required. ";
	}
	if(!$_POST['message']){
		$err.="Message is required.<br>";
	}
	if(!$_POST['subject']){
		$err.="Subject is required.<br>";
	}
	if(!$_POST['name']){
		$err.="Your name is required.<br>";
	}
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false){
		$err.= "The email address is not valid.";
	}
	if($err!==""){
		$err = '<div class="alert alert-danger" role="alert"><p>There are some errors:</p>'.$err.'</div>';
	}else{
		$emailTo="xueyingyuan14@gmail.com";
		$headers = "From: ".$_POST['email'];
		if(mail($emailTo, $_POST['subject'],$_POST['message'],$headers)){
			$contactResponse= '<div class="alert alert-success" role="alert"><p>Thank you. The email was sent successfully.</p></div>';
		}else{
			$contactResponse= '<div class="alert alert-success" role="alert"><p>Something went wrong. Please try it later.</p></div>';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio Xueying Yuan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="portfolio.css">
</head>

<body >
<nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" id="brandName" href="#">Xueying Yuan</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#main-container" class="page-scroll">About</a></li>
		<li><a href="#portfolioSection" class="page-scroll">Portfolio</a></li>
		<li><a href="#contactSection" class="page-scroll">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>



<div class="container" id="main-container">
<div id="contactResponse"><?php echo $contactResponse; ?></div>
	<div id="aboutSection" class="section">
		<div>
			<h2 class="sectionHeading">About Me</h2>
		</div>
		<div class="row">
			<div class="col-md-9">
				<div id="aboutDescription">
					<p>My name is Xueying Yuan, and I'm hoping to become a web developer in the future. I majored in Telecommunications Engineering in the university, but I've found more fun in program developing, especially web application. I've created different applications using HTML, CSS JavaScript, jQuery, Bootstrap, PHP, NodeJS, MongoDB, MySQL and so on.</p> 
				</div>
			</div>

			<div class="col-md-3" id="aboutImageDiv">
				<div>
					<img src="avatar.jpg" id="aboutImage" class="img-rounded">
				</div>
				
			</div>
		</div>
	</div>



	<div id="portfolioSection" class="section">
		<div>
			<h2 class="sectionHeading">Portfolio</h2>
		</div>
		<div class="row" id="portfolioImagesDiv">
			<div class="col-md-6">
				<a href="https://xueying-yuan-yelpcamp.herokuapp.com/"  target="_blank">
					<img class = "thumbnail portfolioImages" src="portfolioImages/yelpcamp.jpg" alt="YelpCamp">
				</a>
			</div>
			<div class="col-md-6">
				<a href="/jenniferlrx.com/twitterClone/"  target="_blank">
					<img class = "thumbnail portfolioImages" alt="Twitter Clone" src="portfolioImages/twitter.jpg">
				</a>
			</div>
			<div class="col-md-6">
				<a href="/jenniferlrx.com/colorGame/"  target="_blank">
					<img class = "thumbnail portfolioImages" src="portfolioImages/colorgame.jpg" alt="ColorGame">
				</a>
			</div>
			<div class="col-md-6">
				<a href="/jenniferlrx.com/postcodeFinder/"  target="_blank">
					<img class = "thumbnail portfolioImages" src="portfolioImages/postcodefinder.jpg" alt="postcodeFinder">
				</a>
			</div>
			<div class="col-md-6">
				<a href="/jenniferlrx.com/todoList/"  target="_blank">
					<img class = "thumbnail portfolioImages" src="portfolioImages/todolist.jpg" alt="TodoList">
				</a>
			</div>	
		</div>
	</div>

	<div id="contactSection" class="section">
		<div>
			<h2 class="sectionHeading">Contact me</h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div>
					<form method="POST">
						<div class="form-group">
					    	<label for="contactEmail">Your Email address</label>
					    	<input type="email" class="form-control" id="contactEmail" name="email" required="true">
					  	</div>		
						<div class="form-group">
					    	<label for="contactName">Your Name</label>
					    	<input type="text" class="form-control" id="contactName" name="name" required="true">
					  	</div>			  	
						<div class="form-group">
					    	<label for="contactSubject">Subject</label>
					    	<input type="text" class="form-control" id="contactSubject" name="subject" required="true">
					  	</div>					  	
					  	<div class="form-group">
					    	<label for="contactMessage">Message</label>
					    	<textarea class="form-control" id="contactMessage" name="message" rows="5" required="true"></textarea>
					  	</div>
					  	<button id="contactBtn" type="submit" class="btn btn-default">Submit</button>
					</form>
					<div id="error"><?php echo $err; ?></div>
				</div>
			</div>

			<div class="col-md-6">
				<div id="contactExplain">
					<p>If you want to get touch with me, please don't hesitate to drop me a line. I will reply as soon as possible.</p>			
				</div>
			</div>	
		</div>
		<div id="socialLinks">
			<div class="row">
				<div class="col-sm-12">
					<a href="https://github.com/jenniferlrx"><img src="publicProfilesImages/Github.png"></a> 
					<a href="https://www.linkedin.com/in/xueying-yuan"><img src="publicProfilesImages/Linkedin.png"></a>  
				</div>
			</div>
		</div>
	</div>
</div>
		
<footer class="footer">
  <div class="container">
    <p class="text-muted" id="footerText">Xueying Yuan &copy; 2016</p>
  </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'>
</script>
<script type="text/javascript" src="portfolio.js"></script>
</body>
</html>