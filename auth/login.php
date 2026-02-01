<!DOCTYPE html>
<html>
<head>
    <title>Login Suara Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
        }
    </style>
</head>

<body class="bg-light d-flex align-items-center justify-content-center">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h5 class="mb-0">Login Suara Desa</h5>
                </div>
                <div class="card-body">
                    <form action="proses_login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100" type="submit">
                            Login
                        </button>
                    </form>
                </div>
            </div>

            <p class="text-center mt-3 text-muted" style="font-size: 13px;">
                Sistem Informasi Perdesaan
            </p>
        </div>
    </div>
</div>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

</body>
</html>
