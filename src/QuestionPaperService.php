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
		$papers  = []; 
		if(!empty($questionPapers)){
			foreach ($questionpapers as $questionpaper) {
				QuestionPaper $qPaper = new QuestionPaper($questionpaper->title);
				$qPaper->setQuestionPaperId($questionpaper->id);
				$qPaper->setDateCreated($questionpaper->created_at);
				$qPaper->setDateUpdated($questionpaper->updated_at);

				foreach ($questionpaper->questions as $question) {
                    $qPaper->writeNewQuestion($question->title);	
				}

				$papers[] = $qPaper;
			}

			return $papers;
		}

		throw new Exception("There is no question paper in the system.");
	}

	public function createNewQuestionPaper($questionPaperTitle)
	{
		$questionPaper = new QuestionPaper($questionPaperTitle);

		$this->questionPaperRepository->create($questionPaper);
	}
}