<?if($this->session->userdata('id') != ""):?>
  <a class="btn btn-lg btn-primary" href="home/my_profile" role="button">ข้อมูลส่วนตัว</a>
  <a class="btn btn-lg btn-primary" href="home/logout" role="button">ออกจากระบบ</a>
<?else:?>
<div class="row">
<div class="col-md-4">
	  <a class="btn btn-block btn-social btn-lg btn-facebook" href="<?=$login_url ?>">
	    <span class="fa fa-facebook"></span> เข้าสู่ระบบด้วย facebook
	  </a>
</div>
<div class="col-md-4" <?if($this->agent->is_mobile()){echo'style="margin-top:10px;"';}?>>
  <a class="btn btn-block btn-social btn-lg btn-google" href="<?=$authUrl?>"">
    <span class="fa fa-google-plus"></span> เข้าสู่ระบบด้วย Gmail
  </a>
</div>
</div>
<?endif;?>
