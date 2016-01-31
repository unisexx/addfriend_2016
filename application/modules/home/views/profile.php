<div class="col-md-2 col-xs-12">
	<span>
		คนนี้แจ่มกดไลค์เลย <i class="fa fa-heart" style="color:#ea4c89;"></i>
		<iframe src="//www.facebook.com/plugins/like.php?href=http://www.addfriend.in.th/home/profile/<?=$rs->id?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21&amp;appId=532330300263938" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; margin-top: 0; width: 100px;  vertical-align: middle;" allowTransparency="true"></iframe> 
	</span>
	<hr>
</div>
<div class="col-md-6 col-xs-12">
	<div class="profileCard">
	  	<div>
	      <img class="img-responsive" data-src="holder.js/120x120" alt="120x120" src="<?=check_image_url($rs->image,$rs->facebook_id,$rs->google_picture_link,"original")?>" style="margin:0 auto; max-width: 200px;">
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
	          <a rel="nofollow" href="javascript:void(0)" onclick="location.href='http://line.me/ti/p/~<?=$rs->social_line?>'"><img class="social-icon" src="themes/addfriend/images/line-icon.png"></a>
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
	          <a rel="nofollow" href='https://www.facebook.com/<?=$rs->social_facebook?>' target='_blank'><img class='social-icon' src='themes/addfriend/images/facebook-icon.png'></a>
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
	          <a rel="nofollow" href='https://twitter.com/<?=$rs->social_twitter?>' target='_blank'><img class='social-icon' src='themes/addfriend/images/twitter-icon.png'></a>
	        </td>
	      </tr>
	      <?endif;?>
	      <?if($rs->social_instagram != ""):?>
	      <tr>
	        <th>
	          Instagram
	        </th>
	        <td>
	          <?=$rs->social_instagram?>
	        </td>
	        <td>
	          <a rel="nofollow" href='https://www.instagram.com/<?=$rs->social_instagram?>' target='_blank'><img class='social-icon' src='themes/addfriend/images/instagram-icon.png'></a>
	        </td>
	      </tr>
	      <?endif;?>
	      <?if($rs->social_beetalk != ""):?>
	      <tr>
	        <th>
	          BeeTalk
	        </th>
	        <td>
	          <?=$rs->social_beetalk?>
	        </td>
	        <td>
	          <img class='social-icon' src='themes/addfriend/images/beetalk-icon.png'>
	        </td>
	      </tr>
	      <?endif;?>
	      </tbody>
	    </table>
	</div>
<hr>

<div>
<style>
ul.share-buttons{
  list-style: none;
  padding: 0;
}

ul.share-buttons li{
  display: inline;
}
ul.share-buttons li a{height:30px; width:30px;box-shadow: none;}
</style>
<span>เก็บไว้คนเดียวไม่ไหว แชร์ให้เพื่อนเลย : </span>
<ul class="share-buttons">
  <li><a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.addfriend.in.th&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><span class="fa fa-facebook"></span></a></li>
  <li><a class="btn btn-social-icon btn-twitter" href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fwww.addfriend.in.th&text=:%20http%3A%2F%2Fwww.addfriend.in.th&via=ratasak" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><span class="fa fa-twitter"></span></a></li>
  <li><a class="btn btn-social-icon btn-google" href="https://plus.google.com/share?url=http%3A%2F%2Fwww.addfriend.in.th" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><span class="fa fa-google-plus"></span></a></li>
  <li>
	<span>
	<script type="text/javascript" src="//media.line.me/js/line-button.js?v=20140411" ></script>
	<script type="text/javascript">
	new media_line_me.LineButton({"pc":true,"lang":"en","type":"c"});
	</script>
	</span>
  </li>
</ul>
<div style="clear:both;"></div>
</div>
<hr>

<div class="fb-comments" data-href="http://www.addfriend.in.th/home/profile/<?=$rs->id?>" data-width="100%" data-numposts="5"></div>
</div>
<div class="col-md-4 col-xs-12">
	<?=modules::run('home/inc_sidebar'); ?>
</div>
