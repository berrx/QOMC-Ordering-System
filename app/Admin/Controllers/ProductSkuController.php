<?php

namespace App\Admin\Controllers;

use App\Models\ProductSku;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class ProductSkuController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ProductSku(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title', '名称');
            $grid->column('description', '介绍');
            $grid->column('price', '价格');
            // $grid->column('product_id');
            $grid->column('stock', '库存');
            // $grid->column('created_at');
            // $grid->column('updated_at')->sortable();

            // 定义库存列并使用 display 方法
            // $grid->column('stock', '库存')->display(function ($value) {
            //     // 判断库存是否小于 20
            //     if ($value < 20) {
            //         // 返回带有背景色样式的值
            //         return "<span style='background-color: #ffe5e5; display: block;'>{$value}</span>";
            //     }

            //     // 如果库存不小于 20，直接返回原始值
            //     return $value;
            // });


            // 设置行的回调，调整行的背景色
            $grid->rows(function ($row) {
                // 判断 stock 值是否小于 20
                if ($row->column('stock') < 20) {
                    // 设置整行背景色为浅红色
                    $row->setAttributes(['style' => 'background-color:#ffe5e5;']);
                }
            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new ProductSku(), function (Show $show) {
            $show->field('id');
            $show->field('description');
            $show->field('price');
            $show->field('product_id');
            $show->field('stock');
            $show->field('title');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ProductSku(), function (Form $form) {
            $form->display('id');
            $form->text('description');
            $form->text('price');
            $form->text('product_id');
            $form->text('stock');
            $form->text('title');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
