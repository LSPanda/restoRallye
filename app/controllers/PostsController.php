<?php
use App\Forms\Post as FormPost;
use App\Helpers\Slug as HelperSlug;

class PostsController extends \BaseController {

    protected $formPost;

    public function __construct (FormPost $formPost) {
        $this->formPost = $formPost;
    }

    /**
     * Display a listing of posts
     *
     * @return Response
     */
    public function index () {
        if (Auth::check () && Auth::getUser ()->role == 'a' && Request::is ( 'admin*' ))
        {
            $posts = Type::whereName ( 'post' )->first ()->posts ()->orderBy ( 'id', 'DESC' )->get ();

            return View::make ( 'posts.admin.index', compact ( 'posts' ) );
        }
        else
        {
            $posts = Type::whereName ( 'post' )->first ()->posts ()->orderBy ( 'id', 'DESC' )->paginate ( 6 );

            return View::make ( 'posts.index', compact ( 'posts' ) );
        }
    }

    /**
     * Show the form for creating a new post
     *
     * @return Response
     */
    public function create () {
        return View::make ( 'posts.admin.create' );
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store () {
        $input = Input::all ();
        $this->formPost->validate ( $input );

        $type               = Type::whereName ( 'post' )->first ();
        $input[ 'type_id' ] = $type->id;

        $slug            = new HelperSlug();
        $input[ 'slug' ] = $slug->setSlugAttribute ( $input[ 'name' ], new Post() );

        Post::create ( $input );

        return Redirect::route ( 'admin.posts.index' );
    }

    /**
     * Display the specified post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show ($id) {
        $post = Post::findOrFail ( $id );

        $post->thumb = $this->getImageCouverture ( 'posts', $id );

        return View::make ( 'posts.admin.show', compact ( 'post' ) );
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit ($id) {
        $post = Post::find ( $id );

        $post->thumb = $this->getImageCouverture ( 'posts', $id );

        return View::make ( 'posts.admin.edit', compact ( 'post' ) );
    }

    /**
     * Update the specified post in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update ($id) {
        $post = Post::findOrFail ( $id );

        $input = Input::all ();
        $image = Input::file ( 'image' );

        if ($image)
        {
            $this->rmdir_r ( public_path () . '/uploads/posts/' . $id );
            $image->move ( 'uploads/posts/' . $id, 'main.' . $image->getClientOriginalExtension () );
        }

        unset( $input[ 'image' ] );

        $this->formPost->validate ( $input );

        $post->update ( $input );

        return Redirect::route ( 'admin.posts.index' );
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy ($id) {
        $this->rmdir_r ( public_path () . '/uploads/posts/' . $id );
        Post::destroy ( $id );

        return Redirect::route ( 'admin.posts.index' );
    }

}
