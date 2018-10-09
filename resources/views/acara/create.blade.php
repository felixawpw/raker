@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
    	<div class="col-md-12">
          <div class="card ">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">Tambah Acara</h4>
            </div>
            <div class="card-body ">
              <form class="form-horizontal" method="POST" action="{{ route('event.store') }}">
                {{csrf_field()}}
                <div class="row">
                  <label class="col-md-3 col-form-label" for="nama">Nama Acara</label>
                  <div class="col-md-7">
                    <div class="form-group has-default">
                      <input type="text" autocomplete="off" class="form-control" name="nama" id="nama" required value="">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-md-3 col-form-label" for="nama">Tanggal Mulai</label>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" autocomplete="off" class="form-control datepicker" name="tanggal_mulai" id="tanggal_mulai" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-md-3 col-form-label" for="kodeharga">tanggal Akhir</label>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" autocomplete="off" class="form-control datepicker" name="tanggal_akhir" id="tanggal_akhir" required>
                    </div>
                  </div>
                </div>
                                
                <div class="row">
                  <div class="col-md-7 offset-md-3">
                    <div class="form-group">
                      <button type="submit" class="btn btn-fill btn-primary col-md-12">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-footer ">
              <div class="row">
                <div class="col-md-7">
                </div>
              </div>
            </div>
          </div>
        </div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#nav_pembelian').addClass('active');
    md.initFormExtendedDatetimepickers();
    if ($('.slider').length != 0) {
      md.initSliders();
    }
	});
</script>
@endsection