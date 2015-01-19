<header itemscope itemtype="http://schema.org/WPHeader" class="header">
<h1 itemprop="headline" class="hiddenTitle">Bienvenue sur le site de Resto Rallye </h1>
    <nav itemscope itemtype="http://schema.org/SiteNavigationElement" class="header__nav">
        <div class="nav__conn">
            <form class="form__login">
                <div class="inline-block login__element">
                    <label for="login" class="hightlight login__label">Mail</label>
                    <input id="login" type="text" placeholder="john.doe@gmail.com" class="input__text">
                </div>
                <div class="inline-block login__element">
                    <label for="pwd" class="hightlight login__label">Mot de passe</label>
                    <input id="pwd" type="text" placeholder="*********" class="input__text">
                </div>
                <div class="inline-block login__element">
                    <p class="login__log"><a href="#">Inscrivez-vous&nbsp;!</a></p>
                    <input type="submit" value="Se connecter" class="login__submit">
                </div>
            </form>
        </div>
        <!--
            <div class="nav__conn logout--height">
                <p class="nav__conn--logout">
                    Bienvenue<span class="span--spacing"><a href="#">&nbsp;Modifier informations personnel&nbsp;/</a><a href="#">&nbsp;Déconnexion&nbsp;)</a></span>
                </p>
            </div>
        -->
        <div class="nav">
            <h2 itemprop="alternativeHeadline" class="hiddenTitle">Menu de navigation du site</h2>
                <span itemprop="keywords" class="inline-block nav__element nav__element--accueil">
                    <a itemprop="url" href="{{ route('home') }}" class="element__link">Accueil</a>
                </span>
                <span itemprop="keywords" class="inline-block nav__element">
                    <a itemprop="url" href="{{ route('rallyes.index') }}" class="element__link">Événements</a>
                </span>
                <span itemprop="keywords" class="inline-block nav__element">
                    <a itemprop="url" href="{{ route('posts.index') }}" class="element__link">Actualités</a>
                </span>
                <span class="inline-block banners">
                    <a itemprop="url" href="{{ route('home') }}" class="banners__link"><img itemprop="image" src="/css/images/links/Ecusson.png" alt="Banners Resto Rallye"></a>
                </span>
                <span itemprop="keywords" class="inline-block nav__element">
                    <a itemprop="url" href="{{ route('restaurants.index') }}" class="element__link">Restaurants</a>
                </span>
                <span itemprop="keywords" class="inline-block nav__element">
                    <a itemprop="url" href="{{ route('contact') }}" class="element__link">Contact</a>
                </span>
                <span itemprop="keywords" id="login" class="block button__login">
                    Connexion
                </span>
        </div>
    </nav>
</header>
