<footer class="app-footer">
  <div class="container">
    <!-- © <?php echo date('Y'); ?> Copyright. -->
  </div>
</footer>
  <?php echo script_tag('assets/js/jquery.min.js');?>
  <?php echo script_tag('assets/js/bootstrap.min.js');?>
  <?php echo script_tag('assets/js/jquery.datatable.min.js');?>
  <?php echo script_tag('assets/js/bootstrap.datatable.min.js');?>
  <!-- <?php echo script_tag('assets/js/bootstrap.datepicker.min.js');?> -->
  <!-- <?php echo script_tag('assets/js/bootstrap.datepicker.th.min.js');?> -->
  <?php echo script_tag('assets/js/tinymce/tinymce.min.js');?>
  <?php echo script_tag('assets/js/common.js');?>

<script type="text/javascript">
tinymce.init({
  selector: 'textarea',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
$(document).ready(function(){});
$(function() {
  $('.list-group-item').on('click', function() {
    $('.glyphicon', this)
    .toggleClass('glyphicon-chevron-right')
    .toggleClass('glyphicon-chevron-down');
  });
});
</script>
</body>
</html>
