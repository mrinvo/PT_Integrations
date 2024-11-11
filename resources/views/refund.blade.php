<html>
    <head>
        <link rel="stylesheet" href="/css/style.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="wrapper">
            {{-- <div class="container1">
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
            </div> <!-- .container1 --> --}}

            <div class="container2">
                <div class="checkout">
                    {{-- <p><i class="fas fa-check-circle"></i>Shipping</p>
                    <p><i class="fas fa-check-circle"></i>Checkout</p>
                    <p><i class="fas fa-check-circle"></i>Payment</p> --}}


                    <div class="payment">

                        <div style="
                        float: right;
                        position: relative;
                        top: 100;
                        right: 20px;
                    }">

                            <h3 id="comPle" class="customerDetailsTitle"></h2>
                            <br>
                            <iframe
                         width="560"
                          height="580"
                          id='iframeInput'
                          src=""
                          title="YouTube video player" frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                        </iframe>
                        </div>



                        <div class="content">
                            <div class="infos">

                                <div class="method">
                                    <h2>Follow up transaction: Refund</h2>
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

                            <form id="myForm" action="/payment/refund" method="POST">
                                    @csrf
                                <h3 class="customerDetailsTitle">Transaction Details</h2>
                                <div class="customerDetailsWrapper">
                                    <div class="cardHolderName">
                                        <p class="title">Transaction Ref</p>
                                        <input value="" type="text" name="tran_ref">
                                    </div> <!-- cardHolderName -->

                                    <div class="cardHolderName">
                                        <p class="title">Refund Amount</p>
                                        <input type="number" name="cart_amount">
                                    </div> <!-- cardHolderName -->

                                    {{-- <div class="cardHolderName">
                                        <p class="title">Email</p>
                                        <input value="technical@paytabs.co" disabled type="email" name="customer_email">
                                    </div> <!-- cardHolderName --> --}}

                                </div>




                                <div class="security">

                                    {{-- static inputs field --}}
                                    <input hidden type="text" name="payment_type" value="refund">
                                    <input hidden type="text" name="cart_id" value="cart_id_1">
                                    <input hidden type="text" name="cart_description" value="cart 1 description">
                                    <input hidden type="text" name="cart_currency" value="EGP">

                                    <input hidden type="text" name="udf1" value="technical team">
                                    <input hidden type="text" name="udf2" value="2135122">
                                    <input hidden type="text" name="udf3" value="3 items">
                                </div><!-- .security -->
                                <input type="submit" value="Refund" class="sub">
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




document.getElementById('myForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const type = document.getElementsByName('payment_type')[0];
    const cartId = document.getElementsByName('cart_id')[0];
    const cartDescription = document.getElementsByName('cart_description')[0];
    const cartCurrency = document.getElementsByName('cart_currency')[0];
    const cartAmount = document.getElementsByName('cart_amount')[0];

    const responseDiv = document.getElementById('response');




    const formData = new FormData();
    formData.append('payment_type', type.value);
    formData.append('cart_id', cartId.value);
    formData.append('cart_description', cartDescription.value);
    formData.append('cart_currency', cartCurrency.value);
    formData.append('cart_amount', cartAmount.value);


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
        // Handle the JSON response
        console.log('data',data);
        document.getElementById('iframeInput').src=data?.redirect_url
        responseDiv.textContent = 'Response: ' + data.message;

    })
    .catch(error => {
        responseDiv.textContent = 'An error occurred: ' + error.message;
    });
});



    </script> --}}
    <script src="/js/script.js"></script>
</html>
