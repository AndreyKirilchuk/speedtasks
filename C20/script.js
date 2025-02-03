function wordRank(input) {
  const words = input.split(" ");
  let maxScore = 0;
  let bestWord = "";

  words.forEach(word => {
    let chars = word.replace(/[^a-zA-Z]/g, "")
    let score = 0;

    for (let char of chars) {
      score += char.toLowerCase().charCodeAt(0) - 96;
      //russian a 1072
      //english a 97
      alert(score);
    }

    if (score > maxScore) {
      maxScore = score;
      bestWord = word;
    }
  });

  return bestWord;
}

console.log(wordRank("Hello world.")); // "world"
