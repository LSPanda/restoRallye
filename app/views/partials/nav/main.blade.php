<header itemscope itemtype="http://schema.org/WPHeader" class="header">
    <h1 itemprop="headline" class="hiddenTitle">Bienvenue sur le site de Resto Rallye </h1>
        <div itemscope itemtype="http://schema.org/SiteNavigationElement" class="header__nav">
            @if ( Auth::check() )
                <section class="nav__conn logout--height">
                    <h2 itemprop="alternativeHeadline" class="hiddenTitle">Accès à mon compte Gastronomade</h2>
                    <p class="nav__conn--logout">
                        Bienvenue&nbsp;<span class="hightlight">{{ Auth::user()->email }}</span>&nbsp;<span class="span--spacing"><a href="#">Modifier informations personnelles</a>&nbsp;/&nbsp;<a href="{{ route( 'logout' ) }}">Déconnexion</a></span>
                    </p>
                </section>
            @else
                <section class="nav__conn">
                    <h2 itemprop="alternativeHeadline" class="hiddenTitle">Accès à mon compte Gastronomade</h2>
                    {{ Form::open( [ 'route' => 'doLogin' ] ) }}
                        <div class="inline-block login__element">
                            {{ Form::label( 'email', 'Mail', [ 'class' => 'hightlight login__label' ] ) }}
                            {{ Form::email( 'email', null, [ 'class' => 'input__text', 'placeholder' => 'john.doe@gmail.com', 'required' => 'required' ] ) }}
                            {{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                        <div class="inline-block login__element">
                            {{ Form::label( 'password', 'Mot de passe', [ 'class' => 'hightlight login__label' ] ) }}
                            {{ Form::password( 'password', [ 'class' => 'input__text', 'placeholder' => '*********', 'required' => 'required' ] ) }}
                            {{ $errors->first('password', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                        <div class="inline-block login__element">
                            <p class="login__log"><a href="#">Inscrivez-vous&nbsp;!</a></p>
                            {{ Form::submit( 'Se connecter', [ 'class' => 'login__submit' ] ) }}
                        </div>
                    </form>
                </section>
            @endif
            <nav class="position--relative nav">
                <h2 itemprop="alternativeHeadline" class="hiddenTitle">Menu de navigation du site</h2>
                    <span itemprop="keywords" class="inline-block nav__element">
                        <a itemprop="url" href="{{ route('rallyes.index') }}" class="element__link">Événements</a>
                    </span>
                    <span itemprop="keywords" class="inline-block nav__element">
                        <a itemprop="url" href="{{ route('posts.index') }}" class="element__link">Actualités</a>
                    </span>
                    <span itemprop="keywords" class="inline-block nav__element banners">
                        <a itemprop="url" href="{{ route('home') }}" class="element__link"><img itemprop="image" src="/css/images/links/Ecusson.png" alt="Banners Resto Rallye" class="banners__link">Accueil</a>
                    </span>
                    <span itemprop="keywords" class="inline-block nav__element">
                        <a itemprop="url" href="{{ route('restaurants.index') }}" class="element__link">Restaurants</a>
                    </span>
                    <span itemprop="keywords" class="inline-block nav__element">
                        <a itemprop="url" href="{{ route('contact') }}" class="element__link">Contact</a>
                    </span>
                    <span itemprop="keywords" id="loginButton" class="nav__element button__login">
                        Mon compte
                    </span>
            </nav>
    </div>
</header>
