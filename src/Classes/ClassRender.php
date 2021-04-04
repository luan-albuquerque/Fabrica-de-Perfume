<?php

namespace Src\Classes;

class ClassRender
{
    private $_Dir;
    private $_Title;
    private $_Description;
    private $_KeyWords;


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
