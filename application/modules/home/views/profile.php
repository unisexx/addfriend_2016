<div class="col-md-8 col-xs-12">
  	<div>
      <img class="img-responsive" data-src="holder.js/120x120" alt="120x120" src="<?=check_image_url($rs->image,$rs->facebook_id,$rs->google_picture_link,"original")?>" style="margin:0 auto;">
    </div>
    <div class="text-center">
      <h1><?=$rs->display_name?></h1>
      <span class="label label-green"><?php echo $rs->age; ?></span>
  		<span class="label" style="background: <?php echo $rs->sex->color; ?>"><?php echo $rs->sex->title ?></span>
  		<span class="label label-warning"><?php echo $rs->province->name; ?></span>
      <div class="fdetail"><?=$rs->detail?></div>
    </div><br>
    <table class="table table-striped">
      <thead>
      <tr>
        <th>
          โซเชียล
        </th>
        <th>
          ไอดีหรือยูสเซอร์เนม
        </th>
        <th>
          ลิ้งค์
        </th>
      </tr>
      </thead>
      <tbody>
      <?if($rs->social_line != ""):?>
      <tr>
        <th>
          LINE ID
        </th>
        <td>
          <?=$rs->social_line?>
        </td>
        <td>
          <a href="javascript:void(0)" onclick="location.href='http://line.me/ti/p/~<?=$rs->social_line?>'"><img class="social-icon" src="themes/addfriend/images/line-icon.png"></a>
        </td>
      </tr>
      <?endif;?>
      <?if($rs->social_facebook != ""):?>
      <tr>
        <th>
          Facebook
        </th>
        <td>
          <?=$rs->social_facebook?>
        </td>
        <td>
          <a href='https://www.facebook.com/<?=$rs->social_facebook?>' target='_blank'><img class='social-icon' src='themes/addfriend/images/facebook-icon.png'></a>
        </td>
      </tr>
      <?endif;?>
      <?if($rs->social_twitter != ""):?>
      <tr>
        <th>
          Twitter
        </th>
        <td>
          <?=$rs->social_twitter?>
        </td>
        <td>
          <a href='https://twitter.com/<?=$rs->social_twitter?>' target='_blank'><img class='social-icon' src='themes/addfriend/images/twitter-icon.png'></a>
        </td>
      </tr>
      <?endif;?>
      <?if($rs->social_instagram != ""):?>
      <tr>
        <th>
          instagram
        </th>
        <td>
          <?=$rs->social_instagram?>
        </td>
        <td>
          <a href='https://www.instagram.com/<?=$rs->social_instagram?>' target='_blank'><img class='social-icon' src='themes/addfriend/images/instagram-icon.png'></a>
        </td>
      </tr>
      <?endif;?>
      </tbody>
    </table>
</div>

<div class="col-md-4 col-xs-12">
	<?=modules::run('home/inc_sidebar'); ?>
</div>
