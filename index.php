<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal-bs3patch.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
</head>




<body>
<div class="container">
<h1 class="text-primary text-uppercase text-center">Agex Crud Operations</h1>

<div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodal">Open Modal</button>
</div>

<h2 class="text-danger">All Records</h2>

<div id="record_contents">

</div>

<!-- modal for add records-->
<div class="modal" id="mymodal" role="dialog">
<div class="modal-dialog">
<div class="modal-content bg-primary">
<div class="modal-header">
<h3 class="modal-title text-center text-light">Agex Crud Operations</h3>
<button class="close" data-dismiss="modal" type="button">&times;</button>
</div>
<div class="modal-body">
<div class="form-group" method="POST">
<label for="" class="text-light">First Name</label> <input type="text" id="firstname" placeholder="Firstname" class="form-control">
<label for="" class="text-light">Last Name</label> <input type="text" id="lastname" placeholder="Lastname" class="form-control">
<label for="" class="text-light">Email</label> <input type="email" id="email" placeholder="Email" class="form-control">
<label for="" class="text-light">Mobile</label> <input type="text" id="mobile" placeholder="Enter your mobile number" class="form-control">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addrecords()">Save</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>
</div>



<!-- modal for update records-->
<div class="modal" id="my_modal" role="dialog">
<div class="modal-dialog">
<div class="modal-content bg-primary">
<div class="modal-header">
<h3 class="modal-title text-center text-light">Update Your Details Here</h3>
<button class="close" data-dismiss="modal" type="button">&times;</button>
</div>
<div class="modal-body">
<div class="form-group" method="POST">
<label for="" class="text-light">First Name</label> <input type="text" id="update_firstname" placeholder="Firstname" class="form-control">
<label for="" class="text-light">Last Name</label> <input type="text" id="update_lastname" placeholder="Lastname" class="form-control">
<label for="" class="text-light">Email</label> <input type="email" id="update_email" placeholder="Email" class="form-control">
<label for="" class="text-light">Mobile</label> <input type="text" id="update_mobile" placeholder="Enter your mobile number" class="form-control">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="updaterecords()">Update</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="hidden" id="hidden_user_id">
</div>
</div>
</div>
</div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    
    
    <!-- jquery code starts here  -->
<script type="text/javascript">
$(document).ready()
{
    readrecords();
}
function addrecords(){
    var   firstname=$('#firstname').val();
       var lastname=$('#lastname').val();
        var email=$('#email').val();
        var mobile=$('#mobile').val();
    
$.ajax({
    url:"backend.php",
    type:"post",
    data:{
        firstname:firstname,
        lastname:lastname,
        email:email,
        mobile:mobile
    },
    success:function(data) {
       
        readrecords();
    }

});

}




function readrecords()
{
    var readrecord="readrecord";
    $.ajax({
    url:"backend.php",
    type:"post",
    data:{
        readrecord:readrecord
    },
    success:function(data,status) {
       $("#record_contents").html(data);
    }

})
}

//code to delete
function deleteuser(deleteid)
{
    x=confirm("are u sure you want to delete");
    if(x==true)
    {
        $.ajax({
    url:"backend.php",
    type:"post",
    data:{
        deleteid:deleteid
    },
    success:function(data,status) {
        readrecords();
    }

})
    }
}



function getuserdetails(updateid)
{
$("#hidden_user_id").val(updateid);
$.post('backend.php',
{
    updateid:updateid
},
function(data,status)
{
  var user=JSON.parse(data);
  $("#update_firstname").val(user.firstname);
  $("#update_lastname").val(user.lastname);
  $("#update_email").val(user.email);
  $("#update_mobile").val(user.mobile);
  $("#my_modal").modal("show");
})
}


function updaterecords()
{
  var firstname1=$("#update_firstname").val();
  var lastname1=$("#update_lastname").val();
  var email1=$("#update_email").val();
  var mobile1=$("#update_mobile").val();
  var hiddenuserid=$("#hidden_user_id").val();
  $.post('backend.php',
  {
      hiddenuserid:hiddenuserid,
      firstname1:firstname1,
     lastname1:lastname1,
      email1:email1,
      mobile1:mobile1
  },
  function(data,status)
  {
    $("#my_modal").modal("hide");
    readrecords();
  })
}








</script>
<!-- jquery code ends here -->






</body>
</html>