<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */

    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = 'Eat, Play, Sleep';    // our default title
        $this->errors = array();
        $this->data['pageTitle'] = 'homepage';   // our default page
    }

    /**
     * Render this page
     */
    function render() {

        $header_items = array(
            'menudata' => array(
                array('name' => 'First', 'link' => '/first'),
                array('name' => 'Last', 'link' => '/last'),
            )
        );

        $this->data['header'] = $this->parser->parse('_header', $header_items, true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

        // finally, build the browser page!
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */