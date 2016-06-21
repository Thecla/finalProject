
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit form</title>
<link type="text/css" media="all" rel="stylesheet" href="style.css">
</head>

<body>
<?php 
  if(isset($_GET['id']))
  {
  $id=$_GET['id'];
  $getselect=mysqli_query("SELECT * FROM patient WHERE patient_id='$id'");
  while($profile=mysqli_fetch_array($getselect))
  {
    $patient_name=$profile['patient_name'];
    $email=$profile['patient_email'];
    $patient_address=$profile['patient_address'];
	$patient_mobile=$profile['patient_mobile'];
    $patient_sex=$profile['patient_sex'];
	$patient_dob=$profile['patient_dob'];
    $patient_blood_group=$profile['patient_blood_group'];
?>
<div class="display">
  <form action="" method="post" name="insertform">
    <p>
      <label for="name"  id="preinput"> USER NAME : </label>
      <input type="text" name="patient_name" required  
      value="<?php echo $patient_name; ?>" id="inputid" />
    </p>
    <p>
      <label  for="email"  id="preinput"> EMAIL ID : </label>
      <input type="email" name="patient_mail" 
      value="<?php echo $patient_email; ?>" id="inputid" />
    </p>
    <p>
      <label for="mobile" id="preinput"> MOBILE NUMBER : </label>
      <input type="text" name="patient_mobile"  
      value="<?php echo $patient_mobile; ?>" id="inputid" />
    </p>
    <p>
      <input type="submit" name="update" value="Update" id="inputid1" />
    </p>
  </form>
</div>
<?php } } ?>
</body>
</html>

