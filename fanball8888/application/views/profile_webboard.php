<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
<?php $this->load->view('partials/menubar'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-4" style="padding:0.1em;"> <?php $this->load->view('partials/sidebar'); ?> </div>
		<div class="col-sm-8" style="padding:0.1em;">
			<div class="panel panel-info">
			  <div class="panel-body">
					<legend> <?php echo lang('form_legend_webboard'); ?> </legend>
          <table class='table table-bordered table-striped table-hover' style="font-size:1em;">
						<thead>
							<tr class="alert alert-info">
								<th class="text-center">หัวข้อ</th>
								<th class="text-center">สถานะ</th>
							</tr>
						</thead>
						<?php foreach ($webboards as $w) : ?>
							<tbody>
								<tr>
									<td><?php echo anchor_popup('webboard/view_topic/'.$w['id'],$w['title']); ?></td>
                  <td>
                    <?php $status = ($w['status'] === '0')
                      ? 'รออนุมัติ'
                        : (($w['status'] === '2')
                          ? 'ปิดใช้งาน'
                          : (($w['status'] === '3')
                            ? 'ปักหมุด'
                            : 'เปิดใช้งาน'
                          ));
                      echo $status; ?>
                  </td>
								</tr>
							</tbody>
						<?php endforeach; ?>
					</table>
			  </div>
				<div class="panel-footer">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
