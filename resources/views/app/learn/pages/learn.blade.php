@extends('layouts.mainlearn')

@section('learn_section')
    @isset($card)
    <div class="container w-100">
        <div class="main ml-4">
            Suburn
        </div>
        <div class="image">
            <div class=" flex justify-end">
                <img src="{{Storage::url($card->image)}}" class="w-20 h-18 rounded">
            </div>
        </div>
        <div class="container absolute top-2/4 flex flex-row flex-wrap flex-4 justify-start  space-y-4 space-x-5 items-center  overflow-x-hidden ">
            <div class="w-1/3 ml-5 p-10 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            main
            </div>
            <div class="w-1/3 p-10  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                main2
    
            </div>
            <div class="w-1/3 p-10 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                main
                </div>
                <div class="w-1/3 p-10  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    main2
        
                </div>
        </div>
    </div>
   
    
    @endisset
    
@endsection