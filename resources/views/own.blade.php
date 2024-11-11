<html>
    <head>
        <link rel="stylesheet" href="/css/style.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .exp{
                display: flex;
                align-items: center;
                gap: 5px;

            }
            .exp input{
                width: 40% !important;
                height: 36px !important;
            }

            .customerDetailsWrapperr{
                display: grid;
                grid-template-columns: 1fr;
                gap: 10px;
            }
            .ay{
                display: flex;
                align-items: center;
                gap: 5px;
            }
            .wid{
                width: 100%;
            }

            .checkout p:last-of-type, .checkout i:nth-of-type(3) {
                  opacity: 1;
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
                            <p class="price">30 EGP</p>
                        </div> <!-- .info -->
                    </div> <!-- .item -->

                    <div class="item">
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/frisbee.png' alt=''>
                        <div class="info">
                            <h4>Trixie Dog Activity Dog Disc</h4>
                            <p class="quantity">Quantity: 1</p>
                            <p class="price">30 EGP</p>
                        </div> <!-- .info -->
                    </div> <!-- .item -->

                    <div class="item">
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/harnais.png' alt=''>
                        <div class="info">
                            <h4>Julius K9 Powerharness, Mini/M</h4>
                            <p class="quantity">Quantity: 1</p>
                            <p class="price">40 EGP</p>
                        </div> <!-- .info -->
                    </div> <!-- .item -->

                    <h4 class="ship">Shipping: FREE</h4>
                    <hr>
                    <h3 class="total">TOTAL: 100 EGP</h3>
                </div> <!-- .order -->
            </div> <!-- .container1 -->

            <div class="container2">
                <div class="checkout">
                    {{-- <p><i class="fas fa-check-circle"></i>Shipping</p> --}}
                    <p><i class="fas fa-check-circle"></i>Checkout</p>


                    <div class="payment">



                        <div class="content">
                            <div class="infos">

                                <div class="method">
                                    <h2>Own Form</h2>
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

                            <form id="payform" action="/payment/own" method="POST">
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
                                            <select  name="customer_country">
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
                                    <input type="checkbox" name="shippingAsBilling" value="same" id="shippingAsBilling" checked onchange="changeShippingAsBillingStatus()">
                                    <label for="shippingAsBilling">Shipping Same As Billing</label>
                                </div>
                                <hr/>
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
                                                <select  name="shipping_country">
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

                                <h3 class="customerDetailsTitle">Payment Details</h2>
                                    <span style="color:red;" id="paymentErrors"></span>
                                    <br>


                                <div class="customerDetailsWrapperr">

                                    <div class="cardHolderName">
                                        <p class="title">Card Number</p>
                                        <input type="text"  name="pan" size="16">
                                    </div> <!-- cardNumber -->


                                <div class="ay">
                                    <div class="cardHolderName wid">
                                        <p class="title">Expiry Date</p>
                                        <div class="exp">
                                            <input type="text" placeholder="MM" name="expmonth" size="2">
                                            <input type="text" placeholder="YYYY" name="expyear" size="4">
                                        </div>

                                    </div> <!-- expiryDate -->


                                    <div class="cardHolderName wid">
                                        <p style="width:100%;" class="title">Security Code</p>
                                        <input style="width:55%; height:36px;" type="text" placeholder="CVV" name="cvv" size="4">
                                    </div> <!-- CVV -->
                                </div>



                                </div>

                                    <div id="myDiv">

                                    </div>
                                <div class="security">


                                    {{-- static inputs field --}}
                                    <input hidden type="text" name="payment_type" value="own">
                                    <input hidden type="text" name="cart_id" value="cart1">
                                    <input hidden type="text" name="cart_description" value="cart 1 description">
                                    <input hidden type="text" name="cart_currency" value="EGP">
                                    <input hidden type="text" name="cart_amount" value="100">
                                </div><!-- .security -->
                                <input type="submit" value="Checkout" class="sub">
                                {{-- <button>Checkout</button> --}}
                            </form>
                            </div> <!-- .infos -->
                        </div> <!-- .content -->
                    </div> <!-- .payment -->
                </div> <!-- .checkout -->
            </div> <!-- .container2 -->
        </div> <!-- #wrapper -->
    </body>











    <script src="/js/script.js"></script>
</html>
