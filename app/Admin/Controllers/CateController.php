<?php

namespace App\Admin\Controllers;

use App\Model\CateModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\CateModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CateModel);

        $grid->column('cate_id', __('Cate id'));
        $grid->column('title', __('Title'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('order', __('Order'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CateModel::findOrFail($id));

        $show->field('cate_id', __('Cate id'));
        $show->field('title', __('Title'));
        $show->field('parent_id', __('Parent id'));
        $show->field('order', __('Order'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CateModel);

        $form->select('parent_id', __('父级分类'))->options(CateModel::selectOptions());
        $form->text('title', __('Title'));
        $form->number('order', __('Order'));

        return $form;
    }
}
