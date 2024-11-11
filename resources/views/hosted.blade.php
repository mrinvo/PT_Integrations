<html>

<head>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .expiration,
        .security {
            padding-bottom: 110px;
        }



        .customerDetailsTitle {

            margin-bottom: 70px;
        }
    </style>


</head>

<body>
    <div id="wrapper">
        <div class="container1">
            <div class="order">
                <h2>Your order summary</h2>
                <div class="item">
                    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/balle.png' alt=''>
                    <div class="info">
                        <h4>Trixie Soccer Ball, Vinyl</h4>
                        <p class="quantity">Quantity: 1</p>
                        <p class="price">30 USD</p>
                    </div> <!-- .info -->
                </div> <!-- .item -->

                <div class="item">
                    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/frisbee.png' alt=''>
                    <div class="info">
                        <h4>Trixie Dog Activity Dog Disc</h4>
                        <p class="quantity">Quantity: 1</p>
                        <p class="price">30 USD</p>
                    </div> <!-- .info -->
                </div> <!-- .item -->

                <div class="item">
                    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/harnais.png' alt=''>
                    <div class="info">
                        <h4>Julius K9 Powerharness, Mini/M</h4>
                        <p class="quantity">Quantity: 1</p>
                        <p class="price">40 USD</p>
                    </div> <!-- .info -->
                </div> <!-- .item -->

                <h4 class="ship">Shipping: FREE</h4>
                <hr>
                <h3 class="total">TOTAL: 100 USD</h3>
            </div> <!-- .order -->
        </div> <!-- .container1 -->

        <div class="container2">
            <div class="checkout">

                <p><i class="fas fa-check-circle"></i>Cart</p>
                <p><i class="fas fa-check-circle"></i>Checkout</p>



                <div class="payment">

                    <div
                        style="
                        float: right;
                        position: relative;
                        top: 100;
                        right: 20px;
                    }">

                        <h3 id="comPle" class="customerDetailsTitle">
                            </h2>
                            <br>


                            <iframe width="560" height="580" id='iframeInput' src=""
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>


                    </div>

                    <div id="mmsg"></div>

                    <div class="content">
                        <div class="infos">

                            <div class="method">
                                <h2>Hosted Payment Page</h2>
                            </div> <!-- .method -->

                            @if ($errors->any())
                                <div style="color: red;" class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="color: red !important;">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form id="myForm" action="/payment/initiate" method="POST">
                                @csrf
                                <h3 class="customerDetailsTitle">Customer Details</h2>
                                    <div class="customerDetailsWrapper">
                                        <div class="cardHolderName">
                                            <p class="title">name</p>
                                            <input type="text" name="customer_name">
                                        </div> <!-- cardHolderName -->
                                        <div class="cardHolderName">
                                            <p class="title">Email</p>
                                            <input type="email" name="customer_email">
                                        </div> <!-- cardHolderName -->
                                        <div class="cardHolderName">
                                            <p class="title">Phone</p>
                                            <input type="tel" name="customer_phone">
                                        </div> <!-- cardHolderName -->
                                        <div class="cardHolderName">
                                            <p class="title">Street</p>
                                            <input type="text" name="customer_street">
                                        </div> <!-- cardHolderName -->
                                        <div class="cardHolderName">
                                            <p class="title">Country</p>
                                            <select name="customer_country">
                                                <option value="EG">Egypt</option>
                                                <option value="AE">Uinted Arab Emirates</option>
                                                <option value="SA">Saudi Arapia</option>
                                                <option value="CA">Canada</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="AU">Australia</option>
                                                <option value="DE">Germany</option>
                                                <!-- Add more countries here -->
                                            </select>
                                        </div> <!-- cardHolderName -->
                                        <div class="cardHolderName">
                                            <p class="title">City</p>
                                            <input type="text" name="customer_city">
                                        </div> <!-- cardHolderName -->
                                        <div class="cardHolderName">
                                            <p class="title">State</p>
                                            <input type="text" name="customer_state">
                                        </div> <!-- cardHolderName -->
                                        <div class="cardHolderName">
                                            <p class="title">Zip Code</p>
                                            <input type="text" name="customer_zip">
                                        </div> <!-- cardHolderName -->
                                    </div>
                                    <div class="shippingAsBillingWrapper">
                                        <input type="checkbox" name="shippingAsBilling" value="same"
                                            id="shippingAsBilling" checked onchange="changeShippingAsBillingStatus()">
                                        <label for="shippingAsBilling">Shipping Same As Billing</label>
                                    </div>
                                    <hr />
                                    <div class="shippinDetailsWrapper" id="shippinDetailsWrapperId">
                                        <h3 class="customerDetailsTitle">Shipping Details</h2>
                                            <div class="customerDetailsWrapper">
                                                <div class="cardHolderName">
                                                    <p class="title">name</p>
                                                    <input type="text" name="shipping_name">
                                                </div> <!-- cardHolderName -->
                                                <div class="cardHolderName">
                                                    <p class="title">Email</p>
                                                    <input type="email" name="shipping_email">
                                                </div> <!-- cardHolderName -->
                                                <div class="cardHolderName">
                                                    <p class="title">Phone</p>
                                                    <input type="tel" name="shipping_phone">
                                                </div> <!-- cardHolderName -->
                                                <div class="cardHolderName">
                                                    <p class="title">Street</p>
                                                    <input type="text" name="shipping_street">
                                                </div> <!-- cardHolderName -->
                                                <div class="cardHolderName">
                                                    <p class="title">Country</p>
                                                    <select name="customer_country">
                                                        <option value="EG">Egypt</option>
                                                        <option value="AE">Uinted Arab Emirates</option>
                                                        <option value="SA">Saudi Arapia</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="DE">Germany</option>
                                                        <!-- Add more countries here -->
                                                    </select>
                                                </div> <!-- cardHolderName -->
                                                <div class="cardHolderName">
                                                    <p class="title">City</p>
                                                    <input type="text" name="shipping_city">
                                                </div> <!-- cardHolderName -->
                                                <div class="cardHolderName">
                                                    <p class="title">State</p>
                                                    <input type="text" name="shipping_state">
                                                </div> <!-- cardHolderName -->
                                                <div class="cardHolderName">
                                                    <p class="title">Zip Code</p>
                                                    <input type="text" name="shipping_zip">
                                                </div> <!-- cardHolderName -->
                                            </div>
                                    </div>



                                    <div class="security">
                                        <h3 class="customerDetailsTitle">Choose A Payment Option</h2>
                                            <div>
                                                <input disabled type="radio" name="paymentOption" value="cash"
                                                    id="cashOnDelivery">
                                                <label for="cashOnDelivery">Cash on Delivery</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="paymentOption" value="paytaps"
                                                    id="paytaps">
                                                <label for="paytaps">Paytabs</label>
                                            </div>

                                            {{-- static inputs field --}}
                                            <input hidden type="text" name="payment_type" value="hosted">
                                            <input hidden type="text" name="cart_id" value="cart_2D084">
                                            <input hidden type="text" name="cart_description" value="cart 1 description">
                                            <input hidden type="text" name="cart_currency" value="EGP">
                                            <input hidden type="text" name="cart_amount" value="1">
                                            <input hidden type="text" name="udf1" value="technical team">
                                            <input hidden type="text" name="udf2" value="2135122">
                                            <input hidden type="text" name="udf3" value="3 items">
                                    </div><!-- .security -->
                                    <input id="subl" type="submit" value="Proceed to payment" class="sub">
                                    {{-- <button>Checkout</button> --}}
                            </form>
                        </div> <!-- .infos -->
                    </div> <!-- .content -->
                </div> <!-- .payment -->
            </div> <!-- .checkout -->
        </div> <!-- .container2 -->
    </div> <!-- #wrapper -->
