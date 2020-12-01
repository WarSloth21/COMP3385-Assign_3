<?php
namespace app\handlers;
use Haa\framework\CommandContext;
use Haa\framework\PageController_Command_Abstract;
use Haa\framework\View;
use Haa\framework\SessionManager;

class ProfileController extends PageController_Command_Abstract
{
	public function run()
	{
        \SessionManager::create();

        $sess = new \SessionManager();
        $sess->add('user','testuser');
        //$sess->remove('user');

		$v = new View();
		$v->setTemplate(TPL_DIR . '/profile.tpl.php');
		
		
		//Set Model and View
		$this->makeModel(new \ProfileModel());
		$this->makeView($v);
		
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
    public function execute(CommandContext $context): bool
	{
		$this->data= $context;
		$this->run();
		return true;
	}
}
