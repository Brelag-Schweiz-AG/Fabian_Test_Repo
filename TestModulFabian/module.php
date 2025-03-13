<?php

declare(strict_types=1);
	class TestModulFabian extends IPSModule
	{
		public function Create()
		{
			//Never delete this line!
			parent::Create();

			$this->RegisterVariableBoolean('Switch', 'Switch');
			$this->EnableAction('Switch');
			
			$this->SetVisualizationType(1);
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

		public function RequestAction($Ident, $Value){
			switch($Ident){
				$this->SetValue($Ident, $Value);
				break;
			}
		}

		public functin GetVisualizationTile(){
			$htmlFile = file_get_contents(__DIR__.'/module.html');
			return $htmlFile;
		}
	}