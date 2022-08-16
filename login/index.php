<head>
    <link rel="stylesheet" href="../css/custom.css">
    <link href="../assets/css/styles.css" rel="stylesheet" />
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <!-- @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('loginError')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></ button>
            </div>
            @endif -->
            <main class="form-signin">
                <h1 class="h3 mb-5 fw-normal text-center">Please sign in</h1>
                <form action='do_login.php' method='post'>

                    <div class="form-floating">
                        <input type="username" name="username" class="form-control" id="username" placeholder="name@example.com" value="">
                        <label for="username" autofocus>Username</label autofocus required>

                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                    <small class=" d-block text-center">Tambah admin<a href="/register">Register</a></small>
                    <small><a href="../index.php">Back to home</a></small>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
                </form>

        </div>
        </main>
    </div>
</div>