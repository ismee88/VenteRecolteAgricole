
<!doctype html>
<html lang="fr">

<head>
<title>FarmGoods || Authentification</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/color_skins.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
</head>

<body class="theme-cyan">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="{{asset('backend/assets/images/logo2.png')}}" alt="FarmGoods">
                    </div>
                    <form class="form-auth-small" method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="card">
                            <div class="header">
                                <p class="lead">Connexion à votre compte</p>
                            </div>
                            <div class="body">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus id="signin-email" placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" id="signin-password" placeholder="Mot de passe">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="" id="customChe">
                                    <label class="lead" for="customChe">Se souvenir de moi </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Se connecter</button>
                                <!-- Forget Password -->
                                <div class="forget_pass mt-4">
                                    <a href="{{route('user.register')}}">S'inscrire</a>
                                    <a href="#" class="float-right">Mot de passe oublié ?</a>
                                </div>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
