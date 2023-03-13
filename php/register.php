<?php
sleep(3);
include('db.php');
$username=$_POST['username'];
$email=$_POST['email'];
$age=$_POST['age'];   
$address=$_POST['address'];
$password=$_POST['password'];
    
$sql="insert into users(username,email,password) values('$username','$email','$password')";
$stmt=$con->prepare($sql);

if ($stmt->execute()==TRUE) {
        require '../vendor/autoload.php';

        $client = new MongoDB\Client("mongodb+srv://sherwinroger02:tronster9@cluster0.b79g7dt.mongodb.net/test?retryWrites=true&w=majority");

        $collection = $client->test->users;

        $result = $collection->insertOne([  
            'name' => $username,
            'email' => $email,
            'age' => $age,
            'address' => $address
        ]);

}else{
    header("HTTP/1.1 400 Bad Request");
}

?>