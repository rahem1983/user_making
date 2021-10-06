<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- {{$errors}}
  <form action="api/setuserinfo" method="post">
    @csrf
    <label for="username">First name:</label><br>
    <input type="text" id="username" name="username" value="{{old('username')}}"><span style="color: red;">@error('username'){{ $message }}@enderror</span><br>
    <label for="email">email:</label><br>
    <input type="email" id="email" name="email" ><span style="color: red;"></span><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" ><span style="color: red;">@error('password'){{ $message }}@enderror</span><br><br>
    
    <button type="submit" >Submit</button>
  </form> -->
  <div class="container mt-5" style="max-width: 550px">

        <div class="alert alert-danger" id="error" style="display: none;"></div>

        <h3>Add Phone Number</h3>

        <div class="alert alert-success" id="successAuth" style="display: none;"></div>

        <form>
            <label>Phone Number:</label>

            <input type="text" id="number" class="form-control" placeholder="+880 ********">

            <div id="recaptcha-container"></div>

            <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP</button>
        </form>


        <div class="mb-5 mt-5">
            <h3>Add verification code</h3>

            <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>

            <form>
                <input type="text" id="verification" class="form-control" placeholder="Verification code">
                <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>


    <script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyBjVTF1RbtNns373v4X97Xj0Ejx2t8Y2nk",
    authDomain: "prec-02.firebaseapp.com",
    projectId: "prec-02",
    storageBucket: "prec-02.appspot.com",
    messagingSenderId: "859489979258",
    appId: "1:859489979258:web:2586e8daf220d36647e4c3",
    measurementId: "G-0V8L4MBXRH"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script> 
    <script type="text/javascript">
        window.onload = function () {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function sendOTP() {
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                // var userid = firebase.auth().currentUser.uid;
                 var SignupPhone = firebase.auth().currentUser.phoneNumber;
                // createCookie("uid", userid , "120");
                createCookie("userphonenumber", SignupPhone , "120");
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
                alert('verification successfull');
                window.location.replace("{{url('api/UserCall')}}");
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
        function createCookie(name, value, sec) {
          var expires;
      
          if (sec) {
            var date = new Date();
            date.setTime(date.getTime() + (sec * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
          }
          else {
            expires = "";
          }
      
          document.cookie = escape(name) + "=" + 
            escape(value) + expires + "; path=/";
          }
    </script>

</body>
</html>
