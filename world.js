document.addEventListener('DOMContentLoaded', function() {
    console.log ("JS loaded");

    let lookUpBtn = document.getElementById('lookup');
    let search = document.getElementById('country');
    let resultDiv = document.getElementById('result');

    //const xhr = new XMLHttpRequest();

    lookUpBtn.addEventListener("click", function(e){
        e.preventDefault();
        console.log("Lookup clicked");
        resultDiv.innerHTML = '';
        let xhr = new XMLHttpRequest();
        let url = "world.php?country=" + encodeURIComponent(search.value);

        xhr.onreadystatechange = function(){
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    resultDiv.innerHTML = xhr.responseText;
                } 
                else {
                    resultDiv.innerHTML = 'Unable to fetch data';
                }
            }
        };
        xhr.open("GET",url, true);
        xhr.send();  
    });
});
