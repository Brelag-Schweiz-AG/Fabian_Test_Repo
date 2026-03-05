<?php

	class API extends IPSModule
	{
		public function Create()
		{
			//Never delete this line!
			parent::Create();
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
			$this-> RegisterPropertyString("URL", "");
			$this-> RegisterPropertyString("Username", "");
			$this-> RegisterPropertyString("PW", "");
		}
	}