<fieldset>
  <legend>ค้นหา</legend>
<div id="search">
  <form method="get" class="form-inline" role="form">
    <div class="form-group">
      <label for="sex">เพศ</label>
      <?=form_dropdown('sex_id', get_option('id','title','sexs'), @$_GET['sex_id'],'id="sex" class="form-control"');?>
    </div>
    <div class="form-group">
      <label for="age_start">อายุ</label>
      <?
  			for ($i = 12; $i <= 75; ++$i) {
  				$ageArray[] = $i;
  			}
  		?>
  		<?=form_dropdown('age_start', $ageArray, @$_GET['age_start'],'id="age_start" class="form-control"');?>
    </div>
    <div class="form-group">
      <label for="age_end">ถึง</label>
  		<?=form_dropdown('age_end', $ageArray, @$_GET['age_end'],'id="age_end" class="form-control"');?>
    </div>
    <div class="form-group">
      <label for="province">จังหวัด</label>
  		<?=form_dropdown('province_id', get_option('id','name','provinces order by name asc'), @$_GET['province_id'],'id="province" class="form-control"');?>
    </div>
    <button type="submit" class="btn btn-success">ค้นหา</button>
  </form>
</div>
</fieldset>

<div id="listfriend">
<?foreach ($rs as $key => $row):?>
<div class="profile">
    <img class="img-thumbnail pull-left" data-src="holder.js/120x120" alt="120x120" src="<?=check_image_url($row->image,$row->facebook_id)?>" style="width: 120px; height: 120px; margin-right:10px;">
    <h3><a href="home/profile/<?=$row->id?>"><?=$row->facebook_name?></a></h3>
    <span class="label label-green"><?php echo $row->age; ?></span>
		<span class="label" style="background: <?php echo $row->sex->color; ?>"><?php echo $row->sex->title ?></span>
		<span class="label label-warning"><?php echo $row->province->name; ?></span>
    <div class="fdetail"><?=$row->detail?></div>
    <div class="social-data pull-right">
      <?if($row->line != ""){ echo'<a href="javascript:void(0)" onclick="location.href=\'http://line.me/ti/p/~'.$row->line.'\'"><img class="social-icon" src="themes/addfriend/images/line-icon.png"></a>'; }?>
      <?if($row->facebook != ""){ echo"<a href='https://www.facebook.com/".$row->facebook."' target='_blank'><img class='social-icon' src='themes/addfriend/images/facebook-icon.png'></a>"; }?>
      <?if($row->twitter != ""){ echo"<a href='https://twitter.com/".$row->twitter."' target='_blank'><img class='social-icon' src='themes/addfriend/images/twitter-icon.png'></a>"; }?>
      <?if($row->instagram != ""){ echo"<a href='https://www.instagram.com/".$row->instagram."' target='_blank'><img class='social-icon' src='themes/addfriend/images/instagram-icon.png'></a>"; }?>
    </div>
    <br clear="all">
</div>
<?endforeach;?>

<br clear="all">
<?php echo $rs->pagination();?>
</div>
