<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Patient Details</h3>
      </div>
      <div class="box-body" style="padding:2em;">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#d1" data-toggle="tab">information</a></li>
              <li><a href="#d2" data-toggle="tab">family details</a></li>
              <li><a href="#d3" data-toggle="tab">filtered details</a></li>
              <li><a href="#d4" data-toggle="tab">labs report</a></li>
              <li><a href="#d5" data-toggle="tab">clinic report</a></li>
            </ul>
          </div>
          <div class="col-md-9">
            <div class="tab-content">
              <div id="d1" class="tab-pane fade in active">
                <h3>HOME</h3>
                <?php print_data($patient); ?>
              </div>
              <div id="d2" class="tab-pane fade">
              </div>
              <div id="d3" class="tab-pane fade">
              </div>
              <div id="d4" class="tab-pane fade">
              </div>
              <div id="d5" class="tab-pane fade">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer clearfix"> </div>
    </div>
  </div>
</div>
