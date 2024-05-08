document.addEventListener("DOMContentLoaded", function() {
    show();

    function show() {
        let xhr = new XMLHttpRequest();
        let search = document.getElementById('search').value;
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.querySelector('.show').innerHTML = xhr.responseText;
            }
        };
        
        xhr.open('POST', 'filter.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('search=' + search);
    }
    
    document.getElementById('search').addEventListener('input', function () {
        show();
    });

});