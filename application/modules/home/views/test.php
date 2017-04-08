<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
</head>
<body>
	
<!-- <script>
  // This is called with the results from from FB.getLoginStatus().
  // function statusChangeCallback(response) {
    // console.log('statusChangeCallback');
    // console.log(response);
    // // The response object is returned with a status field that lets the
    // // app know the current login status of the person.
    // // Full docs on the response object can be found in the documentation
    // // for FB.getLoginStatus().
    // if (response.status === 'connected') {
      // // Logged into your app and Facebook.
      // testAPI();
    // } else {
      // // The person is not logged into your app or we are unable to tell.
      // document.getElementById('status').innerHTML = 'Please log ' +
        // 'into this app.';
    // }
  // }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  // function checkLoginState() {
    // FB.getLoginStatus(function(response) {
      // statusChangeCallback(response);
    // });
  // }

  window.fbAsyncInit = function() {
	  FB.init({
	    appId      : '532330300263938',
	    cookie     : true,  // enable cookies to allow the server to access 
	                        // the session
	    xfbml      : true,  // parse social plugins on this page
	    version    : 'v2.8' // use graph api version 2.8
	  });
	  
	  FB.getLoginStatus(function(response) {
	    statusChangeCallback(response);
	  });
  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script> -->

<!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>

<fb:login-button autologoutlink="true"></fb:login-button> -->


<?//=modules::run('home/inc_login_btn'); ?>


<?
$this->load->library('facebook'); 
$user = $this->facebook->getUser();
print_r($user);
$data['user_profile'] = $this->facebook->api('/'.$user, array('fields' => 'id,name,email'));
echo $data['user_profile']['id'];
echo $data['user_profile']['name'];
echo $data['user_profile']['email'];
?>



</body>
</html>