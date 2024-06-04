<?php
include 'Database.php';
include 'User.php';

//instantiate Database() and get connection
$database = new Database();
$db = $database->getConnection();

//instantiate User()
$user = new User($db);
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            table{
                
            }
        </style> 
        <title>TO READ DATA</title>
        <link ref="stylesheet" href="stylesheet.css">
</head>
<body>
    <table border='1'>
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
            <th colspan="2">Action</th>
</tr>
<?php
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row["matric"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["role"]; ?></td>
            <td><a href="update_form.php?matric=<?php echo $row["matric"]; ?>">Update</a></td>
            <td><a href="delete.php?matric=<?php echo $row["matric"]; ?>">Delete</a></td>
    </tr>
    </tr>
    <?php
    }
}else{
    echo"<tr><td colspan='5'>No users found</td></tr>";
}
$db->close();
?>
</table>
</body>
</html>