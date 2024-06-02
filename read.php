<? php
include "Database.php";
include "User.php";

//instantiate Database() and get connection
$database = new Database();
$db = $database->getConnection();

//instantiate User()
$user = new User();
$rsult = $user->getUsers();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TO READ DATA</title>
</head>
<body>
    <table border='1'>
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
            <th colspan="2">Action</th>
</tr>
<? php
if($result->num_rows>0){
    while($row=$rsult->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row["matric"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["role"]; ?></td>
            <td><a href="update.php?matric=<?php echo $row["matric"]; ?>">Update</a></td>
            <td><a href="delete.php?matric=<?php echo $row["matric"]; ?>">Delete</a></td>
    </tr>
    </tr>
    <?php
    }
}else{
    echo"<tr><td colspan='3'>No users found</td></tr>";
}
$db->close();
?>
</table>
</body>
</html>