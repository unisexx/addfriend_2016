<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $template['title']; ?></title> 
<?include('_inc.php')?>
<?php echo $template['metadata']; ?>
</head>
<body>
	
<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Addfriend</a>
    </div>
    
    <!--
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../navbar/">Default</a></li>
        <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>
        <li><a href="../navbar-fixed-top/">Fixed top</a></li>
      </ul>
    </div>--><!--/.nav-collapse -->
    
  </div>
</nav>


<div class="container">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>www.addfriend.in.th</h1>
    <p>หาเพื่อน Facebook, LINE, Twitter, Instagram, ง่ายๆ เพียงแค่ login เข้าสู่ระบบแล้วกรอกข้อมูลส่วนตัวได้เลยจ้า</p>
    <p>
      <a class="btn btn-lg btn-info" href="../../components/#navbar" role="button">Facebook Login</a>
    </p>
  </div>

</div> <!-- /container -->

</body>
</html>