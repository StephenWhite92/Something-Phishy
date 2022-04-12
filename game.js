// Get the modal
var modal = document.getElementById("myModal");
// Add header
var header = document.getElementById("modal-header");
// Get paragraph for text
var message = document.getElementById("message");
// Get the continue button
var cont = document.getElementsByClassName("button")[0];
// Progress bar variable
const progressBarFull = document.getElementById("progressBarFull");

window.onload = function () {
    modal.style.display = "block";
    header.innerHTML = "How to play the game.";
    message.innerHTML = "<h3>We will present you with 2 scenarios. Click on the scenario image that is a safer choice when scanning a QR code.</h3>";
    cont.onclick = function() {
        modal.style.display = "none";
    }
};

var images = {
    "rightOne": "images/Q1A1.jpg",
    "wrongOne": "images/Q1A2.jpg",
    "rightTwo": "images/Q2A1.jpg",
    "wrongTwo": "images/Q2A2.jpg",
    "rightThree": "images/Q3A2.png",
    "wrongThree": "images/Q3A1.png",
    "rightfour": "images/Q4A2.jpg",
    "wrongfour": "images/Q4A1.jpg",
    "rightfive": "",
    "wrongfive": "",
    "rightsix": "",
    "wrongsix": "",
    "rightseven": "",
    "wrongseven": "",
    "righteight": "",
    "wrongeight": ""


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
    cont.onclick = function() {
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
    new Question("Which QR code seems safer to scan?", ["rightOne", "wrongOne"], "rightOne", "A flyer with a URL on it indicates that the QR code is more trust worthy. To be extra safe type in the URL instead", "You may have just infected your phone! Never trust QR code that doesn't have a URL with it on a random flyer in a public place. A hacker could have just gained access to all of the contacts on your mobile device."),
    new Question("Look at the positioning of the QR code. Which one appears safer?", ["rightTwo", "wrongTwo"], "rightTwo", "Correct! This flyer has a generated and non altered QR code. The other flyer had been covered with a malicious QR sticker. ", "Incorrect. Notice how the QR code is not aligned correctly? This flyer had been 'hijacked' and could potentially lead you to a malicious site or contaminate your device with unwanted software or trackers. There is a lot of stored data on your phone, for example this could put all of your banking information at risk of being phished."),
    new Question("What type of QR code scanner is more secure?", ["wrongThree", "rightThree"], "rightThree","Correct. Kaspersky QR scanner will check the scanned link is safe as well as scans to see if codes will open texts, images & more.","Incorrect. Apple's built in QR scanning is less secure. While it does show you the link, it does not scan it for potential malicous actions."),
    new Question("Make sure to note the URL when scanning QR codes. Which QR link looks safer?", ["rightfour", "wrongfour"], "rightfour", "Nice! Be wary of QR codes that take you to sites with URLs similar to popular sites!", "Incorrect. Notice the mispelling on the mizzou.edu link? Make sure to pay attention to the URL that appears when you scan QR codes." ),
    new Question("", ["rightfive", "wrongfive"], "rightfive", "", " " ),
    new Question("", ["rightsix", "wrongsix"], "rightsix", " ", " " ),
    new Question("", ["rightseven", "wrongseven"], "rightseven", " ", " " ),
    new Question("", ["righteight", "wrongeight"], "righteight", " ", " " ),
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
        cont.onclick = function() {
            modal.style.display = "none";
        }
    } else {
        modal.style.display = "block";
        header.innerHTML = "OH NO!";
        message.innerHTML = quiz.getQuestionIndex().wrong;
        cont.onclick = function() {
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
