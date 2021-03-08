<?php

namespace App\Http\Livewire;

use App\Services\Consume\Oracle\ServiceCsharpConsume;
use Livewire\Component;

class StatusSicove extends Component
{
    public $online = false;
    public $REPUVE = false;
    public $SAF = false;
    public $ADIP = false;
    public $SEDEMA = false;
    public $SSC = false;
    public $RENAPO = false;

    public function status()
    {
        $servicioCS = new ServiceCsharpConsume();
        $seEstatus = $servicioCS->getStatus();

        if(!$seEstatus['consumeError']){
            $this->online = true;
            $estatus = $seEstatus['data'];
            $this->REPUVE = $estatus['statusREPUVE'] ?? false;
            $this->SAF = $estatus['statusSAF'] ?? false;
            $this->ADIP = $estatus['statusADIP'] ?? false;
            $this->SEDEMA = $estatus['statusSEDEMA'] ?? false;
            $this->SSC = $estatus['statusSSC'] ?? false;
            $this->RENAPO = $estatus['statusRENAPO'] ?? false;
        }
//        $this->ADIP = false;
//        $this->REPUVE = false;
    }

    public function render()
    {
        $this->status();
        return view('livewire.status-sicove');
    }
}
