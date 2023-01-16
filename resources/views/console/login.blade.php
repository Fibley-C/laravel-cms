<!DOCTYPE html>
<html lang="en">
<x-head />
<body>
    <section class="w3-card-4 w3-display-middle" style="width:550px;">
        <div class="w3-container w3-blue-grey w3-margin-bottom">
            <h2>Login Page</h2>
        </div>
        <form class="w3-container" method="post" action="/console/login" novalidate>
            @csrf

            <div class="w3-margin-bottom">
                <label class="w3-text-blue-grey" for="email">Email Address</label>
                <input class="w3-input w3-border w3-animate-input" style="width:50%" type="email" name="email" id="email"
                    value="{{ old('email') }}">
                @if($errors->first('email'))
                    <br>
                    <span class="w3-text-red">{{ $errors->first('email'); }}></span>
                @endif
            </div>

            <div class="w3-margin-bottom">
                <label class="w3-text-blue-grey" for="password">Password</label>
                <input class="w3-input w3-border w3-animate-input" style="width:50%" type="password" name="password" id="password">
                @if($errors->first('password'))
                    <br>
                    <span class="w3-text-red">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button class="w3-btn w3-blue-grey w3-margin-bottom" type="submit">Login</button>
        </form>
    </section>
</body>
</html>