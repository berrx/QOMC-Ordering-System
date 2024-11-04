<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Category(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('icon')->image('', 50, 50);
            $grid->column('name');
            $grid->status('展示')->display(function ($value) {
                return $value ? '是' : '否';
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
        return Show::make($id, new Category(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('icon');
            $show->field('status');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Category(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->image('banner', '轮播图')->rules('required|image');
            $form->image('icon', '图标')->rules('required|image');
            $form->radio('status', '上架')->options(['1' => '是', '0' => '否'])->default('0');
        });
    }

    public function categorys(Request $request)
    {
        $search = $request->input('q');
        $result = Category::query()
            // 通过 is_directory 参数来控制
            ->where('name', 'like', '%' . $search . '%')
            ->paginate();

        // 把查询出来的结果重新组装成 Laravel-Admin 需要的格式
        $result->setCollection($result->getCollection()->map(function (Category $category) {
            return ['id' => $category->id, 'text' => $category->name];
        }));

        return $result;
    }
}
