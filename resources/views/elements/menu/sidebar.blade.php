
<?php
    $menuCategories = isset($data['menu_main_categories']) ? $data['menu_main_categories'] : [];
    $menu = isset($data['menu_main']) ? $data['menu_main'] : [];
    $menuSub = isset($data['menu_sub']) ? $data['menu_sub'] : [];


    $menuCatIds = isset($data['menu_main_cat_ids']) ? $data['menu_main_cat_ids'] : [];
    $menuIds =  isset($data['manu_sub_main_ids']) ? $data['manu_sub_main_ids'] : [];
?>

@if(isset($menuCategories))
    <div id = "sidebar-menu" class = "main_menu_side hidden-print main_menu">
        @foreach($menuCategories as $key => $val)
        <div class = "menu_section">
            <h3>{{ $val['name'] }}</h3>

            <ul class = "nav side-menu">
                @foreach($menu as $key2 => $val2)
                    @if($val2['main_cat_id'] == $val['id'])
                        <li>
                            <a>
                                <i class = "fa fa-home"></i> {{ $val2['name'] }} 
                                <span class = "fa fa-chevron-down"></span>
                            </a>
                            @if(in_array($val2['id'], $menuIds)) 
                                <ul class="nav child_menu">
                                    @foreach($menuSub as $key => $val3)
                                        <li><a href="#">{{ $val3['name'] }}</a></li>
                                    @endforeach
                                </ul>            
                            @else
                            @endif
                          
                        </li>
                    @endif

                  
                  
                @endforeach
            </ul>
        
        </div>
        @endforeach
    </div>
@endif
