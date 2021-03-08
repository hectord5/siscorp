<?php

namespace App\Http\Controllers\Siscorp\Reimpresion;
use App\Services\Consume\SicoveApi\SicoveApiConsume;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReimpresionController extends Controller
{
    public function SeleccionAcuse(){
        return view('reimpresion.busca_acuse')->with('blade', 'acuse');
    }
    public function seleccionvalorada(){
        return view('reimpresion.busca_acuse')->with('blade', 'hoja_valorada');
    }

    public function ImprimeAcuse( Request $request, SicoveApiConsume $sicove)
    {
        try{
            $operation = 'Acuse';
            $param = array('linea_captura' =>$request->lc, 'tipoAcuse' => $request->tipo_mov, 'usuario_autorizado' => 's1c0v3s3m0v1');
            $infoLicCurp = $this->ServiceSoap('http://128.222.200.25:8089/ConsultaSICOVE.asmx?wsdl', $param, $operation);
            if ($infoLicCurp == false){
                $rute    = "acuse.pdf";
                $pdf_b64 = base64_decode($infoLicCurp['AcuseResult']);
                if(file_put_contents($rute, $pdf_b64)){
                    header("Content-type: application/pdf");
                    echo $pdf_b64;
                }
            }
            return view('reimpresion.busca_acuse')->with('blade', 'acuse')->withErrors(['Error inesperado al validar información']);

        }catch (\Exception $exception){
            Log::error('BUSCAR: '.$request->placa.' LINEA: '.$request->lineacaptura.' '.$exception->getMessage());
            return view('reimpresion.busca_acuse')->with('blade', 'acuse')->withErrors(['Error inesperado al validar información']);
        }
    }


    protected function ServiceSoap($url, $param,$operation)
    {
        try {
            $client = new \nusoap_client($url, 'wsdl');
            $result = $client->call($operation, $param);
            return $result;
        } catch (\Exception $exception) {
            return null;
        }
    }
}
