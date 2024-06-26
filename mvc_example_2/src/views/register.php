<body class="user-class">
<div class="d-flex justify-content-center align-items-center">
    <div class="container-style m-3 p-3">
        <h1 class="text-center">Sign Up</h1>

        <form action="/?mod=user&page=register" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name"
                       style="width: 500px;" required>
            </div>

            <div class="mb-3">
                <label for="last-name" class="form-label">Last Name:</label>
                <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Enter your Last Name"
                       style="width: 500px;" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username"
                       style="width: 500px;" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" style="width: 500px;" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email"
                       style="width: 500px;" required>
            </div>

            <div class="mb-3">
                <label for="phone-number" class="form-label">Phone Number:</label>
                <input type="tel" pattern="^09\d{9}$" maxlength="11" inputmode="tel" name="phone-number" id="phone-number" class="form-control" placeholder="Enter your Phone Number"
                       style="width: 500px;" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea class="form-control" name="address" aria-label="With textarea" placeholder="Enter your Address" required></textarea>
            </div>

            <div class="text-center mb-3">
                <button type="submit" name="submit" class="btn btn-lg btn-primary fs-2" style="width: 200px; height: 70px;">Sign Up</button>
            </div>

            <div>
                Already a Member? <a href="/?mod=user&page=login">Sign In</a>
            </div>
        </form>
    </div>
</div>