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
	
<?include('_header.php')?>
<div class="container">
<div class="line-hilight">&nbsp;</div>
</div>
<?=modules::run('hilights/inc_home'); ?>
<div class="section" style="background-color:white; padding-top:20px; box-shadow: 0px 0px 3px 3px #e1e1e2;">
<div class="container">
    <div class="row">
        <div class="col-md-7" style="padding-right:35px;">
			<?=modules::run('contents/inc_home_reason'); ?>
        </div>
        <div class="col-md-5" style="border-left:1px solid #cdcdcd; padding-left:30px;">
            <?=modules::run('patients/inc_home'); ?>
        </div>
    </div>
</div>
</div>
<div class="section">
<div class="container" style="margin-top:25px;">
    <div class="row">
    	<?=modules::run('contents/inc_home_tool'); ?>
    </div>
</div>
</div>
<div class="section">
<div class="container" style="margin-top:60px;">
	<?=modules::run('dentists/inc_home');?>
</div>
</div>
<?=modules::run('addresses/inc_footer'); ?>
</html>