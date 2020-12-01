<?php
namespace app\handlers;
use Haa\framework\CommandContext;
use Haa\framework\PageController_Command_Abstract;
use Haa\framework\View;

class CoursesController extends PageController_Command_Abstract
{
	private $data = null;
	public function run()
	{
		$v = new View();
		$v->setTemplate(TPL_DIR . '/courses.tpl.php');
		
		
		//Set Model and View
		$this->makeModel(new \CoursesModel());
		$this->makeView($v);
		
		$this->model->attach($this->view);
		//depending on what is needed
		$data = $this->model->findAll();
		//Tells MOdel to update the changed data
		$this->model->updateThechangedData($data);
		
		// tell model to contact its observers
		$this->model->notify();
		
	}

	public function execute(CommandContext $context): bool
	{
		$this->data= $context;
		$this->run();
		return true;
	}
}
