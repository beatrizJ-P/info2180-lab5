document.addEventListener('DOMContentLoaded', function() {
    
    let lookUpBtn = document.getElementById('lookup');
    let cityBtn = document.getElementById('lookupC');
    let search = document.getElementById('country');
    let resultDiv = document.getElementById('result');

    
    lookUpBtn.addEventListener("click", function(e){
        e.preventDefault();

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

    cityBtn.addEventListener("click", function(e){
        e.preventDefault();
        
        resultDiv.innerHTML = '';
        let xhr = new XMLHttpRequest();
        let url = "world.php?country=" + encodeURIComponent(search.value) + "&cities=lookupC";

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
