<?php

$app = [];

$app['config'] = require 'config.php';

require 'core/classes/Router.php';

require 'core/classes/Request.php';

require 'core/classes/ImageUploader.php';
require 'core/classes/product.php';
require 'core/classes/user.php';
require 'core/classes/client.php';
require 'core/classes/images.php';
require 'core/database/connection.php';
require 'core/database/dbClasses/productsDB.php';
require 'core/database/dbClasses/usersDB.php';
require 'core/database/dbClasses/clientsDB.php';
require 'core/database/queryBuilder.php';

$app['database'] = new QueryBuilder(

    Connection::make($app['config']['database'])
    
);

$app['product'] = $app['database']->products();


$app['user'] = $app['database']->users();

$app['client'] = $app['database']->clients();