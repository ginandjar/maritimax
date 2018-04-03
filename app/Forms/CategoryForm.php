<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('submit', 'submit', ['label' => 'Save form']);
    }
}
