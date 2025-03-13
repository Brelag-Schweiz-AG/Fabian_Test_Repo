<?php

declare(strict_types=1);
	class TestModulFabian extends IPSModule
	{
		public function Create()
		{
			//Never delete this line!
			parent::Create();
			$this->RegisterVariableBoolean('Switch', 'Switch');
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
	}