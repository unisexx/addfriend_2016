<div class="col-xs-12">
	<fieldset>
  		<legend>จัดการแบนเนอร์</legend>
  		<table class="table table-bordered">
  			<tr>
  				<th>สถานะ</th>
  				<th>หมดอายุ</th>
  				<th>รูปแบนเนอร์</th>
  				<th>url</th>
  				<th>อีแมล์</th>
  				<th><a class="btn btn-primary" href="home/banner_form">เพิ่มรายการ</a></th>
  			</tr>
  			<?foreach($rs as $row):?>
  			<tr>
  				<td></td>
  				<td><?php echo DB2Date($row->end_date)?></td>
  				<td><img src="<?php echo $row->image;?>"></td>
  				<td><?php echo $row->url;?></td>
  				<td><?php echo $row->email;?></td>
  				<td>
  					<a class="btn btn-info" href="home/banner_form/<?php echo $row->id?>">แก้ไข</a> 
  					<a class="btn btn-danger" href="home/banner_delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
  				</td>
  			</tr>
  			<?endforeach;?>
  		</table>
  	</fieldset>
</div>