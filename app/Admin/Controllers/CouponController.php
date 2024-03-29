<?php

namespace App\Admin\Controllers;

use App\Model\CouponModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CouponController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\CouponModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CouponModel);

        $grid->column('title', __('优惠劵名称'));
        $grid->column('id', __('Id'));
        $grid->column('type', __('Type'));
        $grid->column('total', __('Total'));
        $grid->column('minus', __('Minus'));
        $grid->column('expire_at', __('Expire at'));

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
        $show = new Show(CouponModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type', __('Type'));
        $show->field('total', __('Total'));
        $show->field('minus', __('Minus'));
        $show->field('expire_at', __('Expire at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CouponModel);

        $form->text('title', __('优惠劵名称'));
        $form->select('type', __('优惠劵类型'))->options([1=>"满减",2=>"折扣",3=>"固定金额"]);
        $form->number('total', __('Total'));
        $form->number('minus', __('Minus'));
        $form->datetime('expire_at', __('过期时间'));

        return $form;
    }
}
