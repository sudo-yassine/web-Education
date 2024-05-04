<?php
require_once "../Controller/coursC.php";
$coursC = new coursC();

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["matiere"])) {
        $matiereId = $_POST["matiere"];
        $list = $coursC->affichercours($matiereId); 
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["niveau"])) {
        $niveau = $_POST["niveau"];
        $list = $coursC->searchByNiveau($niveau); // Assuming you have a method to search courses by niveau
    }
}

$matieres = $coursC->affichermatiere();

// Calculate total hours for each subject
$totalHoursPerSubject = [];
foreach ($matieres as $matiere) {
$totalHoursPerSubject[$matiere['id_matiere']] = $coursC->calculateTotalHoursForSubject($matiere['id_matiere']);
}


$matieres = $coursC->affichermatiere();


$quizzes = [
    2=> [
        'question' => 'What is the formula for the area of a circle?',
        'options' => ['A. πr²', 'B. 2πr', 'C. πd', 'D. ½bh'],
        'correct_answer' => 'A. πr²'
    ],
    // Define quizzes for other subjects as needed
3=> [
        'question' => 'What is the past tense of the verb "run"?',
        'options' => ['A) run', 'B) ran', 'C) running', 'D) runs'],
        'correct_answer' => 'B) ran'
    ],
   
    4 => [
        'question' => 'What does CSS stand for?',
        'options' => ['A) Creative Style Sheets', 'B) Computer Style Sheets', 'C) Cascading Style Sheets', 'D) Colorful Style Sheets'],
        'correct_answer' => 'C) Cascading Style Sheets'
    ],

    // Database quizzes
    5 => [
        'question' => 'What is the primary purpose of a database management system (DBMS)?',
        'options' => ['A) To create databases', 'B) To manipulate databases', 'C) To secure databases', 'D) All of the above'],
        'correct_answer' => 'D) All of the above'
    ]
    
];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de cours par matiere</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="./resources/css/recherche.css">
</head>
<body>
<header class="header-outer">
    <div class="header-inner responsive-wrapper">
      <div class="header-logo">
        <img src="resources/img/wisdomwave.png" />
      </div>
      <nav class="header-navigation">
        <a href="#">Browse</a>
        <a href="#">Exam</a>
        <a href="#">Courses</a>
      </nav>
      <a href="index.html">
        <button class="button_join">Log Out</button>
      </a>
    </div>
  </header>
    <div class="container mt-4">
        <div class="row">
            <?php 
            // Associative array mapping subject IDs to logo file names
            $subjectLogos = array(
                2 => 'https://img.freepik.com/premium-vector/calculator-icon-vector-design-templates_1172029-3367.jpg',
                3 => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4FRrhI0Cg69MEC53yw1Q7X5oEyqR8apZY1Pf-r4AVZA&s',
                4 => 'https://media.istockphoto.com/id/1225713087/vector/computer-monitor-with-keyboard-and-mouse-line-icon-smart-home-symbol-technology-vector-sign.jpg?s=612x612&w=0&k=20&c=VhIyfzh9PRk-La9NaeejH1IN2TqQKMDr3wuj0pG8e2U=',
                5=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuMX_c2_VtGwbvewFuyH66HiPqlncKyU59xtKtR3FLPA&s'
                // Add more entries for other subjects as needed
            );

            foreach ($matieres as $matiere) { ?>
            <div class="col-md-3">
                
                <div class="card subject-card" onclick="submitForm(<?= $matiere['id_matiere'] ?>)">
               
                    <img src="<?= $subjectLogos[$matiere['id_matiere']] ?>" class="card-img-top subject-logo" alt="Subject Logo">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $matiere['nom_matiere'] ?></h5>
                    </div>
                </div>
                 <div class="quiz">
                  <button type="button" class="btn btn-primary pop-quiz-btn" onclick="displayQuiz(<?= $matiere['id_matiere'] ?>)">Pop Quiz</button> 
                </div>
                 
            </div>
                   <?php } ?>
            <div class="col-md-12">
                <form id="searchForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-4">
                    <div class="input-group">
                        <select class="form-select" name="niveau" id="niveau">
                            <option value="1ere">1ere</option>
                            <option value="2eme">2eme</option>
                            <option value="3eme">3eme</option>
                            <option value="4eme">4eme</option>
                            <option value="5eme">5eme</option>
                        </select>
                        <button class="btn btn-outline-secondary" type="submit">Search by Niveau</button>
                    </div>
                </form>
            </div>
        </div>
        
        <form id="submitForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="matiere" id="matiere">
        </form>
        <div class="col-md-12 text-md-right"> <!-- Use text-md-right class to align content to the right on medium screens and larger -->
            <button class="btn btn-outline-secondary mt-3" onclick="sortCoursesByHours()">Sort by Hours</button>
        </div>



        <?php if (isset($list)) {?>
        <div class="mt-4">
            <h2 class="text-center">Cours correspondants à la matière sélectionnée</h2>
            <div class="row">
                <?php foreach ($list as $cours) { ?>
              <div class="col-md-4 animate__animated animate__fadeInUp">
    <div class="card course-card">
        <div class="card-body">
            <h5 class="card-title"><?= $cours['nom_cours'] ?></h5>
            <p class="card-text"><?= $cours['heures'] ?> heures</p>
            <div class="d-flex justify-content-between align-items-center">
                <!-- Button to toggle visibility of additional information -->
                <button class="btn btn-primary rounded-pill" onclick="toggleInfo('<?= $cours['id_cours'] ?>')">More Info</button>
                <!-- Button to toggle visibility of statistics -->
                <button class="btn btn-info rounded-pill" onclick="toggleStats('<?= $cours['id_cours'] ?>')">Stats</button>
                <!-- Add to Cart button -->
                <button class="btn btn-success rounded-pill">Add to Cart</button>
            </div>
            <!-- Hidden section for additional information -->
            <div id="info<?= $cours['id_cours'] ?>" style="display: none;">
                <p><strong>Niveau:</strong> <?= $cours['niveau'] ?></p>
                <p><strong>Contenu:</strong> <?= $cours['contenu'] ?></p>
            </div>
        </div>
    </div>
    <!-- Card for statistics -->
<div id="stats<?= $cours['id_cours'] ?>" class="card course-stats" style="display: none;">
    <div class="card-body">
        <h5 class="card-title">Statistics for <?= $cours['nom_cours'] ?></h5>
        <!-- This canvas will hold the chart -->
        <canvas id="chart<?= $cours['id_cours'] ?>" width="100" height="100"></canvas>
    </div>
</div>

<!-- <button class="btn btn-info rounded-pill" onclick="toggleStats('<?= $cours['id_cours'] ?>', <?= json_encode($statistics_data) ?>)">Stats</button> -->

</div>
 
                <?php }?>
            </div>
        </div>
        <?php } ?>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



