<?php

	class API extends IPSModule
	{
		public function Create()
		{
			//Never delete this line!
			parent::Create();

			//Eigenschaften speichern
			$this-> RegisterPropertyString("URL", "");
			$this-> RegisterPropertyString("Username", "");
			$this-> RegisterPropertyString("PW", "");
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
			$Url = $this->ReadPropertyString("URL");
			$Username = $this->ReadPropertyString("Username");
			$Pw = $this->ReadPropertyString("PW");
		}

		public function SetValueOverAPI($targetID, $value){

		}

		public function GetValueOverAPI($targetID){

		}

		public function RequestActionOverAPI($targetID, $value){

		}

		function createEnquieryForAPICall($targetID, $value, $isGet){
			
		}
	}