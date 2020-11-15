document.getElementById("contactEmail").addEventListener("change", evt => {
    evt.preventDefault();
    let email = evt.target.value;
    let valid = validateEmail(email);
    if (!valid){
        notValid("contactEmail")
    }
})

document.getElementById("contactPhone").addEventListener("change", evt => {
    evt.preventDefault();
    let phone = evt.target.value;
    if (!phone){
        notValid("contactPhone")
    }
})

document.getElementById("contactName").addEventListener("input", evt => {
    document.getElementById("contactName").removeAttribute("class");
})

document.getElementById("contactPhone").addEventListener("input", evt => {
    document.getElementById("contactName").removeAttribute("class");
})

document.getElementById("messageBody").addEventListener("input", evt => {
    document.getElementById("messageBody").removeAttribute("class");
})

function notValid(elementId) {
    document.getElementById("sendMessage").setAttribute("disabled", "true");
    document.getElementById(elementId).setAttribute("class", "error");
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function resetNotification() {
    document.getElementById('alertMessage').setAttribute("hidden", "true");
}

function showAlertMessage(message){
    document.getElementById('alertMessage').removeAttribute("hidden");
    document.getElementById('alertMessage').setAttribute("class", "alert alert-danger");
    $("#alertMessage").html(message);
    setTimeout(resetNotification, 5000);
}

function showInfoMessage(message){
    document.getElementById('alertMessage').removeAttribute("hidden");
    document.getElementById('alertMessage').setAttribute("class", "alert alert-info");
    $("#alertMessage").html(message);
    setTimeout(resetNotification, 5000);
}

document.getElementById("sendMessage").addEventListener("click", ev => {
    ev.preventDefault();
    let validForm = true;
    const body = new FormData();
    const tokenString = "41e8091d45dda7e0dbc6edc8168b8795"

    let name = document.getElementById("contactName").value;
    if (!name){
        validForm = false;
        document.getElementById("contactName").setAttribute("class", "error");
    }
    let email = document.getElementById("contactEmail").value;
    if (!email){
        validForm = false;
        document.getElementById("contactEmail").setAttribute("class", "error");
    }
    let phone = document.getElementById("contactPhone").value;
    if (!phone){
        validForm = false;
        document.getElementById("contactPhone").setAttribute("class", "error");
    }
    let message = document.getElementById("messageBody").value;
    if (!message){
        validForm = false;
        document.getElementById("messageBody").setAttribute("class", "error");
    }

    body.append("_token", document.getElementsByName('_token')[0].value)
    body.append("hash", tokenString)
    body.append('name', name);
    body.append('email', email);
    body.append('phone', phone);
    body.append('message', message);
    if (validForm) {
        fetch('/contacts/mail', {
            method: 'POST',
            body: body,
        }).then(result => {
            if (result.status == 200) {
                document.getElementById("myForm").reset();
                showInfoMessage('<strong>Success!</strong> Message send.')
            } else {
                document.getElementById("myForm").reset();
                showAlertMessage('<strong>Error!</strong> Error response.');
            }
        });
    }
});

