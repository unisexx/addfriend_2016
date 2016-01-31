<link href="media/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- <link href="http://bootswatch.com/paper/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="media/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="media/bootstrap-social-gh-pages/bootstrap-social.css" rel="stylesheet" type="text/css">
<link href="themes/addfriend/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="media/js/jquery_2_0_3.min.js"></script>
<script type="text/javascript" src="media/bootstrap-3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="media/js/holder/holder.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11835891-7', 'auto');
  ga('send', 'pageview');

</script>

<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	
	// ปุ่มแจ่ม
    $('.btn-jam').click(function(){
       var $this = $(this);
       var counter = parseInt($this.next('.jam-counter').text())+1;
       if ( $this.is('.disable') ) {
	   }else{
			$this.removeClass( "btn-primary" ).addClass( "btn-danger disable" );
       		$.post('home/vote',{'user_id' : $this.closest('.btn-group').find('input[name=user_id]').val()
       		},function(data){
       			if(data == 'yes'){
       				$this.closest('.btn-group').find('.jam-counter').html(counter);
       			}
       		});
	   }
    });
});
</script>