
var inputs = document.querySelectorAll("#phone");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
inputs.forEach(input => {

    // initialise plugin
    url =  $("meta[name='full-url']").attr('content') + "/assets/front/plugins/intlTelInput/js/utils.js"
    var iti = window.intlTelInput(input, {
        utilsScript: url,
        preferredCountries: ["sa","eg"],
    });

    var reset = function() {
        input.classList.remove("error");
        input.parentElement.parentElement.parentElement.parentElement.querySelector('#error-msg').innerHTML = "";
        input.parentElement.parentElement.parentElement.parentElement.querySelector('#error-msg').classList.add("hide");
        input.parentElement.parentElement.parentElement.parentElement.querySelector('#valid-msg').classList.add("hide");
    };

    // on blur: validate
    input.addEventListener('blur', function() {
        reset();
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                number = iti.getNumber(intlTelInputUtils.numberFormat.E164);
                input.value = number
                input.parentElement.parentElement.parentElement.parentElement.querySelector('#valid-msg').classList.remove("hide");
            } else {
                input.classList.add("error");
                var errorCode = iti.getValidationError();
                input.parentElement.parentElement.parentElement.parentElement.querySelector('#error-msg').innerHTML = errorMap[errorCode];
                input.parentElement.parentElement.parentElement.parentElement.querySelector('#error-msg').classList.remove("hide");
            }
        }
    });

    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);

})
