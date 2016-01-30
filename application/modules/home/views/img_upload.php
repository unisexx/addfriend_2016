<div id="content" style="margin-top:10px;height:100%;">
   <center><h1>ฝากรูปสำหรับทำรูปโพรไฟล์</h1></center>
   
<?if($_POST):?>


<?
$image = file_get_contents($_FILES['upload']['tmp_name']);
$client_id="94af93212e2e617";//Your Client ID here
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Authorization: Client-ID ' . $client_id ));
curl_setopt($ch, CURLOPT_POSTFIELDS, array( 'image' => base64_encode($image) ));

$reply = curl_exec($ch);

curl_close($ch);

$reply = json_decode($reply);

// echo "<h3>Image</h3>";
// printf('<img height="180" src="%s" >', @$reply->data->link);
// 
// echo "<h3>API Debug</h3><pre>";
// var_dump($reply);

?>
</div>

<div class="col-md-5 col-xs-12">
	<img src="<?=@$reply->data->link?>" class="img-thumbnail img-responsive" style="margin-bottom: 10px;">
	<div class="input-group">
	  <span class="input-group-addon" id="sizing-addon2">ลิ้งค์รูป</span>
	  <input type="text" class="form-control"  aria-describedby="sizing-addon2" value="<?=@$reply->data->link?>">
	</div>
	<br> <span style="color:#d44950;">***</span> ให้ทำการ copy ลิ้งค์รูปนี้ไปใส่ในช่องรูปโพรไฟล์ได้เลยครับ <span style="color:#d44950;">***</span>
	<hr>
</div>
<?endif;?>

<br clear="all">
<form action="" enctype="multipart/form-data" method="POST">
  <div class="form-group">
    <label for="imgupload">อัพโหลดรูปภาพ</label>
    <input id="imgupload" class="form-control" name="upload" type="file"/>
  </div>
  
	  <input id="submitbtn" type="submit" class="btn btn-primary" name="submit" value="อัพโหลดรูป"/>
	  <a href="home/my_profile" class="btn btn-primary">กลับไปหน้าข้อมูลส่วนตัว</a>
	  <img id="loading" src="themes/addfriend/images/loading-icon.gif" style="display: none;">
</form>

<style>
input{
border:none;
padding:8px;
}
</style>

<script type="text/javascript">
$(document).ready(function () {
  $('#submitbtn').click(function() {
	    $('#loading').show();
	});
});
</script>