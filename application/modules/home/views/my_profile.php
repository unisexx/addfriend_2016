<!-- <h1>ข้อมูลส่วนตัว</h1> -->
<fieldset>
  <legend>แสดงตัวอย่าง</legend>
  <?if($rs->status == 0):?>
    <div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ตอนนี้คุณอยู่ในสถานะ "<b>ปิดการใช้งาน</b>" ข้อมูลของคุณจะไม่แสดงในหน้าแรก</div>
  <?else:?>
    <div class="alert alert-success" role="alert"><i class="fa fa-check"></i> ตอนนี้คุณอยู่ในสถานะ "<b>เปิดการใช้งาน</b>" ข้อมูลของคุณแสดงให้เพื่อนเห็นแล้ว</div>
  <?endif;?>
  <?// =image_alert($rs->image);?>
  <div id="listfriend">
  <div class="profile example">
        <img class="img-thumbnail pull-left" data-src="holder.js/120x120" alt="120x120" src="<?=check_image_url($rs->image,$rs->facebook_id)?>" style="width: 120px; height: 120px; margin-right:10px;">
        <?// =thumb(check_image_url($rs->image,$rs->facebook_id),120,120,1,' class="img-thumbnail pull-left" data-src="holder.js/120x120" alt="120x120" style="width: 120px; height: 120px; margin-right:10px;"')?>
      <h3><?=$rs->display_name?></h3>
      <span class="label label-green"><?php echo $rs->age; ?></span>
  		<span class="label" style="background: <?php echo $rs->sex->color; ?>"><?php echo $rs->sex->title ?></span>
  		<span class="label label-warning"><?php echo $rs->province->name; ?></span>
      <div class="fdetail"><?=$rs->detail?></div>
      <div class="social-data">
        <?if($rs->social_line != ""){ echo'<a href="javascript:void(0)" onclick="location.href=\'http://line.me/ti/p/~'.$rs->social_line.'\'"><img class="social-icon" src="themes/addfriend/images/line-icon.png"></a>'; }?>
        <?if($rs->social_facebook != ""){ echo"<a href='https://www.facebook.com/".$rs->social_facebook."' target='_blank'><img class='social-icon' src='themes/addfriend/images/facebook-icon.png'></a>"; }?>
        <?if($rs->social_twitter != ""){ echo"<a href='https://twitter.com/".$rs->social_twitter."' target='_blank'><img class='social-icon' src='themes/addfriend/images/twitter-icon.png'></a>"; }?>
        <?if($rs->social_instagram != ""){ echo"<a href='https://www.instagram.com/".$rs->social_instagram."' target='_blank'><img class='social-icon' src='themes/addfriend/images/instagram-icon.png'></a>"; }?>
      </div>
      <br clear="all">
  </div>
  </div>
</fieldset>
<br><br>

<fieldset>
  <legend>กรอกข้อมูลส่วนตัว</legend>
<form id="myProfile" method="post" action="home/my_profile_save" enctype="multipart/form-data">
  <div class="form-group">
    <label for="status">สถานะ</label>
    <?=form_dropdown('status', array(0 => 'ปิดการใช้งาน',1 => 'เปิดการใช้งาน'), $rs->status,'id="status" class="form-control"');?>
  </div>
  <div class="form-group">
    <label for="image">ลิ้งค์รูปโพรไฟล์ (ไฟล์นามสกุล .jpg .png .gif)</label>
    <br><?//=uppic_mce()?> <a href="home/img_upload">อัพรูปคลิ๊กที่นี่จ้า</a>
    <input type="text" class="form-control" id="image" name="image" value="<?=$rs->image?>" placeholder="ถ้าไม่มีให้ปล่อยว่างไว้ ระบบจะใช้รูปจาก facebook แทน">
  </div>
  <div class="form-group">
    <label for="displayName">ชื่อที่ใช้แสดง</label>
    <input type="text" class="form-control" id="displayName" name="display_name" value="<?=$rs->display_name=="" ? $rs->facebook_name : $rs->display_name ;?>">
  </div>
	<div class="form-group">
    <label for="sex">เพศ</label>
		<?=form_dropdown('sex_id', get_option('id','title','sexs'), $rs->sex_id,'id="sex" class="form-control"');?>
  </div>
	<div class="form-group">
    <label for="age">อายุ</label>
		<?
			for ($i = 12; $i <= 75; ++$i) {
				$ageArray[$i] = $i;
			}
		?>
		<?=form_dropdown('age', $ageArray, $rs->age,'id="age" class="form-control"');?>
  </div>
	<div class="form-group">
    <label for="province">จังหวัด</label>
		<?=form_dropdown('province_id', get_option('id','name','provinces'), $rs->province_id,'id="province" class="form-control"');?>
  </div>
	<div class="form-group">
    <label for="detail">แนะนำตัว</label>
    <textarea class="form-control" id="detail" rows="5" name="detail"><?=$rs->detail?></textarea>
  </div>
  <div class="form-group">
    <label for="social_line">LINE ID</label>
    <input type="text" class="form-control validate" id="social_line" name="social_line" value="<?=$rs->social_line?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
	<div class="form-group">
    <label for="social_instagram">instagram ID</label>
    <input type="text" class="form-control validate" id="social_instagram" name="social_instagram" value="<?=$rs->social_instagram?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
	<div class="form-group">
    <label for="social_twitter">twitter ID</label>
    <input type="text" class="form-control validate" id="social_twitter" name="social_twitter" value="<?=$rs->social_twitter?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
	<div class="form-group">
    <label for="social_facebook">facebook ID</label>
    <input type="text" class="form-control validate" id="social_facebook" name="social_facebook" value="<?=$rs->social_facebook?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
  <!-- <div class="form-group">
    <label for="imgupload">อัพโหลดรูปโพรไฟล์</label>
    <input id="imgupload" class="form-control" name="upload" size="35" type="file"/>
  </div> -->
	<input type="hidden" name="id" value="<?=$rs->id?>">
  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
</form>
</fieldset>

<br>
<div class="alert alert-info" role="alert"><i class="fa fa-exclamation-circle"></i> ทุกครั้งที่ทำการล้อกอินเข้าสู่ระบบ หรือกดปุ่มบันทึกข้อมูล จะทำให้ชื่อของคุณถูกดันขึ้นไปอยู่ลำดับบนสุดของหน้าแรกเสมอ</div>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
<script type="text/javascript">
$(document).ready(function () {

  $('#myProfile').validate({ // initialize the plugin
      groups: {
          names: "social"
      },
      rules: {
          social_line: {
              require_from_group: [1, ".validate"]
          },
          social_instagram: {
              require_from_group: [1, ".validate"]
          },
          social_twitter: {
              require_from_group: [1, ".validate"]
          },
          social_facebook: {
              require_from_group: [1, ".validate"]
          }
      },
      // submitHandler: function (form) { // for demo
      //     alert('valid form submitted'); // for demo
      //     return false; // for demo
      // }
  });

  jQuery.extend(jQuery.validator.messages, {
      require_from_group: jQuery.format("กรุณากรอกข้อมูล social อย่างน้อย 1 รายการ")
  });

});
</script>