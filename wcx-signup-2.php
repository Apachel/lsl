<!DOCTYPE html>
<html lang="en">
  <head>
  <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/api2/r20171025115245/recaptcha__en.js"></script>    
    
<title>How to Integrate Google “No CAPTCHA reCAPTCHA” on Your Website</title>
  </head>
 
  <body>

<?php 
// <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/api2/r20171025115245/recaptcha__en.js"></script>
    

$name	= 'veriml'; //  value=<?php "$name@$domain" 
$domain	= 'mohmal.im'; // veriml@mohmal.im

$url = "https://ico.wcex.co/";// https://ico.wcex.co/?ref=Vbtn0mW&lang=en
$url = "https://ico.wcex.co/?ref=Vbtn0mW";

// $url = "";
$method = 'get';
 $method = 'post';

$referURL = "https://wcex.co/?ref=KnGgrYTJ"; // htika@protonmail.com
$refer = "KnGgrYTJ"; // htika@protonmail.com
// $refer = "Vbtn0mW";

// пустой ответ
$response = 'null';

// "<form id='auth-form' action='$url' method='post'>

?>

<div class="auth-switcher">
			<a class="show-signup active">Sign Up</a>
			<a class="show-login">Sign In</a>
</div>
		
<?php		
echo
"<form id='auth-form' action='$url' method='$method'>
        	
			
		    <input name='ref' id='ref' placeholder='referer' type='text' value='$refer'>
        <input name='email' id='email' placeholder='Valid Email' type='email'  value='$name@$domain'>
        <input name='password' id='password' placeholder='Create Password' maxlength='200' type='password'  value='$name@$domain'>
        
        
        <input name='g-recaptcha-response' id='g-recaptcha-response' placeholder='g-recaptcha-response'' type='text' value='$refer'>
        
        <button class='auth-button' id='signup-button' type='submit'>Sign Up</button>
        
        <span id='signup' name='reCaptcha'>
          <div style='width: 304px; height: 78px;'>
            <div>
              <iframe src='https://www.google.com/recaptcha/api2/anchor?k=6Le-KioUAAAAAGHpGMOBFCPdpd_vWLKoM9zkUabL&amp;co=aHR0cHM6Ly9pY28ud2NleC5jbzo0NDM.&amp;hl=en&amp;type=image&amp;v=r20171025115245&amp;theme=light&amp;size=normal&amp;cb=vmutk95uox64'
                  title='recaptcha widget' scrolling='no' 
                  sandbox='allow-forms 
                  allow-popups 
                  allow-same-origin 
                  allow-scripts 
                  allow-top-navigation 
                  allow-modals 
                  allow-popups-to-escape-sandbox' 
                  frameborder='0' 
                  width='304' height='78'>
              </iframe>
            </div>
                  
              <textarea 
                  id='g-recaptcha-response' 
                  name='g-recaptcha-response' 
                  class='g-recaptcha-response' 
                  style='width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; '
              >
              </textarea>
              </div>
              </span>
        
        
        =*= $name@$domain =*= #$mail_adres[4] =*= id: $mail_adres[3] <Br><Br><Br>
</form>";


//--------------------- 


