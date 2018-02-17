<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
		<div id="playerElement_wrapper" style="position: relative; display: inline-block; width: 100%; height: 500px;">
		  <a id="beforeswfanchor0"
		    href="#playerElement"
		    tabindex="-1"
		    title="Flash start"
		    style="border:0;clip:rect(0 0 0 0);display:block;height:1px;margin:-1px;outline:none;overflow:hidden;padding:0;position:absolute;width:1px;"></a>
		    <object type="application/x-shockwave-flash"
		      data="http://p.jwpcdn.com/6/9/jwplayer.flash.swf"
		      width="100%"
		      height="100%"
		      bgcolor="#000000"
		      id="playerElement"
		      name="playerElement"
		      class="jwswf swfPrev-beforeswfanchor0 swfNext-afterswfanchor0"
		      style="position: absolute;"
		      tabindex="0">
		      <param name="allowfullscreen" value="true">
		      <param name="allowscriptaccess" value="always">
		      <param name="seamlesstabbing" value="true">
		      <param name="wmode" value="opaque">
		    </object>
		  <a id="afterswfanchor0"
		    href="#playerElement"
		    tabindex="-1"
		    title="Flash end"
		    style="border:0;clip:rect(0 0 0 0);display:block;height:1px;margin:-1px;outline:none;overflow:hidden;padding:0;position:absolute;width:1px;"></a>
		  <div id="playerElement_aspect" style="display: block; margin-top: 56.25%;"></div>
		  <div id="playerElement_jwpsrv" style="position: absolute; top: 0px; z-index: 10;">
		    <div class="afs_ads" style="width: 1px; height: 1px; position: absolute; background: transparent;">&nbsp;</div>
		  </div>
		</div>
	</div><br>
</div>
<div class="container">
	<div class="row">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"></h3>
			</div>
			<div class="panel-body">
				<div class="col-lg-12">
					<h3 class="page-header">แฟนบอลทีวี</h3>
				</div>
				<?php foreach ($channels as $_c => $c) : ?>
					<div class="col-sm-4 col-md-3 col-lg-2">
						<div class="thumbnail" style="height:250px;">
							<a class="" href="<?php echo base_url('fanballtv/'.$c['id']); ?>">
								<?php echo img('assets/images/channel/'.$c['picture'],'',array('class'=>'img-responsive')); ?>
							</a>
							<div class="caption">
								<?php echo p($c['name']); ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="http://football.sodazaa.com/_jg3ulbhEeOEZxIxOQfUww.js"></script>
<script type="text/javascript">
jwplayer("playerElement").setup({
  playlist: [{ image: "<?php echo $channel['picture']; ?>", sources: [{ file: "<?php echo $channel['link']; ?>" }] }],
  rtmp: { bufferlength: 1 }, fallback: true, width:"100%", height:500, aspectratio: "16:9", stretching: "exactfit", autostart:true, primary: "html5"
});
</script>
<?php $this->load->view('partials/footer'); ?>
