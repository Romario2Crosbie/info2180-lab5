window.addEventListener('load', function() {
    let lookupbtn = document.querySelector('#lookup');
    let ctry = document.querySelector('#country');
    let fName = 'world.php?country=';


    lookupbtn.addEventListener('click', function(element) {
        element.preventDefault();

        fetch(fName+ctry.value)
            .then(response => {
                if (response.ok) {
                    return response.text()
                } else {
                    return Promise.reject('something went wrong!')
                }
            })
            .then(data => {
                let btn = document.querySelector('#result');
                btn.innerHTML = data;
            })
            .catch(error => console.log('There was an error: ' + error));
    });
});