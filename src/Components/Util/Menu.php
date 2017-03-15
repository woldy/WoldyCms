<?php
namespace Woldy\Cms\Components\Util;
use DB;
use Request;
use Woldy\Cms\Models\MenuModel;
class Menu{

	public static $menu_table='wcms_menu';
    public static $current='/';
    public static $path=array('0');

    private $menu_type=[
        '0'=>'admin',
        '1'=>'portal',
        '2'=>'index',
        '3'=>'wiki'

    ];

    public static function get_nav(){
            $nav='';
            $urlpath='/'.urldecode(Request::path()); //高亮当前菜单
            $treepath=MenuModel::where('url',$urlpath)->first();
            if(empty($treepath)){

            }else{



                $nav_list=MenuModel::whereIn('id',explode('-', $treepath->path))->get()->toArray();
                foreach ($nav_list as $item) {
                    $nav.="<li><a href=\"{$item['url']}\">{$item['title']}</a></li>";                
                }
            }
            return $nav;
            
    }

	public static function show_list($type=0){
		return self::get_menu_show_list($type);
	}

    public static function edit_list($type=0){
        return self::get_menu_edit_list($type);
    }


    public static function get_tree($type=0,$display='on'){    //获取全部菜单
        $tree_list=DB::table(self::$menu_table);
        if($display=='on'){
             $tree_list= $tree_list->where('display','on')->where('enable','on');
        }
        $tree_list=$tree_list
            ->where('type','=',$type)
            ->orderBy('idx', 'asc')
            ->get();

        $items=array();
        foreach($tree_list as $tree){
        	$items[$tree['id']]=$tree;
        }
        foreach($items as $item)
            $items[$item['pid']]['sub'][$item['id']] = &$items[$item['id']];
        $tree=isset($items[0]['sub']) ? $items[0]['sub'] : array();
 
        return $tree;

    }


    public static function get_menu_edit_list($type='0',$tree=''){
        $tree_html='';
        $first=false;
        if(empty($tree)){
            $tree=self::get_tree($type,'all');
            $first=true;
        }
        if(is_array($tree) && count($tree)>0){
            if(isset($tree['title'])){
                //存在子菜单
                if(isset($tree['sub'])){
                    $tree_html.="<li data-item=\"{$tree['title']}\" data-item-id=\"{$tree['id']}\">
                                    <div class=\"uk-nestable-item\">
                                        <div class=\"uk-nestable-handle\"></div>
                                        <div data-nestable-action=\"toggle\"></div>
                                        <div class=\"list-label\">{$tree['title']}</div>
                                    </div>\n";
                    $tree_html.=self::get_menu_edit_list($type,$tree['sub']);
                    $tree_html.="</li>\n";      
                }else{
                    $tree_html.="<li data-item=\"{$tree['title']}\" data-item-id=\"{$tree['id']}\">
                                    <div class=\"uk-nestable-item\">
                                        <div class=\"uk-nestable-handle\"></div>
                                        <div data-nestable-action=\"toggle\"></div>
                                        <div class=\"list-label\">{$tree['title']}</div>
                                    </div></li>\n";
                }
            }else{
                if(!$first) $tree_html.="<ul>\n";
                foreach ($tree as  $node) {
                    if(!empty($node)){
                        $tree_html.=self::get_menu_edit_list($type,$node);
                    }
                }
                if(!$first) $tree_html.="</ul>\n";          
            }       
        }
         
        return $tree_html;
    }

 



     public static function get_menu_show_list($type='0',$tree=''){ 
    	$tree_html='';
    	$first=false;
    	if(empty($tree)){
             $urlpath='/'.urldecode(Request::path()); //高亮当前菜单
             $treepath=DB::table(self::$menu_table)
             ->where('type',$type)
            ->where('url',$urlpath)
            ->pluck('path')->toArray();
 
            if(!empty($treepath)){//存在此树
                self::$current=$urlpath;
                self::$path=explode('-', $treepath[0]);
            }

 
 

            $tree=self::get_tree($type);
            $first=true;
    	}
    	if(is_array($tree) && count($tree)>0){
            if(isset($tree['title'])){
                if(in_array($tree['id'],self::$path) || $tree['url']==self::$current){
                    $tree['class'].=' opened active';
                }
                //存在子菜单
                if(isset($tree['sub'])){
                    $tree_html.="<li class=\"{$tree['class']}\"><a href=\"{$tree['url']}\"><i class=\"{$tree['icon']}\"></i><span class=\"title\">{$tree['title']}</span></a>";
                    $tree_html.=self::get_menu_show_list($type,$tree['sub']);
                    $tree_html.="</li>\n";      
                }else{
                    $tree_html.="<li class=\"{$tree['class']}\"><a href=\"{$tree['url']}\"><i class=\"{$tree['icon']}\"></i><span class=\"title\">{$tree['title']}</span></a></li>\n";
                }
            }else{
                if(!$first) $tree_html.="<ul>\n";
                foreach ($tree as  $node) {
                    if(!empty($node)){
                        $tree_html.=self::get_menu_show_list($type,$node);
                    }
                }
                if(!$first) $tree_html.="</ul>\n";          
            }		
    	}
    	 
    	return $tree_html;
    }

}