<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Supply the missing code
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$timestamp = strtotime($birthdate);
$birthdate =  date("F j, Y", $timestamp);
$contact_number = $_POST['contact_number'];
$agree = $_POST['agree'];
// $answer = $_POST['answer'];
$answers = $_POST['answers'];



// if (!is_null($answer)) {
//     $answers .= $answer;
// }

// Use the compute_score() function from helpers.php
 $score = compute_score($answers);

 $hero_class = $score > 2 ? 'is-success' : 'is-danger';
 $questions = retrieve_questions();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/site/site.min.css">
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
</head>
<body>
<section class="hero <?php echo $hero_class; ?>">
    <div class="hero-body">
        <p class="title">Your Score <?php echo $score; ?></p>
        <p class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</p>
    </div>
</section>
<section class="section">
    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <tbody>
                <tr>
                    <th>Input Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Complete Name</td>
                    <td><?php echo $complete_name; ?></td>
                </tr>
                <tr class="is-selected">
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td><?php echo $birthdate; ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo $contact_number; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="table-container">
        <h2 class="subtitle">Quiz Results</h2>
        <table class="table is-bordered is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions['questions'] as $index => $question): ?>
                    <tr>
                        <td><?php echo ($question['question']); ?></td>
                        <td><?php 
                            $correct_option = array_filter($question['options'], function($option) {
                                return !empty($option['correct']) && $option['correct'] === true;
                            });
                            $correct_answer = reset($correct_option);
                            echo ($correct_answer['value'] ?? 'No correct answer');
                        ?></td>
                        <td><?php 
                            $user_answer_letter = isset($answers[$index]) ? $answers[$index] : null;
                            $user_answer_value = 'Did not answer';
                            if ($user_answer_letter) {
                                foreach ($question['options'] as $option) {
                                    if ($option['key'] === $user_answer_letter) {
                                        $user_answer_value = $option['value'];
                                        break;
                                    }
                                }
                            }
                            
                            echo htmlspecialchars($user_answer_value);
                        ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <canvas id="confetti-canvas" style="display: <?php echo $score === 5 ? 'block' : 'none'; ?>;"></canvas>
</section>

<script>
    if (document.getElementById('confetti-canvas').style.display === 'block') {
        var confettiSettings = {
            target: 'confetti-canvas'
        };
        var confetti = new ConfettiGenerator(confettiSettings);
        confetti.render();
    }
</script>
</body>
</html>