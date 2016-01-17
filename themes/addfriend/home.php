<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<base href="<?php echo base_url(); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta content='index,follow,archive,imageindex,imageclick' name='robots'/>
<meta content='index,follow,archive' name='googlebot'/>
<meta content='addfriend' name='author'/>
<meta content='addfriend' name='copyright'/>
<meta content='addfriend' name='Organization-Name'/>
<meta content='TH' name='Organization-Country-Code'/>
<meta content='Thailand' name='Country'/>
<title><?php echo $template['title']; ?></title>
<?include('_inc.php')?>
<?php echo $template['metadata']; ?>
</head>
<body>
	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=532330300263938";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?include('_header.php')?>

<div class="container">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>addfriend.in.th</h1>
    <p>หาเพื่อน หาแฟน หากิ๊ก หาคู่ทาง Facebook, LINE, Twitter, Instagram, ง่ายๆ เพียงแค่ login เข้าสู่ระบบแล้วกรอกข้อมูลส่วนตัวได้เลยจ้า</p>
    <p>
    	<?=modules::run('home/inc_login_btn'); ?>
    </p>
  </div>

</div> <!-- /container -->

<div class="container">
  <div class="row">
    <div class="col-md-8 col-xs-12">
	    <?=modules::run('home/inc_home'); ?>
    </div>
    <div class="col-md-4 col-xs-12">
    	<img class="img-thumbnail pull-right" data-src="holder.js/500x220?text=Banner" alt="Banner" src="#" style="margin-bottom: 10px;">
    	<img class="img-thumbnail pull-right" data-src="holder.js/500x220?text=Banner" alt="Banner" src="#" style="margin-bottom: 10px;">
    	
    	<div style="margin: 10px 0 0 10px;" class="fb-page" data-href="https://www.facebook.com/addfriend.in.th/" data-tabs="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/addfriend.in.th/"><a href="https://www.facebook.com/addfriend.in.th/">หาเพื่อน หาแฟน หากิ๊ก หาคู่ - Addfriend.in.th</a></blockquote></div></div>
    </div>
  </div>
</div>

<?include('_footer.php')?>
</body>
</html>
