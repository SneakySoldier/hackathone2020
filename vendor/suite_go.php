 <?php
 require_once 'connect.php';
 function redirect_to($new_location){
    header("Location: " . $new_location);
    exit;
 }
$btn_1class = $_POST['1class_btn'];
if (isset($btn_1class))
{
if($_POST['1myclass'] === "a_class")
{
    redirect_to("http://localhost/index.php");
}
if($_POST['1myclass'] === "b_class")
{
}
if($_POST['1myclass'] === "c_class")
{
}
if($_POST['1myclass'] === "d_class")
{
}
}
?>