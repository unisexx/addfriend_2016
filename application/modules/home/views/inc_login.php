<?if($this->session->userdata('facebook_id') != ""):?>
  <a class="btn btn-lg btn-primary" href="home/my_profile" role="button">หน้าข้อมูลส่วนตัว</a>
  <a class="btn btn-lg btn-primary" href="home/logout" role="button">ออกจากระบบ</a>
<?else:?>
  <a class="btn btn-lg btn-primary" href="<?=$login_url ?>" role="button">เข้าสู่ระบบด้วย facebook</a>
<?endif;?>
