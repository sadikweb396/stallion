<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Payment Checkout</title>
  <!-- css file -->
  <link rel="stylesheet" href="{{url('/assets/frontend/css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head> 
<body>

@yield('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{url('/assets/frontend/js/main.js')}}"></script>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>   
$(function() {

    $(document).ready(function () {
        $(".input-cart-number").on("input", function () {
          this.value = this.value.replace(/[^0-9]/g, "");

          $t = $(this);

          if ($t.val().length > 3) {
            $t.next().focus();
          }

          var card_number = "";
          $(".input-cart-number").each(function () {
            card_number += $(this).val() + " ";
            if ($(this).val().length == 4) {
              $(this).next().focus();
            }
          });

          $(".credit-card-box .number").html(card_number);
        });

        $("#card-holder").on("input", function () {
          this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
          $(".credit-card-box .card-holder div").html($(this).val());
        });

        $("#card-expiration-month, #card-expiration-year").on("input", function () {
          let m = $("#card-expiration-month").val();
          m = m.length === 1 ? "0" + m : m;
          let y = $("#card-expiration-year").val().substr(2, 2);
          $(".card-expiration-date div").html(m + "/" + y);
        });


        // $("#card-expiration-month,#card-expiration-year").on("input", function () {
        //   let m = $("#card-expiration-month").val();
        
        //   let y = $("#card-expiration-year").val().substr(2, 2);
        //   $(".card-expiration-date div").html(m + "/" + y);
        // });

        $("#card-ccv")
          .on("focus", function () {
            $(".credit-card-box").addClass("hover");
          })
          .on("blur", function () {
            $(".credit-card-box").removeClass("hover");
          })
          .on("input", function () {
            this.value = this.value.replace(/[^0-9]/g, "");
            $(".ccv div").html($(this).val());
          });

        setTimeout(function () {
          $("#card-ccv")
            .focus()
            .delay(1000)
            .queue(function () {
              $(this).blur().dequeue();
            });
        }, 500);
      });


var $form = $(".require-validation"); 

$('form.require-validation').bind('submit', function(e) {

    var $form = $(".require-validation"),

    inputSelector = ['input[type=email]', 'input[type=password]',

                     'input[type=text]', 'input[type=file]',

                     'textarea'].join(', '),

    $inputs = $form.find('.required').find(inputSelector),

    $errorMessage = $form.find('div.error'),

    valid = true;

    $errorMessage.addClass('hide');

   $('.has-error').removeClass('has-error');

    $inputs.each(function(i, el) {

      var $input = $(el);

      if ($input.val() === '') {

        $input.parent().addClass('has-error');

        $errorMessage.removeClass('hide');

        e.preventDefault();

      }

    });
    if (!$form.data('cc-on-file')) {

      e.preventDefault();

      Stripe.setPublishableKey($form.data('stripe-publishable-key'));

      Stripe.createToken({

        number: $('.card-number').val(),

        cvc: $('.card-cvc').val(),

        exp_month: $('.card-expiry-month').val(),

        exp_year: $('.card-expiry-year').val()

      }, stripeResponseHandler);

    }
});


function stripeResponseHandler(status, response) {

    if (response.error) {

        $('.error')

            .removeClass('hide')

            .find('.alert')

            .text(response.error.message);

    } else {

        /* token contains id, last4, and card type */

        var token = response['id'];

             

        $form.find('input[type=text]').empty();

        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

        $form.get(0).submit();

    }

}

 

});

  </script>
</body>
</html>
