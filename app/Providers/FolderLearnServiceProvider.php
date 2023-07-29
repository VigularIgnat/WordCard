<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Folder;
class FolderLearnServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    private $folder_id;
    private $folder;
    private $user_id;
    public function __construct($folder_id,$user_id){
        $this->folder_id = $folder_id;
    //dd($folder_id);
        $this->user_id=$user_id;
        $this->folder=Folder::find($this->folder_id);
    }

    public function getAccess(){
        $access=false;
        //dd($this->folder);
        $owner=$this->folder->user_id==$this->user_id;
        if($owner){
            $access=true;
        }
        else if($this->folder->status==1){
            $access=true;
        }
        return ['owner'=>$owner,'access'=>$access];
    }

    public function getFolder(){
        return $this->folder;
    }

    public function getCardsNum(){
        $cards_num=$this->folder->cards()->where('folder_id', $this->folder->id)->count();
        return $cards_num;
    }

    public function getCard($card_num, $num_cards){
        $card=$this->folder->cards()->where('folder_id', $this->folder->id)->get();
        
        $cards['main']=$card;
        $cards_values=getCardOptions($card_id);
      //  array_push($cards_values,)
        $cards['values']=getCardOptions($card_id);

    }
    public function getCardOptions($card_num){
       // $cards_num=$this->folder->cards()->select('translation')->where('folder_id', $this->folder->id)->where('id', '!=', $card_id)->get();

        return $cards_num;
    }
   
}
