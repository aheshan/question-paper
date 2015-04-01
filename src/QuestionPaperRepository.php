<?php namespace src;

use src\QuestionPaper;

class QuestionPaperRepository
{
	private $questionPapers = array();

	public function __construct()
	{
		$this->loadQuestionPaper();
	}
	private function loadQuestionPaper()
	{
		array_push($this->questionPapers, array("id" => 1,"title" => "Mathematics",
			"created_at" => "2015-03-29 11:00:45 AM",
			"updated_at" => "2015-03-29 11:00:45 AM",
			"questions" => array()));

		array_push($this->questionPapers, array("id" => 2,"title" => "Science",
			"created_at"=>"2015-03-29 11:00:45 AM",
			 "updated_at"=>"2015-03-29 11:00:45 AM",
			 "questions" => array()));
	}
	
	public function getAllQuestionPaper()
	{
		return $this->questionPapers;
	}

	public function create(QuestionPaper $questionPaper)
	{
		array_push($this->questionPapers, array(
			"id" => $questionPaper->getQuestionPaperId(),
			"title" => $questionPaper->getQuestionPaperTitle(),
			"created_at" => $questionPaper->getDateCreated(), 
			"updated_at" => $questionPaper->getDateUpdated(),
			"questions" => $questionPaper->getAllQuestions()));
	}

	public function findById($questionPaperId)
	{
		//TODO: to be defined
	}

	public function getQuestionsByQuestionpaperId($questionPaperId)
	{
		//TODO: to be defined
	}

	public function createQuestion($questionPaperId,Question $question)
	{
		//TODO: to be defined
	}
}