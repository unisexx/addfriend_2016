<?if($this->session->userdata('id') != ""):?>
<div class="row">
<div class="col-md-3">
	  <a class="btn btn-block btn-social btn-lg btn-facebook" href="home/my_profile">
	    <span class="fa fa-user"></span> ข้อมูลส่วนตัว
	  </a>
</div>
<div class="col-md-3" <?if($this->agent->is_mobile()){echo'style="margin-top:10px;"';}?>>
  <a class="btn btn-block btn-social btn-lg btn-github" href="home/logout">
    <span class="fa fa-sign-out"></span> ออกจากระบบ
  </a>
</div>
</div>
<?else:?>
<div class="row">
<div class="col-md-4">
	  <a class="btn btn-block btn-social btn-lg btn-facebook" href="<?=$login_url ?>">
	    <span class="fa fa-facebook"></span> เข้าสู่ระบบด้วย facebook
	  </a>
</div>
<div class="col-md-4" <?if($this->agent->is_mobile()){echo'style="margin-top:10px;"';}?>>
  <a class="btn btn-block btn-social btn-lg btn-google" href="<?=$authUrl?>">
    <span class="fa fa-google-plus"></span> เข้าสู่ระบบด้วย Gmail
  </a>
</div>
</div>
<?endif;?>
