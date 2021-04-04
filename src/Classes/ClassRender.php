<?php

namespace Src\Classes;

class ClassRender
{
    private $Dir;
    private $Title;
    private $Description;
    private $KeyWords;

    public function getDir(){ return $this->Dir;  }
    public function setDir($Dir) {return $this->Dir = $Dir; }
    
    public function getTitle(){ return $this->Title; }
    public function setTitle($Title){ return $this->Title = $Title; }

    public function getDescription(){ return $this->Description; }
    public function setDescription($Description) { $this->Description = $Description; }

    public function getKeyWords(){ return $this->KeyWord; }
    public function setKeyWords($KeyWords){ return $this->KeyWords = $KeyWords; }

    public function renderLayout()
    {
        include_once(DIRREQ . "app/views/Layout.php");
    }

    public function addHeader() #Cabeçalho 
    {
        if (file_exists(DIRREQ . "app/viwes/{$this->_Dir}/header.php")) {
            include(DIRREQ . "app/viwes/{$this->_Dir}/header.php");
        } else {
            echo "Arquivo Header Inexistente";
        }
    }

    public function addHead() #Cabeça
    {
        if (file_exists(DIRREQ . "app/views/{$this->_Dir}/head.php")) {
            include(DIRREQ . "app/views/{$this->_Dir}/head.php");
        } else {
            echo " Arquivo Head Inexistente";
        }
    }
    public function addMain()
    {
        if (file_exists(DIRREQ . "app/viwes/{$this->_Dir}/main.php")) {
            include(DIRREQ . "app/viwes/{$this->_Dir}/main.php");
        } else {
            echo "Arquivo Main Inexistente";
        }
    }
    public function addFooter()
    {
        if (file_exists(DIRREQ . "app/viwes/{$this->Dir}/footer.php")) {
            include(DIRREQ . "app/viwes/{$this->Dir}/footer.php");
        } else {
            echo "Arquivo Footer Inexistente";
        }
    }
}
