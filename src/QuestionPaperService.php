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

		$this->questionPaperRepository->create($questionPaper);
	}

	public function writeQustionInQuestionPaper(QuestionPaper $questionPaper,
		$questionTitle)
	{
		$quetion = $questionPaper->writeNewQuestion($questionTitle);
		
		$this->questionPaperRepository->createQuestionForQuestionPaper
		($questionPaper->getQuestionPaperId(),$question);
	}
}