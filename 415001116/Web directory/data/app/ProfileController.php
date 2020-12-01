<?php
namespace Haa\framework;
class ProfileController extends PageController_Abstract
{
	public function run()
	{
        SessionManager::create();

        $sess = new SessionManager();
        $sess->add('user','testuser');
        //$sess->remove('user');

		$v = new View();
		$v->setTemplate(TPL_DIR . '/profile.tpl.php');
		
		
		//Set Model and View
		$this->setModel(new ProfileModel());
		$this->setView($v);
		
        $this->model->attach($this->view);
        
        //Checks if user can access page
        $user = $sess->see('user');

        if ($sess->accessible($user, 'profile'))
        {
            //get courses user is registered for
		    $data = $this->model->getAll();
		    //Tells MOdel to update the changed data
		    $this->model->updateThechangedData($data);
		
		    // tell model to contact its observers
		    $this->model->notify();
        }
        else {
            $v->setTemplate(TPL_DIR . '/login.tpl.php');
            $v->display();
        }


		
	}
}