<script>
  
  // JavaScript to handle the click event of the "pop quiz" button
document.addEventListener('DOMContentLoaded', function() {
    // Get all "pop quiz" buttons
    var popQuizButtons = document.querySelectorAll('.pop-quiz-btn');

    // Attach click event listener to each button
    popQuizButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default behavior of the button
            
            // Now you can display the quiz or perform any other action
            // For example, you can show a modal with the quiz questions
            // Or you can navigate to a separate quiz page using window.location.href
            // Example:
            // window.location.href = '/quiz-page';
        });
    });
});

</script>


<script>
    // Function to display the quiz modal
    
    function displayQuiz(subjectId) {
    // Get the quiz details for the selected subject
    var quiz = <?php echo json_encode($quizzes); ?>[subjectId];
    
    // Build the HTML for the quiz modal
    var quizModalHTML = `
       <!-- Quiz Modal HTML -->
<div class="modal fade" id="quizModal" tabindex="-1" aria-labelledby="quizModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quizModalLabel">Quiz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="question">${quiz.question}</p>
                <form id="quizForm">
                    ${quiz.options.map((option, index) => `
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="option${index}" value="${option}">
                            <label class="form-check-label" for="option${index}">${option}</label>
                        </div>
                    `).join('')}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submitQuiz(${subjectId})">Submit</button>
            </div>
        </div>
    </div>
</div>
 
    `;

    // Append the quiz modal HTML to the body
    document.body.insertAdjacentHTML('beforeend', quizModalHTML);

    // Show the quiz modal
    var quizModal = new bootstrap.Modal(document.getElementById('quizModal'));
    quizModal.show();
}


    // Function to submit the quiz
   function submitQuiz(subjectId) {
    // Get the selected answer
    var selectedAnswer = document.querySelector('input[name="answer"]:checked');
    if (!selectedAnswer) {
        alert('Please select an answer.');
        return;
    }

    // Get the quiz details
    var quiz = <?php echo json_encode($quizzes); ?>[subjectId];
    
    // Check if the selected answer is correct
    if (selectedAnswer.value === quiz.correct_answer) {
        alert('Correct answer!');
    } else {
        alert('Incorrect answer. Try again!');
    }

    // Close the quiz modal
    var quizModal = bootstrap.Modal.getInstance(document.getElementById('quizModal'));
    quizModal.hide();
}
</script>













