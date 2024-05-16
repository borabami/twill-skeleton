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
            document.getElementById("message").innerText = message;
            document.getElementById("errors").style.display = "none";
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


            document.getElementById("errors").innerHTML = errorMessage;
            document.getElementById("errors").style.display = "block";
            document.getElementById("message").innerText = "";
        })
        .finally(function (response) {
            submitButton.disabled = false;
            // Remove the disabled style
            submitButton.classList.remove('disabled-style');
        });
});
