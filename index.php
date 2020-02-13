<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div class="output">
    <h1 class="name"></h1>
    <h2 class="bio"></h2>
        <div class="image"><img src=""/></div>
    </div>

    <?php
        $curl = curl_init();
        $auth_data = array(
            // 'client_id'         => 'SWIAVJNJEFZBS3DYZU9LQWF0YQ',
            // 'client_secret'     => 'ck1mMjNrZmxGWDVka1JyOW5BVDdUUHYzVm9wWG1NTTRzQjFIeDY',
            // 'grant_type'        => 'client_credentials'
        );

        // curl_setopt($curl, CURLOPT_POST, 1);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('sw-access-key:SWSCU1G0RG4YWLRXC1VKZUVQVW'));
        curl_setopt($curl, CURLOPT_URL, 'http://paulvandillen.cb04.shopworks-clients.nl/sales-channel-api/v1/product/fe90777a621a47a2bd738a08fd4c8007');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $result = curl_exec($curl);
        echo "<pre>";
        if(!$result){
            die('Connection Failure');
        }
        curl_close($curl);
        echo '<br />------<br />';
        $apiData = json_decode($result);
        //var_dump($apiData);
        print_r($apiData);
        // $accessToken = $apiData->access_token;
        // echo $accessToken;
    ?>
    <div class="container py-5">
        <div class="row">
            <?php foreach($apiData->data->cover->media->thumbnails as $product): ?>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                        <h2><?php echo $product->width ?></h2>
                        </div>
                        <img src="<?php echo $product->url ?>" alt="<?php echo $product->mediaId ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>