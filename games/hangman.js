var words = ["компьютер", "клавиатура", "конфета", "книга", "кран","игра","колледж","сумка","кино","музыка"];
			var word = words[Math.floor(Math.random() * words.length)];

			var answerArray = [];
				for (var i = 0; i < word.length; i++) {
					answerArray[i] = "_";
				};
			var remainingLetters = word.length;
			var tries = 20;

			$("#start").click(function(){
			while (remainingLetters > 0 && tries > 0) {
					$("#word").text(answerArray.join(" "));

				var guessToLower = prompt("Введите букву");
				var guess = guessToLower.toLowerCase();

				if(guess){
					tries--;
					location.reload();
				}

				if (guess === null) {
					break;
				} else if (guess.length !== 1) {
					$("#text").text("Введите одиночную букву.");
				} else {
					for (var j = 0; j < word.length; j++) {
						if (word[j] === guess) {
							answerArray[j] = guess;
							remainingLetters--;
							}
						}
					}
				}});
			if(tries === 0){
				$("#text").text("Попыток больше нет :(");
				$("#text").text("Загаданное слово: " + word);
			} else if(j === word.length){
				$("#text").text("Победа! Загаданное слово: " + word);
			}