</body>

{{-- <script>
    document.getElementById('myForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const type = document.getElementsByName('payment_type')[0];
        const cartId = document.getElementsByName('cart_id')[0];
        const cartDescription = document.getElementsByName('cart_description')[0];
        const cartCurrency = document.getElementsByName('cart_currency')[0];
        const cartAmount = document.getElementsByName('cart_amount')[0];

        //customer_details
        const customrName = document.getElementsByName('customer_name')[0];
        const customrEmail = document.getElementsByName('customer_email')[0];
        const customrCountry = document.getElementsByName('customer_country')[0];
        const customrPhone = document.getElementsByName('customer_phone')[0];
        const customrCity = document.getElementsByName('customer_city')[0];
        const customrState = document.getElementsByName('customer_state')[0];
        const customrStreet = document.getElementsByName('customer_street')[0];
        const customrZip = document.getElementsByName('customer_zip')[0];

        const responseDiv = document.getElementById('response');




        const formData = new FormData();
        formData.append('payment_type', type.value);
        formData.append('cart_id', cartId.value);
        formData.append('cart_description', cartDescription.value);
        formData.append('cart_currency', cartCurrency.value);
        formData.append('cart_amount', cartAmount.value);

        formData.append('customer_name', customrName.value);
        formData.append('customer_email', customrEmail.value);
        formData.append('customer_country', customrCountry.value);
        formData.append('customer_city', customrCity.value);
        formData.append('customer_state', customrState.value);
        formData.append('customer_street', customrStreet.value);
        formData.append('customer_zip', customrZip.value);


        fetch('/payment/iframe', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Add Laravel's CSRF token
                },
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('comPle').innerHTML = 'Complete the payment:';

                document.getElementById('subl').style.display = 'none';
                // Handle the JSON response
                console.log('data', data);
                document.getElementById('iframeInput').src = data?.redirect_url


                // var iframe = document.getElementById("iframeInput");
                // console.log(iframe);
                // var elmnt = iframe.contentWindow.document.getElementById('iframetwo');
                // console.log(elmnt);



                // let pt_iframe = $('<iframe>', {
                //     src: data?.redirect_url,
                //     frameborder: 0,
                //     id: 'pt_iframe_11',
                //     width="560".
                //     height="580"
                // });

                // // Append the iFrame to correct payment method
                // $(pt_iframe).appendTo($('#iframeParent'));




                responseDiv.textContent = 'Response: ' + data.message;



            })
            .catch(error => {
                responseDiv.textContent = 'An error occurred: ' + error.message;
            });
    });
</script>

<script>
    window.addEventListener("message", function(evt) {
        // Check event origin and data:
        //     evt.data must be the string "hppDone"
        //     evt.origin must be the domain the payment page is on (e.g. https://secure.paytabs.com)
        //
        // If data and origin match, then take appropriate actions such as closing the iframe and
        // initiating a server side check to verify the transaction results.
        if (evt.data == 'hppDone') {

            var elmm = document.getElementById('mmsg');


            elmm.classList.add("alert");

            elmm.classList.add("alert-success");

            elmm.innerText = "successful payment";

            setTimeout(function() {
                window.location.href = '/framed-return';

            }, 2000);



        }
    });
</script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/script.js"></script>

</html>
