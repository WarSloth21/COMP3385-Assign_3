<?php
namespace Haa\framework;
abstract class PageController_Command_Abstract implements Command_Interface
{
	protected $model = null;
	protected $view = null;
	
	
	public function makeModel(Observable_Model $model)
	{
		$this->model = $model;
	}
	
	public function makeView(View $view)
	{
		$this->view = $view;
	}
	
	abstract public function run();

	abstract public function execute(CommandContext $context) : bool;
}