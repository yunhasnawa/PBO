<?php

namespace framework;

class View
{
    // Template itu miliknya View
    private $_template;

    // Di template akan ada data yang harus
    // ditampilkan
    private $_data;

    public function __construct($template)
    {
        $this->_template = $template;
        $this->_data = [];
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function render()
    {
        // Extract $this->_data to independent local variables
        extract($this->_data);
        include_once $this->_template;
    }

    public function setTemplate($template)
    {
        $this->_template = $template;
    }
}