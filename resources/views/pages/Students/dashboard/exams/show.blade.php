<div>
    <div>
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title" id="question-title"></h5>

                <div id="answers-container">
                    <!-- Answers will be loaded here dynamically -->
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // Fetch the first question when the page loads
    window.onload = function () {
        fetchQuestion();
    };

    function fetchQuestion() {
        // Make an AJAX request to fetch the question and answers
        fetch('/fetch-question', {
            method: 'GET',
        })
        .then(response => response.json())
        .then(data => {
            // Update the question title
            document.getElementById('question-title').innerText = data.title;

            // Update the answers
            let answersContainer = document.getElementById('answers-container');
            answersContainer.innerHTML = ''; // Clear previous answers

            data.answers.forEach((answer, index) => {
                let answerElement = document.createElement('div');
                answerElement.innerHTML = `
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio${index}" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio${index}" onclick="nextQuestion(${data.id}, ${data.score}, '${answer}', '${data.right_answer}')">${answer}</label>
                    </div>
                `;
                answersContainer.appendChild(answerElement);
            });
        })
        .catch(error => console.error('Error:', error));
    }

    function nextQuestion(question_id, score, answer, right_answer) {
        // Make an AJAX request to submit the answer and fetch the next question
        fetch('/next-question', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                question_id: question_id,
                score: score,
                answer: answer,
                right_answer: right_answer
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Fetch the next question
                fetchQuestion();
            } else {
                // Handle error
                console.error('Error:', data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
