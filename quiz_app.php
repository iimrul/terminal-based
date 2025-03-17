<?php
//Predefined Array:
$questions = [

    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?', 'correct' => 'Shakespeare'],

];

//Collect Answer from the user:
$answers = [];
foreach ($questions as $index => $quiz) {
    echo ($index + 1) . ". " . $quiz['question'];
    $answers[] = trim(readline("\nAnswer: "));
}

//Define function:
function evaluateQuiz(array $questions, array $answers): int
{
    $score = 0;
    foreach ($questions as $index => $quiz) {
        if ($answers[$index] === $quiz['correct']) {
            $score++;
        }
    }
    return $score;
}

//Evaluate the Score with Passing the Argument:
$score = evaluateQuiz($questions, $answers);

echo "You scored $score out of " . count($questions) . "\n";

//Feedback
if ($score === count($questions)) {
    echo "Excellent Job!\n";
} elseif ($score > 1) {
    echo "Good Effort!\n";
} else {
    echo "Better Luck next time!\n";
}
