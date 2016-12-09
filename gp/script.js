var read = ["the", "of", "to", "and", "a", "in", "is", "it", "you", 
			"that", "he", "was", "for", "on", "are", "with", "as", 
			"I", "his", "they", "be", "at", "one", "have", "this", 
			"from", "or", "had", "by", "hot"];

var checker;
var counter;
			
function words()
{
	for(i = 0; i < 300; i++)
	{
		
		var rand = Math.floor((Math.random() * 30)); 	
		
		var WordBank = document.getElementsByClassName("word-bank");
		var Span = document.createElement("span");
		
		Span.classList.add("none");
		WordBank[0].appendChild(Span);
		
		var word = read[rand];
		Span.textContent = word;
		
		console.log(read[rand]);		
		
	}
	
}


var count = 60;

function timer()
{	
	
    if (count === 0)
	{
		
		clearInterval(counter);
		console.log(count);
		
		return;
		
	}
	
    count = count - 1;

    document.getElementById("timer").innerHTML= "Time: " + count;	
	
}

var checknum = 6000;

function check()
{

	console.log(document.getElementsByClassName("first")[0].innerText);
	document.getElementById("word-count").innerHTML= "Word Count: " + wordcount;
	
	if((document.getElementById('input').value === document.getElementsByClassName("first")[0].innerText) && (checknum > 0))
	{
		
		wordcount++;
		
		document.getElementById("word-count").innerHTML= "Word Count: " + wordcount;	
		document.getElementsByClassName("first")[0].remove();
		
		var firstword = document.querySelector(".none");
		firstword.setAttribute("class", "first");
		
		document.getElementById('input').value = "";
				
	}	
	
	if (checknum === 0)
	{
		
		clearInterval(checker);
		console.log(checknum);		
		
		return;
		
	}
	
	checknum = checknum - 1;
	
}

var wordcount = 0;

function start()
{

	var checker=setInterval(check, 10);
	var counter=setInterval(timer, 1000);
	
	var firstword = document.querySelector(".none");
	firstword.setAttribute("class", "first");
	
}




