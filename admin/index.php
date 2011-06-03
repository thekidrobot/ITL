<?php 
include('includes/header.php');
include('../functions/ps_pagination.php');

//This should be changed. 

if($_POST['add']!="")
$event='add';
switch($event)
{
 case'add':
 {
  //insert data into DB
  foreach($_POST as $key=>$value)
  {
   $$key=$value;
  }
 
  $query="insert into staff
  (f_name,l_name,email,username,pwd,address,status,jobtitle)
  values('$f_name','$l_name','$email','$username','$password','$address','$status','$jobtitle')";
  $r= mysql_query($query)or die(mysql_error()."cannot  enter data");
  $last_id=mysql_insert_id();
  $query="insert into  staff_login_type (staff_id,login_type_id) values('$last_id','$rights')";
  $r= mysql_query($query)or die(mysql_error()."cannot  enter data");
  $status="New Staff added !!";

  break;
 }
 case'delete':
 {
  break;
 }
}//switch

?>

<body>
 <div id="wrapper">
 <!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
 <h1><a href="#"><span>Belship</span></a></h1>
 <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
 <?php include("includes/menu.php"); ?>
 <!-- // #end mainNav -->
 <?php include('mgtusercontent.php');?>
 <?php include('includes/footer.php');?> 
 <!-- // #wrapper -->
 </div>
</body>
</html>