<script>
    function sortCoursesByHours() {
        // Get all course cards
        var courseCards = document.querySelectorAll('.course-card');
        
        // Convert NodeList to Array for easier sorting
        courseCards = Array.from(courseCards);

        // Sort the course cards by hours
        courseCards.sort(function(a, b) {
            var hoursA = parseFloat(a.querySelector('.card-text').textContent);
            var hoursB = parseFloat(b.querySelector('.card-text').textContent);
            return hoursA - hoursB;
        });

        // Remove all course cards from their parent element
        var parentElement = document.querySelector('.row');
        parentElement.innerHTML = '';

        // Append the sorted course cards back to the parent element
        courseCards.forEach(function(card) {
            parentElement.appendChild(card);
        });
    }
</script>

    <script>
        function submitForm(matiereId) {
            document.getElementById("matiere").value = matiereId;
            document.getElementById("submitForm").submit();
        }

        function toggleInfo(courseId) {
            var infoDiv = document.getElementById("info" + courseId);
            if (infoDiv.style.display === "none") {
                infoDiv.style.display = "block";
            } else {
                infoDiv.style.display = "none";
            }
        }

   // Function to toggle visibility of statistics
function toggleStats(courseId, statsData) {
    var statsDiv = document.getElementById('stats' + courseId);
    if (statsDiv.style.display === 'none') {
        // Show the statistics card
        statsDiv.style.display = 'block';
        // Update the chart with the provided data
        updateChart('chart' + courseId, statsData);
    } else {
        // Hide the statistics card
        statsDiv.style.display = 'none';
    }
}

