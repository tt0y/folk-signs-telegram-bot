<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SuperstitionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SuperstitionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SuperstitionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Superstition::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/superstition');
        CRUD::setEntityNameStrings('superstition', 'superstitions');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('day');
        CRUD::column('month');
        CRUD::column('name');
        CRUD::column('description');
        CRUD::column('full_text');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SuperstitionRequest::class);

        $this->crud->AddFields([
            [
                'name' => 'day',
                'label' => __('day'),
                'type' => 'number',
            ],            [
                'name' => 'month',
                'label' => __('month'),
                'type' => 'number',
            ],            [
                'name' => 'name',
                'label' => __('name'),
                'type' => 'text',
            ],            [
                'name' => 'description',
                'label' => __('description'),
                'type' => 'text',
            ],            [
                'name' => 'full_text',
                'label' => __('full_text'),
                'type' => 'tinymce',
            ],
        ]);

        CRUD::field('day');
        CRUD::field('month');
        CRUD::field('name');
        CRUD::field('description');
        CRUD::field('full_text')->type('tinymce');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
