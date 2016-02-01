<? $socialName = array('social_line'=>'Line','social_facebook'=>'Facebook','social_twitter'=>'Twitter','social_instagram'=>'Instagram','social_beetalk'=>'BeeTalk'); ?>

<fieldset>
  <legend>ค้นหา</legend>
<div id="search">
  <form method="get" class="form-inline" role="form">
    <div class="form-group">
      <?=form_dropdown('sex_id', get_option('id','title','sexs'), @$_GET['sex_id'],'id="sex" class="form-control"','--- เพศ ---');?>
    </div>
    <div class="form-group">
      <?
  			for ($i = 12; $i <= 75; ++$i) {
  				$ageArray[$i] = $i;
  			}
  		?>
  		<?=form_dropdown('age_start', $ageArray, @$_GET['age_start'],'id="age_start" class="form-control"','อายุ');?>
    </div>
    <div class="form-group">
  		<?=form_dropdown('age_end', $ageArray, @$_GET['age_end'],'id="age_end" class="form-control"','ถึงอายุ');?>
    </div>
    <div class="form-group">
  		<?=form_dropdown('province_id', get_option('id','name','provinces order by name asc'), @$_GET['province_id'],'id="province" class="form-control"','--- จังหวัด ---');?>
    </div>
    <div class="form-group">
  		<?=form_dropdown('social', array('social_line'=>'Line','social_facebook'=>'Facebook','social_twitter'=>'Twitter','social_instagram'=>'Instagram','social_beetalk'=>'BeeTalk'), @$_GET['social'],'id="social" class="form-control"','--- โซเชียล ---');?>
    </div>
    <button type="submit" class="btn btn-success">ค้นหา</button>
  </form>
</div>
</fieldset>

<ul  id="listfriend" class="list-unstyled">
<?foreach ($rs as $key => $row):?>
<li style="position: relative;">
	
