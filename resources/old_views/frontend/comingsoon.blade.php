<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <title>Coming soon</title>
    <style>
      body {
        font-family: "Montserrat", sans-serif;
        margin: 0;
        padding: 0;
      }

      section.hero_banner_m .banner_logo_m {
        width: 50%;
        margin: 0 auto;
      }

      img.img-contain {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      section.hero_banner_m {
        background-size: cover;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-position: center;
      }

      .banner_heading-m {
        color: #fbfafa;
        text-align: center;
        font-size: 18px;
        text-transform: uppercase;
        padding-bottom: 30px;
        letter-spacing: 4px;
      }
      .banner_heading-m h2 {
        font-weight: 300;
      }

      .banner_heading-cs {
        color: #fbfafa;
        text-align: center;
        font-size: 32px;
        letter-spacing: 16px;
        text-transform: uppercase;
      }
      .banner_heading-cs h2 {
        font-weight: 400;
      }

      .formMainLogin {
        color: black;
        font-size: 20px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        width: 90%;
        max-width: 500px;
        border-radius: 10px;
      }

      .formHeading {
        text-align: center;
      }

      form.loginForm input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
      }

      button.formBtn {
        width: 100%;
        padding: 10px;
        color: white;
        background-color: #00000096;
        border: none;
        text-transform: uppercase;
        font-family: Montserrat, sans-serif;
        cursor: pointer;
        border-radius: 5px;
        letter-spacing: 4px;
        line-height: 18px;
      }

      button.formBtn:hover {
        background-color: #00000066;
        color: black;
      }
      button.formBtnMain {
        width: 100%;
        padding: 10px;
        color: white;
        background-color: #9f8f8666;
        border: none;
        text-transform: uppercase;
        font-family: Montserrat, sans-serif;
        letter-spacing: 4px;
        line-height: 18px;
      }
      .formButton {
        width: 45%;
        margin: 0 auto;
      }

      .popupOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.733); /* Light dull effect */
        z-index: 999;
        display: none;
      }

      .popupCloseBtn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
        border-radius: 3px;
      }

      @media (max-width: 768px) {
        .banner_heading-cs {
          font-size: 24px;
        }

        .formMainLogin {
          padding: 15px;
          font-size: 18px;
        }

        .formHeading h3 {
          font-size: 20px;
        }
      }

      @media (max-width: 320px) {
        .banner_heading-cs {
          font-size: 16px;
        }

        .formMainLogin {
          width: 80%;
        }

        .formHeading h3 {
          font-size: 16px;
        }

        button.formBtn {
          font-size: 14px;
        }
      }
    </style>
  </head>
  <body>
    <!-- banner section -->
    <section
      class="hero_banner_m d-flex align-items-center"
       style="background-image: url('{{ asset('assets/frontend/image/Rectangle 21.png') }}"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_heading-cs text-center">
                <h2>Coming Soon</h2>
              </div>
              <div class="banner_logo_m text-center">
                <img
                  src="{{url('assets/frontend/image/banner-logo.png')}}"
                  alt="banner logo"
                  class="img-contain"
                />
              </div>

              <div class="banner_heading-m text-center">
                <h2>Ensuring Quality Performance Horse Genetics</h2>
              </div>
              <div class="formButton">
                <button class="formBtnMain" id="formBttn">
                  Subscribe To <br />receive Updates
                </button>
              </div>
              <div class="formMainLogin">
                <div class="formHeading">
                  <h3>Fill Out The Details Below</h3>
                </div>
                <div class="formD">
                  <form class="loginForm" action="/action_page.php">
                    <label for="fname">Name</label><br />
                    <input
                      type="text"
                      id="fname"
                      name="fname"
                      value=""
                      required
                    /><br />

                    <label for="email">Email</label><br />
                    <input
                      type="email"
                      id="email"
                      name="email"
                      value=""
                      required
                    /><br />

                    <label for="number">Phone Number</label><br />
                    <input
                      type="tel"
                      id="number"
                      name="number"
                      value=""
                      pattern="[0-9]{10}"
                      required
                    /><br /><br />

                    <button type="submit" class="formBtn">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Get the button and form elements
        const formButton = document.getElementById("formBttn");
        const loginForm = document.querySelector(".formMainLogin");

        // Create and append overlay
        const overlay = document.createElement("div");
        overlay.classList.add("popupOverlay");
        document.body.appendChild(overlay);

        // Create and append close button
        const closeButton = document.createElement("button");
        closeButton.textContent = "X";
        closeButton.classList.add("popupCloseBtn");
        loginForm.prepend(closeButton);

        // Initially hide the form and overlay
        loginForm.style.display = "none";
        overlay.style.display = "none";

        // Add click event listener to the button
        formButton.addEventListener("click", function () {
          loginForm.style.display = "block"; // Show the form
          overlay.style.display = "block"; // Show the overlay
        });

        // Add click event listener to close button
        closeButton.addEventListener("click", function () {
          loginForm.style.display = "none"; // Hide the form
          overlay.style.display = "none"; // Hide the overlay
        });

        // Close popup when clicking on overlay
        overlay.addEventListener("click", function () {
          loginForm.style.display = "none"; // Hide the form
          overlay.style.display = "none"; // Hide the overlay
        });
      });
    </script>
  </body>
</html>
