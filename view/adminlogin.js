const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault(); // empêcher la soumission standard du formulaire

    var formData = new FormData(this); // 'this' fait référence au formulaire

    fetch('ValidateLogin.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'dashboard.html'; // Rediriger si succès
        } else {
            alert(data.message); // Afficher l'erreur si échec
        }
    })
    .catch(error => console.error('Error:', error));
});
