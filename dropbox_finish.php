<?php

require 'app/start.php';
//Database connection with token authorisation

list($accessToken) = $webAuth->finish($_GET);

$store = $db->prepare("
    UPDATE users
    SET dropbox_token = :dropbox_token
    WHERE id = :user_id
    ");

$store->execute([
    'dropbox_token' => $accessToken,
    'user_id' => $_SESSION['user_id']
]);


header('Location: index.php');

/*
 


http://stackoverflow.com/questions/13115548/dropbox-produce-a-direct-download-link-php-preferred
http://www.codedisqus.com/CyVjejjqXq/how-to-use-dropbox-chooser-without-forcing-the-user-to-login-to-the-dropbox-account-used.html
http://www.sitepoint.com/access-dropbox-using-php/
http://humaan.com/php-and-the-dropbox-api/
http://stackoverflow.com/questions/12614605/get-download-link-with-metadata-in-dropbox-api
https://www.bentasker.co.uk/documentation/development-programming/175-allowing-file-uploads-direct-from-dropbox?highlight=WyJkcm9wYm94Il0=
https://www.youtube.com/results?search_query=dropbox+api
http://www.dropbox-php.com/docs
*/