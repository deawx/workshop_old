<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
		<div class='table-responsive'>
			<?php echo form_open('predict/save_predict'); ?>
			<?php echo form_hidden('predict_id',''); ?>
			<?php echo form_hidden('predict_team_id',''); ?>
		  <table class='table table-bordered table-hover table-condensed'>
		    <thead>
		      <tr class="alert alert-success">
		        <th colspan="8" class="h3 text-center">วันที่ </th>
		      </tr>
					<tr class="alert alert-info">
						<th class="text-center">เวลา</th>
						<th class="text-center">เหย้า</th>
						<th class="text-center">HDP !</th>
						<th class="text-center">เยือน</th>
                        <th class="text-center">O/U</th>
						<th class="text-center">Over</th>
                        <th class="text-center">Under !</th>
						<th class="text-center">หมายเหตุ</th>
					</tr>
		    </thead>
		    <tbody>

							<tr class="alert alert-warning">
								<td colspan="8" class="text-center"></td>
							</tr>
                            <?
							<tr>
                                <th class="text-center">เวลา</th>
                                <th class="text-center">เหย้า</th>
                                <th class="text-center">HDP !</th>
                                <th class="text-center">เยือน</th>
                                <th class="text-center">O/U</th>
                                <th class="text-center">Over</th>
                                <th class="text-center">Under !</th>
                                <th class="text-center">หมายเหตุ</th>
							</tr>

		    </tbody>
				<tfoot>
					<tr class="alert alert-info">
						<th class="text-center">เวลา</th>
						<th class="text-center">เหย้า</th>
						<th class="text-center">HDP !</th>
						<th class="text-center">เยือน</th>
                        <th class="text-center">O/U</th>
						<th class="text-center">Over</th>
                        <th class="text-center">Under !</th>
						<th class="text-center">หมายเหตุ</th>
					</tr>
					<tr class="alert alert-success">
						<th colspan="6" class="h3 text-center"> วันที่</th>
					</tr>
				</tfoot>
		  </table>

		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
