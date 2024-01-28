<?php

$app = [];

$app['config'] = require 'config.php';

require 'core/classes/Router.php';

require 'core/classes/Request.php';

require 'core/classes/ImageUploader.php';
require 'core/classes/productController.php';
require 'core/classes/product.php';

require 'core/database/connection.php';

require 'core/database/queryBuilder.php';

$app['database'] = new QueryBuilder(

    Connection::make($app['config']['database'])
    
);



$app['products'] = new ProductsQueryBuilder(

    Connection::make($app['config']['database'])
    
);

