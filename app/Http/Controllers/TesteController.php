<?php

namespace App\Http\Controllers;

use App\Models\Empresa;

use Illuminate\Http\Request;

use PDF;

class TesteController extends Controller
{
    public function teste (){
        $data = Empresa::class->all();
        $pdf = Pdf::loadView('pdf', $data);
        return $pdf->download('invoice.pdf');
    }


    // Generate PDF
    public function createPDF() {
    // retreive all records from db
    $data = Empresa::all();
    //dd($data->toArray());
    // share data to view
    view()->share('empresa',$data);
    $pdf = PDF::loadView('empresas.index', $data->toArray());
    // download PDF file with download method
    return $pdf->download('empresa_pdf_file.pdf');
    }


    public function generatePDF()
    {
        $users = User::get();

        $data = [
            'title' => 'Bemvindo a PAslan Soluções em TI',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }

}
