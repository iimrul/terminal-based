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

/* <Assignment-2> */

$contacts = [];

function addContact(array &$contacts, string $name, string $email, string $phone): void
{
    $contacts[] = ['name' => $name, 'email' => $email, 'phone' => $phone];
}

function displayContacts(array $contacts): void
{
    if (empty($contacts)) {
        echo "No contacts available.\n";
    } else {
        foreach ($contacts as $contact) {
            echo "Name: {$contact['name']}, Email: {$contact['email']}, Phone: {$contact['phone']}\n";
        }
    }
}

while (true) {
    echo "\nContact Management Menu:\n";
    echo "1. Add Contact\n2. View Contacts\n3. Exit\n";
    $choice = (int)readline("Choose an option: ");

    if ($choice === 1) {
        $name = readline("Enter name: ");
        $email = readline("Enter email: ");
        $phone = readline("Enter phone number: ");

        addContact($contacts, $name, $email, $phone);
        echo "$name added to contacts.\n";
    } elseif ($choice === 2) {
        displayContacts($contacts);
    } elseif ($choice === 3) {
        echo "Exiting...\n";
        break;
    } else {
        echo "Invalid choice. Please try again.\n";
    }
}
