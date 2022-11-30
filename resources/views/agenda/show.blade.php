@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Clientes</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item">Cliente</li>
                        <li class="breadcrumb-item active">Detalle Cliente / ({{ $agenda->agd_nombres ?? '' }} {{ $agenda->agd_apellidos ?? '' }})</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    @include('agenda.components.misc.opciones-buttons')
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="email-wrap bookmark-wrap">
        <div class="row">
        <div class="col-xl-3 box-col-4 xl-30">
            <div class="email-sidebar"><a class="btn btn-primary email-aside-toggle" href="javascript:void(0)">bookmark filter</a>
            <div class="email-left-aside">
                <div class="card">
                <div class="card-body">
                    <div class="email-app-sidebar left-bookmark">
                    <div class="media">
                        <div class="media-size-email"><img class="me-3 rounded-circle" src="../assets/images/user/user.png" alt=""></div>
                        <div class="media-body">
                        <h6 class="f-w-600">{{ $agenda->agd_nombres ?? '' }} {{ $agenda->agd_apellidos ?? '' }}</h6>
                        <p>{{ $agenda->agd_email ?? '@' }}</p>
                        </div>
                    </div>
                    <ul class="nav main-menu" role="tablist">
                        <li class="nav-item">
                        <button class="badge-light btn-block btn-mail" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="me-2" data-feather="plus-circle"></i>Nueva Factura</button>
                        <div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Facturas</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">                                                 </button>
                                </div>
                                <div class="modal-body">
                                <form class="form-bookmark needs-validation" id="bookmark-form" novalidate="">
                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="task-title">Task Title</label>
                                        <input class="form-control" id="task-title" type="text" required="" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="sub-task">Sub task</label>
                                        <input class="form-control" id="sub-task" type="text" required="" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="d-flex date-details">
                                        <div class="d-inline-block">
                                            <label class="d-block mb-0">
                                            <input class="checkbox_animated" type="checkbox">Remind on
                                            </label>
                                        </div>
                                        <div class="d-inline-block">
                                            <input class="datepicker-here form-control digits" type="text" data-language="en" placeholder="Date">
                                        </div>
                                        <div class="d-inline-block">
                                            <select class="form-control">
                                            <option>7:00 am</option>
                                            <option>7:30 am</option>
                                            <option>8:00 am</option>
                                            <option>8:30 am</option>
                                            <option>9:00 am</option>
                                            <option>9:30 am</option>
                                            <option>10:00 am</option>
                                            <option>10:30 am</option>
                                            <option>11:00 am</option>
                                            <option>11:30 am</option>
                                            <option>12:00 pm</option>
                                            <option>12:30 pm</option>
                                            <option>1:00 pm</option>
                                            <option>2:00 pm</option>
                                            <option>3:00 pm</option>
                                            <option>4:00 pm</option>
                                            <option>5:00 pm</option>
                                            <option>6:00 pm</option>
                                            </select>
                                        </div>
                                        <div class="d-inline-block">
                                            <label class="d-block mb-0">
                                            <input class="checkbox_animated" type="checkbox">Notification
                                            </label>
                                        </div>
                                        <div class="d-inline-block">
                                            <label class="d-block mb-0">
                                            <input class="checkbox_animated" type="checkbox">Mail
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                        <select class="js-example-basic-single">
                                            <option value="task">My Task</option>
                                        </select>
                                        </div>
                                        <div class="form-group col">
                                        <select class="js-example-disabled-results" id="bm-collection">
                                            <option value="general">General</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 my-0">
                                        <textarea class="form-control" required="" autocomplete="off">  </textarea>
                                    </div>
                                    </div>
                                    <input id="index_var" type="hidden" value="6">
                                    <button class="btn btn-secondary" id="Bookmark" onclick="submitBookMark()" type="submit">Save</button>
                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        </li>
                        <li class="nav-item"><span class="main-title"> Opciones</span></li>
                        <li><a id="pills-facturas-tab" data-bs-toggle="pill" href="#pills-facturas" role="tab" aria-controls="pills-facturas" aria-selected="true"><span class="title"> Facturas</span></a></li>
                        <li><a class="show" id="pills-assigned-tab" data-bs-toggle="pill" href="#pills-assigned" role="tab" aria-controls="pills-assigned" aria-selected="false"><span class="title">Pagos</span></a></li>
                        <li><a class="show" id="pills-todaytask-tab" data-bs-toggle="pill" href="#pills-todaytask" role="tab" aria-controls="pills-todaytask" aria-selected="false"><span class="title"> Abonos Mayoristas</span></a></li>
                        <li><a class="show" id="pills-delayed-tab" data-bs-toggle="pill" href="#pills-delayed" role="tab" aria-controls="pills-delayed" aria-selected="false"><span class="title"> Observaciones</span></a></li>
                        <li><a class="show" id="pills-upcoming-tab" data-bs-toggle="pill" href="#pills-upcoming" role="tab" aria-controls="pills-upcoming" aria-selected="false"><span class="title">Alertas</span></a></li>
                        <li><a class="show" id="pills-weekly-tab" data-bs-toggle="pill" href="#pills-weekly" role="tab" aria-controls="pills-weekly" aria-selected="false"><span class="title">Saldos</span></a></li>
                        <li><a class="show" id="pills-monthly-tab" data-bs-toggle="pill" href="#pills-monthly" role="tab" aria-controls="pills-monthly" aria-selected="false"><span class="title">Pasajeros</span></a></li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-8 xl-70">
            <div class="email-right-aside bookmark-tabcontent">
            <div class="card email-body radius-left">
                <div class="ps-0">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="pills-facturas" role="tabpanel" aria-labelledby="pills-facturas-tab">
                    <div class="card mb-0">
                        <div class="card-header">
                        <h5 class="mb-0">Facturas</h5>
                        </div>
                        <div class="card-body p-0">
                        <div class="taskadd">
                            <div class="table-responsive">
                            <table class="table">
                                <tr>
                                <td>
                                    <h6 class="task_title_0">{{ $factura->fac_numero }}</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="fade tab-pane" id="pills-todaytask" role="tabpanel" aria-labelledby="pills-todaytask-tab">
                    <div class="card mb-0">
                        <div class="card-header d-flex">
                        <h6 class="mb-0">Today's Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                        </div>
                        <div class="card-body">
                        <div class="details-bookmark text-center">
                            <div class="row" id="favouriteData"></div>
                            <div class="no-favourite"><span>No task due today.</span></div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="fade tab-pane" id="pills-delayed" role="tabpanel" aria-labelledby="pills-delayed-tab">
                    <div class="card mb-0">
                        <div class="card-header d-flex">
                        <h6 class="mb-0">Delayed Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                        </div>
                        <div class="card-body">
                        <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                        </div>
                    </div>
                    </div>
                    <div class="fade tab-pane" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab">
                    <div class="card mb-0">
                        <div class="card-header d-flex">
                        <h6 class="mb-0">Upcoming Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                        </div>
                        <div class="card-body">
                        <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                        </div>
                    </div>
                    </div>
                    <div class="fade tab-pane" id="pills-weekly" role="tabpanel" aria-labelledby="pills-weekly-tab">
                    <div class="card mb-0">
                        <div class="card-header d-flex">
                        <h6 class="mb-0">This Week Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                        </div>
                        <div class="card-body">
                        <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                        </div>
                    </div>
                    </div>
                    <div class="fade tab-pane" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
                    <div class="card mb-0">
                        <div class="card-header d-flex">
                        <h6 class="mb-0">This Month Tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                        </div>
                        <div class="card-body">
                        <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                        </div>
                    </div>
                    </div>
                    <div class="fade tab-pane" id="pills-assigned" role="tabpanel" aria-labelledby="pills-assigned-tab">
                    <div class="card mb-0">
                        <div class="card-header d-flex">
                        <h6 class="mb-0">Assigned to me</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                        </div>
                        <div class="card-body p-0">
                        <div class="taskadd">
                            <div class="table-responsive">
                            <table class="table">
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="fade tab-pane" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
                    <div class="card mb-0">
                        <div class="card-header d-flex">
                        <h6 class="mb-0">My tasks</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                        </div>
                        <div class="card-body p-0">
                        <div class="taskadd">
                            <div class="table-responsive">
                            <table class="table">
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                                <tr>
                                <td>
                                    <h6 class="task_title_0">Task name</h6>
                                    <p class="project_name_0">General</p>
                                </td>
                                <td>
                                    <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                </td>
                                <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                   
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection