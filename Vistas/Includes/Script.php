<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="<?php echo SERVERURL;?>Archivos/js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="<?php echo SERVERURL;?>Archivos/js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="<?php echo SERVERURL;?>Archivos/js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="<?php echo SERVERURL;?>Archivos/js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="<?php echo SERVERURL;?>Archivos/js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  <!-- phone -->
	<script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
         utilsScript:
           "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
      </script>
      <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
          integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous">
      </script>

      <script>
          const info = document.querySelector(".alert-info");
          function process(event) {
              event.preventDefault();

              const phoneNumber = phoneInput.getNumber();

              info.style.display = "";
              info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
          }
      </script>
      <script>
          function getIp(callback) {
              fetch('https://ipinfo.io/json?token=7c7bc31e374267', { headers: { 'Accept': 'application/json' } })
                  .then((resp) => resp.json())
                  .catch(() => {
                      return {
                          country: 'ec',
                      };
                  })
                  .then((resp) => callback(resp.country));
          }
      </script>
	<script src="<?php echo SERVERURL;?>Archivos/js/main.js" ></script>
	<script src="<?php echo SERVERURL;?>Archivos/js/alertas.js" ></script>
	
