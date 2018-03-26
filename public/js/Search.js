

// ผู้ดูแลระบบค้นหารายชื่อผู้ดูแลระบบ
$(document).ready(function(){
 $("#myInputadmin").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTableadmin tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});
 // ผู้ดูแลระบบค้นหารายชื่อศิษย์เก่า
$(document).ready(function(){
  $("#myInputmember").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTablemember tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

// ผู้ดูแลระบบค้นหารายชื่อศิษย์เก่าที่ทำการลงทะเบียนไว้แล้วยังไม่ได้ทำการอนุมัติ
$(document).ready(function(){
 $("#myInputunconfirm").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTableunconfirm tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});

// ผู้ดูแลระบบค้นหาข่าวสารทั้งหมด
$(document).ready(function(){
 $("#myInputallnews").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTableallnews tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});

// ผู้ดูแลระบบและศิษย์เก่าที่ลงทะเบียนเข้าสู่ระบบค้นหาข่าวสารเฉพาะของตนเอง
$(document).ready(function(){
 $("#myInputmenews").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTablemenews tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});

// ผู้ดูแลระบบค้นหากระทู้ทั้งหมด
$(document).ready(function(){
 $("#myInputallblog").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTableallblog tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});

// ้ดูแลระบบและศิษย์เก่าที่ลงทะเบียนเข้าสู่ระบบค้นหากระทู้เฉพาะของตนเอง
$(document).ready(function(){
 $("#myInputmeblog").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTablemeblog tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});
