<?php namespace src;

class QuestionPaper
{
    /**
    * @var integer
    */
    private $questionPaperId;

    /**
     * @var string
     */
    private $questionPaperTitle;
    
    /**
     * @var Question []
     */
    private $questions;
    
    /**
     * @var date
     */
    private $dateCreated;

    /**
     * @var date
     */
    private $dateUpdated;

    public function __construct($questionPaperTitle)
    {
        $this->questionPaperTitle = $questionPaperTitle;
        $this->questions          = array();
        $this->dateCreated        = date('m/d/Y h:i:s', time());
    }
    /**
     * Write new question in question paper
     * @param  Question $question
     */
    public function writeNewQuestion($questionTitle)
    {
        if ($this->isNewQuestion($questionTitle)) {
            $question = new Question($questionTitle);
            $this->questions[] = $question;

            return $question;
        }

         throw new Exception('This question is duplicate in this question paper!');
    }
    /**
    * Check if question paper is valid for persistance context
    * @return boolean
    */
    public function isValidForPersistance()
    {
        // Question paper title should not be empty
        // Question paper title length between 3 to 20 characters only
        // Date created should be valid date
        return true;
    }
    private function isNewQuestion($questionTitle)
    {
        
        return true;
    }
    /**
     * get All question from the question paper
     * @return Question []
     */
    public function getAllQuestions()
    {
        return $this->questions;
    }

    /**
     * @return integer
     */
    public function getQuestionPaperId()
    {
        return $this->questionPaperId;
    }
    
    /**
     * @return string
     */
    public function getQuestionPaperTitle()
    {
        return $this->questionPaperTitle;
    }

    /**
     * @return DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
    
    /**
    * @return DateTime
    */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @param integer
     */
    public function setQuestionPaperId($questionPaperId)
    {
        $this->questionPaperId = $questionPaperId;
    }

    /**
    * @var DateTime
    */
    public function setDateUpdated($dateUpdated)
    {
        return $this->dateUpdated = $dateUpdated;
    }
}