<div class="profile">
	<div class="col-md-3" style="text-align: center">
    	<a href="home/profile/<?=$row->id?>" target="_blank"><img class="imgProfile" data-src="holder.js/150x150" alt="150x150" src="<?=check_image_url($row->image,$row->facebook_id,$row->google_picture_link)?>" style="width: 150px; height: 150px; margin-right:10px; margin-bottom:5px;"></a>
    </div>
    <div class="col-md-9">
    <h3>
    	<a href="home/profile/<?=$row->id?>" target="_blank"><?=$row->display_name?></a>
    </h3>
    <div class="age-sex-location">
	    <span class="label label-success"><?php echo $row->age; ?></span>
		<span class="label" style="background: <?php echo $row->sex_color; ?>"><?php echo $row->sex_title ?></span>
		<span class="label label-warning"><?php echo $row->province_name; ?></span>
		
		<span class="pull-right">
		    <div class="btn-group btn-group-xs" role="group" data-toggle="tooltip" data-placement="top" title="แจ่ม">
		    	<?php // if(is_file('uploads/user/'.$user->image)): ?>
		        <a class="btn btn-primary btn-jam" style="padding:4px;"><i class="fa fa-heart"></i> </a>
		        <a class="btn btn-default jam-counter"><?php echo number_format($row->vote); ?></a>
		        <?php // endif; ?>
		        <input type="hidden" name="user_id" value="<?php echo $row->id ?>">
		    </div>
		</span>
		
		<!-- <span>
			<iframe src="//www.facebook.com/plugins/like.php?href=http://www.addfriend.in.th/home/profile/<?=$row->id?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21&amp;appId=532330300263938" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; margin-top: 5px; width: 100px;" allowTransparency="true"></iframe> 
		</span> -->
	</div>
	<hr style="margin:5px 0;">
    <div class="fdetail"><?=$row->detail?></div>
    
    <?if(@$_GET["social"]):?>
	<div class="input-group col-md-7 col-xs-12" style="margin-bottom: 5px;">
		<span class="input-group-addon"><?=@$_GET["social"] != ""? $socialName[$_GET["social"]] : "Line" ;?></span>
		<input type="text" class="form-control" value="<?=@$_GET["social"] != "" ? $row->$_GET["social"] : $row->social_line ;?>">
			<?if(@$_GET["social"] == "social_line"):?>
				<a rel="nofollow" href="javascript:void(0)" target='_blank' onclick="location.href='http://line.me/ti/p/~<?=$row->social_line?>'" class="input-group-addon" style="background: #00B84F;
	  color: #fff; border:1px solid #08A100;">เพิ่มเพื่อน</a>
	  		<?elseif(@$_GET["social"] == "social_facebook"):?>
	  			<a rel="nofollow" href='https://www.facebook.com/<?=$row->social_facebook?>' target='_blank' class="input-group-addon" style="background: #3B5998;
	  color: #fff; border:1px solid #3B5998;">เพิ่มเพื่อน</a>
	  		<?elseif(@$_GET["social"] == "social_twitter"):?>
	  			<a rel="nofollow" href='https://twitter.com/<?=$row->social_twitter?>' target='_blank' class="input-group-addon" style="background: #2AA9DF;
	  color: #fff; border:1px solid #2AA9DF;">เพิ่มเพื่อน</a>
	  		<?elseif(@$_GET["social"] == "social_instagram"):?>
	  			<a rel="nofollow" href='https://www.instagram.com/<?=$row->social_instagram?>' target='_blank' class="input-group-addon" style="background: #6A453B;
	  color: #fff; border:1px solid #6A453B;">เพิ่มเพื่อน</a>
		  	<?elseif(@$_GET["social"] == "social_beetalk"):?>
	  			<a rel="nofollow" href='javascript:void(0)' class="input-group-addon" style="background: #E9AA26;
	  color: #fff; border:1px solid #E9AA26;">เพิ่มเพื่อน</a>
		  	<?else:?>
					<a rel="nofollow" href="javascript:void(0)" target='_blank' onclick="location.href='http://line.me/ti/p/~<?=$row->social_line?>'" class="input-group-addon" style="background: #00B84F;
		  color: #fff; border:1px solid #08A100;">เพิ่มเพื่อน</a>
	  		<?endif;?>
	</div>	
	<?else:?>
		<?if($row->social_line != ""):?>
			<div class="input-group col-md-7 col-xs-12" style="margin-bottom: 5px;">
				<span class="input-group-addon">Line</span>
				<input type="text" class="form-control" value="<?=$row->social_line ;?>">
						<a rel="nofollow" href="javascript:void(0)" target='_blank' onclick="location.href='http://line.me/ti/p/~<?=$row->social_line?>'" class="input-group-addon" style="background: #00B84F;color: #fff; border:1px solid #08A100;">เพิ่มเพื่อน</a>
			</div>	
		<?elseif($row->social_facebook != ""):?>
			<div class="input-group col-md-7 col-xs-12" style="margin-bottom: 5px;">
				<span class="input-group-addon">Facebook</span>
				<input type="text" class="form-control" value="<?=$row->social_facebook ;?>">
						<a rel="nofollow" href='http://www.facebook.com/<?=$row->social_facebook?>' target='_blank' class="input-group-addon" style="background: #3B5998;
	  color: #fff; border:1px solid #3B5998;">เพิ่มเพื่อน</a>
			</div>	
		<?elseif($row->social_twitter != ""):?>
			<div class="input-group col-md-7 col-xs-12" style="margin-bottom: 5px;">
				<span class="input-group-addon">Twitter</span>
				<input type="text" class="form-control" value="<?=$row->social_twitter ;?>">
						<a rel="nofollow" href='http://twitter.com/<?=$row->social_twitter?>' target='_blank' class="input-group-addon" style="background: #2AA9DF;
	  color: #fff; border:1px solid #2AA9DF;">เพิ่มเพื่อน</a>
			</div>	
		<?elseif($row->social_instagram != ""):?>
			<div class="input-group col-md-7 col-xs-12" style="margin-bottom: 5px;">
				<span class="input-group-addon">Twitter</span>
				<input type="text" class="form-control" value="<?=$row->social_instagram ;?>">
						<a rel="nofollow" href='http://www.instagram.com/<?=$row->social_instagram?>' target='_blank' class="input-group-addon" style="background: #6A453B;
	  color: #fff; border:1px solid #6A453B;">เพิ่มเพื่อน</a>
			</div>	
		<?elseif($row->social_beetalk != ""):?>
			<div class="input-group col-md-7 col-xs-12" style="margin-bottom: 5px;">
				<span class="input-group-addon">BeeTalk</span>
				<input type="text" class="form-control" value="<?=$row->social_beetalk ;?>">
						<a rel="nofollow" href='javascript:void(0)' class="input-group-addon" style="background: #E9AA26;
	  color: #fff; border:1px solid #E9AA26;">เพิ่มเพื่อน</a>
			</div>	
		<?endif;?>
	<?endif;?>
	
    <div class="social-data pull-left">
      <?if($row->social_line != ""){ echo'<a rel="nofollow" href="javascript:void(0)" target="_blank" onclick="location.href=\'http://line.me/ti/p/~'.$row->social_line.'\'"><img class="social-icon" src="themes/addfriend/images/line-icon.png"></a>'; }?>
      <?if($row->social_facebook != ""){ echo"<a rel='nofollow' href='https://www.facebook.com/".$row->social_facebook."' target='_blank'><img class='social-icon' src='themes/addfriend/images/facebook-icon.png'></a>"; }?>
      <?if($row->social_twitter != ""){ echo"<a rel='nofollow' href='https://twitter.com/".$row->social_twitter."' target='_blank'><img class='social-icon' src='themes/addfriend/images/twitter-icon.png'></a>"; }?>
      <?if($row->social_instagram != ""){ echo"<a rel='nofollow' href='https://www.instagram.com/".$row->social_instagram."' target='_blank'><img class='social-icon' src='themes/addfriend/images/instagram-icon.png'></a>"; }?>
      <?if($row->social_beetalk != ""){ echo"<img class='social-icon' src='themes/addfriend/images/beetalk-icon.png'>"; }?>
    </div>
    </div>
    <div style="clear: both;"></div>
</div>
<div style="clear: both;"></div>
</li>
<?endforeach;?>

<div style="clear: both;"></div>
<?=$pagination?>
</ul>

<hr>