<div class="row">
  <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal')); ?>
  <?php echo form_hidden('user_id',$patient['id']); ?>
  <div class="col-md-8">
    <div class="box box-info">
      <div class="box-header">  <h3 class="box-title">Patient Details</h3> </div>
      <div class="box-body">
        <div class="list-group-item">
          <h4 class="list-group-item-heading">
            <?php echo $patient['title'].nbs().$patient['firstname'].nbs().$patient['lastname']?>
            <small class="text-primary">(H.N. : <?php echo $patient['hn']; ?>)</small>
            <small class="pull-right"><?php echo $patient['types']; ?> - <?php echo $patient['groups']; ?></small>
          </h4>
          <p class="list-group-item-text">
            <dl class="dl-horizontal">
              <dt>id card:</dt>
              <dd><?php echo $patient['id_card']; ?></dd>
              <dt>address:</dt>
              <dd><?php echo $patient['age']; ?></dd>
              <dt>created:</dt>
              <dd><?php echo $patient['created']; ?></dd>
            </dl>
          </p>
        </div>
      </div>
      <div class="box-footer clearfix"></div>
    </div>

    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#tab_1-1" data-toggle="tab">Tab 1</a></li>
        <li><a href="#tab_2-2" data-toggle="tab">Tab 2</a></li>
        <li><a href="#tab_3-2" data-toggle="tab">Tab 3</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1-1">
          <div class="form-group">
            <?php echo form_label('result of:','result',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-10">
              <div class="radio-inline">
                <label><?php echo form_radio(array('name'=>'result','class'=>'form-control'),'',TRUE); ?>normal</label>
                <p class="help-block"></p>
              </div>
              <div class="radio-inline">
                <label><?php echo form_radio(array('name'=>'result','class'=>'form-control'),''); ?>polyp</label>
                <p class="help-block"></p>
              </div>
              <div class="radio-inline">
                <label><?php echo form_radio(array('name'=>'result','class'=>'form-control'),''); ?>tumor</label>
                <p class="help-block"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <?php echo form_label('upload file(s):','file',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <a href="#" data-toggle="modal" data-target="#fileupload">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                </div>
              </a>
            </div>
          </div>
          <hr>
          <div class="well">
          </div>
        </div>
        <div class="tab-pane" id="tab_2-2">
          The European languages are members of the same family. Their separate existence is a myth.
          For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
          in their grammar, their pronunciation and their most common words. Everyone realizes why a
          new common language would be desirable: one could refuse to pay expensive translators. To
          achieve this, it would be necessary to have uniform grammar, pronunciation and more common
          words. If several languages coalesce, the grammar of the resulting language is more simple
          and regular than that of the individual languages.
        </div>
        <div class="tab-pane" id="tab_3-2">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
          when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          It has survived not only five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
          sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
          like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header"></div>
      <div class="box-body">
        <h4><i class="fa fa-info-circle"></i> message(s)</h4><hr>
        <?php echo $this->session->flashdata('message'); ?>
        <h4><i class="fa fa-info-circle"></i> file attachment(s)</h4><hr>
        <p class="" id=""></p>
      </div>
      <div class="box-footer clearfix">
        <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
        <span class="pull-right">
          <?=form_submit('','Submit',array('class'=>'btn btn-success',''=>'','autocomplete'=>'off'));?>
        </span>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<div class="modal fade" id="fileupload" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id=""></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
