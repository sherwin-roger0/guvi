<?php 

        require '../vendor/autoload.php';

        $client = new MongoDB\Client("mongodb+srv://sherwinroger02:tronster9@cluster0.b79g7dt.mongodb.net/test?retryWrites=true&w=majority");

        $collection = $client->test->users;

        $name = $_POST['userData'];

        $document = $collection->findOne(['name' => $name]);

        if ($document) {
            $redis = new Redis();
            $redis->connect('redis-11153.c10.us-east-1-2.ec2.cloud.redislabs.com', 11153);

            $redis->auth('5Ix3uD4BdegLaMenxOooa2GJsaatJjdU');

            $currentDateTime = date('Y-m-d H:i:s');

            $redis->rpush($name, $currentDateTime);

            $listItems = $redis->lrange($name, 0, -1);

            header('Content-Type: application/json');

            $newData = ['list' => $listItems];

            $result = array_merge((array)$document, $newData);
            echo json_encode($result);
        } else {
            echo("hi");  
        }
?>