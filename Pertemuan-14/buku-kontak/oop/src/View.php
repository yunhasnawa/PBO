<?php

namespace src;

class View
{
    private $_template;

    // Data yang nantinya bisa diakses dari template
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
        // Include template agar bisa ditampilkan
        include_once $this->_template;
    }
}