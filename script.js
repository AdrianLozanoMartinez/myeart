document.addEventListener("DOMContentLoaded", function() {
    show();

    function show() {
        var xhr = new XMLHttpRequest();
        var search = document.getElementById('search').value;
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.querySelector('.show').innerHTML = xhr.responseText;
            }
        };
        
        xhr.open('POST', 'gestion.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('action=gestion&search=' + search);
    }
    
    document.getElementById('search').addEventListener('input', function () {
        show();
    });

});
