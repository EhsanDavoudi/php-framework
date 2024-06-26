<body class="user-class">
<div class="d-flex justify-content-center align-items-center">
    <div class="container-style m-3 p-3">
        <h1 class="text-center">Login</h1>

        <form action="/?mod=user&page=login" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" style="width: 500px;" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" style="width: 500px;" required>
            </div>

            <div class="text-center mb-3">
                <button type="submit" name="submit" class="btn btn-lg btn-primary fs-2" style="width: 200px; height: 70px;">Login</button>
            </div>

            <div>
                Don't you have an account? <a href="/?mod=user&page=register">SignUp</a>
            </div>
        </form>
    </div>
</div>