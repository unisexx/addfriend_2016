<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
$(function(){
    $("#frmMain").validate({
        rules: 
        {
            "title": 
            { 
                required: true
            }
        },
        messages:
        {
            "title": 
            { 
                required: "กรุณากรอกหัวข้อค่ะ"
            }
        }
    });
})
</script>
<h1>Banner</h1>

<form id="myProfile" method="post" action="home/banner_save/<?=$banner->id?>">
  <div class="form-group">
    <label for="status">หัวข้อ</label>
    <input type="text" class="form-control" name="title" value="<?php echo $banner->title?>">
  </div>
  <div class="form-group">
    <label for="status">รูปแบนเนอร์</label>
    <div class="input-group">
	  <input class="form-control" type="text" name="image" value="<?php echo $banner->image?>"/>
	  <span class="input-group-addon" id="basic-addon2" onclick="browser($(this).prev(),'image')" style="cursor: pointer;">เลือกไฟล์</span>
	</div>
  </div>
  <div class="form-group">
    <label for="status">URL</label>
    <input type="text" class="form-control" name="url" value="<?php echo $banner->url?>">
  </div>
  <div class="form-group">
    <label for="status">เริ่ม</label>
    <input type="text" class="form-control" name="start_date" value="<?php echo DB2Date(($banner->start_date)?$banner->start_date:date("Y-m-d"))?>">
  </div>
  <div class="form-group">
    <label for="status">สิ้นสุด</label>
    <input type="text" class="form-control" name="end_date" value="<?php echo DB2Date($banner->end_date)?>">
  </div>
  <div class="form-group">
    <label for="status">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $banner->email?>">
  </div>
  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
</form>