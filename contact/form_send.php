<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "info@signaturewmg.com";
     
    $email_subject = "New inquiry submitted on Signature WMG website";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Inquiry details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- Form Sent Successfully HTML below -->
 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wealth Management Group | Wealth Management Strategies</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="keywords" content="signature wealth management group, wealth management group, financial advisors, financial planning">
	<meta name="description" content="Contact Signature Wealth Management Group - A Personal Commitment To Your Financial Future for wealth management advice.">
	<link rel="apple-touch-icon" sizes="180x180" href="/favicon.png">
	<link rel="icon" type="image/png" href="/favicon.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon.png" sizes="16x16">
	<link rel="manifest" href="/assets/img/share/meta/manifest.json">
	<link rel="mask-icon" href="/assets/img/share/meta/safari-pinned-tab.svg" color="#5bbad5">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
	<meta name="theme-color" content="#ffffff">

	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=2.0,user-scalable=yes">
	<meta name="format-detection" content="telephone=no">
  <meta name="google-site-verification" content="31ZqI-HhWyLbbdJDeK8qMFCCGfqOkUUVXetG5eTgpeY" />
  <link rel="alternate" hreflang="en-us" href="http://signaturewmg.com/">

	<link rel="stylesheet" href="/common/lib/slick/slick.css">
	<link rel="stylesheet" href="/common/css/common.min.css">
	<!--[if lt IE 9]>
		<script src="/assets/js/html5shiv.js"></script>
		<script src="/assets/js/respond.min.js"></script>
	<![endif]-->

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-99320875-1', 'auto');
    ga('send', 'pageview');

  </script>

</head>
<body class="is-contact h-overflow-hidden">
  <!-- ///// SITE HEADER ///// -->
  	<header class="l-site-header u-clearfix">
  	  <h1 class="header__logo">
  	    <a class="header__logo-link" href="/">
  	      <img src="/common/images/share/top_logo.png" alt="best wealth management firms">
  	    </a>
  	  </h1>
  	
  		<nav class="site-navigation">
  		  <div class="navigation__mobile u-clearfix">
  		    <button class="navigation__mobile-button" id="js-mobile-button">
  		      <span class="navigation__button-text">Menu</span>
  		      <span class="navigation__hamburger"></span>
  		    </button>
  		  </div>
  		  <div class="navigation__wrap" id="js-mobile-menu">
  		    <ul class="navigation__items" id="js-mobile-nav">
  		        <li class="navigation__item">
  		          <a class="navigation__link nav-top" href="/">Home</a>
  		        
  		        </li>
  		        <li class="navigation__item">
  		          <a class="navigation__link nav-team" href="/team/">Our Team</a>
  		        
  		        </li>
  		        <li class="navigation__item">
  		          <a class="navigation__link nav-clients" href="/clients/">Whom We Serve</a>
  		        
  		              <ul class="navigation__dropdown">
  		        
  		                <li class="navigation__subitem">
  		                  <a class="navigation__sub-link" href="/clients/southern-company/">Southern Company Employees</a>
  		                </li>
  		                <li class="navigation__subitem">
  		                  <a class="navigation__sub-link" href="/clients/affluent-families/">Affluent Families</a>
  		                </li>
  		                <li class="navigation__subitem">
  		                  <a class="navigation__sub-link" href="/clients/professionals/">Business Professionals</a>
  		                </li>
  		                <li class="navigation__subitem">
  		                  <a class="navigation__sub-link" href="/clients/executives/">Corporate Executives</a>
  		                </li>
  		                <li class="navigation__subitem">
  		                  <a class="navigation__sub-link" href="/clients/physicians/">Physicians and Medical Professionals</a>
  		                </li>
  		        
  		              </ul>
  		        </li>
  		        <li class="navigation__item">
  		          <a class="navigation__link nav-why-us" href="/why-us/">Why Us</a>
  		        
  		              <ul class="navigation__dropdown">
  		        
  		                <li class="navigation__subitem">
  		                  <a class="navigation__sub-link" href="/why-us/equity-income/">The Signature Equity Income Series</a>
  		                </li>
  		                <li class="navigation__subitem">
  		                  <a class="navigation__sub-link" href="/why-us/mutual-fund/">The Signature Mutual Fund Series</a>
  		                </li>
  		        
  		              </ul>
  		        </li>
  		        <li class="navigation__item">
  		          <a class="navigation__link nav-resources" href="/resources/">Resources</a>
  		        
  		        </li>
  		        <li class="navigation__item">
  		          <a class="navigation__link nav-contact" href="/contact/">Contact Us</a>
  		        
  		        </li>
  		
  		      <li class="navigation__item navigation__item--login">
  		        <a class="navigation__link navigation__link--login" href="/client-login/"><span class="fa fa-lock fa-lg" aria-hidden="true"></span>     Client Login</a>
  		      </li>
  		    </ul>
  		  </div>
  		</nav>
  	</header>
  <!-- ///// END SITE HEADER ///// -->

  <!-- ///// SITE MAIN CONTENTS ///// -->
  
