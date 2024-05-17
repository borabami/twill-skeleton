const form = document.getElementById("contact-form");
const actionUrl = form.getAttribute("action");

form.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    var submitButton = document.getElementById("submit");

    submitButton.disabled = true;
    submitButton.classList.add('disabled-style');

    axios
        .post(actionUrl, formData)
        .then(function (response) {
            const message = response.data.message.replace(/<[^>]+>/g, "");
            document.getElementById("message-success").innerText = message;
            document.getElementById("message-error").style.display = "none";
        })
        .catch(function (error) {

            let errorMessage = error.response.data.errors;

            if (errorMessage != undefined) {
                let combinedErrors = '';

                for (let key in errorMessage) {
                    if (errorMessage.hasOwnProperty(key)) {
                        errorMessage[key].forEach(error => {
                            combinedErrors += error + '<br>';
                        });
                    }
                }

                errorMessage = combinedErrors

            } else {
                errorMessage = error.response.data.message;
            }


            document.getElementById("message-error").innerHTML = errorMessage;
            document.getElementById("message-error").style.display = "block";
            document.getElementById("message-success").innerText = "";
        })
        .finally(function (response) {
            submitButton.disabled = false;
            // Remove the disabled style
            submitButton.classList.remove('disabled-style');
        });
});
