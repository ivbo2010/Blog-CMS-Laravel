<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller {
    public function index( Request $request ) {
        $tags = Tag::when( $request->search, function ( $q ) use ( $request ) {
            return $q->whereTranslationLike( 'name', '%' . $request->search . '%' );
        } )->latest()->paginate( 5 );

        return view( 'dashboard.tags.index', compact( 'tags' ) );
    }

    public function create() {
        return view( 'dashboard.tags.create' );
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store( Request $request ) {
        $rules = [];

        foreach ( config( 'translatable.locales' ) as $locale ) {
            $rules += [
                $locale . '.name' => [
                    'required',
                    Rule::unique( 'tag_translations', 'name' )
                ]
            ];
        }

        $request->validate( $rules );

        Tag::create( $request->all() );
        session()->flash( 'success', __( 'site.added_successfully' ) );

        return redirect()->route( 'dashboard.tags.index' );
    }

    public function edit( Tag $tag ) {
        return view( 'dashboard.tags.edit', compact( 'tag' ) );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Tag $tag
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Request $request, Tag $tag ) {
        $rules = [];

        foreach ( config( 'translatable.locales' ) as $locale ) {
            $rules += [
                $locale . '.name' => [
                    'required',
                    Rule::unique( 'tag_translations', 'name' )->ignore( $tag->id, 'tag_id' )
                ]
            ];
        }

        $request->validate( $rules );

        $tag->update( $request->all() );
        session()->flash( 'success', __( 'site.updated_successfully' ) );

        return redirect()->route( 'dashboard.tags.index' );
    }

    public function destroy( Tag $tag ) {
        $tag->delete();
        session()->flash( 'success', __( 'site.deleted_successfully' ) );

        return redirect()->route( 'dashboard.tags.index' );
    }
}
