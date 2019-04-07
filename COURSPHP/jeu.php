<?php

class personnage{

    // ATTRIBUTS
    private $_force =40;
    private $_classe = "Plombier";
    private $_couleurCasquette = "Rouge";

    //CONSTRUCTEUR
    public function  _construct($force){
        $this->setForce($force);
    }

    // METHODEs
    public function getForce(){
        return $this->_force;


    }
    public function setForce($force){
        $this->_force = $force;

    }

    public function getCouleurClasse(){


    }
    public  function setCouleurclass(){


    }
    public function getClasse(){

    }
}
$mario = new personnage(70);
echo $mario->getForce();
