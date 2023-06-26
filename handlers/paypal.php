
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AUO4u-Ly-oMo2pwyVGIrxw4Dj-rQH3g1nXupmtj2D5hA93rAAuaGXNvlSIENVo8GyhOufOmcGSszFFG8&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

          style: {
          layout: 'vertical',
          shape: 'pill',
        },

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '300'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>
  </body>
</html>
