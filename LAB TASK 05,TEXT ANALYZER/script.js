const analyzeBtn = document.getElementById('analyzeBtn');
const inputText = document.getElementById('inputText');
const resultsDiv = document.getElementById('results');
analyzeBtn.addEventListener('click', function() {
    const text = inputText.value;
    if (text.trim() === "") {
        resultsDiv.style.display = "block";
        resultsDiv.innerHTML = "<p class='error'>Please enter some text to analyze.</p>";
        return;
    }
    const charCount = text.length;
    const wordsArray = text.split(" ").filter(function(word) {
        return word.trim() !== "";
    });
    const wordCount = wordsArray.length;
    const reversedText = text.split("").reverse().join("");
    resultsDiv.style.display = "block";
    resultsDiv.innerHTML = `
        <p><strong>Total Characters:</strong> ${charCount}</p>
        <p><strong>Total Words:</strong> ${wordCount}</p>
        <p><strong>Reversed Text:</strong></p>
        <p style="word-wrap: break-word;">${reversedText}</p>
    `;
});