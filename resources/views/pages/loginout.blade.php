<!DOCTYPE html>
<html>
    <head>
        <title>SignUp</title>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <style>
            
            body{
                background-color: #5FCC9C;
                margin: 0;
                padding: 0;
                font-family: 'Ubuntu', sans-serif;
                direction: ltr;
            }
            /*====== Start SigIn ======*/
            .signin{
                background: #215B63;
                color:#fff;
                padding: 7px 10px;
                overflow: hidden;
            }
            .signin .logo{
                float: left;
                width: 40%;
                text-align: center;
            }
            .signin .logo h2{
                letter-spacing: 1px;
                font-size: 28px;
            }
            .signin .logo h2 span{letter-spacing: -2px;}
            .signin .frm{
                float: right;
                margin-right: 94px;
                margin-top: 22px;
            }
            .signin .frm input{
                float: left;
                display: inline-block;
                margin-right: 10px;
                padding: 9px 11px;
                border: none;
                outline: 0;
                border-radius: 3px;
                width: 30%;
            }
            .signin .frm input[type=submit]{
                color: #fff;
                padding: 8px 18px;
                font-size: 15px;
                font-weight: bold;
                background: #2098b3;
                cursor: pointer;
                width: 19%;
            }
            .signin .frm input[type=submit]:hover{
                background:#21abca;
            }
            /*====== End SigIn ======*/
            .signup{
                width: 600px;
                margin: 80px auto;
                background-color: #FFF;
                padding: 10px;
                border-radius: 5px;
                overflow: hidden;
            }
            .signup > h1{
                text-align: center;
                font-size: 33px;
                color: #757575;
                font-weight: 300;
            }
            .signup > input{
                display: block;
            }
            
            .signup .row input,
            .signup .row input{
                float: left;
                width: 43%;
                margin-left: 8px;
            }
            .signup input{
                height: 50px;
                display: block;
                padding: 10px 10px 0px 10px;
                border: none;
                border-bottom: 2px solid #ebebeb;
                margin-left: 9px;
                margin-top: 10px;
                width: 257px;
                font-size: 16px;
                font-family: sans-serif;
            }
            .signup input:hover{
                border-bottom-color: #dcdcdc;
            }
            .signup input:focus{
                outline: none;
                border-bottom-color: #58c791;
            }
            .signup input[type=submit]{
                position: relative;
                margin: 37px auto;
                position: relative;
                height: 50px;
                display: block;
                border-radius:5px;
                border: none;
                background-color: #58c791;
                color:#fff;
                font-size: 23px;
                padding: 0;
                box-shadow: 0 5px 0 #3aad73;
            }
            .signup input[type=submit]:hover{
                top: 2px;
                box-shadow: 0 3px 0 #3aad73;
                cursor: pointer;
            }
            .signup input[type=submit]:active{
                top:5px;
                box-shadow: none;
            }
            /*====== Start Footer ======*/
            
            footer{
                background-color: #215B63;
                text-align: center;
                padding: 10px;
                color:#fff;
            }
            
            /*====== End Footer ======*/
            
        </style>
    </head>
    <body>
        <div class="signin">
            <form method="post" action="/login">
                {{ csrf_field() }}
                <div class="logo">
                    <h2><span>LoL~</span>[Resume]</h2>
                </div>
                <div class="frm">
                    <input type="text" name="email" placeholder="Email or username">
                    <input type="password" name="pass" placeholder="Password">
                    <input type="submit" name="login" value="Log In">
                </div>
            </form>
        </div>
        <div class="signup">
            <h1>Create an account</h1>
            <form method="post" action="/reg">
                {{ csrf_field() }}
                <div class="row">
                    <input type="text" name="fname" placeholder="First name">
                    <input type="text" name="lname" placeholder="Last name">
                </div>
                <input type="text" name="username" placeholder="Username">
                <div class="row">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="re-password" placeholder="Confirm Password">
                </div>
                <input type="email" name="email" placeholder="E-mail address">
                <div class="row">
                    <input type="text" name="phone" placeholder="Phone">
                    <input type="text" name="location" placeholder="Location">
                </div>
                <input style="width:91%" type="text" name="website" placeholder="Website/Link (optional)">
                <input type="submit" name="signup" value="Join now!">
            </form>
        </div>
        <footer>
            <p>Developed by [Ahmad Abudraya]</p>
        </footer>
    </body>
</html>