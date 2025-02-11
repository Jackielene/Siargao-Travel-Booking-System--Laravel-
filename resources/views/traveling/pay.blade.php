@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PayPal Payment</title>
    <link rel="stylesheet" type="text/css" href="https://www.paypalobjects.com/webstatic/en_US/developer/docs/css/cardfields.css" />
    <style>
        /* Styling for the entire page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px; /* Padding for spacing */
            background-color: #f8f9fa; /* Light background color */
        }

        /* Full width for the banner */
        .about-main-content {
            margin-top: -25px; /* Adjust margin as needed */
            width: 100%; /* Full width */
            position: relative; /* Position relative for absolute child positioning */
            overflow: hidden; /* Hide overflow */
        }

        .container {
            padding: 0; /* Remove padding from container */
            width: 100%; /* Full width for the container */
        }

        .content {
            padding: 20px; /* Optional inner padding */
        }

        /* Box styling */
        .payment-box {
            background-color: white; /* White background for the box */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for depth */
            padding: 20px; /* Inner spacing */
            text-align: center; /* Center text inside the box */
            width: 400px; /* Set a fixed width for the box */
            margin: 40px auto 20px auto; /* Center box with auto margins and add top margin */
        }

        #paypal-button-container {
            margin: 20px 0;
        }

        #result-message {
            margin-top: 20px;
            color: green;
        }

        /* Ensure footer stays at the bottom */
        footer {
            margin-top: 20px; /* Space above the footer */
            text-align: center; /* Center footer text */
            position: relative; /* Ensure it's positioned relative to the content */
        }
    </style>
</head>
<body>

  <div class="about-main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content">
                    <div class="blur-bg"></div>
                    <h4>EXPLORE OUR COUNTRY</h4>
                    <div class="line-dec"></div>
                    <h2>Welcome To Siargao Islands</h2>
                    <p>Discover the hidden gem of the Philippines—Siargao Islands! Known for its breathtaking natural beauty, vibrant culture, and world-class surfing spots, Siargao is a paradise for adventure seekers and relaxation enthusiasts alike.</p>
                    <div class="main-button"></div>
                </div>
            </div>
        </div>
    </div>
  </div>
  
    <div class="payment-box">
        <h2>Complete Your Payment</h2>
        <p>Please confirm your payment of <strong>${{ number_format($amount / 100, 2) }}</strong>.</p>

        <div id="paypal-button-container"></div>
        <p id="result-message"></p>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=ATJUJYAJ7B279h8jsME8Dfvn1HwX_ZsznqrXJzoif4kpgsRut6BX8NxEdzb_iJnuYUsdlcML_KAXMAZN&currency=USD"></script>
    
    <script>
        const totalAmount = {{ $amount }}; // Amount passed from the controller

        window.paypal.Buttons({
            style: {
                shape: 'rect',
                layout: 'vertical',
                color: 'gold',
                label: 'paypal',
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: (totalAmount / 100).toFixed(2) // Convert cents to dollars
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    // Redirect to the success page or display a success message
                    window.location.href = "{{ route('traveling.success') }}"; // Redirect on success
                });
            },
            onError: function(err) {
                console.error(err);
                document.getElementById('result-message').innerHTML = 'An error occurred during the transaction.';
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
@endsection
