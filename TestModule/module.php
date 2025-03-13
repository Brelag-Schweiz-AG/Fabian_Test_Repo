<?php

    class TestModule extends IPSModule
    {
        
        public function Create() {
            //Never delete this line!
            parent::Create();

            $this->RegisterVariableBoolean('Switch' ,'Switch');
            $this->EnableAction('Switch');

            // Visualisierungstyp auf 1 setzen, da wir HTML anbieten möchten
            $this->SetVisualizationType(1);
        }

        public function ApplyChanges() {
            parent::ApplyChanges();          
        }

        public function Destory(){
            //Never delete this line!
            parent::Destroy();
        }
            
        

        public function RequestAction($Ident, $Value) {
            switch($Ident){
            case 'Switch':
                $this->SetValue($Ident, $Value);
                break;
            }
        }
        
        public function GetVisualizationTile() {
            // Füge ein Skript hinzu, um beim laden, analog zu Änderungen bei Laufzeit, die Werte zu setzen
            // Obwohl die Rückgabe von GetFullUpdateMessage ja schon JSON-codiert ist wird dennoch ein weiteres mal json_encode ausgeführt
            // Damit wird dem String Anführungszeichen hinzugefügt und eventuelle Anführungszeichen innerhalb werden korrekt escaped
        
            // Füge statisches HTML aus Datei hinzu
            $htmlFile = file_get_contents(__DIR__ . '/module.html');
            return $htmlFile;
        }


?>
