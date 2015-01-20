<div class="parallax__body myFooter">
    <footer itemscope itemtype="http://schema.org/WPFooter">
        @include('partials.nav.footer')
        <section itemscope itemtype="http://schema.org/TouristInformationCenter" class="inline-block footer__information">
            <h4 itemprop="headline" class="delta">Nous contacter</h4>
            <p itemprop="contactPoint">
                <!-- TODO Informations de contact dynamiques -->
                <span class="block hightlight">Mail&nbsp;: </span>
                <a itemprop="url" href="mailto: info@restorallye.com">info@restorallye.com</a>
            </p>
            <p itemprop="telephone">
                <span class="block hightlight">Téléphone&nbsp;: </span>
                0471 38 06 38
            </p>
        </section>
        <section itemscope itemtype="http://schema.org/Action" class="inline-block footer__information">
            <h4 itemprop="headline" class="delta">Suivez-nous</h4>
            <span itemprop="result" class="inline-block social__link">
                <a itemprop="url" href="https://www.facebook.com/RestoRallye" class="block social__link--fb">Accèder à la page Facebook</a>
            </span>
            <span itemprop="result" class="inline-block social__link">
                <!-- TODO Flux RSS -->
                <a itemprop="url" href="#" class="block social__link--rss">Inscriver vous au flux RSS</a>
            </span>
        </section>
        <section itemscope itemtype="http://schema.org/Action" class="inline-block footer__newsletter">
            <h4 itemprop="headline" class="delta">Newsletter</h4>
            {{ Form::open( [ 'route' => 'storeEmailNewsletter', 'id' => 'ancreError', 'class' => 'forms__newsletter' ] ) }}
                {{ Form::text( 'email', null, [ 'placeholder' => 'votre@mail.com', 'class' => 'input__text', 'itempprop' => 'object' ] ) }}
                {{ Form::submit( 'S\'inscrire', [ 'itemprop' => 'target', 'class' => 'newsletter__submit' ] ) }}
                {{ $errors->first( 'email', '<span itemprop="error" class="error">:message</span>' ) }}
        </section>
        <div class="signature">
            <p>Designed and created by&nbsp;
            <a itemprop="url" href="http://luc-matagne.be/">Luc Matagne</a>
            &nbsp;and&nbsp;
            <a itemprop="url" href="http://portfolio.simon-leyder.be/">Simon Leyder</a> &nbsp;@ 2014</p>
        </div>
    </footer>
</div>
