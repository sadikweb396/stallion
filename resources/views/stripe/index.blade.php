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

 <Style>
    
</style>
</head>
<body>
    <div class="main-checkout">
    <div class="for-popup d-flex align-items-center justify-content-center" style="display: flex">
      <div class="checkout">
      <div class="credit-card-box">
            <div class="flip">
              <div class="front">
                <div class="chip"></div>
                <div class="logo">
                  <svg
                    version="1.1"
                    id="visa"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px"
                    y="0px"
                    width="47.834px"
                    height="47.834px"
                    viewBox="0 0 47.834 47.834"
                    style="enable-background: new 0 0 47.834 47.834"
                    class="__web-inspector-hide-shortcut__"
                  >
                    <g>
                      <g>
                        <path
                          d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                                        c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                                        c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                                        M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                                        c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                                        c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                                        l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                                        C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                                        C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                                        c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                                        h-3.888L19.153,16.8z"
                        ></path>
                      </g>
                    </g>
                  </svg>
                </div>
                <div class="number"></div>
                <div class="card-holder">
                  <label>Card Holder</label>
                  <div></div>
                </div>
                <div class="card-expiration-date">
                  <label>Expires</label>
                  <div></div>
                </div>
              </div>
              <div class="back">
                <div class="strip"></div>
                <div class="logo">
                  <svg
                    version="1.1"
                    id="visa"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px"
                    y="0px"
                    width="47.834px"
                    height="47.834px"
                    viewBox="0 0 47.834 47.834"
                    style="enable-background: new 0 0 47.834 47.834"
                  >
                    <g>
                      <g>
                        <path
                          d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                                        c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                                        c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                                        M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                                        c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                                        c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                                        l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                                        C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                                        C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                                        c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                                        h-3.888L19.153,16.8z"
                        ></path>
                      </g>
                    </g>
                  </svg>
                </div>
                <div class="ccv">
                  <label>CCV</label>
                  <div class="pdb20 white"></div>
                </div>
              </div>
            </div>
          </div>
         <form  role="form"  action="{{ route('stripe.post') }}"  method="post" class="require-validation"

                            data-cc-on-file="false"

                            data-stripe-publishable-key="{{ config('services.stripe.key') }}"

                            id="payment-form">

                        @csrf

                        <div class='form-row row'>

                            <div class='col-xs-12 form-group required'>

                                <label class='control-label'>Card Holder</label> <input

                                    class='form-control' id="card-holder" size='4' type='text'>

                            </div>

                        </div>
                        <div class='form-row row'>

                            <div class='col-xs-12 form-group card required'>

                                <label class='control-label'>Card Number</label> <input

                                    autocomplete='off' class='form-control card-number input-cart-number'id="card-number" size='20'

                                    type='text'>

                                    
                                    

                            </div>

                        </div>

    

                        <div class='form-row row'>

                            <div class='col-xs-12 col-md-4 form-group cvc required'>

                                <label class='control-label'>CVC</label> <input autocomplete='off'

                                    class='form-control card-cvc' placeholder='ex. 311'id="card-ccv" size='4'

                                    type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiry Month</label> <input

                                    class='form-control card-expiry-month' id="card-expiration-month" placeholder='MM' size='2'

                                    type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiry Year</label> <input

                                    class='form-control card-expiry-year' id="card-expiration-year" placeholder='YYYY' size='4'

                                    type='text'>

                            </div>

                        </div>

    

                        <div class='form-row row'>

                    <div class='col-md-12 error form-group hide'>

                        <div class='alert-danger alert'>Please correct the errors and try

                            again.</div>

                    </div>

                    </div>
    

                        <div class="row">

                            <div class="col-xs-12">

                                <button class="btn  btn-lg btn-block" type="submit"> <i class="fa fa-lock"></i>
                                <span class="dynamic_price"> $ {{$planPrice}}</span> / Proceed</button>

                            </div>

                        </div>

                            

                    </form>

      </div>
    </div>
  </div>

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