<main>

  <!--KEY VISUAL-->
  <section class="l-contact-kv">
    <div class="hero-detail__wrap">
      <h2 class="hero-detail__title">Contact</h2>
    </div>
  </section>
  <!--END KEY VISUAL-->

  <div class="wrap-content">
    <section class="l-contact-form row">
      <div class="success-message col-md-8">
        <p>Thank you for contacting us. We will be in touch with you very soon.</p>

        <p class="message__text">In the meantime, if you have any urgent request, please consider giving us a call at <a class="message__phone" href="tel:6789322500">678-932-2500</a> during business hours.</p>
      </div>

      <address class="contact-details col-md-4">
        <h4 class="contact__heading">Address:</h4>
        <p>3625 Cumberland Boulevard SE<br>
        Suite 230<br>
        Atlanta, GA 30339</p>

        <h4 class="contact__heading">Phone Number:</h4>
        <span>678-932-2500</span>

        <h4 class="contact__heading">Email:</h4>
        <p><a class="contact__email" href="mailto:info@signaturewmg.com">info@signaturewmg.com</a></p>

        <a class="contact__heading contact__map" href="https://goo.gl/maps/qzEjgvkr7kQ2" target="_blank">Maps and Directions</a>
      </address>
    </section>
  </div>
</main>

  <!-- ///// END SITE MAIN CONTENTS ///// -->

  <!-- ///// SITE FOOTER ///// -->
  	<footer class="l-site-footer">
  	
  	  <div class="footer__navigation">
  	    <ul class="footer__links">
  	      <li class="footer__link"><a href="/">Home</a></li>
  	      <li class="footer__link"><a href="/team/">Our Team</a></li>
  	      <li class="footer__link"><a href="/why-us/">Why Us</a></li>
  	      <li class="footer__link"><a href="/resources/">Resources</a></li>
  	      <li class="footer__link"><a href="/contact/">Contact Us</a></li>
  	    </ul>
  	  </div>
  	
  	  <div class="footer__info">
  	    <h4 class="footer__name">Signature Wealth Management Group LLC</h4>
  	    <p>
  	      <span class="footer__add">3625 Cumberland Boulevard SE, Suite 230 //</span>
  	      <span class="footer__add">Atlanta, GA 30339 //</span>
  	      <span class="footer__add">Phone: 678-932-2500 //</span>
  	      <span class="footer__add">Fax: 678-401-7026 //</span>
  	      <a class="footer__map-link" href="https://goo.gl/maps/qzEjgvkr7kQ2" target="_blank">Map and Directions</a>
  	    </p>
  	  </div>
  	
  	  <p class="footer__disclaimer">
  	    Signature Wealth Management Group is a Registered Investment Adviser with the U.S. Securities and Exchange Commission located in Atlanta, Georgia. This website is only intended for clients and interested investors residing in states in which the Adviser is qualified to provide investment advisory services. Please contact Signature Wealth Management Group at 678-932-2500 to find out if the investment adviser is qualified to provide investment advisory services in the state where you reside. The Adviser does not attempt to furnish personalized investment advice or services through this website. Past performance is no guarantee of future results.  A copy of the Signature Wealth Management Group current disclosure statement (form ADV Part 1) containing the firm’s business operations, services, and fees, is available by accessing the SEC website at www.AdviserInfo.sec.gov.  Signature Wealth Management Group will provide form ADV Part 2A to interested parties upon request.
  	    <br><br>
  	    At certain places on our website we offer direct access or ‘links’ to other Internet websites. These sites contain information that has been created, published, maintained or otherwise posted by institutions or organizations independent of Signature Wealth Management Group. Signature Wealth Management Group does not endorse, approve, certify or control these websites and does not assume responsibility for the accuracy, completeness or timeliness of the information located there. Signature Wealth Management Group does not necessarily endorse or recommend any commercial product or service described at these websites.
  	  </p>
  	
  	  <small class="footer__copyright">copyright © Signature Wealth Management Group 2017. All Rights Reserved.</small>
  	</footer>
  <!-- ///// END SITE FOOTER ///// -->


  <div class="loading">
      <div class="loading__wrap">
          <div class="loading__circle--1 loading__circle"></div>
          <div class="loading__circle--2 loading__circle"></div>
          <div class="loading__circle--3 loading__circle"></div>
          <div class="loading__circle--4 loading__circle"></div>
          <div class="loading__circle--5 loading__circle"></div>
          <div class="loading__circle--6 loading__circle"></div>
          <div class="loading__circle--7 loading__circle"></div>
          <div class="loading__circle--8 loading__circle"></div>
          <div class="loading__circle--9 loading__circle"></div>
      </div>
  </div>
  <script src="/common/js/modernizr.min.js"></script>
  <!--jquery-->
  <script>
  	if(Modernizr.csstransitions){
  		document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"><\/script>');
  		window.jQuery || document.write('<script src="/common/js/jquery-2.1.1.min.js"><\/script>');
  	}else{
  		document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><\/script>');
  		window.jQuery || document.write('<script src="/common/js/jquery-1.11.1.min.js"><\/script>');
  	}
  </script>
  <script src="/common/lib/TweenMax/TweenMax.min.js"></script>
  <script src="/common/lib/jquery.mb.YTPlayer.min.js"></script>
  <script src="https://use.fontawesome.com/5d96a1dda8.js"></script>
  <script src="/common/js/common.js"></script>
  
  <script>
  var touchsupport = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0)
  if (touchsupport){ // browser doesn't support touch
      document.documentElement.className += " touch-screen"
  }
  </script>
  
</body>
</html>

 
<?php
}
die();
?>