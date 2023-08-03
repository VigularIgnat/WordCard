@extends('layouts.mainlearn')

@section('learn_section')
    @isset($cards)
    
    <div class="container w-100 p-4">
        <div class="main">
           {{ $cards["main"]->word}}
           <div class="image">
            <div class="mt-4">
                <img src="{{Storage::url($cards["main"]->image)}}" class="w-40 h-26 rounded">
            </div>
        </div>
        </div>
        
        <div class="container  top-2/4 flex flex-row flex-wrap flex-4 justify-start  space-y-4 space-x-5 items-center  overflow-x-hidden ">
            @foreach ($cards['values'] as $card)
            <div class=" w-1/3 ml-4 p-2 h-10 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
               
                {{$card['translation']}}
                
                
                </div> 
            @endforeach
            
           
        </div>
    </div>
   
    
    @endisset
    
@endsection