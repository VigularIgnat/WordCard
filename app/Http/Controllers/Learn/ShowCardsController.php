<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LaunchShowCardsRequest;
use App\Providers\FolderLearnServiceProvider;
use App\Helpers\ExternalApiHelper;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Learn\Data\FolderDataController;
class ShowCardsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    private $folder_id;
    private $folder;
    private $folder_service;
    private $folder_ser;
   //private $parent;
    
    public function Index(Request $request)
    {
        if(isset($request->folder_id)){
            $this->folder_id=$request->folder_id;
            Cache::put('id', $this->folder_id); 
           


            $this->folder_service= new FolderLearnServiceProvider($this->folder_id, auth()->id());
            //app(ExternalApiHelper::class($folder_id));
            
           // dd($this->folder_service);
            //dd(parent::CheckAccess());
            if(!$this->folder_service->getAccess()){
                return to_route('dashboard');
            }
            
            
            $num_cards=$this->folder_service->getCardsNum();
            
            return view('app.learn.pages.index', compact('num_cards'));
        }
    }
    public function Launch(LaunchShowCardsRequest $request){
        $request->validated();


        Cache::put('type', $request->type);

        $this->folder_id=Cache::get('id', $this->folder_id);
        $this->folder_service= new FolderLearnServiceProvider($this->folder_id, auth()->id());
        
        $this->permissions=$this->folder_service->getAccess();
        $this->cards_amount=$this->folder_service->getCardsNum();
        if($this->permissions['access']){
            
            return $this->handle($request->type,$permissions=$this->permissions, $this->cards_amount);
        }
        
    }
   private function handle(int $type, array $permissions, int $cards_amount){
        $num_cards=$this->cards_amount;
        if($type==1){
            $card=true;
            Cache::put('cur_card', 1);
            //$this->render();
            return view('app.learn.pages.learn', compact('card'));
        }
        else{
            
        }
   }
   private function render(){
        
   }

    public function Close(){
        
    }
}
