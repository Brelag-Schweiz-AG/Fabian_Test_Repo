<?php

	class API extends IPSModule
	{
	
		public function Create()
		{
			//Never delete this line!
			parent::Create();

			//Eigenschaften speichern
			$this->RegisterPropertyString("URL", "");
			$this->RegisterPropertyString("Username", "");
			$this->RegisterPropertyString("PW", "");
		
		}
		
		public function Destroy()
		{
			//Never delete this line!
			parent::Destroy();
		}

		public function ApplyChanges()
		{
			//Never delete this line!
			parent::ApplyChanges();	

			// Eingegebene Werte im form speichern
			$url = $this->ReadPropertyString("URL");
			$username = $this->ReadPropertyString("Username");
			$pw = $this->ReadPropertyString("PW");
		}

		public function SetValueOverAPI(int $targetID, int $value){
			$token[] = "Authorization: Basic " . base64_encode($username . ":" . $pw);
			$timestamp = time();

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_HTTPHEADER,$token);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			$data = <<<DATA
			{
			"jsonrpc": "2.0",
			"method": "SetValue",
			"params": [$targetID, $value],
			"id": $timestamp
			}
			DATA;

			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

			$resp = curl_exec($curl);
			//print_r($resp);

			curl_close($curl);

			$jsonD = json_decode($resp);
			print_r($jsonD);

		}

		public function GetValueOverAPI($targetID){

		}

		public function RequestActionOverAPI($targetID, $value){

		}
	}