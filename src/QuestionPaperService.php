<?php namespace src;

class QuestionPaperService
{
	private $questionPaperRepository;

	public function __construct(QuestionPaperRepository $questionPaperRepository)
	{
		$this->questionPaperRepository = $questionPaperRepository;
	}

	public function getAllQuestionPapers()
	{
		$questionPapers = $this->questionPaperRepository->getAllQuestionPaper();
		
		if(!empty($questionPapers)){
			
			return $questionPapers;
		}

		throw new Exception("There is no question paper in the system.");
	}

	public function createNewQuestionPaper($questionPaperTitle)
	{
		$questionPaper = new QuestionPaper($questionPaperTitle);
		$questionPaper->setDateUpdated(new \DateTime("now"));
		$this->questionPaperRepository->create($questionPaper);
	}


	public function getQuestionPaperById($questionPaper)
	{
		return $this->questionPaperRepository->findById($questionPaper);
	}

	public function writeQustionInQuestionPaper(QuestionPaper $questionPaper,
		$questionTitle)
	{
		$question = $questionPaper->writeNewQuestion($questionTitle);
		
		$this->questionPaperRepository->createQuestionForQuestionPaper
		($question);
		
		
	}
}