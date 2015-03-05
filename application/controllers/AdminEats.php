<?php

class AdminEats extends Application {

    function __construct()
    {
	parent::__construct();
        $this->load->helper('formfields');
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------
    function index()
    {
        $this->data['title'] = "Manage Eats";
        
        $this->data['eats'] = $this->eats->all();
        
	$this->data['pagebody'] = 'admin_eats';
        $this->render();
    }
    
    function add()
    {
        $eats = $this->eats->create();
        $this->present($eats);
    }
    
    function edit($id)
    {
        $this->present($this->eats->get($id));
    }
    
    // Present restaurant info for adding/editing
    function present($eat)
    {
        // Format any errors
        $message = "";
        if (count($this->errors) > 0)
        {
            foreach ($this->errors as $booboo)
                $message .= $booboo . BR;
        }
        $this->data['message'] = $message;
        
        $this->data['phoneId'] = makeTextField('Phone Number', 'phoneId', $eat->phoneId, "", 11, 11);
        $this->data['title'] = makeTextField('Name', 'title', $eat->title);
        $this->data['image'] = makeTextField('Picture', 'image', $eat->image);
        $this->data['desc'] = makeTextArea('Description', 'desc', $eat->desc);
        
        $this->data['pagebody'] = 'edit_eat';
        $this->data['submit'] = makeSubmitButton('Submit Eat', "Click here to validate the restaurant data", 'btn-success');
        if (!empty($eat->id))
            $this->data['id'] = $eat->id;
        else
            $this->data['id'] = "-1";
        
        $this->render();
    }
    
    // Validates and confirms the information placed into form
    function confirm($id)
    {
        $record = $this->eats->create();
        
        // Extract submitted fields
        $record->phoneId = $this->input->post('phoneId');
        $record->title = $this->input->post('title');
        $record->image = $this->input->post('image');
        $record->desc = $this->input->post('desc');
        
        // Validation
        if (empty($record->phoneId))
            $this->errors[] = "The restaurant must have a phone number to contact.";
        else if (!is_numeric($record->phoneId))
            $this->errors[] = "The phone number must contain only numbers.";
        
        if (empty($record->title))
            $this->errors[] = "The restaurant must have a name.";
        
        if (strlen($record->desc) < 20)
            $this->errors[] = "The description must be at least 20 characters long.";
        
        // Redisplay if any errors
        if (count($this->errors) > 0)
        {
            $record->id = $id;
            $this->present($record);
            return;
        }
        
        // Save stuff
        if ($id == -1)
        {
            $this->eats->add($record);
        }
        else
        {
            $record->id = $id;
            $this->eats->update($record);
        }
        
        $this->index();
    }
    
    function delete($id)
    {
        $this->eats->delete($id);
        $this->index();
    }

}