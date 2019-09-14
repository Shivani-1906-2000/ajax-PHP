<?php
include "config/config.php";
extract($_POST);
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']))
{
    $query="INSERT INTO `form`(`firstname`, `lastname`, `email`, `mobile`) VALUES ('$firstname','$lastname','$email','$mobile')";

    mysqli_query($conn,$query);
}





// code for fetching data
if(isset($_POST['readrecord']))
{
    $output='<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>';

  
  $fetch="SELECT * FROM form";
 
  $fire=mysqli_query($conn,$fetch);
  if(mysqli_num_rows($fire)>0)
  {
      $number=1;
  while($row=mysqli_fetch_array($fire))
{
    $output.='<tr>
    <td>'.$number.'</td>
    <td>'.$row['firstname'].'</td>
    <td>'.$row['lastname'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['mobile'].'</td>
    <td> <button onclick="getuserdetails('.$row['id'].')" class="btn btn-warning"> EDIT </button> </td>
    <td> <button onclick="deleteuser('.$row['id'].')" class="btn btn-warning"> DELETE </button> </td>
    </tr>';
    $number++;
}
  }
$output.='</table>';
echo $output;
}






// code for delteing data
if(isset($_POST['deleteid']))
{
$userid=$_POST['deleteid'];
$delete="DELETE FROM `form` WHERE id=$userid";
mysqli_query($conn,$delete);
}







// get user id for updates
if(isset($_POST['updateid']) && isset($_POST['updateid'])!="")
{
$userid=$_POST['updateid'];
$query="SELECT * FROM `form` where id=$userid";
$result=mysqli_query($conn,$query);
$response=array();
if($result==true)
{
if(mysqli_num_rows($result)>0)
{
  while($row=mysqli_fetch_array($result))
  {
$response=$row;
  }
}
}
echo json_encode($response);
}

if(isset($_POST['hiddenuserid']))
{
  $hidden=$_POST['hiddenuserid'];
  $firstname=$_POST['firstname1'];
  $lastname=$_POST['lastname1'];
  $email=$_POST['email1'];
  $mobile=$_POST['mobile1'];
  $query="UPDATE `form` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`mobile`='$mobile' WHERE id=$hidden";
  mysqli_query($conn,$query);
}
?>