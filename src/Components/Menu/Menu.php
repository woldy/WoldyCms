<?php
namespace Woldy\Cms\Components\Menu;
class Menu{
	
	public $menu_table='ops_menu';
    public $current='/';
    public $path=array('0');


	public static function show(){
		echo "xxx";
	}



    public function get_tree($role='0'){    //获取菜单数组
        $tree_list=DB::table($this->menu_table)
            ->where('display',1)
            ->where('role','<=',$role)
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

     public function get_menu($role='0',$tree=''){
    	$tree_html='';
    	$first=false;
    	if(empty($tree)){
             $urlpath='/'.urldecode(Request::path());
             $treepath=DB::table($this->menu_table)
            ->where('url',$urlpath)
            ->pluck('path');
 
            if(!empty($treepath)){//存在此树
                $this->current=$urlpath;
                $this->path=explode('-', $treepath[0]);
            }
 

    		$tree=$this->get_tree($role);
    		$first=true;
    	}
    	if(is_array($tree) && count($tree)>0){
            if(isset($tree['title'])){
                if(in_array($tree['id'],$this->path) || $tree['url']==$this->current){
                    $tree['class'].=' opened active';
                }
    

                if(isset($tree['sub'])){
                    $tree_html.="<li class=\"{$tree['class']}\"><a href=\"{$tree['url']}\"><i class=\"{$tree['icon']}\"></i><span class=\"title\">{$tree['title']}</span></a>";
                    $tree_html.=$this->get_menu($role,$tree['sub']);
                    $tree_html.="</li>\n";      
                }else{
                    $tree_html.="<li class=\"{$tree['class']}\"><a href=\"{$tree['url']}\"><i class=\"{$tree['icon']}\"></i><span class=\"title\">{$tree['title']}</span></a></li>\n";
                }
            }else{
                if(!$first) $tree_html.="<ul>\n";
                foreach ($tree as  $node) {
                    if(!empty($node)){
                        $tree_html.=$this->get_menu($role,$node);
                    }
                }
                if(!$first) $tree_html.="</ul>\n";          
            }		
    	}
    	 
    	return $tree_html;
    }

}