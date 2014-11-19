<div class="slideText myFooter">
    <footer>
        @include('partials.nav.footer')
        <section class="looking">
            <h4>Notre adresse</h4>
            <p><span>Mail&nbsp;: </span><a href="mailto:adress@gmail.com">adress@gmail.com</a></p>
            <p><span>Téléphone&nbsp;: </span>0476 34 21 67</p></section>
        <section class="follow"><h4>Suivez-nous</h4>
            <ul>
                <li class="fb"><a href="https://www.facebook.com/RestoRallye">Facebook</a></li>
                <li class="rss"><a href="#">RSS</a></li>
            </ul>
        </section>
        <section class="newsletter"><h4>NewsLetter</h4>

            {{ Form::open(['route' => 'storeEmailNewsletter']) }}
                {{ Form::text('email', null, ['placeholder' => 'votre@mail.com' ]) }}
                {{ Form::submit('S\'inscrire') }}
                {{ $errors->first('email', '<span class="error">:message</span>') }}
            {{ Form::close() }}
        </section>
    </footer>
    <div class="designed"><p>Designed and created by&nbsp;<a href="http://luc-matagne.be/Portfolio/">Luc Matagne</a>&nbsp;and&nbsp;<a
            href="http://portfolio.simon-leyder.be/">Simon Leyder</a> &nbsp;@ 2014</p></div>
</div>
