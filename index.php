<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <style type="text/css">
            html,
            body {
                height: 100%;
            }
            .global-container {
                background-color: #222d32 !important;
                display: flex;
                height: 100%;
                align-items: center;
                justify-content: center;
                color: whitesmoke;
            }

            form {
                padding-top: 10px;
                font-size: 14px;
                margin-top: 30px;
            }

            .login-form {
                width: 380px;
                height: 400px;
                margin: 20px;
            }

            input[type="text"],
            input[type="password"] {
                background: whitesmoke;
                border-radius: 10px;
                margin-bottom: 20px;
            }
        </style>
        
        <title>Login</title>
    </head>
    <body>
        <div class="global-container">
            <div class="card login-form bg-transparent border border-4 border-white" style="border-radius: 4%;">
                <div class="card-body">
                    <div class="card-title">
                        <h1 class="text-center"><b>LOGIN</b></h1>
                        <div class="card-text">
                            <form action="authenticate.php" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" placeholder="Username" id="username" aria-describedby="emailHelp" class="form-control" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control" id="password" required/>
                                </div>
                                <div class="text-center d-grid gap-2 col-6 mx-auto mt-4">
                                    <button type="submit" class="btn btn-outline-light border-3 rounded-pill"><b>Login</b></button>
                                </div>
                                <div class="signup text-center mt-2">Belum memiliki akun ? <a href="registrasi.php">Registrasi</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
