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
    header.innerHTML = '<img src="images/important.png" class="important"><p>Instructions</p>';
    message.innerHTML = "<h3>We will present you with 2 scenarios. Click on the scenario image that is a safer choice when scanning a QR code.</h3>";
    cont.onclick = function() {
        modal.style.display = "none";
    }
};

var images = {
    "rightOne": 'artwork/Q1A1.jpg" alt="Flyer with QR code and URL describing site.' ,
    "wrongOne": 'artwork/Q1A2.jpg" alt="Flyer with QR code only.',
    "rightTwo": 'artwork/Q2A1.jpg" alt="Flyer with non tampered with QR code.',
    "wrongTwo": 'artwork/Q2A2.jpg" alt="Flyer with an off center/tampered with QR code.',
    "rightThree": 'artwork/Q3A2.png" alt="Apple logo.',
    "wrongThree": 'artwork/Q3A1.png" alt="Kaspersky logo',
    "rightfour": 'artwork/Q4A2.jpg" alt="QR URL with correct spelling.',
    "wrongfour": 'artwork/Q4A1.jpg" alt="QR URL with incorrect spelling.',
    "rightfive": 'artwork/Q5A1.jpg" alt="Rewards program QR code flyer located at shop counter.',
    "wrongfive": 'artwork/Q5A2.jpg" alt="Reward program QR code flyer located on random public notice board.',
    "rightsix": 'artwork/Q6A2.jpg" alt="Charity flyer with Venmo QR code and Venmo username located on it.',
    "wrongsix": 'artwork/Q6A1.jpg" alt="Charity flyer with Venmo QR code located on it.',
    "rightseven": 'artwork/Q7A2.png" alt="Pizza flyer with QR code to download app.',
    "wrongseven": 'artwork/Q7A1.png" alt="Pizza flyer with app store links to download app.',
    "righteight": 'artwork/Q8A1.png" alt="Flyer with QR code with URL provided, posted in an appropriate place.',
    "wrongeight": 'artwork/Q8A2.png" alt="Flyer with QR claiming a free Iphone giveaway located in a sketchy alley.'


}
function populate() {
    if (quiz.isEnded()) {
        showScores();
    } else {
        // show question
        var element = document.getElementById("question");
        var scenario = document.getElementById("scenario");
        element.innerHTML = quiz.getQuestionIndex().text;
        scenario.innerHTML = quiz.getQuestionIndex().scenario;

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
    cont.onclick = function() {
        modal.style.display = "none";
        var gameOverHTML = "<h1>GREAT JOB!</h1>";
        gameOverHTML += "<h2 id='score'>You are now more educated in QR Code security!<br><br>Now complete this short survey to be entered into the giveaway.</h2>";
        gameOverHTML += '<div class="contents"><a href="/survey.html" style="text-decoration: none" class="button">Continue</a></div>';
        var element = document.getElementById("quiz");
        element.innerHTML = gameOverHTML; 
    }   
};

// create questions
var questions = [
    new Question("Which QR code seems safer to scan?","When scanning QR codes posted on flyers, billboards, etc. it is good practice to only scan codes that are also presented along with the URL that the QR takes you to.<br><br>But be aware, the posted URL could actually be different than what the QR is set to take you to. ", ["rightOne", "wrongOne"], "rightOne", "A flyer with a URL on it indicates that the QR code is more trust worthy. To be extra safe type in the URL instead", "You may have just infected your phone! Never trust QR code that doesn't have a URL with it on a random flyer in a public place. A hacker could have just gained access to all of the contacts on your mobile device."),
    new Question("Which QR code seems safer to scan?","These are two different flyers for a resturant to view their menu. One menu's QR code is normal, while the other has been 'hijacked', or in other words, covered up with a new QR code. <br><br>Be sure to look for anything abnormal about the QR, such as its alignment or positioning. In person you can feel if a sticker has been placed over the QR.", ["rightTwo", "wrongTwo"], "rightTwo", "Correct! This flyer has a generated and non altered QR code. The other flyer had been covered with a malicious QR sticker. ", "Incorrect. Notice how the QR code is not aligned correctly? This flyer had been 'hijacked' and could potentially lead you to a malicious site or contaminate your device with unwanted software or trackers. There is a lot of stored data on your phone, for example this could put all of your banking information at risk of being phished."),
    new Question("What type of QR code scanner is more secure? Apple or Kaspersky?","Not all QR scanners are considered safe. While most people likely use the built in QR scanning software of their phone's camera app, that's not always the safest.<br><br>Third party, security focused scanners, like Kaspersky's have built in checks to make sure the link is safe. Not all third party QR scanners are safe though, often they contain trackers and sell your data; make sure to only use software from reputable sources/companies.", ["wrongThree", "rightThree"], "rightThree","Correct. Kaspersky QR scanner will check the scanned link is safe as well as scans to see if codes will open texts, images & more.<br>Click <a href=https://usa.kaspersky.com/qr-scanner#download-section>here</a> to download the scanner.","Incorrect. Apple's built in QR scanning is less secure. While it does show you the link, it does not scan it for potential malicous actions."),
    new Question("Which QR link looks safer?","Thoroughly checking the URL address that a QR code takes you to is very important. Malicious QR codes could link you to websites that have very similar spelling to popular websites, but are one letter off. These fake websites look like the original, but will steal your credentials if you log into them!<br><br>Always check the URL of the site that a QR takes you to.", ["rightfour", "wrongfour"], "rightfour", "Nice! Be wary of QR codes that take you to sites with URLs similar to popular sites!", "Incorrect. Notice the mispelling on the mizzou.edu link? Make sure to pay attention to the URL that appears when you scan QR codes." ),
    new Question("What QR seems to be located in a safer location?","Often the location of a QR code can be a good indicator of it's legitimacy. QR codes placed on flyers or advertisements within businesses, near entrances and check out registers are generally safe. <br><br>QR codes placed on flyers or advertisements in public areas are more prone to being malicious and/or open to 'hijacking'. Avoid scanning public QR codes that you don't need to.", ["wrongfive", "rightfive"], "rightfive", "Correct! QR Codes placed at public business counters are generally safe and placed on purpose!", "Incorrect. QR codes placed in random public places are more likely to be malicious. If you don't have a purpose to scan a QR, dont!" ),
    new Question("Which charity flyer is safer?","Money transfer apps are very popular among college students. Scanning QR codes to transfer money should never be done. You could scan the code and initiate the transfer before you realize it is not going to where you intended.<br><br>Typing in the username of who you are transfering money to is a much safer option.", ["wrongsix", "rightsix"], "rightsix", "Correct. Don't scan QR codes when dealing with money transfers. It is much safer to just type in the name of the user you are sending money to.", "Incorrect. QR codes should not be scanned to transfer money. The QR could be malicious and initate money transfers to scammers, or worse, trick you into entering your login credentials on a fake website." ),
    new Question("Which flyer has a safer way of downloading the app?","When downloading any sort of software, avoid doing it via QR. You could be linked to a download page that looks very similar to the legitimate site, except that it is malicious and will download malware to your device.<br><br>Always visit the website or app store directly to install software.", ["rightseven", "wrongseven"], "rightseven", "Correct. Never scan a QR code to download any form of software, visit the download page directly to ensure you are not being phished.", "Incorrect. Scanning a QR code to download software is a bad idea. You could be tricked into downloading malicious software that could steal login credentials or install malware." ),
    new Question("Which QR overall seems safer?","Based on what all you have learned from the game so far, which QR would you think is safer to scan?", ["wrongeight", "righteight"], "righteight", "Correct. This QR is located in a safe spot, has the URL provided, and appears more legitimate overall. In general, when it comes to deciding to scan a QR code, if it seems to good to be true, it probably is!", "Incorrect. This QR code is located in a public area, does not have a URL with it, appears to be a phishing attempt. In general, when it comes to deciding to scan a QR code, if it seems to good to be true, it probably is!" ),
];

function Question(text, scenario, choices, answer, right, wrong) {
    this.text = text;
    this.scenario = scenario;
    this.choices = choices;
    this.answer = answer;
    this.right = right;
    this.wrong = wrong;
}

Question.prototype.isCorrectAnswer = function (choice) {
    if(this.answer === choice) {
        modal.style.display = "block";
        header.innerHTML = '<img src="images/check.png" class="check">GREAT JOB!';
        message.innerHTML = quiz.getQuestionIndex().right;
        cont.onclick = function() {
            modal.style.display = "none";
        }
    } else {
        modal.style.display = "block";
        header.innerHTML = '<img src="images/stop.png" class="stop">OH NO!';
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
