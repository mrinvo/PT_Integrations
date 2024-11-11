<html>

<head>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}

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


    <style>
        .checkout p:last-of-type,
        .checkout i:nth-of-type(3) {
            opacity: 1;
        }

        .quantity {
            padding-bottom: 10px;
        }



        .checkout {
            margin-top: -100px;
        }

        .order {
            margin-top: 33px;
        }

        .ship {
            margin: 5% 0;
            text-align: left;
            font-weight: 1000;
        }
        .total{
            margin: 20px 0;
        }
        .invoice{
            width: 60%;
            /* background-color: red; */
            text-align: left;
            display: flex;
            margin-left: auto;
        }

        .invoice h4{
            /* background-color: green; */
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: bold;
        }
        .inv{
            width: 100%;
        }

        .invoice span{
            width: 100px;
            font-weight: normal;
        }
        .opt{
            width: 60%;
            /* background-color: red; */
            text-align: left;
            display: flex;

        }

        .opt p{
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: bold;
        }

        .opt span{
            width: 100px;
            font-weight: normal;
        }

        .optwr{
            width: 70%;
        }


    </style>
</head>

<body>
    <div id="wrapper">
        <div class="container1">
            <div class="order">
                <h2>Your Invoice Items</h2>
                <div class="item">
                    <img style="padding-bottom: 130px;"
                        src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/balle.png' alt=''>
                    <div class="info">
                        <h4>Trixie Soccer Ball, Vinyl</h4>
                        <br>
                        <div class="opt">
                            <div class="optwr">
                                {{-- <p class="quantity">Sku<span class="bol"> : #sku1</span></p> --}}

                                {{-- <p class="quantity">Unit cost<span class="bol">: 25</span> </p> --}}
                                {{-- <p class="quantity">Quantity<span class="bol">: x2</span> </p>


                                <p class="quantity">Discount rate<span class="bol">: 50%</span> </p>
                                <p class="quantity">Tax total<span class="bol">: 5</span> </p> --}}
                            </div>

                        </div>





                        <p class="price">30 EGP</p>
                    </div> <!-- .info -->
                </div> <!-- .item -->


                <div class="item">
                    <img style="padding-bottom: 130px;"
                        src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/harnais.png' alt=''>
                    <div class="info">
                        <h4>Julius K9 Powerharness, Mini/M</h4>
                        <br>
                        <div class="opt">
                            <div class="optwr">
                                {{-- <p class="quantity">Sku<span class="bol"> : #sku2</span></p> --}}

                                {{-- <p class="quantity">Unit cost<span class="bol">: 25</span> </p> --}}
                                {{-- <p class="quantity">Quantity<span class="bol">: x2</span> </p>


                                <p class="quantity">Discount rate<span class="bol">: 50%</span> </p>
                                <p class="quantity">Tax total<span class="bol">: 5</span> </p> --}}
                            </div>

                        </div>

                        <p class="price">30 EGP</p>
                    </div> <!-- .info -->
                </div> <!-- .item -->
                <div class="invoice">
                    <div class="inv">
                        {{-- <h4 class="ship">Shipping charges <span>: 10$</span></h4>
                        <h4 class="ship">Extra charges<span>: 10$</span></h4>
                        <h4 class="ship">Extra discount<span>: 10$</span></h4>
                        <h4 class="ship">Expiry date<span>: </span></h4>
                        <h4 class="ship">Active date date<span>: 22-1-2024</span></h4> --}}
                    </div>


                </div>


                <br>
                <hr>
                <h3 class="total">TOTAL: 60 EGP</h3>
            </div> <!-- .order -->
        </div> <!-- .container1 -->

        <div class="container2">
            <div class="checkout">

                <p><i class="fas fa-check-circle"></i>Invoice</p>
                <p><i class="fas fa-check-circle"></i>Payment</p>

                <div class="payment">

                    <div
                    style="
                    float: right;
                    position: relative;
                    top: 60;
                    right: 20px;
                }">

                    <h3 id="comPle" class="customerDetailsTitle">
                        </h2>
                        <br>


                        <iframe width="530" height="530" id='iframeInput' src=""
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>


                </div>
                    <div class="content">
                        <div class="infos">

                            <div class="method">
                                <h2>Invoice</h2>
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

                            <form id='myForm' action="/payment/invoice" method="POST">
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
                                        <input type="checkbox" name="paymentOption" value="paytabs"
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
                                                    <input type="number" name="shipping_zip">
                                                </div> <!-- cardHolderName -->
                                            </div>
                                    </div>



                                    <div class="security">
                                        <p class="title">Choose A Payment Option</p>
                                        <div>
                                            <input disabled type="radio" name="paymentOption" value="cash"
                                                id="cashOnDelivery">
                                            <label for="cashOnDelivery">Cash on Delivery</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="paymentOption" value="paytabs"
                                                id="paytaps">
                                            <label for="paytaps">Paytabs</label>
                                        </div>

                                        {{-- static inputs field --}}
                                        <input hidden type="text" name="payment_type" value="invoice">
                                        <input hidden type="text" name="tran_type" value="sale">
                                        <input hidden type="text" name="tran_class" value="ecom">
                                        <input hidden type="text" name="cart_id" value="cart_id_1">
                                        <input hidden type="text" name="cart_description"
                                            value="cart 1 description">
                                        <input hidden type="text" name="cart_currency" value="EGP">
                                        <input hidden type="text" name="cart_amount" value="60">

                                        <!-- invoice fields -->
                                        <input hidden type="number" name="line_items[0][unit_cost]" value="30">
                                        {{-- <input hidden type="number" name="line_items[0][quantity]" value="2">
                                        <input hidden type="text" name="line_items[0][sku]" value="#sku1">
                                        <input hidden type="number" name="line_items[0][discount_rate]" value="50">
                                        <input hidden type="number" name="line_items[0][tax_total]" value="5"> --}}

                                        <input hidden type="number" name="line_items[1][unit_cost]" value="30">
                                        {{-- <input hidden type="number" name="line_items[1][quantity]" value="2">
                                        <input hidden type="text" name="line_items[1][sku]" value="#sku2">
                                        <input hidden type="number" name="line_items[1][discount_rate]" value="50">
                                        <input hidden type="number" name="line_items[1][tax_total]" value="5"> --}}

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

        const lineItem = document.getElementsByName('customer_zip')[0];

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


        formData.append('line_items[0][unit_cost]', "30");
        formData.append('line_items[1][unit_cost]', "30");


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
