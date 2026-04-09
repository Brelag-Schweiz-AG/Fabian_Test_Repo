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
		}

		private function createCredentials() {
			$url = $this->ReadPropertyString("URL");
			$username = $this->ReadPropertyString("Username");
			$pw = $this->ReadPropertyString("PW");

			$token[] = "Authorization: Basic " . base64_encode($username . ":" . $pw);
	
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_HTTPHEADER,$token);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			return $curl;
		}

		public function SetValueOverAPI(int $targetID, int $value){
			$timestamp = time();
			$curl = $this->createCredentials();
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
		}

		public function GetValueOverAPI($readValueFromAPI, $writeToTargetID){
			$timestamp = time();
			$curl = $this->createCredentials();
			$data = <<<DATA
			{
			"jsonrpc": "2.0",
			"method": "GetValue",
			"params": [$readValueFromAPI, $writeToTargetID],
			"id": $timestamp
			}
			DATA;

			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

			$resp = curl_exec($curl);
			$decoded = json_decode($resp, true);
			print_r($decoded);
			$result = $decoded["result"];
			SetValue($writeToTargetID, $result);
		}

		public function RequestActionOverAPI($targetID, $value){

		}
	}