<?php
namespace app\handlers;
use Haa\framework\CommandContext;
use Haa\framework\PageController_Command_Abstract;
use Haa\framework\View;
use Haa\framework\Validator;

class LoginController extends PageController_Command_Abstract
{
	private $data = null;
	public function run()
	{
		$v = new View();
		$v->setTemplate(TPL_DIR . '/login.tpl.php');
		
		
		//Set Model and View
		$this->makeModel(new \LoginModel());
		$this->makeView($v);
		
		$this->model->attach($this->view);
		// check to see if the user has posted data to the form
 if (empty($_POST)) {
    //Check to see is user is Logged in
    if(isset($_SESSION["authenticated_user"]))
    {
       header('Location:profile.tpl.php');
    }
    //Else Show Login Page
    $v->setTemplate(TPL_DIR . '/login.tpl.php');
	$this->makeView($v);
	$this->model->notify();
 }
 // data was posted so we must do the following
else {
    // 1. Validate the data if JavaScript didn't do it
    $validator = new Validator($_POST);
    $result = $validator->validate();
// 2. If the data is invalid, get and display error messages
    if (!$result) { // validation failed, errors were generated
        $errors = $validator->getErrors();  // an array of strings
        $v->setTemplate(TPL_DIR . '/login.tpl.php');
        $v->addVar('errors', $errors);
		$this->makeView($v);
		$this->model->notify();
    }
// 3. If the data is valid, check the database and go to next page
else { 
    if( $this->model->find('mooc', $_POST))
    {
         //$_SESSION["natl_id"] = $_POST['natl_id'];
        
			header('Location:profile.tpl.php');
			$this->model->notify();
     
 }
		
		// tell model to contact its observers
		$this->model->notify();
	}
}
}

	public function execute(CommandContext $context): bool
	{
		$this->data= $context;
		$this->run();
		return true;
	}
}