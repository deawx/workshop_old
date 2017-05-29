// JavaScript Document
$(document).ready(function(){
$("#id_bc").change(function(){
 			$("#brandname").empty();
			$("#insured").empty();
			$.ajax({
			  url: "getdata.php",//ที่อยู่ของไฟล์เป้าหมาย
			  global: false,
			  type: "GET",//รูปแบบข้อมูลที่จะส่ง
			  data: ({ID : $(this).val(),TYPE : "id_g"}), //ข้อมูลที่ส่ง  { ชื่อตัวแปร : ค่าตัวแปร }
			  dataType: "JSON", //รูปแบบข้อมูลที่ส่งกลับ xml,script,json,jsonp,text
			  async:false,
			  success: function(jd) { //แสดงข้อมูลเมื่อทำงานเสร็จ โดยใช้ each ของ jQuery
							var opt="<option value=\"\" selected=\"selected\">-----เลือกรุ่นรถ-------------</option>";
							$.each(jd, function(key, val){
								opt +="<option value='"+ val["id"] +"'>"+val["genname"]+"</option>"
    						});
							$("#id_g").html( opt );//เพิ่มค่าลงใน Select ของอำเภอ
							$("#id_g2").html( opt );//เพิ่มค่าลงใน Select ของอำเภอ
							$("#id_g3").html( opt );//เพิ่มค่าลงใน Select ของอำเภอ
							$("#id_g4").html( opt );//เพิ่มค่าลงใน Select ของอำเภอ
							$("#id_g5").html( opt );//เพิ่มค่าลงใน Select ของอำเภอ
		   	  }
		});
		// $("#SubID").val($("#Subdistrict").val());
	});

 	$("#id_g").change(function(){
		$("#insured").empty();
		$.ajax({
			  url: "getdata.php",
			  type: "GET",
			  data: ({TYPE : "year"}),
			  dataType: "JSON",
			  success: function(jd) {

							$("#year").html( opt );
		   	  }
		 });
		// $("#SubID").val($("#Subdistrict").val());
	});

	$("#year").change(function(){
		$.ajax({
			  url: "getdata.php",
			  type: "GET",
			  data: ({ID : $("#id_g").val(),TYPE : "insured",YEAR : $("#year").val()}),
			  dataType: "JSON",
			  success: function(jd) {
							var opt="<option value=\"\" selected=\"selected\">--เลือกทุนประกัน--</option>";
							$.each(jd, function(key, val){
								opt +="<option value='"+ val["insured"] +"'>"+val["insured"]+"</option>"
    						});
							$("#insured").html( opt );
		   	  }
		 });
		// $("#SubID").val($("#Subdistrict").val());
	});

});


//ส่วนของ function เพื่อเพิ่มข้อมูลจังหวัดเข้าไปก่อน
function Add(){
		$("#id_bc2").empty();
		$("#brandname").empty();
		$("#insured").empty();
		$.ajax({
			  url: "getdata.php",
			  global: false,
			  type: "GET",
			  data: ({TYPE : "id_bc"}),
			  dataType: "JSON",
			  async:false,
			  success: function(jd) {
							var opt;
								if($("#id_bc2").val()=='')
							  	opt="<option value=\"\" selected=\"selected\">-----เลือกยี่ห้อรถ-------------</option>";
								else
								opt="<option value=\""+$("#id_bc2").val()+"\" selected=\"selected\">"+$("#brandname").val();+"</option>";

							$.each(jd, function(key, val){
								opt +="<option value='"+ val["id_bc"] +"'>"+val["brandname"]+"</option>"
    						});
							$("#id_bc").html( opt );
		   	  }
		});
}
