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
		array_push($this->questionPapers, array("questionPaperId" => 1,
			"questionPaperTitle" => "Mathematics",
			"dateCreated" => "2015-03-29 11:00:45 AM",
			"dateUpdated" => "2015-03-29 11:00:45 AM",
			"questions" => array()));

		array_push($this->questionPapers, array("questionPaperId" => 2,
			"questionPaperTitle" => "Science",
			"dateCreated"=>"2015-03-29 11:00:45 AM",
			 "dateUpdated"=>"2015-03-29 11:00:45 AM",
			 "questions" => array()));
	}
	
	public function getAllQuestionPaper()
	{
		return $this->questionPapers;
	}

	public function create(QuestionPaper $questionPaper)
	{
		array_push($this->questionPapers, array(
			"questionPaperId"    => $questionPaper->getQuestionPaperId(),
			"questionPaperTitle" => $questionPaper->getQuestionPaperTitle(),
			"dateCreated"        => $questionPaper->getDateCreated(), 
			"dateUpdated"        => $questionPaper->getDateUpdated(),
			"questions"          => $questionPaper->getAllQuestions()));
	}

	public function findById($questionPaperId)
	{
		foreach ($this->questionPapers as $questionPaper) {
			if($questionPaper["questionPaperId"] == $questionPaperId){
    			return $questionPaper;
    		}
		}
		throw new Exception("No Questionpaper found");
	}

	public function getQuestionsByQuestionpaperId($questionPaperId)
	{
		$questionPaper = $this->findById($questionPaperId);
		return $questionPaper["questions"];
	}

	public function createQuestionForQuestionPaper($questionPaperId,Question $question)
	{
		$questionPaper = $this->findById($questionPaperId);
		array_push($questionPaper["questions"],$question);
	}
}