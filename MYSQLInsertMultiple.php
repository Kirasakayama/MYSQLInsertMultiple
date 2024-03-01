<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    
</head>
<body>

<style>
    body{
    margin: 0;background-color: rgb(255, 247, 237);
}
::-webkit-scrollbar{
    width: 0;
}
header{
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color:antiquewhite;

}
h3{
    text-align: center;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color:  rgb(112, 191, 255);
}


.submit-btn{
    background-color: rgb(112, 191, 255);
    height: 6vmin;width:30vmin;
    border: none;border-radius: 2vmin;
    color:white;font-size:medium;
    transition: all 0.2s ease;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
 
}
.submit-btn:hover{
    height: 7vmin; font-size:large;
}

</style>

    <header>



    <form method="post">
    <h3>MYSQL Insert Multiple Data</h3><br>
 <div style="display: flex;">

    <div>
        First Name :<br>
        <input type="text" name="FirstName1"><br><br>
        Last Name:<br>
        <input type="text" name="LastName1"><br><br>
        Email : <br>
        <input type="text" name="Email1"><br><br>
    </div>

    <div>
        First Name :<br>
        <input type="text" name="FirstName2"><br><br>
        Last Name:<br>
        <input type="text" name="LastName2"><br><br>
        Email : <br>
        <input type="text" name="Email2"><br><br>
    </div>
</div>

<input type="submit" value="insert Data" name="submit" style="cursor: pointer;" class="submit-btn"><br><br>
    </form>

<?php
$servername = 'localhost';
$username = 'root';
$passsword = '';
$dbname = 'obaid';
if(isset($_POST['submit'])){

$firstnameOne = $_POST['FirstName1'];
$lastnameOne = $_POST['LastName1'];
$emailOne = $_POST['Email1'];

$firstnameTwo = $_POST['FirstName2'];
$lastnameTwo = $_POST['LastName2'];
$emailTwo = $_POST['Email2'];

try{
    $connection = new PDO ("mysql:host=$servername;dbname=$dbname",$username ,$passsword);
    $connection->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

    $connection->beginTransaction();
    $connection->exec("INSERT INTO test (firstname , lastname , email)
    VALUES ('$firstnameOne','$lastnameOne','$emailOne')");
    $connection->exec("INSERT INTO test (firstname , lastname , email)
    VALUES ('$firstnameTwo','$lastnameTwo','$emailTwo')");

$connection->commit();
echo "new records created successfully";

}catch(PDOException $e){
    $connection->rollBack();
    echo 'ERROR : '.$e->getMessage();
}
}

?>

</header>
</body>
</html>


