<div class="col-md-8 col-xs-12">
  	<div>
      <img class="img-responsive" data-src="holder.js/120x120" alt="120x120" src="<?=check_image_url($rs->image,$rs->facebook_id)?>" style="margin:0 auto;">
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
      <?if($rs->line != ""):?>
      <tr>
        <th>
          LINE ID
        </th>
        <td>
          <?=$rs->line?>
        </td>
        <td>
          <a href="javascript:void(0)" onclick="location.href='http://line.me/ti/p/~<?=$rs->line?>'"><img class="social-icon" src="themes/addfriend/images/line-icon.png"></a>
        </td>
      </tr>
      <?endif;?>
      <?if($rs->facebook != ""):?>
      <tr>
        <th>
          Facebook
        </th>
        <td>
          <?=$rs->facebook?>
        </td>
        <td>
          <a href='https://www.facebook.com/<?=$rs->facebook?>' target='_blank'><img class='social-icon' src='themes/addfriend/images/facebook-icon.png'></a>
        </td>
      </tr>
      <?endif;?>
      <?if($rs->twitter != ""):?>
      <tr>
        <th>
          Twitter
        </th>
        <td>
          <?=$rs->twitter?>
        </td>
        <td>
          <a href='https://twitter.com/<?=$rs->twitter?>' target='_blank'><img class='social-icon' src='themes/addfriend/images/twitter-icon.png'></a>
        </td>
      </tr>
      <?endif;?>
      <?if($rs->instagram != ""):?>
      <tr>
        <th>
          instagram
        </th>
        <td>
          <?=$rs->instagram?>
        </td>
        <td>
          <a href='https://www.instagram.com/<?=$rs->instagram?>' target='_blank'><img class='social-icon' src='themes/addfriend/images/instagram-icon.png'></a>
        </td>
      </tr>
      <?endif;?>
      </tbody>
    </table>
</div>
