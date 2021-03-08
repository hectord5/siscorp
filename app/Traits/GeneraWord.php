<?php


namespace App\Traits;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord;
define('PHPWORD_BASE_DIR', realpath(__DIR__));

trait GeneraWord
{
    function hasSabana($datos){

        $template = new TemplateProcessor('docx/sabana/sabana.docx');//ruta donde esta a partir de public
        //variables que mandas al archivo
        $template->setValue('solonombre',$datos['nombre']);
        $template->setValue('soloapellido',$datos['apellido']);
        $filepath = $template->saveAs('docx/documentoGenerado/sabana_'.$datos['nombre'].'.docx');// ruta donde la guard
        $filepath = 'docx/documentoGenerado/sabana_'.$datos['nombre'].'.docx';
        $domPdfPath = str_replace('app/Traits','vendor/dompdf/dompdf',PHPWORD_BASE_DIR);
        Settings::setPdfRendererPath($domPdfPath);
        Settings::setPdfRendererName('DomPDF');
        //Load temp file
        $phpWord = IOFactory::load($filepath);

        //Save it
        $xmlWriter = IOFactory::createWriter($phpWord , 'PDF');
        $xmlWriter->save('PDF/'.$datos['nombre'].'.pdf',TRUE);
        dd('ya termino de nuevo',1);
    }

}

