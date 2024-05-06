function redirect(){
    window.location.href = "complaint-read.php";

    var update = document.getElementById('redirect');

    update.addEventListener('click', function(){
        redirect();
    });
}
