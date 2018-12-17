<?php 

require_once('models/connect-bdd.php');

function insertFileUpload($arrayDatas) {

	global $bdd;

	$sql = "INSERT INTO `files`(`file_name`, `file_size`, `file_ext`, `folder_key`, `file_key`)
	 	VALUES (:name, :size, :ext, :folder_key, :file_key)";
		
	// Prépare la requête pour éviter les injections SQL...
	$response = $bdd->prepare( $sql );

	// Bind les paramètres dans la requêtes...
	$response->bindParam(':name', $arrayDatas["name"], PDO::PARAM_STR);
	$response->bindParam(':size', $arrayDatas["size"], PDO::PARAM_STR);
	$response->bindParam(':ext', $arrayDatas["ext"], PDO::PARAM_STR);
	$response->bindParam(':folder_key', $arrayDatas["folder_key"], PDO::PARAM_STR);
	$response->bindParam(':file_key', $arrayDatas["file_key"], PDO::PARAM_STR);

	// Exécute la requête...
    $response->execute();
    
}


function insertSenderUpload($sender, $message) {

	global $bdd;

	$sql = "INSERT INTO `user_upload`(`mail_sender`, `message`) 
			VALUES (:sender, :message)";

	// Prépare la requête pour éviter les injections SQL...
	$response = $bdd->prepare( $sql );		

	// Bind les paramètres dans la requêtes...
	$response->bindParam(':message', $message, PDO::PARAM_STR);
	$response->bindParam(':sender', $sender, PDO::PARAM_STR);

	// Exécute la requête...
    $response->execute();
}


?>