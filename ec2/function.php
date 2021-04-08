<?php

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;

$sdk = new Aws\Sdk([
    'profile'   => 'default',
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);

$dynamodb = $sdk->createDynamoDb();

function getMovies()
{
    global $sdk, $dynamodb;
		
	$tableName = 'Movies';
      try {    
        $movies = $dynamodb->scan(array(
        'TableName' => $tableName 
        ));      

        foreach ($movies['Items'] as $article)  {
            $movies['title'] = $marshaler->unmarshalValue($movies['title']);
            $movies['year'] = $marshaler->unmarshalValue($movies['year']);
        }
        return $movies;
      } catch (DynamoDbException $e) {
      echo "Unable to query:\n";
      echo $e->getMessage() . "\n";
      }
}

function validate(){
    global $sdk, $dynamodb;

	$tableName = 'Movies';
    if(!isset($_POST["title"]) || empty($_POST["title"])) {
        echo '<p style="color: red; font-weight: bold;">Il manque le titre du film</p>';
    }
    elseif(!isset($_POST["year"]) || empty($_POST["year"])) {
        echo '<p style="color: red; font-weight: bold;">Il manque l\'année du film</p>';
    }else{  
    	$item = $marshaler->marshalJson('
    	{
       	 "year": ' . $_POST["year"] . ',
       	 "title": "' . $_POST["title"] . '"
	    }
	');
	$params = [
	    'TableName' => 'Movies',
	    'Item' => $item
	];
	try {
	    $result = $dynamodb->putItem($params);
	    echo "Added item: $year - $title\n";

	} catch (DynamoDbException $e) {
	    echo "Unable to add item:\n";
	    echo $e->getMessage() . "\n";
	}
        header('Location: index.php'); 
    }

    echo '<p><a href="index.php">accueil</a></p>';
   
}

?>
