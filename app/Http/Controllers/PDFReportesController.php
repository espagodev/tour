<?php

namespace App\Http\Controllers;

use App\Models\AjustesBasicos;
use App\Models\AjustesEmpresa;
use App\Models\Factura;
use App\Utils\ReportesUtils;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
class PDFReportesController extends Controller
{
    public function ventas(Request $request)
    {
        $empresa = AjustesEmpresa::first();
        $ajustes = AjustesBasicos::first();
        $logo = $ajustes->logo_base;

            $user =  auth()->user()->id;


            // Fetch facturas with Invoices
            $start_date = Carbon::createFromFormat('Y-m-d', isset($request->start_date) ? $request->start_date : Carbon::now()->format('Y-m-d'));
            $end_date = Carbon::createFromFormat('Y-m-d', isset($request->end_date) ? $request->end_date : Carbon::now()->addMonth()->format('Y-m-d'));
       
            $facturas = ReportesUtils::facturas($start_date, $end_date);
        // dd($facturas);
            // Total Amount
            $totalAmount = 0;
            foreach ($facturas as $factura) {
                $totalFacturas = 0;
                // foreach ($customer->invoices as $invoice) {
                //     $totalFacturas += $invoice->total;
                // }
                // $customer->totalAmount = $totalFacturas;
                // $totalAmount += $customerTotalAmount;
            }

            $pdf = PDF::loadView('pdf.reportes.venta', [
   
                'from' => $start_date,
                'to' => $end_date,
                'facturas' => $facturas,
                'totalAmount' => $totalAmount,
                'logo' => $logo
            ]);

            //Render or Download
            if ($request->has('download')) {
                return $pdf->download('REPORTES_VENTAS.pdf');
            } else if ($request->has('csv')) {
                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=REPORTES_VENTAS.csv",
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );
                $columns = array('Invoice', 'Due Date', 'Total');
                $callback = function () use ($facturas, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);

                    foreach ($facturas as $customer) {
                        foreach ($customer->invoices as $invoice) {
                            $row['Invoice'] = $invoice->invoice_number;
                            $row['Due Date'] = $invoice->due_date;
                            $row['Total'] = $invoice->currency_code . ' ' . number_format($invoice->total / 100, 2);

                            fputcsv($file, array( $row['Invoice'], $row['Due Date'], $row['Total']));
                        }
                    }

                    fclose($file);
                };

                return response()->stream($callback, 200, $headers);
            } else {
                return $pdf->stream('REPORTES_VENTAS.pdf');
            }
        }


        public function movimientos(Request $request)
        {
            $empresa = AjustesEmpresa::first();
            $ajustes = AjustesBasicos::first();
            $logo = $ajustes->logo_base;
    
                $user =  auth()->user()->id;
    
    
                // Fetch facturas with Invoices
                $start_date = Carbon::createFromFormat('Y-m-d', isset($request->start_date) ? $request->start_date : Carbon::now()->format('Y-m-d'));
                $end_date = Carbon::createFromFormat('Y-m-d', isset($request->end_date) ? $request->end_date : Carbon::now()->addMonth()->format('Y-m-d'));
           
                $movimientos = ReportesUtils::movimientos($start_date, $end_date);
            // dd($facturas);
                // Total Amount
                $totalAmount = 0;
                foreach ($movimientos as $movimiento) {
                    $totalFacturas = 0;
                    // foreach ($customer->invoices as $invoice) {
                    //     $totalFacturas += $invoice->total;
                    // }
                    // $customer->totalAmount = $totalFacturas;
                    // $totalAmount += $customerTotalAmount;
                }
    
                $pdf = PDF::loadView('pdf.reportes.movimientos', [
       
                    'from' => $start_date,
                    'to' => $end_date,
                    'movimientos' => $movimientos,
                    'totalAmount' => $totalAmount,
                    'logo' => $logo
                ]);
    
                //Render or Download
                if ($request->has('download')) {
                    return $pdf->download('REPORTES_MOVIMIENTOS.pdf');
                } else if ($request->has('csv')) {
                    $headers = array(
                        "Content-type" => "text/csv",
                        "Content-Disposition" => "attachment; filename=REPORTES_MOVIMIENTOS.csv",
                        "Pragma" => "no-cache",
                        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                        "Expires" => "0"
                    );
                    $columns = array('Invoice', 'Due Date', 'Total');
                    $callback = function () use ($movimientos, $columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns);
    
                        foreach ($movimientos as $movimiento) {
                            foreach ($movimiento->invoices as $invoice) {
                                $row['Invoice'] = $invoice->invoice_number;
                                $row['Due Date'] = $invoice->due_date;
                                $row['Total'] = $invoice->currency_code . ' ' . number_format($invoice->total / 100, 2);
    
                                fputcsv($file, array( $row['Invoice'], $row['Due Date'], $row['Total']));
                            }
                        }
    
                        fclose($file);
                    };
    
                    return response()->stream($callback, 200, $headers);
                } else {
                    return $pdf->stream('REPORTES_MOVIMIENTOS.pdf');
                }
            }

}
