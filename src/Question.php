<?php namespace src;

use Assert\Assertion;

class Question
{
    /**
    * @var integer
    */
    private $questionId;

    /**
    * @var string
    */
    private $questionTitle;

    public function __construct($questionTitle)
    {
        
        Assertion::notEmpty($questionTitle);
        Assertion::string($questionTitle);

        $this->questionTitle = $questionTitle;
    }

    public function setQuestionId($questionId)
    {
        $this->questionId = $questionId;
    }

    public function getQuestionId()
    {
        return $this->questionId;
    }

    public function getQuestionTitle()
    {
        return $this->questionTitle;
    }
}
