<!-- <h1>ข้อมูลส่วนตัว</h1> -->

<fieldset>
  <legend>กรอกข้อมูลส่วนตัว</legend>
<form id="myProfile" method="post" action="home/my_profile_save">
  <div class="form-group">
    <label for="status">สถานะ</label>
    <?=form_dropdown('status', array(0 => 'ปิดการใช้งาน',1 => 'เปิดการใช้งาน'), $rs->status,'id="status" class="form-control"');?>
  </div>
	<div class="form-group">
    <label for="image">ลิ้งค์รูปโพรไฟล์ (ไฟล์นามสกุล .jpg .png .gif)</label>
    <input type="text" class="form-control" id="image" name="image" value="<?=$rs->image?>" placeholder="ถ้าไม่มีให้ปล่อยว่างไว ้ระบบจะใช้รูปจาก facebook แทน">
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
    <label for="line">LINE ID</label>
    <input type="text" class="form-control validate" id="line" name="line" value="<?=$rs->line?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
	<div class="form-group">
    <label for="instagram">instagram ID</label>
    <input type="text" class="form-control validate" id="instagram" name="instagram" value="<?=$rs->instagram?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
	<div class="form-group">
    <label for="twitter">twitter ID</label>
    <input type="text" class="form-control validate" id="twitter" name="twitter" value="<?=$rs->twitter?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
	<div class="form-group">
    <label for="facebook">facebook ID</label>
    <input type="text" class="form-control validate" id="facebook" name="facebook" value="<?=$rs->facebook?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
	<input type="hidden" name="id" value="<?=$rs->id?>">
  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
</form>
</fieldset>

<br><br>
<fieldset>
  <legend>แสดงตัวอย่าง</legend>
  <?if($rs->status == 0):?>
    <div class="alert alert-danger" role="alert">ตอนนี้คุณอยู่ในสถานะ "<b>ปิดการใช้งาน</b>" ข้อมูลของคุณจะไม่แสดงในหน้าแรก</div>
  <?else:?>
    <div class="alert alert-success" role="alert">ตอนนี้คุณอยู่ในสถานะ "<b>เปิดการใช้งาน</b>" ข้อมูลของคุณแสดงให้เพื่อนเห็นแล้ว</div>
  <?endif;?>
  <?=image_alert($rs->image);?>
  <div id="listfriend">
  <div class="profile example">
        <img class="img-thumbnail pull-left" data-src="holder.js/120x120" alt="120x120" src="<?=check_image_url($rs->image,$rs->facebook_id)?>" style="width: 120px; height: 120px; margin-right:10px;">
      <h3><?=$rs->facebook_name?></h3>
      <span class="label label-green"><?php echo $rs->age; ?></span>
  		<span class="label" style="background: <?php echo $rs->sex->color; ?>"><?php echo $rs->sex->title ?></span>
  		<span class="label label-warning"><?php echo $rs->province->name; ?></span>
      <div class="fdetail"><?=$rs->detail?></div>
      <div class="social-data">
        <?if($rs->line != ""){ echo'<a href="javascript:void(0)" onclick="location.href=\'http://line.me/ti/p/~'.$rs->line.'\'"><img class="social-icon" src="themes/addfriend/images/line-icon.png"></a>'; }?>
        <?if($rs->facebook != ""){ echo"<a href='https://www.facebook.com/".$rs->facebook."' target='_blank'><img class='social-icon' src='themes/addfriend/images/facebook-icon.png'></a>"; }?>
        <?if($rs->twitter != ""){ echo"<a href='https://twitter.com/".$rs->twitter."' target='_blank'><img class='social-icon' src='themes/addfriend/images/twitter-icon.png'></a>"; }?>
        <?if($rs->instagram != ""){ echo"<a href='https://www.instagram.com/".$rs->instagram."' target='_blank'><img class='social-icon' src='themes/addfriend/images/instagram-icon.png'></a>"; }?>
      </div>
      <br clear="all">
  </div>
  </div>
</fieldset>


<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
<script type="text/javascript">
$(document).ready(function () {

  $('#myProfile').validate({ // initialize the plugin
      groups: {
          names: "social"
      },
      rules: {
          line: {
              require_from_group: [1, ".validate"]
          },
          instagram: {
              require_from_group: [1, ".validate"]
          },
          twitter: {
              require_from_group: [1, ".validate"]
          },
          facebook: {
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
