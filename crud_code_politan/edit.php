<?php
// include database connection file
include_once("config.php");
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{    
    
    
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $idx = $_POST["id"];

    if(!empty($name) and !empty($mobile) and !empty($email))
    {
        $ubah = "UPDATE users SET name = '$name', email = '$email',mobile = '$mobile' WHERE id = '$idx'";
        $mysqli->QUERY($ubah);
        header("location:index.php");

    }
   
    
    // Redirect to homepage to display updated user in list
    
}

?>
<?php
// Display selected user data based on id
// Getting id from url

 
// Fetech user data based on id

 $id = $_GET["id"];
 $show = "SELECT * from users where id = '$id'";
 $resul = $mysqli->query($show);

while($user_data = mysqli_fetch_array($resul))
{
    $name = $user_data['name'];
    $email = $user_data['email'];
    $mobile = $user_data['mobile'];
}
?>
<html>
<head>    
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr> 
                <td>Mobile</td>
                <td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>