<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Frontend Exercise</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/rr-1.2.3/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/rr-1.2.3/datatables.min.js"></script>
  <script type="text/javascript" language="javascript" src="assets/js/script.js" ></script>
  <link rel="stylesheet" href="assets/css/style.css" />
 </head>
 <body>
   <div class="container box">
     <h1 align="center">CRUD SPA STORE</h1>
     <br />
     <div class="table-responsive">
      <br />
      <div align="right">
       <button type="button" id="add_button" data-toggle="modal" data-target="#productModal" class="btn btn-info btn-lg">Add new</button>
      </div>
      <br /><br />
      <table id="product_data" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th width="45%">Image</th>
         <th width="35%">Description</th>
         <th width="10%">Edit</th>
         <th width="10%">Delete</th>
        </tr>
       </thead>
      </table>

     </div>
    </div>
   </body>
  </html>


<div id="productModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="product_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add Product</h4>
    </div>
    <div class="modal-body">
     <label>Enter Description</label>
     <input type="text" name="description" id="description" required:"true" class="form-control" maxlength="300" placeholder="300 is the max numer of characters allowed" />
     <br />
     <label>Select Product Image</label>
     <input type="file" name="product_image" id="product_image" />
     <span id="product_uploaded_image"></span>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="product_id" id="product_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add new" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>
