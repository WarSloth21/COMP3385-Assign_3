<?php
use Haa\framework\Observable_Model;

class CoursesModel extends Observable_Model
{
	use Haa\framework\Insert_Trait;

	public function findAll(): array
	{
		/**
		 * $this->makeConnection();
			$sql = "SELECT course_access_count FROM courses";
			$data = $this->sql->query($sql);

			if($data->num_rows > 0)
			{

			}
		 */
		

		//this function is going to return all the courses
		$data = $this->loadData(DATA_DIR . '/courses.json');
		//return $data;
		
		//Get the most popular and most favourite
		$popular_column = array_column($data['courses'], 3);
		$recommended_column = array_column($data['courses'], 2);
		$extra = $data['courses'];
		
		array_multisort($recommended_column, SORT_DESC, $data['courses']);
		$recommended = array_slice($data['courses'], 0, 8);
		array_multisort($popular_column, SORT_DESC, $extra);
		$popular = array_slice($extra, 0, 8);
		
		return ['popular'=>$popular, 'recommended'=>$recommended];
		
		// next stage get the instructiors
		
	}
	
	public function findRecord(string $id): array
	{
		return [];
	}
	
	public function insert(array $values)
	{
		
	}

	public function find(string $tablename, array $fields)
    {
        
    }

}