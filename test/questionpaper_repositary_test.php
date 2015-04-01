<?php  namespace src;

use src\QuestionPaperRepository;
use src\QuestionPaper;

class QuestionPaperRepositaryTest extends \PHPUnit_Framework_TestCase
{
	public function test_it_shuld_create_new_qpaper()
	{
		
		$qPaperRepo = new QuestionPaperRepository();
		$prevCount = count($qPaperRepo->getAllQuestionPaper());
		$qPaperRepo->create(new QuestionPaper("Mathematics"));
		$newCount = count($qPaperRepo->getAllQuestionPaper());

		$this->assertEquals($prevCount+1,$newCount);
	}
}