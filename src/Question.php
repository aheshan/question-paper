<?php namespace src;

use Assert\Assertion;

/**
 * @Entity @Table(name="questions")
 **/
class Question
{
    /**
    * @Id @Column(type="integer",name="id") @GeneratedValue 
    * @var integer
    */
    private $questionId;

    /**
    * @Column(type="string",name="question_title",length=200) 
    * @var string
    */
    private $questionTitle;
	
	/**
	 * @ManyToOne(targetEntity="QuestionPaper", inversedBy="$questions")
     * @JoinColumn(name="question_paper_id", referencedColumnName="id")
	 * @var QuestionPaper
	 */
    private $questionPaper;
	
    public function __construct($questionTitle,QuestionPaper $questionPaper)
    {
        
        Assertion::notEmpty($questionTitle);
        Assertion::string($questionTitle);

        $this->questionTitle = $questionTitle;
        $this->questionPaper = $questionPaper;
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
    
    public function setQuestionPaper(QuestionPaper $questionpaper)
    {
    	$this->questionPaper = $questionpaper;
    }
    public function getQuestionPaper()
    {
    	return $this->questionPaper;
    }
}
