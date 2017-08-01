<?php
namespace Woldy\Cms\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Response;
use Illuminate\Database\Schema\Blueprint;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Woldy\Cms\Models\BasicModel;
use Redirect;
use Menu;
use Tpl;
use Form;
use DB;
//use Illuminate\Database\Schema\Blueprint;

class ModelController extends Controller
{

    /**
     * 获取模型列表
     * @Author   woldy
     * @DateTime 2016-07-24T16:38:45+0800
     * @return   [type]                   [description]
     */
    public  function getList(){
      
      $list=BasicModel::getList();
    	return Tpl::view('model.list','admin',['list'=>$list]);
    }


    public function postEdit($table){

        $table=addslashes($table);
        $I=Input::all();
        $I['act']=$I['act']=='add'?'add':'modify';
        $I['filedname']=addslashes($I['filedname']);
        $I['filedtype']=addslashes($I['filedtype']);
        $I['filedlen']=intval($I['filedlen']);
        $I['filedplen']=intval($I['filedplen']);
        $I['filedcomment']=addslashes($I['filedcomment']);


    if(Schema::hasColumn($table, $I['filedname'])){
        $I['act']='modify';
    }
    switch ($I['filedtype']) {
        case 'varchar':
            DB::statement("alter table {$table} {$I['act']} {$I['filedname']} varchar({$I['filedlen']}) comment '{$I['filedcomment']}';");
            break;
        case 'text':
            DB::statement("alter table {$table} {$I['act']} {$I['filedname']} text comment '{$I['filedcomment']}';");
            break;
        case 'int':
            DB::statement("alter table {$table} {$I['act']} {$I['filedname']} int({$I['filedlen']}) comment '{$I['filedcomment']}';");
            break;
        case 'dateTime':
            DB::statement("alter table {$table} {$I['act']} {$I['filedname']} dateTime comment '{$I['filedcomment']}';");
            break;
        default:
            # code...
            break;
    }




        return $this->getEdit($table);
    }

    public function getEdit($table){
    	//$columns=DB::select("show full columns from $table");
        $table=addslashes($table);
        $db=(DB::connection()->getDatabaseName());
        $columns=DB::select("select * from information_schema.columns where table_schema = '{$db}' and table_name = '{$table}';");
        $config=[
            [
                'type'=>'form',
                'attr'=>[
                    'action'=>'',
                    'method'=>'post',
                    'novalidate'=>"novalidate"
                ],
                'class'=>"form-inline validate",
            ],

            [
                'type'=>'text',

                'attr'=>[
                    'name'=>'filedname',
                    'id'=>'filedname',
                    'data-validate'=>'required,echar',
                    'data-message-required'=>'请输入字段名称！',
                    'placeholder'=>'字段名',
                ],
            ],
            [
                'type'=>'select',
                'option'=>[
                    'varchar'=>'varchar',
                    'text'=>'text',
                    'int'=>'int',
                    'dateTime'=>'dateTime',
                ],
                'attr'=>[
                    'name'=>'filedtype',
                    'id'=>'filedtype',

                ],
            ],

            [
                'type'=>'text',

                'attr'=>[
                    'name'=>'filedlen',
                    'id'=>'filedlen',
                    'placeholder'=>'字段长度',
                    'style'=>'width:100px;',
                    'value'=>100,
                ],
            ],
            [
                'type'=>'text',

                'attr'=>[
                    'name'=>'filedplen',
                    'id'=>'filedplen',
                    'placeholder'=>'小数位数',
                    'style'=>'width:100px;'
                ],
            ],
            [
                'type'=>'text',

                'attr'=>[
                    'name'=>'filedcomment',
                    'id'=>'filedcomment',
                    'placeholder'=>'字段说明'

                ],
            ],

            [
                'type'=>'hidden',
                'attr'=>[
                    'name'=>'act',
                    'id'=>'act',
                    'value'=>'add'
                ],
            ],

            [
                'type'=>'submit',
                'label'=>'增加',
                'attr'=>[
                    'class'=>'btn btn-primary btn-single pull-right',
                    'id'=>'submit',
                    'type'=>'submit'
                ],
            ],

            [
                'type'=>'endform'
            ],

        ];


        $cfgform['attr']=[
            'action'=>'',
            'mothod'=>'post'
        ];

       $form=Form::build($config);
        return Tpl::view('model.edit','admin',
            [
                'columns'=>$columns,
                'form'=>$form,
                'table'=>$table
            ]
        );


    }


    public function getShow($table){

        $table=addslashes($table);

        $columns=DB::select("show full columns from $table");

        $table=new BasicModel($table);
        $data=$table->get()->toarray();

        return Tpl::view('model.show','admin',['columns'=>$columns]);
        //var_dump($data);
    }


    /**
     * 增加数据表
     * @Author   woldy
     * @DateTime 2016-07-25T00:55:54+0800
     * @return   [type]                   [description]
     */
    public function postAddtable(){
        $name=Input::get('name');
        $alias=Input::get('alias');
        $name=addslashes($name);
        $alias=addslashes($alias);
        if($name != 'wcms_' && !empty($name)){
            if(!Schema::hasTable($name)){
                Schema::create($name, function (Blueprint $table) {
                    $table->increments('id');
                    $table->timestamps();
                });


                DB::statement("ALTER TABLE `{$name}` MODIFY COLUMN `id` int COMMENT '行ID'");
                DB::statement("ALTER TABLE `{$name}` MODIFY COLUMN `created_at`  timestamp COMMENT '创建时间'");
                DB::statement("ALTER TABLE `{$name}` MODIFY COLUMN `updated_at` timestamp COMMENT '更新时间'");

                DB::table('wcms_models')->insert(
                    [
                        'table'=>$name,
                        'alias'=>$alias
                    ]
                );
            }
        }
        //return redirect('/admin/model/list');
    }




    /**
     * 删除数据表
     * @Author   woldy
     * @DateTime 2016-07-25T00:55:54+0800
     * @return   [type]                   [description]
     */
    public function postDeltable(){
        $name=Input::get('table');
        $name=addslashes($name);
            if(Schema::hasTable($name)){
                Schema::drop($name);
                DB::table('wcms_models')->where('table','=',$name)->delete();
            }
        //return redirect('/admin/model/list');
    }
}
