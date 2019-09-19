<?php

namespace App\Admin\Controllers;

use App\Model\CateModel;
use App\Model\GoodsModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Model\Cate;

class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\GoodsModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsModel);

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('img', __('Img'))->image();
        $grid->column('desc', __('Desc'));
        $grid->column('pricing', __('Pricing'));
        $grid->column('price', __('Price'));
        $grid->column('cate_id', __('Cate id'));

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
        $show = new Show(GoodsModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('img', __('Img'));
        $show->field('desc', __('Desc'));
        $show->field('pricing', __('Pricing'));
        $show->field('price', __('Price'));
        $show->field('cate_id', __('Cate id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsModel);

        $form->select('cate_id', __('分类'))->options(CateModel::selectOptions());
        $form->text('title', __('Title'));
        $form->image('img', __('Img'));
        $form->text('desc', __('Desc'));
        $form->number('pricing', __('Pricing'));
        $form->number('price', __('Price'));


        return $form;
    }
}
