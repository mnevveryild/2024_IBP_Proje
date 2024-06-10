<html>  
<head>  
    <title> Welcome | Login </title>  
    <link rel = "stylesheet" type = "text/css" href = "style.css">   
</head>  
<body> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section id="login"> 
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var homepage = document.getElementById("login");
            homepage.style.backgroundImage = 'url("images/Adsız tasarım (6).png")';
            homepage.style.backgroundSize = 'cover';
            homepage.style.backgroundPosition = 'center';
            homepage.style.backgroundRepeat = 'no-repeat';
            homepage.style.width = '100vw';
            homepage.style.height = '100vh';
        });
        </script>       
        <div id="frm">  
            <h1>ＬＯＧＩＮ</h1>  
            <form name="f1" action="authentication.php" onsubmit="return validation()" method="POST">  
                <p>  
                    <label> ｕｓｅｒｎａｍｅ : </label>  
                    <input type="text" id="user" name="user" />  
                </p>  
                <p>  
                    <label>ｐａｓｓｗｏｒｄ : </label>  
                    <input type="password" id="pass" name="pass" />  
                </p>  
                <p>     
                    <input type="submit" id="btn" value="ｌｏｇｉｎ " />  
                </p>  
            </form>  
        </div> 
    </section>  
</body>
</html>

   
    <script>  
        function validation() {  
            var id = document.f1.user.value;  
            var ps = document.f1.pass.value;  
            if (id.length == "" && ps.length == "") {  
                alert("User Name and Password fields are empty");  
                return false;  
            } else {  
                if (id.length == "") {  
                    alert("User Name is empty");  
                    return false;  
                }   
                if (ps.length == "") {  
                    alert("Password field is empty");  
                    return false;  
                }  
            }                             
        }  
    </script>  
</body>     
</html>