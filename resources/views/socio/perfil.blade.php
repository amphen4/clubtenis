@extends('socio.layout.gentelella')
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      {{ $error }}
    </div>
    @endforeach
@endif
<!-- page content -->
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Perfil de Usuario</h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-6 col-sm-6 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  
                  <img class="img-responsive avatar-view" src="{{ route('wea2',['filename' => 'perfil-'.Auth::user()->id.'.jpg']) }}" alt="Avatar" title="Change the avatar">
                  
                </div>
              </div>
              <h3>{{Auth::user()->nombre.' '.Auth::user()->apellido_pat.' '.Auth::user()->apelido_mat}}</h3>

              <ul class="list-unstyled user_data">
                
              <li><i class="fa fa-user user-profile-icon"></i> Nombre de Usuario:{{Auth::user()->username}}
                </li>
                <li>
                  <i class="fa fa-envelope user-profile-icon"></i> {{Auth::user()->email}}
                </li>
                <li><i class="fa fa-map-marker user-profile-icon"></i> Dirección:{{Auth::user()->direccion}}
                </li>
                <li class="m-top-xs">
                  <i class="fa fa-phone   user-profile-icon"></i> Fono: {{Auth::user()->fono_contacto}}
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-briefcase user-profile-icon"></i> Profesion:
                </li>
              </ul>

              <a id="botonEditar" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
              <br />

            </div>
            
          </div>
        </div>
      </div>
    </div>
<!-- /page content -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/socio/perfil') }}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Perfil</h4>
      </div>
      <div class="modal-body">
        
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Nombre de Usuario</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="nombre" value="{{ Auth::user()->nombre }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Apellido Paterno</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="apellido_pat" value="{{ Auth::user()->apellido_pat }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Apellido Materno</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="apellido_mat" value="{{ Auth::user()->apellido_mat }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Correo electrónico:</label>

                            <div class="col-md-6">
                                <input  type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Imagen de Perfil (jpg, max. 2 MB)</label>

                            <div class="col-md-6">
                                <input  type="file" class="form-control" name="perfil" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Fono contacto</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="fono_contacto" value="{{ Auth::user()->fono_contacto }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="direccion" value="{{ Auth::user()->direccion }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-4 control-label">Profesión</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="profesion" value="{{ Auth::user()->profesion }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Nueva Contraseña</label>

                            <div class="col-md-6">
                                <input  type="password" class="form-control" name="password" placeholder="Dejar en blanco si no desea cambiar contraseña">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Repita Constraseña</label>

                            <div class="col-md-6">
                                <input  type="password" class="form-control" name="password_confirmation" placeholder="Dejar en blanco si no desea cambiar contraseña">
                            </div>
                        </div>

                        
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button  type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection
@section('js')
$<script>
$(document).ready(function(){
    $("#botonEditar").click(function(){
        $(".bs-example-modal-lg").modal("show");
        
    });
    
        
});
</script>
@endsection