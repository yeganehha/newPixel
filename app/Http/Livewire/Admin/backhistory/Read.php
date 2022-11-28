<?php

namespace App\Http\Livewire\Admin\backhistory;

use App\Models\backHistory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    protected $listeners = ['backhistoryDeleted'];

    public $sortType;
    public $sortColumn;

    public function backhistoryDeleted(){
        // Nothing ..
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';

        $this->sortColumn = $column;
        $this->sortType = $sort;
    }

    public function render()
    {
        $data = BackHistory::query();

        $instance = getCrudConfig('backhistory');
        if($instance->searchable()){
            $array = (array) $instance->searchable();
            $data->where(function (Builder $query) use ($array){
                foreach ($array as $item) {
                    if(!\Str::contains($item, '.')) {
                        $query->orWhere($item, 'like', '%' . $this->search . '%');
                    } else {
                        $array = explode('.', $item);
                        $query->orWhereHas($array[0], function (Builder $query) use ($array) {
                            $query->where($array[1], 'like', '%' . $this->search . '%');
                        });
                    }
                }
            });
        }

        if($this->sortColumn) {
            $data->orderBy($this->sortColumn, $this->sortType);
        }
        $data->orderBy('status')->orderby('updated_at');

        $data = $data->paginate(config('easy_panel.pagination_count', 15));

        return view('livewire.admin.backhistory.read', [
            'backhistorys' => $data
        ])->layout('admin::layouts.app', ['title' => __(\Str::plural('BackHistory')) ]);
    }
}
