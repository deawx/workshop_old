<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header"> <!-- <h3 class="box-title">Add Sample</h3> --> </div>
      <?php echo form_open(uri_string(),array('class'=>'form-horizontal')); ?>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <?php echo form_fieldset('Category send check'); ?>
          <div class="form-group">
            <?php echo form_label('case:','case',array('class'=>'control-label col-md-2')); ?>
            <div class="col-md-4">
              <?=form_dropdown(array('name'=>'case','class'=>'form-control','onchange'=>"window.location='add?case='+this.value"),array('inpatient'=>'INPATIENT','outpatient'=>'OUTPATIENT'),set_value('case',($this->input->get('case'))));?>
            </div>
          </div>
          <?php if ($this->input->get('case') === '' OR $this->input->get('case') === 'inpatient') : ?>
            <div class="form-group">
              <?php echo form_label('search for patient:','search',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4">
                  <?php echo form_input(array('name'=>'search','class'=>'form-control','placeholder'=>'search')); ?>
                </div>
              </div>
            <?php elseif ($this->input->get('case') === 'outpatient'): ?>
              <div class="form-group">
                <?php echo form_label('institution:','institution',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4">
                  <?php echo form_input(array('name'=>'institution','class'=>'form-control','placeholder'=>'institution')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('department:','department',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4">
                  <?php echo form_input(array('name'=>'department','class'=>'form-control','placeholder'=>'department')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label("sample's name:","sample's name",array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4">
                  <?php echo form_input(array('name'=>"sample's name",'class'=>'form-control','placeholder'=>"sample's name")); ?>
                </div>
              </div>
            <?php endif; ?>
            <hr>
            <div class="form-group">
              <?php echo form_label('blood:','blood',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <div class="input-group">
                  <?php echo form_input(array('name'=>'','class'=>'form-control','placeholder'=>'',''=>TRUE),set_value('')); ?>
                  <span class="input-group-addon">ml</span>
                </div>
              </div>
              <?php echo form_label("sample's code",'blood_code',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <?php echo form_input(array('name'=>'blood_code','class'=>'form-control','placeholder'=>'blood_code',''=>TRUE),set_value('')); ?>
              </div>
            </div>
            <div class="form-group">
              <?php echo form_label('fresh tissue:','fresh_tissue',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <?php
                $dropdown_tissue = array(
                  '' => '',
                  'normal' => 'normal',
                  'polyp' => 'polyp',
                  'tumor' => 'tumor'
                );
                echo form_dropdown(array('name'=>'fresh_tissue','class'=>'form-control'),$dropdown_tissue,set_value(''));
                ?>
              </div>
              <?php echo form_label("sample's code","fresh_tissue_code",array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <?php echo form_input(array('name'=>'fresh_tissue_code','class'=>'form-control','placeholder'=>'fresh_tissue_code',''=>TRUE),set_value('')); ?>
              </div>
            </div>
            <div class="col-md-6"> </div>
            <div class="form-group">
              <?php echo form_label("sample's code","ffpe",array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-4">
                <?php echo form_input(array('name'=>'ffpe','class'=>'form-control','placeholder'=>'ffpe',''=>TRUE),set_value('')); ?>
              </div>
            </div>
            <?php echo form_fieldset_close(); ?>
            <?php echo form_fieldset('Labs send check'); ?>
              <div class="form-group">
                <?php echo form_label('ihc:','ihc',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4">
                  <?php echo form_checkbox(array('name'=>'ihc','class'=>'form-control','placeholder'=>'ihc',''=>TRUE),set_value('')); ?>
                </div>
              </div>
              <div class="form-group">
                <?php echo form_label('fcc:','fcc',array('class'=>'control-label col-md-2')); ?>
                <div class="col-md-4">
                  <?php
                  $dropdown_fcc = array(
                  '' => '',
                  'fap' => 'fap',
                  'hnpcc' => 'hnpcc',
                  'pjs/jps' => 'pjs/jps'
                  );
                  echo form_dropdown(array('name'=>'fcc','class'=>'form-control'),$dropdown_fcc,set_value(''));
                  ?>
                </div>
              </div>
            <?php echo form_fieldset_close(); ?>
            <div class="form-group">
              <?php echo form_label('','',array('class'=>'control-label col-md-2')); ?>
              <div class="col-md-10">
                <?=anchor(uri_string(),'<i class="fa fa-refresh"></i>',array('class'=>'btn btn-default'));?>
                <?=form_submit('','Submit',array('class'=>'btn btn-success',''=>'','autocomplete'=>'off'));?>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
          <div class="box-footer clearfix"> </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  function goto() {
    document.location.href = $(this).val();
  }
  </script>
