<?php


require_once "bootstrap.php";

use src\QuestionPaperService;
use src\QuestionPaperRepository;
use src\Question;
use src\QuestionPaper;

$qPaperRepo = new QuestionPaperRepository($entityManager);
$questionPaperService = new QuestionPaperService($qPaperRepo);

//$questionPaperService->createNewQuestionPaper("PHP");
$questionPaper = $questionPaperService->getQuestionPaperById(1);

echo "Title is: ".$questionPaper->getQuestionPaperTitle();

//$questionPaperService->writeQustionInQuestionPaper($questionPaper,"What is a class?");
//$questionPaperService->writeQustionInQuestionPaper($questionPaper,"What is a variable?");
//$questionPaperService->writeQustionInQuestionPaper($questionPaper,"define methods in class?"); 

echo "<br/>Question Count:".count($questionPaper->getAllQuestions());

$questionPapers = $questionPaperService->getAllQuestionPapers();
echo "<h1>Question Papers</h1>";
foreach ($questionPapers as $questionPaper){
	echo "<li>Question Paper title:".$questionPaper->getQuestionPaperTitle()."</li>";
	foreach ($questionPaper->getAllQuestions() as $question){
		echo "<br/>Question  title:".$question->getQuestionTitle()."";
	}
}
?>


