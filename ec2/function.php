<?php

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;

$sdk = new Aws\Sdk([
    'profile'   => 'default',
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);

$dynamodb = $sdk->createDynamoDb();
$marshaler = new Marshaler();

function getMovies()
{
    global $sdk, $dynamodb, $marshaler;
		
	$tableName = 'Movies';
      try {    
        $movies = $dynamodb->scan(array(
        'TableName' => $tableName 
        ));      
        $list_movies = array();
        foreach ($movies['Items'] as $movie)  {
            $movie_item = array();
            $movie_item['title'] = $marshaler->unmarshalValue($movie['title']);
            $movie_item['year'] = $marshaler->unmarshalValue($movie['year']);
            $list_movies[] = $movie_item;
        }
        return $list_movies;
      } catch (DynamoDbException $e) {
      echo "Unable to query:\n";
      echo $e->getMessage() . "\n";
      }
}

function validate(){
    global $sdk, $dynamodb, $marshaler;

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
