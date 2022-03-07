<?php
require_once 'model/DataHandler.php';
require_once 'view/OutputData.php';

class ContactsLogic {

	public function __construct() {
		$this->DataHandler = new Datahandler('localhost','mysql' ,'school' ,'ali' ,'ali1903');
		$this->outputData = new OutputData();
	}

	public function createContact($name, $phone, $email, $address){

	}

	public function readAllContacts(){
		$sql = 'SELECT * FROM contacts';
		$results = $this->DataHandler->readsData($sql); 
		return $this->outputData->createTable($results);
	}

	public function readContact($id){

	}

	public function updateContact($name, $phone, $email, $address, $id){

	}

	public function deleteContact($id){

	}



}
