<div class="col-xs-12">

<!-- <h1>ข้อมูลส่วนตัว</h1> -->
<fieldset>
  <legend>แสดงตัวอย่าง</legend>
  <?if($rs->banned != ""):?>
	<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> บัญชีของท่านถูกระงับการใช้งาน เนื่องจากมีการทำผิดกฏของเว็บ (รูปภาพไม่เหมาะสม) หากต้องการปลดแบน กรุณาติดต่อแอดมินที่อีเมล์ <a href="mailto:line2me.info@gmail.com?subject=ติดต่อเรื่องปลดแบน">line2me.info@gmail.com</a> (ค่าใช้จ่ายสำหรับการปลดแบนคือบัตรทรูมันนี่ 50 บาท)</div>
  <?else:?>
	  <?if($rs->status == 0):?>
	    <div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ตอนนี้คุณอยู่ในสถานะ "<b>ปิดการใช้งาน</b>" ข้อมูลของคุณจะไม่แสดงในหน้าแรก</div>
	  <?else:?>
	    <div class="alert alert-success" role="alert"><i class="fa fa-check"></i> ตอนนี้คุณอยู่ในสถานะ "<b>เปิดการใช้งาน</b>" ข้อมูลของคุณแสดงให้เพื่อนเห็นแล้ว</div>
	  <?endif;?>
  <?endif;?>
  <div id="listfriend">
  <div class="profileCard example">
	<div class="col-md-2" style="text-align: center">
        <img class="" data-src="holder.js/150x150" alt="150x150" src="<?=check_image_url($rs->image,$rs->facebook_id,$rs->google_picture_link,$rs->twitter_profile_image)?>" style="width: 150px; height: 150px; margin-right:10px;">
	</div>
	<div class="col-md-10 col-xs-12">
      <h3><?=$rs->display_name?></h3>
      <div class="age-sex-location">
		<span class="label label-green"><?php echo $rs->age; ?></span>
  		<span class="label" style="background: <?php echo $rs->sex->color; ?>"><?php echo $rs->sex->title ?></span>
  		<span class="label label-warning"><?php echo $rs->province->name; ?></span>
  	 </div>
  	 <hr style="margin:5px 0;">
      <div class="fdetail"><?=$rs->detail?></div>
      <div class="social-data">
        <?if($rs->social_line != ""){ echo'<a href="javascript:void(0)" onclick="location.href=\'http://line.me/ti/p/~'.$rs->social_line.'\'"><img class="social-icon" src="themes/addfriend/images/line-icon.png"></a>'; }?>
        <?if($rs->social_facebook != ""){ echo"<a href='https://www.facebook.com/".$rs->social_facebook."' target='_blank'><img class='social-icon' src='themes/addfriend/images/facebook-icon.png'></a>"; }?>
        <?if($rs->social_twitter != ""){ echo"<a href='https://twitter.com/".$rs->social_twitter."' target='_blank'><img class='social-icon' src='themes/addfriend/images/twitter-icon.png'></a>"; }?>
        <?if($rs->social_instagram != ""){ echo"<a href='https://www.instagram.com/".$rs->social_instagram."' target='_blank'><img class='social-icon' src='themes/addfriend/images/instagram-icon.png'></a>"; }?>
        <?if($rs->social_beetalk != ""){ echo"<img class='social-icon' src='themes/addfriend/images/beetalk-icon.png'>"; }?>
      </div>
      <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
  </div>
  </div>
</fieldset>
<br><br>

<fieldset>
  <legend>กรอกข้อมูลส่วนตัว</legend>
