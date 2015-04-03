<?php  namespace src;

use src\QuestionPaperRepository;
use src\QuestionPaper;

class QuestionPaperRepositaryTest extends \PHPUnit_Framework_TestCase
{
	protected $qPaperRepo;

    protected function setUp()
    {
        $this->qPaperRepo = new QuestionPaperRepository();
    }

	public function test_it_shuld_create_new_qpaper()
	{
		
		$prevCount = count($this->qPaperRepo->getAllQuestionPaper());
		$this->qPaperRepo->create(new QuestionPaper("Mathematics"));
		$newCount = count($this->qPaperRepo->getAllQuestionPaper());

		$this->assertEquals($prevCount+1,$newCount);
	}
	public function test_it_should_return_questionpaper()
	{
		$prevCount = $this->qPaperRepo->findById(1);
		$this->assertEquals($prevCount->getQuestionPaperId(),1);	
	}

	public function test_it_should_create_new_question()
	{
		$prevCount = count($this->qPaperRepo->getQuestionsByQuestionpaperId(1));
		
		$this->qPaperRepo->createQuestionForQuestionPaper(1,
			new Question("What is php?"));
		$newCount = count($this->qPaperRepo->getQuestionsByQuestionpaperId(1));
		
		$this->assertEquals($prevCount+1,$newCount);	
	}
}