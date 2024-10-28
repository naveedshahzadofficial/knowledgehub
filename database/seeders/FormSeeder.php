<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\FormField;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Form::truncate();
        FormField::truncate();
        DB::statement("SET foreign_key_checks=1");

        $form = Form::create(['form_name' => 'Irrigation Department Form']);
        $form->rlcos()->sync([136, 137, 138, 139, 140]);

        FormField::create(['form_id' => $form->id,
            'field_label' => 'Nature of Proposed Work (Bridge, Pipeline Road etc.)',
            'field_type' => 'text', 'is_required' => true,
            'field_options' => null,
            'field_group' => null
        ]);
        FormField::create(['form_id' => $form->id,
            'field_label' => 'Location of proposed work',
            'field_type' => 'text', 'is_required' => true,
            'field_options' => null,
            'field_group' => null
        ]);
        FormField::create(['form_id' => $form->id,
            'field_label' => 'Name of related canal, drain, section of river floodplain',
            'field_type' => 'text', 'is_required' => true,
            'field_options' => null,
            'field_group' => null
        ]);
        FormField::create(['form_id' => $form->id,
            'field_label' => 'Exact Location of proposed work on related canal, drain, section or river flood',
            'field_type' => 'text', 'is_required' => true,
            'field_options' => null,
            'field_group' => null
        ]);
        FormField::create(['form_id' => $form->id,
            'field_label' => 'Location of proposed work superimposed on related canal, drain or section of river flood plain attached (Yes / No)',
            'field_type' => 'text', 'is_required' => false,
            'field_options' => null,
            'field_group' => null
        ]);

        FormField::create(['form_id' => $form->id,
            'field_label' => 'Engineer design of proposed work attached',
            'field_type' => 'radio', 'is_required' => true,
            'field_options' => ['Yes', 'No'],
            'field_group' => null
        ]);

        FormField::create(['form_id' => $form->id,
            'field_label' => 'Results of Geo-technical investigations, hydrological studies etc attached',
            'field_type' => 'radio', 'is_required' => true,
            'field_options' => ['Yes', 'No'],
            'field_group' => null
        ]);

        FormField::create(['form_id' => $form->id,
            'field_label' => 'Methodology of instruction work',
            'field_type' => 'text', 'is_required' => true,
            'field_options' => null,
            'field_group' => null
        ]);

        FormField::create(['form_id' => $form->id,
            'field_label' => 'Time frame for proposed instructions',
            'field_type' => 'text', 'is_required' => true,
            'field_options' => null,
            'field_group' => null
        ]);

        FormField::create(['form_id' => $form->id,
            'field_label' => 'Bank Challan No. and processing fee amount deposited',
            'field_type' => 'text', 'is_required' => true,
            'field_options' => null,
            'field_group' => null
        ]);

        FormField::create(['form_id' => $form->id,
            'field_label' => 'Commitment on non-judicial stamp paper for abiding on condition attached',
            'field_type' => 'radio', 'is_required' => true,
            'field_options' => ['Yes', 'No'],
            'field_group' => null
        ]);

        $form = Form::create(['form_name' => 'Livestock & Dairy Development Department Form']);
        $form->rlcos()->sync([54, 55, 58, 59 ]);
        $form = Form::create(['form_name' => 'Livestock & Dairy Development Department Form']);
        $form->rlcos()->sync([51]);

    }
}
