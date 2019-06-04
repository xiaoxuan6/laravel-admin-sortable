这个扩展包用来 sortable

## Screenshot

![screenshot](https://github.com/xiaoxuan6/laravel-admin-sortable/blob/master/20190225154750.png)

Installation
First, install dependencies:

    composer require james.xue/laravel-admin-sortable
    
Second, Modified model

    use James\Sortable\SortableTrait;
    use James\Sortable\Sortable;
    
    class Test extends Model implements Sortable
    {
        use SortableTrait;
    
        public $sortable = [
            'sort_field' => 'status',       // 排序字段
            'sort_when_creating' => true,   // 新增是否自增，默认自增
        ];
    
    }

Configuration
 In the extensions section of the config/admin.php file, add some configuration that belongs to this extension.
 
     'extensions' => [
         'sortableColumn' => [
             // set to false if you want to disable this extension
             'enable' => true,
         ]
     ]
    
User

       $grid = new Grid(new Test);
       $grid->model()->orderBy('status', 'asc');            // 这个很重要，否则页面显示顺序不正确
    
       $grid->status('状态')->sortableColumn('\App\Test');  // sortableColumn 里面必须填入当前模型的 namespace ,
       OR
       $grid->status('状态')->sortableColumn(Test::class);

