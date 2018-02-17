</div><!-- #wrapper -->

<?php echo script_tag('assets/js/jquery.min.js');?>
<?php echo script_tag('assets/js/bootstrap.min.js');?>
<?php echo script_tag('assets/js/bootstrap.validator.min.js');?>
<?php echo script_tag('assets/js/bootstrap.datepicker.min.js');?>
<?php echo script_tag('assets/js/bootstrap.datepicker.th.min.js');?>
<?php echo script_tag('assets/js/common.js');?>

<?php echo script_tag('assets/admin/js/tinymce/tinymce.js');?>
<!-- <?php echo script_tag('assets/admin/js/pnotify.min.js');?> -->
<?php echo script_tag('assets/admin/js/jquery.metisMenu.js');?>
<?php echo script_tag('assets/admin/js/morris/raphael-2.1.0.min.js');?>
<?php echo script_tag('assets/admin/js/morris/morris.js');?>
<?php echo script_tag('assets/admin/js/dataTables/jquery.dataTables.js');?>
<?php echo script_tag('assets/admin/js/dataTables/dataTables.bootstrap.js');?>

<script type="text/javascript">
$(document).ready(function() {
  $('.datepicker').datepicker({
    language: 'th',
    format: 'dd/mm/yyyy',
    todayHighlight: 'true'
  });
  $('.datatable').dataTable({ 'pageLength':50 });
  <?php if ( ! $this->uri->segment(4)) : ?>
    localStorage.clear();
  <?php endif; ?>
  $('a[data-toggle="tab"]').on('show.bs.tab',function(e) {
    localStorage.setItem('activeTab',$(e.target).attr('href'));
  });
  var activeTab = localStorage.getItem('activeTab');
  if (activeTab) { $('[role="tablist"] a[href="' + activeTab + '"]').tab('show'); }
});
tinymce.init({
  selector: '.textarea',
  menubar: false,
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | table | bullist numlist outdent indent | link image',
  image_advtab: true
 });

 // PNotify.prototype.options.styling = "bootstrap3";
 // PNotify.desktop.permission();
 // function notifyRequest(message) {
 //   if (message) {
 //     new PNotify({
 //       title: 'register Title',
 //       text: 'Your form as been submitted'
 //     });
 //   }
 // }
 // notifyRequest();

 var display = $('.timer');
 var sec = display.data('left');
 var timer = setInterval(function() {
   display.text(sec--);
   if (sec == -1) {
     location.reload();
   }
 }, 1000);

 (function($) {
   $.extend({
     playSound: function(){
       return $(
         '<audio autoplay="autoplay" style="display:none;">'
         + '<source src="' + arguments[0] + '.mp3" />'
         + '<source src="' + arguments[0] + '.ogg" />'
         + '<embed src="' + arguments[0] + '.mp3" hidden="true" autostart="true" loop="false" class="playSound" />'
         + '</audio>'
       ).appendTo('body');
     }
   });
 }(jQuery));

 <?php if ($this->session->flashdata('notification')) { ?>
   $.playSound("<?php echo base_url('sounds/notif2'); ?>");
 <?php } ?>
</script>

<?php echo script_tag('assets/admin/js/custom.js');?>

</body>
</html>
