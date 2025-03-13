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
				case 'Switch':
					$this->SetValue($Ident, $Value);
					//Während der Laufzeit Parameter aktualiesieren
					$this->UpdateVisualizationValue(json_encode($Value));
					break;
				case'Toggle':
					$this->RequestAction('Switch', !$this->GetValue('Switch'));
					break;
			
			}
		}

		public function GetVisualizationTile(){
			$htmlFile = file_get_contents(__DIR__.'/module.html');
			$initialStatus = '<script>handleMessage("' . jason_encode($this->GetValue);
			return $htmlFile . $initialStatus;
		}
	}