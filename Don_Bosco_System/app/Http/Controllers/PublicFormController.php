<?php

namespace App\Http\Controllers;

use App\Models\Form;

class PublicFormController extends Controller
{
 public function show($slug)
{
    $form = Form::where('slug', $slug)
        ->firstOrFail();

    if (!$form->isOpen()) {

        abort(403, 'Form Closed');
    }

    $fields = $form->getAllFieldsForRender();

    return view('forms.show', compact(
        'form',
        'fields'
    ));
}
}
