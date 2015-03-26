
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">

    function reloadCaptcha()
    {
        $('#siimage').prop('src', "scripts/securimage_show.php?sid=" + Math.random());
    }

    $( document ).ready(function() {
      // Handler for .ready() called.
       $("#enviar").click(function(event) {
           var ct_captcha = $('#ct_captcha').val();
            $.post( "<?php echo base_url(); ?>index.php/welcome/process_si_contact_form",{ct_captcha:ct_captcha}, function( data ) {
                  alert(data);
            });
        });
    });

</script>


<img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="scripts/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" alt="CAPTCHA Image" align="left" />
<a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = 'scripts/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img src="./images/refresh.png" alt="Reload Image" height="32" width="32" onclick="this.blur()" align="bottom" border="0" /></a><br />
<strong>Ingresa el captcha:</strong><br />
<input type="text" name="ct_captcha" id="ct_captcha" size="12" maxlength="8" />


<br />
<input type="submit" id="enviar" value="Enviar" />

