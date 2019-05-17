<?php

require_once __DIR__.'/vendor/autoload.php';

class gridcollector extends Module
{
    /**
     * In constructor we define our module's meta data.
     * It's better tot keep constructor (and main module class itself) as thin as possible
     * and do any processing in controller.
     */
    public function __construct()
    {
        $this->name = 'gridcollector';
        $this->version = '1.0.0';
        $this->author = 'Mickaël Andrieu';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = 'GridCollector module';
        $this->ps_versions_compliancy = [
            'min' => '1.7.5.0',
            'max' => _PS_VERSION_,
        ];
    }
}
