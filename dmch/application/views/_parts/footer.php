<!-- Bootstrap Core JavaScript -->
<?=script_tag('assets/js/jquery.min.js');?>
<?=script_tag('assets/js/bootstrap.min.js');?>
<?php foreach ($script_tag as $_s) : echo $_s; endforeach; ?>

<!-- jQuery -->
<script type="text/javascript">
$(document).ready(function(){
  <?php foreach($script_jq as $_jq) { echo $_jq; };?>
});
<?php foreach($script_js as $_js) { echo $_js; };?>
</script>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Project Thai Mother and Child Health : 2015</p>
        </div>
    </div>
  </div>
  <!-- /.row -->
</footer>
