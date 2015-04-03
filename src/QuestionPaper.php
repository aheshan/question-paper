<?php namespace src;

/**
 * @Entity @Table(name="question_papers")
 **/
class QuestionPaper
{
    /**
    * @Id @Column(type="integer",name="id") @GeneratedValue 
    * @var integer
    */
    private $questionPaperId;

    /**
     * @Column(type="string",name="question_paper_title",length=100)
     * @var string
     */
    private $questionPaperTitle;
    
    /**
     * @OneToMany(targetEntity="Question", mappedBy="questionPaper")
     * @var Question []
     */
    private $questions;
    
    /**
     * @Column(type="datetime",name="created_at")
     * @var date
     */
    private $dateCreated;

    /**
     * @Column(type="datetime",name="updated_at")
     * @var date
     */
    private $dateUpdated;

    public function __construct($questionPaperTitle)
    {
        $this->questionPaperTitle = $questionPaperTitle;
        $this->questions          = array();
        $this->dateCreated        = new \DateTime("now");
    }
    /**
     * Write new question in question paper
     * @param  Question $question
     */
    public function writeNewQuestion($questionTitle)
    {
        if ($this->isNewQuestion($questionTitle)) {
            $question = new Question($questionTitle, $this);
            $this->questions[] = $question;

            return $question;
        }

         throw new \Exception('This question is duplicate in this question paper!');
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
        foreach ($this->questions as $question){
        	if($questionTitle==$question->getQuestionTitle())
        		return false;
        }
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

    public static function createFromArray($array)
    {
        $questionPaper = new QuestionPaper($array["questionPaperTitle"]);
        $questionPaper->setQuestionPaperId($array["questionPaperId"]); //TODO: set proper id mehcnism
        $questionPaper->setDateUpdated($array["dateUpdated"]);
        return $questionPaper;

    }
}