<form id="myProfile" method="post" action="home/my_profile_save">
  <div class="form-group">
    <label for="status">สถานะ</label>
    <?=form_dropdown('status', array(0 => 'ปิดการใช้งาน',1 => 'เปิดการใช้งาน'), $rs->status,'id="status" class="form-control"');?>
  </div>
  <div class="form-group">
    <label for="image">ลิ้งค์รูปโพรไฟล์ (ไฟล์นามสกุล .jpg .png .gif)<br><small>***ไม่อนุญาตภาพโป๊ อนาจาร เห็นหัว เห็นขน หากพบจะถูกระงับการใช้งานนะครับ***</small></label>
    <br><?//=uppic_mce()?> <a href="home/img_upload">อัพรูปคลิ๊กที่นี่จ้า</a>
    <input type="text" class="form-control" id="image" name="image" value="<?=$rs->image?>" placeholder="ถ้าไม่มีให้ปล่อยว่างไว้ ระบบจะใช้รูปจาก<?if($rs->login_type == 1){ echo "บัญชี facebook";}elseif($rs->login_type == 2){echo "บัญชี google";}elseif($rs->login_type == 3){echo "บัญชี twitter";}?> แทน">
  </div>
  <div class="form-group">
    <label for="displayName">ชื่อที่ใช้แสดง</label>
    <input type="text" class="form-control" id="displayName" name="display_name" value="<?=$rs->display_name?>">
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
    <label for="social_instagram">Instagram ID</label>
    <input type="text" class="form-control validate" id="social_instagram" name="social_instagram" value="<?=$rs->social_instagram?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
	<div class="form-group">
    <label for="social_twitter">Twitter ID</label>
    <input type="text" class="form-control validate" id="social_twitter" name="social_twitter" value="<?=$rs->social_twitter?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
	<div class="form-group">
    <label for="social_facebook">Facebook ID</label>
    <input type="text" class="form-control validate" id="social_facebook" name="social_facebook" value="<?=$rs->social_facebook?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
  <div class="form-group">
    <label for="social_beetalk">BeeTalk ID</label>
    <input type="text" class="form-control validate" id="social_beetalk" name="social_beetalk" value="<?=$rs->social_beetalk?>" placeholder="ถ้าไม่มีให้เว้นว่างไว้">
  </div>
  <!-- <div class="form-group">
    <label for="imgupload">อัพโหลดรูปโพรไฟล์</label>
    <input id="imgupload" class="form-control" name="upload" size="35" type="file"/>
  </div> -->
	<input type="hidden" name="id" value="<?=$rs->id?>">
  <?if($rs->banned == ""):?>
	<button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
  <?endif;?>
	<!-- <img id="loading" src="themes/addfriend/images/loading-icon.gif" style="display: none;"> -->
</form>
</fieldset>

<br>
<div class="alert alert-info" role="alert"><i class="fa fa-exclamation-circle"></i> ทุกครั้งที่ทำการล้อกอินเข้าสู่ระบบ หรือกดปุ่มบันทึกข้อมูล รวมถึงการกดปุ่มแจ่มจากบุคคลอื่น จะทำให้ชื่อของคุณถูกดันขึ้นไปอยู่ลำดับบนสุดของหน้าแรกเสมอ</div>

</div>

<script type="text/javascript" src="media/js/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="media/js/validate/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

  $('#myProfile').validate({ // initialize the plugin
    rules: {
        display_name: "required",
        detail: "required",
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
        },
        social_beetalk: {
            require_from_group: [1, ".validate"]
        },
    },
    messages: {
        display_name: "ชื่อห้ามเป็นค่าว่างจ้า",
        detail: "กรอกข้อมูลแนะนำตัวหน่อยจ้า",
        social_line: "กรุณากรอกข้อมูล social อย่างน้อย 1 รายการ",
        social_instagram: "กรุณากรอกข้อมูล social อย่างน้อย 1 รายการ",
        social_twitter: "กรุณากรอกข้อมูล social อย่างน้อย 1 รายการ",
        social_facebook: "กรุณากรอกข้อมูล social อย่างน้อย 1 รายการ",
        social_beetalk: "กรุณากรอกข้อมูล social อย่างน้อย 1 รายการ"
    },
  });

  // $('button[type=submit]').click(function() {
	    // $('#loading').show();
	// });

  $('#myProfile').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
      e.preventDefault();
      return false;
    }
  });

});
</script>
