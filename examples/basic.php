<?php

require('./../vendor/autoload.php');

use Eoko\Magento2\Client\MagentoClientBuilder;
use Eoko\Magento2\Client\Security\AdminAuthentication;
use Eoko\Magento2\Client\Search;
// We initiate the client builder
$clientBuilder = new MagentoClientBuilder('http://magento/rest/all');

// Create an unauthenticated client
$unAuthenticatedClient = $clientBuilder->buildAuthenticatedClient();

// Get an admin token
echo $token = $unAuthenticatedClient->getAdminTokenApi()->getAdminToken('admin', 'admin123');

// Authentication from admin token
$authentication = AdminAuthentication::fromAdminToken($token);

// Create an authenticated client
$authenticatedClient = $clientBuilder->buildAuthenticatedClient($authentication);

// Retrieve the 10 first product
$productsCursor = $authenticatedClient->getAllegroOfferApi()->all(10, null);

foreach ($productsCursor as $product) {
    echo 'Allegro offers : ' . $product['name'] . "<br>";
}