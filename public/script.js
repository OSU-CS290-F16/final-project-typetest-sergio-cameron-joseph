/*********************************************************
 * File Overview:
 * Generates the actual WPM Test and allows user input
 *
 * Dependencies:
 * Index.html (homepage), array.js, server.js
 *
 * Outputs:
 * Variable "wpm" (to be stored in user's data)
*********************************************************/

//Get the ten placeholders
var currentWord =   document.getElementById("first");
var wordTwo     =  document.getElementById("second");
var wordThree   =   document.getElementById("third");
var wordFour    =  document.getElementById("fourth");
var wordFive    =   document.getElementById("fifth");
var wordSix     =   document.getElementById("sixth");
var wordSeven   = document.getElementById("seventh");
var wordEight   =  document.getElementById("eighth");
var wordNine    =   document.getElementById("ninth");
var wordTen     =   document.getElementById("tenth");

//Variables for  timer
var inputBox  = document.getElementById("input");
var countdown = document.getElementById("timer");
var counting  = false;
var counterDone = false;

//Variables for refresh
var redo = document.getElementById("f5");

//WPM count variable
var wpm;

//Populate initially
refresh();

//returns a random word from the array
function selectWord() {
    var randomNumber = Math.floor(Math.random() * 501);
    var randomWord   = array[randomNumber];
    console.log(randomWord);
    return randomWord;
}

//Starts/resets timer
function timerCountdown(){
    var counter = 60;
    //var counting is enabled/disabled depending on reset
    counting = true;
    var id = setInterval(function() {
        if (counting == false)
        {
            clearInterval(id);
        }
        else {
            counter--;
            if (counter < 0) {
                counterDone = true;
                counting = false;
                inputBox.disabled = true;
                window.alert("TIME IS UP! YOUR WPM IS " + wpm);
                clearInterval(id);
            } else {
                if (counter < 10) {
                    countdown.innerHTML = "0" + counter.toString();
                }
                else {
                    countdown.innerHTML = counter.toString();
                }
            }
        }
    }, 1000)
}
//Initial population and repopulation depending if f5 button is pressed
function refresh() {
    inputBox.disabled = false;
    wordTen.innerHTML     = selectWord();
    wordNine.innerHTML    = selectWord();
    wordEight.innerHTML   = selectWord();
    wordSeven.innerHTML   = selectWord();
    wordSix.innerHTML     = selectWord();
    wordFive.innerHTML    = selectWord();
    wordFour.innerHTML    = selectWord();
    wordThree.innerHTML   = selectWord();
    wordTwo.innerHTML     = selectWord();
    currentWord.innerHTML = selectWord();

    var counter = 60;
    counting = false;
    countdown.innerHTML = counter.toString();
    wpm = 0;
    
}

//Called whenever user presses spacebar
function updateWord() {
    currentWord.innerHTML =   wordTwo.innerHTML;
    wordTwo.innerHTML     = wordThree.innerHTML;
    wordThree.innerHTML   =  wordFour.innerHTML;
    wordFour.innerHTML    =  wordFive.innerHTML;
    wordFive.innerHTML    =   wordSix.innerHTML;
    wordSix.innerHTML     = wordSeven.innerHTML;
    wordSeven.innerHTML   = wordEight.innerHTML;
    wordEight.innerHTML   =  wordNine.innerHTML;
    wordNine.innerHTML    =   wordTen.innerHTML;
    wordTen.innerHTML     =        selectWord();
}

//if input box is selected, timer starts
inputBox.addEventListener('click', function () {
   //removes listener right after so that multiple timers do not run
   inputBox.addEventListener('keydown', timerCountdown());
   inputBox.removeEventListener('keydown',timerCountdown());
});

});

//if "f5" button is selected, reset timer and change words
redo.addEventListener('click', function () {
    refresh();
});

//If space is pushed,  compare input to actual value, change wpm and reset input box
inputBox.onkeyup = function(e){
    if(e.keyCode == 32){
        //console.log("before update: " + currentWord.innerHTML.trim());
        //console.log("input value: " + inputBox.value.trim());
        if (inputBox.value.trim() == currentWord.innerHTML.trim()){
            wpm++
            //console.log("wpm: " + wpm);
        }
        inputBox.value = "";
        updateWord();
        //console.log("after update: " + currentWord.innerHTML.trim());
    }
};
