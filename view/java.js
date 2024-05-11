function validateNiveauSelection() 
{
    var niveau = document.getElementById("niveau").value;
    if (niveau.trim() === "") {
        alert("Veuillez sélectionner un niveau.");
        return false;
    }

    return true; 
}
function validatespecSelection() 
{
    var specialite = document.getElementById("specialite").value;
    if (specialite.trim() === "") {
        alert("Veuillez sélectionner une specialite.");
        return false;
    }

    return true; 
}
function validateForm() {
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var regex = /^[a-zA-Z]+$/; // Expression régulière pour vérifier que la chaîne contient uniquement des lettres

    if (!regex.test(nom)) {
        alert("Le nom ne doit contenir que des lettres.");
        return false;
    }

    if (!regex.test(prenom)) {
        alert("Le prénom ne doit contenir que des lettres.");
        return false;
    }

    return true;
}
