<?php 
	
	$goods_categorys = [
                ["name"=>"电脑", "children"=>[
                                        ["name"=>"平板电脑"],
                                        ["name"=>"台式电脑","children"=>[
                                                                    ["name"=>"游戏电脑"],
                                                                    ["name"=>"盲人电脑"]
                                                                ]]
                                      ]
                ],
                ["name"=>"家用电器","children"=>[
                                            ["name"=>"大家电","children"=>[
                                                                        ["name"=>"平板电视"],
                                                                        ["name"=>"空调"]
                                                                ]],
                                            ["name"=>"厨房电器","children"=>[
                                                                        ["name"=>"电压锅"],
                                                                        ["name"=>"微波炉"]
                                            ]],
                ]]
];


      function showCategory($categorys,$deep){
            foreach($categorys as $category){
                   echo str_repeat("-----",$deep).$category['name'].'<br>';
                   //判断该分类下是否有子分类,如果有子分类继续打印出子分类
                   if(isset($category['children'])){
                        //有子分类
                        showCategory($category['children'],$deep+1);//显示子分类
                   }
            }
      }


      showCategory($goods_categorys,0);


?>