echo
"<form id='auth-form' action='$url' method='$method'>
        	
			
		    <input name='ref' id='ref' placeholder='referer' type='text' value='$refer'>
        <input name='email' id='email' placeholder='Valid Email' type='email'  value='$name@$domain'>
        <input name='password' id='password' placeholder='Create Password' maxlength='200' type='password'  value='$name@$domain'>
        
        
        <input placeholder='g-recaptcha-response'' 
                  id='g-recaptcha-response' 
                  name='g-recaptcha-response' 
                  class='g-recaptcha-response' 
          type='text' value='$response'>          
                  
        <button class='auth-button' id='signup-button' type='submit'>Sign Up</button>
        
        <span id='signup' name='reCaptcha'>
          <div style='width: 304px; height: 78px;'>
            <div>
              <iframe src='https://www.google.com/recaptcha/api2/anchor?k=6Le-KioUAAAAAGHpGMOBFCPdpd_vWLKoM9zkUabL&amp;co=aHR0cHM6Ly9pY28ud2NleC5jbzo0NDM.&amp;hl=en&amp;type=image&amp;v=r20171025115245&amp;theme=light&amp;size=normal&amp;cb=vmutk95uox64'
                  title='recaptcha widget' scrolling='no' 
                  sandbox='allow-forms 
                  allow-popups 
                  allow-same-origin 
                  allow-scripts 
                  allow-top-navigation 
                  allow-modals 
                  allow-popups-to-escape-sandbox' 
                  frameborder='0' 
                  width='304' height='78'>
              </iframe>
            </div>
                  
              <textarea id='g-recaptcha-response' 
                  name='g-recaptcha-response' 
                  class='g-recaptcha-response' 
                  style='width: 250px; height: 40px; border: 1px solid #c1c1c1; 
                  margin: 10px 25px; padding: 0px; resize: none;  display: none; '>
              </textarea>
              </div>
              </span>
        
        
        =*= $name@$domain =*= #$mail_adres[4] =*= id: $mail_adres[3] <Br><Br><Br>
</form>";


//----------3---------------
echo
"<form id='auth-form' action='$url' method='$method'>
        	
			  
			  
		    <input name='ref' id='ref' placeholder='referer' type='text' value='$refer'>
        <input name='email' id='email' placeholder='Valid Email' type='email'  value='$name@$domain'>
        <input name='password' id='password' placeholder='Create Password' maxlength='200' type='password'  value='$name@$domain'>
        
        
        
        
        <span id='signup' name='reCaptcha'>
          <div style='width: 304px; height: 78px;'>
            <div>
              <iframe src='https://www.google.com/recaptcha/api2/anchor?k=6Le-KioUAAAAAGHpGMOBFCPdpd_vWLKoM9zkUabL&amp;co=aHR0cHM6Ly9pY28ud2NleC5jbzo0NDM.&amp;hl=en&amp;type=image&amp;v=r20171025115245&amp;theme=light&amp;size=normal&amp;cb=vmutk95uox64'
                  title='recaptcha widget' scrolling='no' 
                  sandbox='allow-forms 
                  allow-popups 
                  allow-same-origin 
                  allow-scripts 
                  allow-top-navigation 
                  allow-modals 
                  allow-popups-to-escape-sandbox' 
                  frameborder='0' 
                  width='304' height='78'>
              </iframe>
              
              <input placeholder='g-recaptcha-response'' 
                  id='g-recaptcha-response' 
                  name='g-recaptcha-response' 
                  class='g-recaptcha-response' 
                  type='text' value='$response'>          
                  
            <button class='auth-button' id='signup-button' type='submit' name='signup' value='true'>Sign Up capcha</button>
              
            </div>
                  
             <button class='auth-button' id='signup-button' type='submit' name='signup' value='signup'>Sign Up 3</button>
        
        
        
        
        =*= $name@$domain =*= #$mail_adres[4] =*= id: $mail_adres[3] <Br><Br><Br>
</form>";

?>	

    <form action="https://ico.wcex.co/" method="post">
 
      	<input name='ref' id='ref' placeholder='referer' type='text' value='$refer'>
        <input name='email' id='email' placeholder='Valid Email' type='email'  value='$name@$domain'>
        <input name='password' id='password' placeholder='Create Password' maxlength='200' type='password'  value='$name@$domain'>
        
        
 
      
      <div class='g-recaptcha' data-sitekey='6Le-KioUAAAAAGHpGMOBFCPdpd_vWLKoM9zkUabL'></div>
      
      <input type="submit" value="Submit" />
      
      <button class='auth-button' id='signup-button' type='submit' value="Submit">Sign Up</button>
 
    </form>
 
    <!--js-->
   <!--  <script src='https://www.google.com/recaptcha/api.js'></script> -->
 
  </body>
</html>