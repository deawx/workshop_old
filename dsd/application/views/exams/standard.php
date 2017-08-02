<div class="well well-sm">
  <ul class="nav nav-pills">
    <li role="presentation" class="active">
      <a href="#"><span class="badge">1</span></a>
    </li>
    <li role="presentation" class="">
      <a href="#"><span class="badge">2</span></a>
    </li>
    <li role="presentation" class="">
      <a href="#"><span class="badge">3</span></a>
    </li>
    <li role="presentation" class="">
      <a href="#"><span class="badge">4</span></a>
    </li>
  </ul>
</div>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">
      <small></small>
    </h3>
  </div>
  <?php echo form_open(uri_string(),array('name'=>'standard','class'=>'form-horizontal'));?>
  <?php echo form_hidden('id', $user['id']);?>
  <div class="panel-body">
    <?php $this->load->view('exams/_standard_'.$step); ?>
  </div>
  <div class="panel-footer">
    <nav aria-label="">
      <ul class="pager">
        <?php if ($prev > 0) : ?>
          <li class="previous">
            <a href="<?=site_url('account/exams/standard/'.$prev);?>" id="prev">
              <span aria-hidden="true">&larr;</span> ก่อนหน้า
            </a>
          </li>
        <?php endif; ?>
        <?php if ($next < 4) : ?>
          <li class="next">
            <a href="<?=site_url('account/exams/standard/'.$next);?>" id="next" onclick="document.forms['standard'].submit();">
              ถัดไป <span aria-hidden="true">&rarr;</span>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php $this->load->view('_partials/messages'); ?>
  </div>
  <?php echo form_close();?>
</div>

<!-- onclick="document.forms['name_of_your_form'].submit();" -->
<script type="text/javascript">
$(document).ready(function(){
  var form = $('form');
  var data = form.serialize();
  var submit = $('#next');
  // submit.on('click',function(){
  //   var url = form.attr('action');
  //   $.post(url,{
  //     data: data
  //   })
  //   .done(function(r){
  //     var rs = jQuery.parseJSON(r);
  //     console.log(r);
  //     console.log(rs);
  //   });
  // });
});
</script>
