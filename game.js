// Get the modal
var modal = document.getElementById("myModal");
// Add header
var header = document.getElementById("modal-header");
// Get paragraph for text
var message = document.getElementById("message");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// Progress bar variable
const progressBarFull = document.getElementById("progressBarFull");



var images = {
    "rightOne": "images/qr-code.png",
    "wrongOne": "images/qr-code.png",
    "rightTwo": "images/qr-code.png",
    "wrongTwo": "images/qr-code.png",
    "rightThree": "images/qr-code.png",
    "wrongThree": "images/qr-code.png"
}
function populate() {
    if (quiz.isEnded()) {
        showScores();
    } else {
        // show question
        var element = document.getElementById("question");
        element.innerHTML = quiz.getQuestionIndex().text;

        // show options
        var choices = quiz.getQuestionIndex().choices;
        for (var i = 0; i < choices.length; i++) {
            var element = document.getElementById("choice" + i);
            element.innerHTML = images[choices[i]] ? '<img src="' + images[choices[i]] + '"/>' : choices[i];
            guess("btn" + i, choices[i]);
        }

        showProgress();
    }
};

function guess(id, guess) {
    var button = document.getElementById(id);
    button.onclick = function () {
        quiz.guess(guess);
        populate();
    }
};

function showProgress() {
    var currentQuestionNumber = quiz.questionIndex + 1;
    var element = document.getElementById("progress");
    element.innerHTML = "Question " + currentQuestionNumber + " of " + quiz.questions.length;
    progressBarFull.style.width = `${(currentQuestionNumber / quiz.questions.length) * 100}%`;
};

function showScores() {
    modal.style.display = "block";
    header.innerHTML = "GREAT JOB!";
    span.onclick = function() {
        modal.style.display = "none";
        var gameOverHTML = "<h1>GREAT JOB!</h1>";
        gameOverHTML += "<h2 id='score'>Now we would like you to take a small survey.</h2>";
        gameOverHTML += '<div class="contents"><a href="/survey.html" class="button">Continue</a></div>';
        var element = document.getElementById("quiz");
        element.innerHTML = gameOverHTML; 
    }   
};

// create questions
var questions = [
    new Question("Choose the right picture.", ["rightOne", "wrongOne"], "rightOne", "A flyer with a URL on it indicates that the QR code is more trust worthy. To be extra safe type in the URL instead", "You may have just infected your phone! Never trust QR code that doesn't have a URL with it on a random flyer in a public place."),
    new Question("Choose the right picture.", ["rightTwo", "wrongTwo"], "rightTwo", " ", " "),
    new Question("Choose the right picture.", ["rightThree", "wrongThree"], "rightThree"," "," "),
];

function Question(text, choices, answer, right, wrong) {
    this.text = text;
    this.choices = choices;
    this.answer = answer;
    this.right = right;
    this.wrong = wrong;
}

Question.prototype.isCorrectAnswer = function (choice) {
    if(this.answer === choice) {
        modal.style.display = "block";
        header.innerHTML = "GREAT JOB!";
        message.innerHTML = quiz.getQuestionIndex().right;
        span.onclick = function() {
            modal.style.display = "none";
        }
    } else {
        modal.style.display = "block";
        header.innerHTML = "OH NO!";
        message.innerHTML = quiz.getQuestionIndex().wrong;
        span.onclick = function() {
            modal.style.display = "none";           
        }
    }
    return this.answer === choice;
}


function Quiz(questions) {
    this.score = 0;
    this.questions = questions;
    this.questionIndex = 0;
}

Quiz.prototype.getQuestionIndex = function () {
    return this.questions[this.questionIndex];
}

Quiz.prototype.guess = function (answer) {
    if (this.getQuestionIndex().isCorrectAnswer(answer)) {
        this.score++;
        this.questionIndex++;
    }
}

Quiz.prototype.isEnded = function () {
    return this.questionIndex === this.questions.length;
}

// create quiz
var quiz = new Quiz(questions);

// display quiz
populate();