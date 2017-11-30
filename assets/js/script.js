$(document).ready(function(){
 $('#add_button').click(function(){
  $('#product_form')[0].reset();
  $('.modal-title').text("Add product");
  $('#action').val("Add");
  $('#operation').val("Add");
  $('#product_uploaded_image').html('');
 });

 var dataTable = $('#product_data').DataTable({
  "rowReorder": true,
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3],
   },
  ],
 });
 
 $(document).on('submit', '#product_form', function(event){
  event.preventDefault();
  var description = $('#description').val();
  var extension = $('#product_image').val().split('.').pop().toLowerCase();
  if(extension != '')
  {
   if(jQuery.inArray(extension, ['gif','png','jpg']) == -1)
   {
    alert("Invalid Image File. Only extension allowed: gif, png and jpg");
    $('#product_image').val('');
    return false;
   }
  }
  if(description != '')
  {
   $.ajax({
    url:"insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#product_form')[0].reset();
     $('#productModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   alert("Field are required");
  }
 });

 $(document).on('click', '.update', function(){
  var product_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{product_id:product_id},
   dataType:"json",
   success:function(data)
   {
    $('#productModal').modal('show');
    $('#description').val(data.description);
    $('.modal-title').text("Edit product");
    $('#product_id').val(product_id);
    $('#product_uploaded_image').html(data.product_image);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });

 $(document).on('click', '.delete', function(){
  var product_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{product_id:product_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false;
  }
 });


});
