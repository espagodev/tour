@extends('layouts.app')

@section('content')
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-sm-6">
            <h3>Configuración del sistema</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Configuracion   </li>
              <li class="breadcrumb-item active">Ajustes</li>
            </ol>
          </div>
          <div class="col-sm-6">
            <!-- Bookmark Start-->
            <div class="bookmark">
              <ul>
                {{-- <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                  <form class="form-inline search-form">
                    <div class="form-group form-control-search">
                      <input type="text" placeholder="Search..">
                    </div>
                  </form>
                </li> --}}
              </ul>
            </div>
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
                      
                      <ul class="nav main-menu" role="tablist">
                        <li class="nav-item"><span class="main-title"> Configuración general</span></li>
                        <li><a id="pills-created-tab" data-bs-toggle="pill" href="#pills-created" role="tab" aria-controls="pills-created" aria-selected="true"><span class="title">Configuración de Pantalla</span></a></li>
                        <li><a class="show" id="pills-todaytask-tab" data-bs-toggle="pill" href="#pills-todaytask" role="tab" aria-controls="pills-todaytask" aria-selected="false"><span class="title"> País</span></a></li>
                        <li><a class="show" id="pills-delayed-tab" data-bs-toggle="pill" href="#pills-delayed" role="tab" aria-controls="pills-delayed" aria-selected="false"><span class="title"> Divisa</span></a></li>
                        <li><a class="show" id="pills-notification-tab" data-bs-toggle="pill" href="#pills-notification" role="tab" aria-controls="pills-notification" aria-selected="false"><span class="title"> Configuración de moneda</span></a></li>
                        <li><a class="show" id="pills-upcoming-tab" data-bs-toggle="pill" href="#pills-upcoming" role="tab" aria-controls="pills-upcoming" aria-selected="false"><span class="title">Impuestos</span></a></li>
                        <li><a class="show" id="pills-weekly-tab" data-bs-toggle="pill" href="#pills-weekly" role="tab" aria-controls="pills-weekly" aria-selected="false"><span class="title">Zona Horaria</span></a></li>
                        <li><a class="show" id="pills-monthly-tab" data-bs-toggle="pill" href="#pills-monthly" role="tab" aria-controls="pills-monthly" aria-selected="false"><span class="title">Formato de Fecha</span></a></li>
                        <li><a class="show" id="pills-assigned-tab" data-bs-toggle="pill" href="#pills-assigned" role="tab" aria-controls="pills-assigned" aria-selected="false"><span class="title">Formato de Tiempo</span></a></li>
                        <li><a class="show" id="pills-tasks-tab" data-bs-toggle="pill" href="#pills-tasks" role="tab" aria-controls="pills-tasks" aria-selected="false"><span class="title">My tasks</span></a></li>
                        <li>
                          <hr>
                        </li>
                        <li><span class="main-title"> Usuarios y control de acceso</span></li>
                        <li><a class="show" id="pills-notification-tab" data-bs-toggle="pill" href="#pills-notification" role="tab" aria-controls="pills-notification" aria-selected="false"><span class="title"> Roles</span></a></li>
                        <li><a class="show" id="pills-newsletter-tab" data-bs-toggle="pill" href="#pills-newsletter" role="tab" aria-controls="pills-newsletter" aria-selected="false"><span class="title"> Usuarios</span></a></li>
                        <li><a class="show" id="pills-newsletter-tab" data-bs-toggle="pill" href="#pills-newsletter" role="tab" aria-controls="pills-newsletter" aria-selected="false"><span class="title"> Grupos de Usuarios</span></a></li>
                        <li>
                            <hr>
                          </li>
                          <li><span class="main-title"> Otros</span></li>
                          <li><a class="show" id="empresa-ajustes-tab" data-bs-toggle="pill" href="#empresa-ajustes" role="tab" aria-controls="empresa-ajustes" aria-selected="false"><span class="title"> Datos de la empresa</span></a></li>
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
                    <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                      <div class="card mb-0">
                        <div class="card-header">
                          <h5 class="mb-0">Created by me</h5><a class="f-w-600" href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
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
                    <div class="fade tab-pane" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
                      <div class="card mb-0">
                        <div class="card-header d-flex">
                          <h6 class="mb-0">Notification</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>Print</a>
                        </div>
                        <div class="card-body">
                          <div class="details-bookmark text-center"><span>No tasks found.</span></div>
                        </div>
                      </div>
                    </div>
                    <div class="fade tab-pane" id="empresa-ajustes" role="tabpanel" aria-labelledby="empresa-ajustes-tab">
                      <div class="card mb-0">
                        <div class="card-header d-flex">
                          <h6 class="mb-0">Datos De La Empresa</h6>
                        </div>
                        <div class="card-body">
                         @include('ajustes.empresa.empresa_ajustes')
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