// Function to update the chart with statistics data
function updateChart(chartId, data) {
    var ctx = document.getElementById(chartId).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: [{
                label: 'Hours',
                data: data.hours,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

 

        
    </script>
     <div class="pg-footer">
      <footer class="footer">
        <svg
          class="footer-wave-svg"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 1200 100"
          preserveAspectRatio="none"
        >
          <path
            class="footer-wave-path"
            d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3C276.7,2.9,330,4,383,9.8 c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z"
          ></path>
        </svg>
        <div class="footer-content">
          <div class="footer-content-column">
            <div class="footer-logo">
              <a class="footer-logo-link" href="#">
                <span class="hidden-link-text">LOGO</span>
                <h1>LOGO</h1>
              </a>
            </div>
            <div class="footer-menu">
              <h2 class="footer-menu-name">Get Started</h2>
              <ul id="menu-get-started" class="footer-menu-list">
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-product"
                >
                  <a href="#">Start</a>
                </li>
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-product"
                >
                  <a href="#">Documentation</a>
                </li>
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-product"
                >
                  <a href="#">Installation</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="footer-content-column">
            <div class="footer-menu">
              <h2 class="footer-menu-name">Company</h2>
              <ul id="menu-company" class="footer-menu-list">
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-page"
                >
                  <a href="#">Contact</a>
                </li>
                <li
                  class="menu-item menu-item-type-taxonomy menu-item-object-category"
                >
                  <a href="#">News</a>
                </li>
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-page"
                >
                  <a href="#">Careers</a>
                </li>
              </ul>
            </div>
            <div class="footer-menu">
              <h2 class="footer-menu-name">Legal</h2>
              <ul id="menu-legal" class="footer-menu-list">
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-170434"
                >
                  <a href="#">Privacy Notice</a>
                </li>
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-page"
                >
                  <a href="#">Terms of Use</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="footer-content-column">
            <div class="footer-menu">
              <h2 class="footer-menu-name">Quick Links</h2>
              <ul id="menu-quick-links" class="footer-menu-list">
                <li
                  class="menu-item menu-item-type-custom menu-item-object-custom"
                >
                  <a target="_blank" rel="noopener noreferrer" href="#"
                    >Support Center</a
                  >
                </li>
                <li
                  class="menu-item menu-item-type-custom menu-item-object-custom"
                >
                  <a target="_blank" rel="noopener noreferrer" href="#"
                    >Service Status</a
                  >
                </li>
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-page"
                >
                  <a href="#">Security</a>
                </li>
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-page"
                >
                  <a href="#">Blog</a>
                </li>
                <li
                  class="menu-item menu-item-type-post_type_archive menu-item-object-customer"
                >
                  <a href="#">Customers</a>
                </li>
                <li
                  class="menu-item menu-item-type-post_type menu-item-object-page"
                >
                  <a href="#">Reviews</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="footer-content-column">
            <div class="footer-call-to-action">
              <h2 class="footer-call-to-action-title">Let's Chat</h2>
              <p class="footer-call-to-action-description">
                Have a support question?
              </p>
              <a
                class="footer-call-to-action-button button"
                href="#"
                target="_self"
              >
                Get in Touch
              </a>
            </div>
            <div class="footer-call-to-action">
              <h2 class="footer-call-to-action-title">You Call Us</h2>
              <p class="footer-call-to-action-link-wrapper">
                <a
                  class="footer-call-to-action-link"
                  href="tel:0124-64XXXX"
                  target="_self"
                >
                  0124-64XXXX
                </a>
              </p>
            </div>
          </div>
        </div>
        
        <!-- jdiiiid icons -->
        <div class="card1">
          <a class="social-link1">
            <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" fill="white">
              </path>
            </svg>
          </a>
          <a class="social-link2">
            <svg viewBox="0 0 496 512" height="1em" fill="#fff" xmlns="http://www.w3.org/2000/svg">
              <path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
              </path>
            </svg> </a>
          <a class="social-link3">
            <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
              <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" fill="white">
              </path>
            </svg>
          </a>
          <a class="social-link4">
            <svg fill="#fff" viewBox="0 0 448 512" height="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
              </path>
            </svg> </a>
          <a class="social-link5">
            <svg viewBox="0 0 16 16" class="bi bi-stack-overflow" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.412 14.572V10.29h1.428V16H1v-5.71h1.428v4.282h9.984z"></path>
              <path d="M3.857 13.145h7.137v-1.428H3.857v1.428zM10.254 0 9.108.852l4.26 5.727 1.146-.852L10.254 0zm-3.54 3.377 5.484 4.567.913-1.097L7.627 2.28l-.914 1.097zM4.922 6.55l6.47 3.013.603-1.294-6.47-3.013-.603 1.294zm-.925 3.344 6.985 1.469.294-1.398-6.985-1.468-.294 1.397z"></path>
            </svg>
          </a>
        </div>


      </footer>
    </div>
</body>
</html>
