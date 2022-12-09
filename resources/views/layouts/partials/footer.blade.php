<footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 footer-copyright">
          <p class="mb-0">Copyright {{date('Y')}}-{{date('y', strtotime('+1 year'))}} © {{ session()->get('empresa.aje_nombre') }}.</p>
        </div>
        <div class="col-md-6">
          <p class="pull-right mb-0">Código de Turismo {{ session()->get('empresa.aje_codigo_turismo') }}</p>
        </div>
      </div>
    </div>
  </footer>