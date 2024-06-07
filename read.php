<?php
session_start();

// Store the current page URL in session if user is not logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

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
                flex-direction: column;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                font-size: 25px;
            }
            .wrapper h1{
                text-align: center;
            }
            table{
                width: 50%;
                border-collapse: collapse;
            }
            th{
                background-color: lightsalmon;
            }
            td{
                text-align: center;
            }
        </style> 
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TO READ DATA</title>
        <link ref="stylesheet" href="stylesheet.css">
</head>
<body>
    <div class="wrapper">
        <h2>Information Details</h2><br>
    </div>
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