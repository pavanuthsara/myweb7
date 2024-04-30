
function redirectToFamilyPlan() {
    window.location.href = 'plan-description.php';
}

var planTile = document.getElementById('familyPlan');

planTile.addEventListener('click', function() {
    redirectToFamilyPlan();
});



