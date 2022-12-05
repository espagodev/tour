<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AgenteController;
use App\Http\Controllers\AjustesBasicosController;
use App\Http\Controllers\AjustesContablesController;
use App\Http\Controllers\AjustesDocumentosController;
use App\Http\Controllers\AjustesEmpresaController;
use App\Http\Controllers\BilletesPlazoController;
use App\Http\Controllers\BilletesPlazosController;
use App\Http\Controllers\CarpetaController;
use App\Http\Controllers\ContabilidadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentosContableController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\FirmaController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\ImpuestoController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\ItinerariosController;
use App\Http\Controllers\MovimientoAlertaController;
use App\Http\Controllers\MovimientoContableController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\MovimientoObservacionesController;
use App\Http\Controllers\PasajeroController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ReciboCajaController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UsersController;
use App\Models\AjustesBasicos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes(['register' => false, 'reset' => false ]);


Route::middleware(['SetSessionData','auth'])->group(function () {

//dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

//settings
Route::get('setting', [SettingController::class, 'index'])->name('setting');


//ajustesBasicos

Route::get('logos', [AjustesBasicosController::class, 'logos'])->name('logos');
Route::put('logos/update/{ajuste}', [AjustesBasicosController::class, 'update'])->name('updateAjustes');

//DOCUMENTOS CONTABLES
Route::get('getDocumentos', [DocumentosContableController::class, 'index'])->name('getDocumentos');
Route::get('/documentos/getListadoDocumentos', [DocumentosContableController::class, 'getListadoDocumentos'])->name('getListadoDocumentos');
Route::get('documentos/getNuevoDocumento', [DocumentosContableController::class, 'getNuevoDocumento'])->name('getNuevoDocumento'); 
Route::post('documentos', [DocumentosContableController::class, 'store'])->name('storeDocumento'); 
Route::get('documentos/showDocumentos/{documento}', [DocumentosContableController::class, 'show'])->name('showDocumentos');
Route::get('documentos/editDocumentos/{documento}', [DocumentosContableController::class, 'edit'])->name('editDocumentos');
Route::put('documentos/updateDocumentos/{documento}', [DocumentosContableController::class, 'update'])->name('updateDocumentos');

//IMPUESTOS
Route::get('getImpuestos', [ImpuestoController::class, 'index'])->name('getImpuestos');
Route::get('/impuestos/getListadoImpuestos', [ImpuestoController::class, 'getListadoImpuestos'])->name('getListadoImpuestos');
Route::get('impuestos/getNuevoImpuesto', [ImpuestoController::class, 'getNuevoImpuesto'])->name('getNuevoImpuesto'); 
Route::post('impuestos', [ImpuestoController::class, 'store'])->name('storeImpuesto'); 
Route::get('impuestos/showImpuesto/{impuesto}', [ImpuestoController::class, 'show'])->name('showImpuesto');
Route::get('impuestos/editImpuesto/{impuesto}', [ImpuestoController::class, 'edit'])->name('editImpuesto');
Route::put('impuestos/updateImpuesto/{impuesto}', [ImpuestoController::class, 'update'])->name('updateImpuesto');

//MEDIOS DE PAGO
Route::get('getListaPagos', [FormaPagoController::class, 'index'])->name('getListaPagos');
Route::get('/formaPago/getListadoFormaPagos', [FormaPagoController::class, 'getListadoFormaPagos'])->name('getListadoFormaPagos');
Route::get('formaPago/getNuevoFormaPago', [FormaPagoController::class, 'getNuevoFormaPago'])->name('getNuevoFormaPago'); 
Route::post('formaPago', [FormaPagoController::class, 'store'])->name('storeFormaPago'); 
Route::get('formaPago/showFormaPago/{FormaPago}', [FormaPagoController::class, 'show'])->name('showFormaPago');

Route::get('formaPago/editFormaPago/{formaPago}', [FormaPagoController::class, 'edit'])->name('editFormaPago');
Route::put('formaPago/updateFormaPago/{formaPago}', [FormaPagoController::class, 'update'])->name('updateFormaPago');

//USUARIOS
Route::get('getListaUsuarios', [UsersController::class, 'index'])->name('getListaUsuarios');
Route::get('usuarios/getNuevoUsuario', [UsersController::class, 'getNuevoUsuario'])->name('getNuevoUsuario');
Route::get('/usuarios/getUsuario', [UsersController::class, 'getUsuario'])->name('getUsuario'); 
Route::get('/usuarios/getListadoUsuarios', [UsersController::class, 'getListadoUsuarios'])->name('getListadoUsuarios');

Route::post('usuarios', [UsersController::class, 'store'])->name('storeUsuario'); 

Route::get('usuarios/edit/{usuario}', [UsersController::class, 'edit'])->name('editUsuario');
Route::put('usuarios/updateUsuario/{usuario}', [UsersController::class, 'update'])->name('updateUsuario');


//USUARIOS AGENTE
Route::get('usuario/agente/{usuario}', [UsersController::class, 'getNuevoUsuarioAgente'])->name('getNuevoUsuarioAgente');
Route::post('usuario/agente', [UsersController::class, 'postNuevoUsuarioAgente'])->name('postNuevoUsuarioAgente'); 


//SUBCATEGORIAS

Route::get('/categorias/getCategorias',[SubCategoriaController::class,'getSubcategorias'])->name('getSubcategorias');

//AGENTES
Route::get('getListaAgentes', [AgenteController::class, 'index'])->name('getListaAgentes');
Route::get('agentes/getNuevoAgente', [AgenteController::class, 'getNuevoAgente'])->name('getNuevoAgente');
Route::get('/agentes/getListadoAgentes', [AgenteController::class, 'getListadoAgentes'])->name('getListadoAgentes');
Route::get('agentes/editAgente/{agente}', [AgenteController::class, 'edit'])->name('editAgente');


Route::post('agentes', [AgenteController::class, 'store'])->name('storeAgente'); 
Route::put('agentes/updateAgente/{agente}', [AgenteController::class, 'update'])->name('updateAgente');

//AGENDA
Route::get('getListaAgenda', [AgendaController::class, 'index'])->name('getListaAgenda');
Route::get('agenda/getNuevoCliente', [AgendaController::class, 'getNuevoCliente'])->name('getNuevoCliente');
Route::get('/agenda/getAgenda', [AgendaController::class, 'getAgenda'])->name('getAgenda'); 
Route::get('/agenda/getListadoClientes', [AgendaController::class, 'getListadoClientes'])->name('getListadoClientes');

Route::get('agenda/showAgenda/{agenda}', [AgendaController::class, 'show'])->name('showAgenda');


Route::get('agenda/editAgenda/{agenda}', [AgendaController::class, 'edit'])->name('editAgenda');
Route::put('agenda/updateAgenda/{agenda}', [AgendaController::class, 'update'])->name('updateAgenda');

Route::post('agenda', [AgendaController::class, 'store'])->name('storeAgenda'); 

//CONTABILIDAD

Route::get('getListaContabilidad',[ContabilidadController::class,'index'])->name('getListaContabilidad');
Route::get('contabilidad/getNuevoMovimiento', [ContabilidadController::class, 'getNuevoMovimiento'])->name('getNuevoMovimiento'); 
Route::get('/contabilidad/getListadoContable', [ContabilidadController::class, 'getListadoContable'])->name('getListadoContable');


//PROVEEDORES
Route::get('getListaProveedor', [ProveedoresController::class, 'index'])->name('getListaProveedor');
Route::get('proveedor/getNuevoProveedor', [ProveedoresController::class, 'getNuevoProveedor'])->name('getNuevoProveedor');
Route::get('/proveedor/getListadoProveedor', [ProveedoresController::class, 'getListadoProveedor'])->name('getListadoProveedor');
Route::post('proveedor', [ProveedoresController::class, 'storeProveedor'])->name('storeProveedor'); 
Route::get('proveedor/editProveedor/{proveedor}', [ProveedoresController::class, 'edit'])->name('editProveedor');
Route::put('proveedor/updateProveedor/{proveedor}', [ProveedoresController::class, 'update'])->name('updateProveedor');

//BILLETE A PLAZOS
Route::get('getListaPlazos', [BilletesPlazoController::class, 'index'])->name('getListaPlazos');
Route::get('billetes_plazo/getNuevoBilletePlazo', [BilletesPlazoController::class, 'getNuevoBilletePlazo'])->name('getNuevoBilletePlazo'); 
Route::post('billetes_plazo', [BilletesPlazoController::class, 'storeBilletePlazos'])->name('storeBilletePlazos'); 

Route::get('billetes_plazo/editBilletePlazos/{factura}', [BilletesPlazoController::class, 'editBilletePlazos'])->name('editBilletePlazos');
Route::put('billetes_plazo/updateBilletePlazos/{factura}', [BilletesPlazoController::class, 'updateBilletePlazos'])->name('updateBilletePlazos');

Route::get('/billetes_plazo/getListadoBilletePlazos', [BilletesPlazoController::class, 'getListadoBilletePlazos'])->name('getListadoBilletePlazos');
Route::get('/billetes_plazo/getBilletePlazosSaldos', [BilletesPlazoController::class, 'getBilletePlazosSaldos'])->name('getBilletePlazosSaldos');
// Route::get('billetes_plazo/getNuevoBilletePlazo/{factura}', [BilletesPlazoController::class, 'getNuevoBilletePlazo'])->name('getNuevoBilletePlazo'); 
// Route::get('billetes_plazo/imprimirExpediente/{factura}', [BilletesPlazoController::class, 'imprimirExpediente'])->name('imprimirExpediente');
Route::get('billetes_plazo/showBilletePlazo/{factura}', [BilletesPlazoController::class, 'showBilletePlazo'])->name('showBilletePlazo');
Route::get('billetes_plazo/viewBilletePlazo/{factura}', [BilletesPlazoController::class, 'viewBilletePlazo'])->name('viewBilletePlazo');

Route::get('billetes_plazo/getExpedienteBilletePlazo/{factura}', [BilletesPlazoController::class, 'getExpedienteBilletePlazo'])->name('expedienteBilletePlazo');

//FACTURAS
Route::get('getListaFacturas', [FacturaController::class, 'index'])->name('getListaFacturas');
Route::get('facturas', [FacturaController::class, 'nuevaFactura'])->name('nuevaFactura');
Route::post('storeFactura', [FacturaController::class, 'storeFactura'])->name('storeFactura'); 
Route::get('/facturas/getListadoFacturas', [FacturaController::class, 'getListadoFacturas'])->name('getListadoFacturas');
Route::get('facturas/showFactura/{factura}', [FacturaController::class, 'showFactura'])->name('showFactura');
Route::get('facturas/editFactura/{factura}', [FacturaController::class, 'editFactura'])->name('editFactura');
Route::put('facturas/updateFactura/{factura}', [FacturaController::class, 'updateFactura'])->name('updateFactura');
Route::get('facturas/expedienteFactura/{factura}', [FacturaController::class, 'expedienteFactura'])->name('expedienteFactura');
Route::get('facturas/viewFactura/{factura}', [FacturaController::class, 'viewFactura'])->name('viewFactura');


Route::get('facturas/imprimirFactura/{factura}', [FacturaController::class, 'imprimirFactura'])->name('imprimirFactura');
Route::get('facturas/imprimirInfoImportante/{factura}', [FacturaController::class, 'imprimirInfoImportante'])->name('imprimirInfoImportante');

Route::get('facturas/getPasajero', [FacturaController::class, 'getPasajero'])->name('getPasajero');
Route::get('facturas/getConcepto', [FacturaController::class, 'getConcepto'])->name('getConcepto');
Route::get('/facturas/get_pasajero_value_row', [FacturaController::class, 'getPasajeroValueRow'])->name('getPasajeroValueRow');
Route::get('/facturas/get_concepto_value_row', [FacturaController::class, 'getConceptoValueRow'])->name('getConceptoValueRow');


//RECIBO DE CAJA
Route::get('getListaReciboCaja', [ReciboCajaController::class, 'index'])->name('getListaReciboCaja');
Route::get('recibo_caja/getNuevoReciboCaja', [ReciboCajaController::class, 'getNuevoReciboCaja'])->name('getNuevoReciboCaja'); 
Route::post('recibo_caja', [ReciboCajaController::class, 'storeReciboCaja'])->name('storeReciboCaja'); 

Route::get('recibo_caja/editReciboCaja/{factura}', [ReciboCajaController::class, 'editReciboCaja'])->name('editReciboCaja');
Route::put('recibo_caja/updateReciboCaja/{factura}', [ReciboCajaController::class, 'updateReciboCaja'])->name('updateReciboCaja');

Route::get('/recibo_caja/getListadoReciboCaja', [ReciboCajaController::class, 'getListadoReciboCaja'])->name('getListadoReciboCaja');
Route::get('recibo_caja/imprimirExpediente/{factura}', [ReciboCajaController::class, 'imprimirExpediente'])->name('imprimirExpediente');

Route::get('recibo_caja/showReciboCaja/{factura}', [ReciboCajaController::class, 'showReciboCaja'])->name('showReciboCaja');
Route::get('recibo_caja/viewReciboCaja/{factura}', [ReciboCajaController::class, 'viewReciboCaja'])->name('viewReciboCaja');

Route::get('recibo_caja/getExpedienteReciboCaja/{factura}', [ReciboCajaController::class, 'getExpedienteReciboCaja'])->name('expedienteReciboCaja');


//ITINERARIOS
Route::get('getListaItinerarios', [ItinerariosController::class, 'index'])->name('getListaItinerarios');
Route::get('itinerarios/getNuevoItinerario', [ItinerariosController::class, 'getNuevoItinerario'])->name('getNuevoItinerario'); 
Route::get('/itinerarios/getListadoItinerarios', [ItinerariosController::class, 'getListadoItinerarios'])->name('getListadoItinerarios');

//SERVICIOS
Route::get('getListaServicios', [ServiciosController::class, 'index'])->name('getListaServicios');
Route::get('servicios/getNuevoServicio', [ServiciosController::class, 'getNuevoServicio'])->name('getNuevoServicio'); 
Route::get('/servicios/getListadoServicio', [ServiciosController::class, 'getListadoServicio'])->name('getListadoServicio');
Route::post('servicios', [ServiciosController::class, 'store'])->name('storeServicio'); 

Route::get('servicios/editServicio/{servicio}', [ServiciosController::class, 'edit'])->name('editServicio');
Route::put('servicios/updateServicio/{servicio}', [ServiciosController::class, 'update'])->name('updateServicio');

//PASAJERO
Route::post('pasajero', [PasajeroController::class, 'store'])->name('pasajero.store'); 

//AJUSTES DOCUMENTOS
Route::post('ajustesDocumento', [AjustesDocumentosController::class, 'store'])->name('ajustesDocumento.store'); 
Route::put('ajustesDocumento/{ajuste_id}', [AjustesDocumentosController::class, 'update'])->name('ajustesDocumento.update'); 


//ajustes empresa
Route::get('empresa', [AjustesEmpresaController::class, 'index'])->name('empresa');
Route::post('empresa', [AjustesEmpresaController::class, 'store'])->name('empresa.store'); 
Route::put('empresa/{empresa_id}', [AjustesEmpresaController::class, 'update'])->name('empresa.update'); 
Route::put('updateAjustes/{empresa_id}', [AjustesEmpresaController::class, 'updateAjustes'])->name('empresa.updateAjustes'); 

//opciones administrativas
//carpetas
Route::get('carpeta', [CarpetaController::class, 'index'])->name('carpeta');



//ABONO

Route::get('getAbonoCliente/{factura}', [MovimientoContableController::class, 'getAbonoCliente'])->name('getAbonoCliente');
Route::get('getAbonoReciboCaja/{factura}', [MovimientoContableController::class, 'getAbonoReciboCaja'])->name('getAbonoReciboCaja');
Route::get('getAbonoFactura/{factura}', [MovimientoContableController::class, 'getAbonoFactura'])->name('getAbonoFactura');


Route::get('getAbonoMayorista/{factura}/{billetePlazo}', [MovimientoContableController::class, 'getAbonoMayorista'])->name('getAbonoMayorista');


Route::post('storeAbonoCliente', [MovimientoContableController::class, 'storeAbonoCliente'])->name('storeAbonoCliente');

Route::get('editAbonoCliente/{abono}', [MovimientoContableController::class, 'editAbonoCliente'])->name('editAbonoCliente');
Route::post('update', [MovimientoContableController::class, 'update'])->name('updateAbonoCliente');


Route::post('storeAbonoReciboCaja', [MovimientoContableController::class, 'storeAbonoReciboCaja'])->name('storeAbonoReciboCaja');
Route::post('storeAbonoFactura', [MovimientoContableController::class, 'storeAbonoFactura'])->name('storeAbonoFactura'); 


Route::post('storeAbonoMayorista', [MovimientoContableController::class, 'storeAbonoMayorista'])->name('storeAbonoMayorista'); 

Route::get('destroyAbonoCliente/{id}/{factura}', [MovimientoContableController::class, 'destroy'])->name('destroyAbonoCliente');

Route::get('getMovimientoAlerta/{factura}', [MovimientoAlertaController::class, 'getMovimientoAlerta'])->name('getMovimientoAlerta');
Route::post('storeMovimientoAlerta', [MovimientoAlertaController::class, 'storeMovimientoAlerta'])->name('storeMovimientoAlerta'); 
Route::get('MovimientoAlerta/{id}/{factura}', [MovimientoAlertaController::class, 'destroy'])->name('MovimientoAlerta.destroy');

Route::get('getMovimientoObservacion/{factura}', [MovimientoObservacionesController::class, 'getMovimientoObservacion'])->name('getMovimientoObservacion');
Route::post('storeMovimientoObservacion', [MovimientoObservacionesController::class, 'storeMovimientoObservacion'])->name('storeMovimientoObservacion'); 
Route::get('MovimientoObservacion/{id}/{factura}', [MovimientoObservacionesController::class, 'destroy'])->name('MovimientoObservacion.destroy');

//GASTOS
Route::get('getListaGastos', [GastosController::class, 'index'])->name('getListaGastos');
Route::get('gastos/getNuevoGasto', [GastosController::class, 'getNuevoGasto'])->name('getNuevoGasto'); 
Route::post('gastos', [GastosController::class, 'storeGasto'])->name('storeGasto'); 
Route::get('/gastos/getListadoGastos', [GastosController::class, 'getListadoGastos'])->name('getListadoGastos');
Route::get('gastos/editGasto/{gasto}', [GastosController::class, 'editGasto'])->name('editGasto');
Route::put('gastos/updateGasto/{gasto}', [GastosController::class, 'updateGasto'])->name('updateGasto');

//INGRESOS
Route::get('getListaIngresos', [IngresosController::class, 'index'])->name('getListaIngresos');
Route::get('ingresos/getNuevoIngreso', [IngresosController::class, 'getNuevoIngreso'])->name('getNuevoIngreso'); 
Route::post('ingresos', [IngresosController::class, 'storeIngreso'])->name('storeIngreso'); 
Route::get('/ingresos/getListadoIngresos', [IngresosController::class, 'getListadoIngresos'])->name('getListadoIngresos');
Route::get('ingresos/editIngreso/{ingreso}', [IngresosController::class, 'editIngreso'])->name('editIngreso');
Route::put('ingresos/updateIngreso/{ingreso}', [IngresosController::class, 'updateIngreso'])->name('updateIngreso');
Route::get('ingresos/showIngreso/{ingreso}', [IngresosController::class, 'showIngreso'])->name('showIngreso');

//AJUSTES
Route::get('getListaAjustes', [AjustesContablesController::class, 'index'])->name('getListaAjustes');
Route::get('ajusteContable/getNuevoAjuste', [AjustesContablesController::class, 'getNuevoAjuste'])->name('getNuevoAjuste'); 
Route::post('ajusteContable', [AjustesContablesController::class, 'storeAjuste'])->name('storeAjuste'); 
Route::get('/ajusteContable/getListadoAjustes', [AjustesContablesController::class, 'getListadoAjustes'])->name('getListadoAjustes');
Route::get('ajusteContable/editAjuste/{ajuste}', [AjustesContablesController::class, 'editAjuste'])->name('editAjuste');
Route::put('ajusteContable/updateAjuste/{ajuste}', [AjustesContablesController::class, 'updateAjuste'])->name('updateAjuste');
Route::get('ajusteContable/showAjuste/{ajuste}', [AjustesContablesController::class, 'showAjuste'])->name('showAjuste');


//PDF views

Route::get('/viewer/factura/{factura}/pdf', [PDFController::class,'factura'])->name('pdf.factura');
Route::get('/viewer/billetePlazos/{factura}/pdf', [PDFController::class,'billetePlazos'])->name('pdf.billete_plazos');
Route::get('/viewer/reciboCaja/{factura}/pdf', [PDFController::class,'reciboCaja'])->name('pdf.recibo_caja');

// Route::get('/viewer/estimate/{estimate}/pdf', [PDFController::class,'factura'])->name('pdf.estimate');
// Route::get('/viewer/payment/{payment}/pdf', [PDFController::class,'factura'])->name('pdf.payment');


//IMPRIMIR
Route::get('ticket/getVerAbono/{abono}', [TicketController::class, 'getVerAbono'])->name('getVerAbono');

//FIRMA
Route::get('facturas/{factura}', [FirmaController::class, 'getFirmaFactura'])->name('getFirmaFactura');
Route::get('plazo/{factura}', [FirmaController::class, 'getFirmaPlazo'])->name('getFirmaPlazo');
Route::get('recibo/{factura}', [FirmaController::class, 'getFirmaRecibo'])->name('getFirmaRecibo');

Route::get('agentes/{agente}', [FirmaController::class, 'firmaAgente'])->name('firmaAgente');

Route::post('storeFirma', [FirmaController::class, 'storeFirma'])->name('storeFirma');
Route::post('storeFirmaAgente', [FirmaController::class, 'storeFirmaAgente'])->name('storeFirmaAgente');

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
