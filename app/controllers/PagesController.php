<?php
use App\Forms\Home as FormHome;
use App\Forms\Contact as FormContact;
use App\Forms\Content as FormContent;

/**
 * Class PagesController
 */
class PagesController extends \BaseController {

    protected $formHome, $formContact, $formContent;

    /**
     * @param FormHome    $formHome
     * @param FormContact $formContact
     * @param FormContent $formContent
     */
    public function __construct (FormHome $formHome, FormContact $formContact, FormContent $formContent) {
        $this->formHome    = $formHome;
        $this->formContact = $formContact;
        $this->formContent = $formContent;
    }

    /**
     * Envoie le à propos et 3 restaurants aléatoires dans la page d'accueil
     *
     * @return mixed
     */
    public function home () {
        $about = Type::whereName ( 'about-home' )->first ()->posts ()->first ();

        $restaurants = Restaurant::all ()->random ( 3 );

        return View::make ( 'pages.home', compact ( 'about', 'restaurants' ) );
    }

    /**
     * Enregistre une nouvelle adresse dans la liste des adresses pour la newsletter
     * TODO Gérer la redirection correctement (renvoie
     *
     * @return mixed
     * @throws \Laracasts\Validation\FormValidationException
     */
    public function storeEmailNewsletter () {
        $this->formHome->validate ( Input::all () );

        NewsletterEmail::create ( Input::all () );

        return Redirect::to ( URL::previous() . '#ancreError' );
    }

    /**
     * Affiche le dashboard de l'administration
     *
     * @return mixed
     */
    public function homeAdmin () {
        return View::make ( 'pages.admin.index', compact ( 'about' ) );
    }

    /**
     * Récupère le à propos de la page d'accueil pour modification dans l'administration
     *
     * @return mixed
     */
    public function contents () {
        $about = Type::whereName ( 'about-home' )->first ()->posts ()->first ();

        return View::make ( 'pages.admin.contents', compact ( 'about' ) );
    }

    /**
     * Met à jour le contenu avec l'id $id
     *
     * @param $id
     *
     * @return mixed
     * @throws \Laracasts\Validation\FormValidationException
     */
    public function updateContent ($id) {
        $this->formContent->validate ( Input::all () );

        $content = Post::findOrFail ( $id );

        $content->update ( Input::all () );

        return Redirect::route ( 'admin.pages.index' );
    }

    /**
     * Affiche la page de contact
     *
     * @return mixed
     */
    public function contact () {
        return View::make ( 'pages.contact' );
    }

    /**
     * Vérifie les champs et envoie un email
     *
     * @return mixed
     * @throws \Laracasts\Validation\FormValidationException
     */
    public function sendMail () {
        $this->formContact->validate ( Input::all () );

        return Redirect::route ( 'pages.contact' );
    }
}
