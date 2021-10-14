<?php

namespace App\Http\Livewire;
use App\Categoria;
use App\SubCategoria;
use Livewire\Component;

class CategoriaSubCategoria extends Component
{

    public $categorias = null;
    public $subcatgorias = null;
    #public $cities;

    public $selectedCategoria = null;
    public $selectedSubCategoria = null;

    // public function mount($selectedSubCategoria = null)
    // {
    //     $this->categorias = Categoria::all();
    //     $this->categorias = collect();
    //     $this->subcatgorias = collect();
    //     $this->selectedSubCategoria = $selectedSubCategoria;

    //     if (!is_null($selectedSubCategoria)) {
    //         $subcatgorias = SubCategoria::with('sub_categorias.categorias')->find($selectedSubCategoria);
    //         if ($subcatgorias) {
    //             $this->subcatgorias = SubCategoria::where('categoria_id', $subcatgorias->categoria_id)->get();
    //             #$this->states = State::where('country_id', $city->state->country_id)->get();
    //             #$this->selectedCountry = $city->state->country_id;
    //             $this->selectedSubCaegoria = $subcatgorias->categoria_id;
    //         }
    //     }
    // }
    
    public function render()
    {
        return view('livewire.categoria-sub-categoria',[
            'categorias' => Categoria::all()
        ]);
        #$categorias = Categoria::all();

        #return view('productos.productos_create', compact('categorias'));
        // return view('productos.productos_create',[
        //     'categorias' => Categoria::all()
        // ]);
    }

    public function updatedSelectedCategoria($categoria_id)
    {
        $this->subcatgorias = SubCategoria::where('categoria_id', $categoria_id)->get();
        #$this->selectedState = NULL;
    }
}
