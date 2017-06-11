<ul class="nav nav-pills" style="margin:0px;">
  <li class="<?php echo ( ! $this->input->get('view') OR $this->input->get('view') === 'info') ? 'active' : ''; ?>">
    <?php echo anchor(uri_string().'?view=info','information'); ?>
  </li>
  <li class="<?php echo ($this->input->get('view') === 'filtered') ? 'active' : ''; ?>">
    <?php echo anchor(uri_string().'?view=filtered','filtered details'); ?>
  </li>
  <li class="<?php echo ($this->input->get('view') === 'family') ? 'active' : ''; ?>">
    <?php echo anchor(uri_string().'?view=family','family details'); ?>
  </li>
  <li class="<?php echo ($this->input->get('view') === 'labs') ? 'active' : ''; ?>">
    <?php echo anchor(uri_string().'?view=labs','labs report'); ?>
  </li>
  <li class="<?php echo ($this->input->get('view') === 'clinic') ? 'active' : ''; ?>">
    <?php echo anchor(uri_string().'?view=clinic','clinic report'); ?>
  </li>
</ul>
