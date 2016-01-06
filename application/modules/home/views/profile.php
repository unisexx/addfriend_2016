<h1>ข้อมูลส่วนตัว</h1>

<form>
	<div class="form-group">
    <label for="displayName"></label>
    <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$this->session->userdata('facebook_id')?>/picture?type=large" style="width: 140px; height: 140px;">
  </div>
  <div class="form-group">
    <label for="displayName">ชื่อที่ใช้แสดง</label>
    <input type="text" class="form-control" id="displayName" name="display_name" value="<?=$rs->display_name?>">
  </div>
  <div class="form-group">
    <label for="line">LINE ID / เบอร์โทรศัพท์</label>
    <input type="text" class="form-control" id="line" name="line" value="<?=$rs->line?>">
  </div>
	<div class="form-group">
    <label for="instagram">instagram</label>
    <input type="text" class="form-control" id="instagram" name="instagram" value="<?=$rs->instagram?>">
  </div>
	<div class="form-group">
    <label for="instagram">twitter</label>
    <input type="text" class="form-control" id="twitter" name="twitter" value="<?=$rs->twitter?>">
  </div>
	<div class="form-group">
    <label for="facebook">facebook</label>
    <input type="text" class="form-control" id="facebook" name="facebook" value="https://www.facebook.com/app_scoped_user_id/<?=$rs->facebook_id?>">
  </div>
	<div class="form-group">
    <label for="facebook">ข้อความทักทาย</label>
    <textarea class="form-control" rows="3" name="detail"><?=$rs->detail?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr>
<?php echo "session_facebook_id = ". $this->session->userdata('facebook_id');?>
<a href="home/logout" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
