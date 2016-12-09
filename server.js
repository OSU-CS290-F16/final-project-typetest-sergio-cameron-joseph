 var path = require('path');
 var express = require('express');
 var exphbs = require('express-handlebars');
 
 var app = express();
 var rankData = require('./rank-data');
 var port = process.env.PORT || 3000;
 
 app.engine('handlebars', exphbs({ defaultLayout: 'main' }))
 app.set('view engine', 'handlebars');
 
 app.use(express.static(path.join(__dirname, 'public')));
 
 app.get('/', function(req, res){
	 res.render('index-page', {
		 title: 'Type Tester'
	});
});

app.get('/leaderboard', function(req, res){
	
	res.render('leaderboard-page', {
		title: 'Top 10',
		pageName: 'Top 10 Ranking',
		ranks: rankData.ranks
	});
});

app.get('*', function(req, res){
	res.status(404).render('404-page', {
		title: '404 Error'
	});
});

app.listen(port, function(){
	console.log("== Listening on port", port);
});