
<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/scripts.js"></script>

<script type="text/javascript">
 $('#btn_sign').click(function(){
   $(location).attr('href','signup.php');
 })

$('#form-repassword').keyup(function(){
  var pwd = $('#form-password').val();
  var repwd = $('#form-repassword').val();


  if(pwd == repwd) {
    $('#form-password').css("background-color","#99FFCC");
    $('#form-repassword').css("background-color","#99FFCC");
  } else {
    $('#form-password').css("background-color","#FF9999");
    $('#form-repassword').css("background-color","#FF9999");
  }
})

$('#sign_ok_btn').click(function(){
  var pwd = $('#form-password').val();
  var repwd = $('#form-repassword').val();
  var name = $('form-username').val();

  if(pwd == repwd && pwd != "") {
    $('#sign_form').submit();
  } else {
    alert("Password check Please");
  }
})
</script>
<!--[if lt IE 10]>
    <script src="assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>
