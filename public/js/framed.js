
    window.addEventListener("message", function(evt) {
        // Check event origin and data:
        //     evt.data must be the string "hppDone"
        //     evt.origin must be the domain the payment page is on (e.g. https://secure.paytabs.com)
        //
        // If data and origin match, then take appropriate actions such as closing the iframe and
        // initiating a server side check to verify the transaction results.
        if (evt.data == 'hppDone') {

            var element = document.getElementById('message');


            element.classList.add("alert");

            element.classList.add("alert-success");

            element.innerText = "successful payment";

            setTimeout(function() {
                window.location.href = '/framed-return';

            }, 2000);



        }
    });
