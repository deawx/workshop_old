<ul class="nav nav-pills" style="margin:0px;">
  <li class="<?php echo ($this->uri->segment(3) === 'info') ? 'active' : ''; ?>">
    <?php echo anchor('admin/patients/info/'.$this->uri->segment(4),'information'); ?>
  </li>
  <li class="<?php echo ($this->uri->segment(3) === 'filtered') ? 'active' : ''; ?>">
    <?php echo anchor('admin/patients/filtered/'.$this->uri->segment(4),'filtered details'); ?>
  </li>
  <li class="<?php echo ($this->uri->segment(3) === 'family') ? 'active' : ''; ?>">
    <?php echo anchor('admin/patients/family/'.$this->uri->segment(4),'family details'); ?>
  </li>
  <li class="<?php echo ($this->uri->segment(3) === 'labs') ? 'active' : ''; ?>">
    <?php echo anchor('admin/patients/labs/'.$this->uri->segment(4),'labs report'); ?>
  </li>
  <li class="<?php echo ($this->uri->segment(3) === 'clinic') ? 'active' : ''; ?>">
    <?php echo anchor('admin/patients/clinic/'.$this->uri->segment(4),'clinic report'); ?>
  </li>
</ul>
