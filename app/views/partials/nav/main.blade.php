<header itemscope itemtype="http://schema.org/WPHeader" class="header">
    <h1 itemprop="headline" class="hiddenTitle">Bienvenue sur le site de Resto Rallye </h1>
        <div itemscope itemtype="http://schema.org/SiteNavigationElement" class="header__nav">
            <section class="nav__conn">
                <h2 itemprop="alternativeHeadline" class="hiddenTitle">Accès à mon compte Gastronomade</h2>
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
            </section>
        <!--
            <section class="nav__conn logout--height">
                <h2 itemprop="alternativeHeadline" class="hiddenTitle">Accès à mon compte Gastronomade</h2>
                <p class="nav__conn--logout">
                    Bienvenue<span class="span--spacing"><a href="#">&nbsp;Modifier informations personnel&nbsp;/</a><a href="#">&nbsp;Déconnexion&nbsp;)</a></span>
                </p>
            </section>
        -->
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
