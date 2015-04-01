<?php  namespace src;

use src\Question;
use Assert\AssertionFailedException;

class QuestionTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_create_valid_question()
    {
    	$question = new Question("What is PHP?");

    	$this->assertInstanceOf(Question::class, $question);

    }

    public function test_it_should_throw_exception()
    {
        $this->setExpectedException('Assert\AssertionFailedException');
    	$question = new Question(null);
    }
}

