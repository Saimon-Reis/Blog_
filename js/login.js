function connect(formData) {
    return fetch('./controllers/userLogin.php', {
        method: "post",
        body: formData
    })
        .then(tesponse => Response.json());

}

function error(response) {
    let divError = document.querySelector("#div-error");
    let message = document.querySelector("#error-message");

    divError.style.display = "block";
    if(Array.isArray(response.message)){
        message.innerHTML = response.message.join("<br>");//conteudo no html
    }else{
        message.innerHTML = response.message;
    }
}

function success(response) {


}


// var: global
//let: privada ao seu bloco js
//json: transmitr dados entre APIS

(function () {
    let formLogin = document.querySelector("form-login");

    formLogin.addEventListener("submit", async function (event) {
        event.preventDefault();

        let formData = new formData(this);
        await connect(formData).then((Response) => {
            if (!response.status) {
                error(response);
                return;
            }


            success(response);
        });
    });

})();


























/*function connect(formData){
    return fetch('./controllers/userLogin.php', {
        method: "post",
        body: formData
    })
    .then(response => response.json());    
}

function error(response){
    let divError = document.querySelector("#div-error");
    let message = document.querySelector("#error-message");
    
    divError.style.display = "block";
    if(Array.isArray(response.message)){
        message.innerHTML = response.message.join("<br>");
    }else{
        message.innerHTML = response.message;
    }    
}

function success(response){
    document.location.href = "./";
}

(function () {
    let formLogin = document.querySelector("#form-login");

    formLogin.addEventListener("submit", async function (event) {
        event.preventDefault();

        let divError = document.querySelector("#div-error");
        divError.style.display = "none";

        let formData = new FormData(this);

        await connect(formData).then((response) => {
            if(!response.status){
                error(response);
                return;
            }

            success(response);
        });
    });    
})();*/