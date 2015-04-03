<?php namespace src;

use src\QuestionPaper;

class QuestionPaperRepository
{
	private $entityManager;
	
	public function __construct($entityManager)
	{
		$this->entityManager = $entityManager;
	}
	
	public function getAllQuestionPaper()
	{
		$dql = "select q from src\QuestionPaper q";
		return $this->entityManager->createQuery($dql)
								   ->getResult();
	}

	public function create(QuestionPaper $questionPaper)
	{
		
		$this->entityManager->persist($questionPaper);
		$this->entityManager->flush();
	}

	public function findById($questionPaperId)
	{
		$questionPaper = $this->entityManager->find("src\QuestionPaper", (int)$questionPaperId);
		if(!is_null($questionPaper))
			return $questionPaper;
		throw new Exception("No Questionpaper found");
	}


	public function createQuestionForQuestionPaper(Question $question)
	{	
		$this->entityManager->persist($question);
		$this->entityManager->flush();
	}
}