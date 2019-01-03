@extends('admin.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Kategori Soal</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-primary modal-tambah" data-toggle="modal" data-target="#modalForm" data-title="Tambah" data-href="{{url('kategori_soal')}}"><span data-feather="plus"></span></button>
              </div>
            </div>
          </div>
          
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Kategori</th>
                  <th>Durasi (menit)</th>
                  <th>Mulai</th>
                  <th>Selesai</th>
                  <th>Pilih</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_list as $data)
                <tr>
                  <td>{{ $data->kategori }}</td>
                  <td>{{ $data->durasi }}</td>
                  <td>{{ date('d-M-Y',strtotime($data->waktu_mulai)) }}</td>
                  <td>{{ $data->waktu_selesai }}</td>
                  <td>
                  <a class="btn btn-warning btn-sm modal-edit" title="Edit" data-toggle="modal" 
                      href="#modalForm"
                      data-title="Ubah"
                       data-href="{{ url('kategori_soal/'.$data->id.'/edit') }}"
                       data-id="{{ $data->id }}"
                       data-name="{{ $data->kategori }}"
                       onclickx="ajaxEdit('{{ url('kategori_soal/'.$data->id.'/edit') }}')">
                       <span data-feather="edit"></span></a>

                    <input type="hidden" name="_method" value="delete"/>

                    <a class="btn btn-danger btn-sm modal-delete" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="{{$data->id}}"
                       data-token="{{csrf_token()}}">
                       <span data-feather="trash"></span>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
		  <div id="show"></div>


          <!-- <a href="#myModalx" class="btn btn-info btn-lg" data-toggle="modal" data-code="Hallo" data-company="Braay">
  Show Modal
</a>

  <div class="modal fade bs-example-modal-sm" tabindex="-1" id="myModalx">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="mySmallModalLabel">Codes & Company</h4>
      </div>
      <div class="modal-body">
        <input type="text" id="code" class="form-control" />
        <input type="text" id="company" class="form-control" />
      </div>
    </div>
  </div>
</div> -->

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalForm">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title form-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="" id="frm">
            @csrf
            <input type="hidden" id="id">
            <div class="form-group">
            <label for="kategori">Kategori</label>
            <input class="form-control col-md-4" type="text" name="kategori" id="kategori">
            <div id="error_kategori"></div>
            </div>

            <div class="input-group">
            <div class="input-group-prepend">
                <label class="input-group-text" for="durasi">Durasi (menit)</label>
            </div>
            <select class="form-control custom-select col-md-2" name="durasi" id="durasi">
                <option value="">- Pilih -</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
                <option value="80">80</option>
                <option value="90">90</option>
                <option value="100">100</option>
                <option value="110">110</option>
                <option value="120">120</option>
            </select>
            </div>
            <div id="error_durasi"></div>

            <div class="input-group mt-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="mulai">Mulai</label>
            </div>
            <input class="form-control col-md-4" id="datetimepicker" name="waktu_mulai">
            </div>
            <div id="error_waktu_mulai"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" data-request="" data-href="" id="simpan"
          onclickx="ajaxStore('{{url('kategori_soal/create')}}/'+$('#delete_id').val(),$('#delete_token').val())">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>

<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Kategori Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Apakah kamu yakin untuk menghapus ?</p>
                    <input type="hidden" id="delete_token"/>
                    <input type="hidden" id="delete_id"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="hapus" 
          onclick="ajaxDelete('{{url('kategori_soal/delete')}}/'+$('#delete_id').val(),$('#delete_token').val())">Hapus</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    
 });

 var loader = $('body').loadingIndicator({
					useImage: false,
				}).data("loadingIndicator");
        loader.hide();
  // setTimeout(function() {
  //   loader.hide();
  // }, 2500);


 $(function () {
  $('#datetimepicker').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss'
  });
});

 $('#modalForm').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    $('.form-title').html(button.data('title') +' Kategori Soal');
    $('#method-hidden').remove();
    $('#data-id').remove();
    $('#simpan').attr('data-request','POST');
    $('#simpan').attr('data-href',$('.modal-tambah').attr('data-href'));
    if(button.data('title') == 'Ubah'){
      ajaxEdit(button.data('href'));
    }else{
      $('input').val('');
      $('input[name=kategori]').focus();
      selectedClear();
    }
});

$('#modalForm').on('shown.bs.modal', function () {
    //$('#kategori').trigger('kategori')
});

// $('#frm').on('submit', function(){
//   $('#simpan').click();  
// });
var fileUrl = "{{url('kategori_soal')}}";
var requestData = "POST";

$('#simpan').click(function(){
  //ajaxStore($(this).attr('data-href'), $(this).attr('data-request'));
  ajaxStore();
});

function selectedDurasi(data){
  $("select option").each(function(){     
      if($(this).val()==data){
          $(this).attr("selected","selected");    
      }
  });
}

function selectedClear(data){
  $("select option").each(function(){     
    $(this).removeAttr("selected");
  });
}

// function ajaxLoad(filename, content) {
//     content = typeof content !== 'undefined' ? content : 'content';
//     //$('.loading').show();
//     $.ajax({
//         type: "GET",
//         url: filename,
//         contentType: false,
//         success: function (data) {
//             $("#" + content).html(data);
//             //$('.loading').hide();
//         },
//         error: function (xhr, status, error) {
//             alert(xhr.responseText);
//         }
//     });
// }

function ajaxEdit(filename) {
	clearErrorMessage();
    loader.show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: filename,
        dataType:'JSON',
        success: function (data) {
            //$("#content").html(data);
            $('#frm').append('<input type="hidden" name="_method" value="PUT" id="method-hidden">');
            $('#frm').append('<input type="hidden" name="id" value="'+data.data_list.id+'" id="data-id">');
            $('input[name=kategori]').val(data.data_list.kategori);
            $('input[name=waktu_mulai]').val(data.data_list.waktu_mulai);
            $('#simpan').attr('data-request','PUT');
            $('#simpan').attr('data-href', filename.replace('edit',''));
            selectedDurasi(data.data_list.durasi);
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    }).done(function() {
      loader.hide();
    })
    .fail(function() {
      loader.hide();
    })
    .always(function() {
      loader.hide();
    });
}

$(document).on('click', '.modal-edit', function() {
        $('#id').val($(this).data('id'));
        $('#kategori').val($(this).data('name'));
        $('#modalForm').modal('show');
    });

function clearErrorMessage(){
  $('#kategori').removeClass('border-danger');
  $('#error_kategori').empty();

  $('#durasi').removeClass('border-danger');
  $('#error_durasi').empty();
  
  $('input[name=waktu_mulai]').removeClass('border-danger');
  $('#error_waktu_mulai').empty();
}

function ajaxStore() {
    //var formTag = $("#frm");
    //var formData = formTag.serialize();
    //$('meta[name="_token"]').attr('content')
    //$('[id^=test]').
    clearErrorMessage();
    loader.show();
    
    var filename = "";
    var typeRequest = "";
    var dataId = '';
    if($('#data-id').length > 1 || $('#data-id').val() != null){
      dataId = $('#data-id').val();
      filename = fileUrl + "/" + dataId;
      typeRequest = 'PUT';
    }else{
      filename = fileUrl;
      typeRequest = '';
    }

    /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });*/

	/*contentType: "application/json; charset=utf-8",*/
	
    $.ajax({
        type: 'POST',
        url: filename,
        dataType:'JSON',
		cache: false,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          id:dataId,
          kategori:$('#kategori').val(),
          durasi:$('#durasi').val(),
          waktu_mulai:$('input[name=waktu_mulai]').val(),
          _method:typeRequest,
          _token:'{{csrf_token()}}'
        },
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function (data) {
            //$("#content").html(data);
            // $('#frm').append('<input type="hidden" name="_method" value="PUT" id="method-hidden">');
            // $('input[name=kategori]').val(data.data_list.kategori);
            // $('input[name=mulai]').val(data.data_list.waktu_mulai);
            // selectedDurasi(data.data_list.durasi);
            alert(data.result);
        },
        error: function (xhr, status, error) {
            //alert(xhr.responseText);
            //alert('Gagal');
            if(xhr.status === 422) {
                //var errors = xhr.responseJSON;
                var errors = JSON.parse(xhr.responseText);
                //alert(xhr.responseJSON.errors.kategori);
                $.each(xhr.responseJSON.errors, function (key, value) {
                  if(key == 'kategori'){
                    $('#kategori').addClass('border-danger');
                    $('#error_kategori').append('<small class="form-text text-danger">'+ value +'</small>');
                  }

                  if(key == 'durasi'){
                    $('#durasi').addClass('border-danger');
                    $('#error_durasi').append('<small class="form-text text-danger">'+ value +'</small>');
                  }

                  if(key == 'waktu_mulai'){
                    $('input[name=waktu_mulai]').addClass('border-danger');
                    $('#error_waktu_mulai').append('<small class="form-text text-danger">'+ value +'</small>');
                  }
                  
                });
            } else {
                alert(xhr.status);
            }
        },
		complete : function (result) {
			$('#show').html(result.responseText);
        }
    }).done(function() {
      loader.hide();
    })
    .fail(function() {
      loader.hide();
    })
    .always(function() {
      loader.hide();
    });
}

// $(document).on('submit', 'form#frm', function (event) {
//     event.preventDefault();
//     var form = $(this);
//     var data = new FormData($(this)[0]);
//     var url = form.attr("action");
//     $.ajax({
//         type: form.attr('method'),
//         url: url,
//         data: data,
//         cache: false,
//         contentType: false,
//         processData: false,
//         success: function (data) {
//             $('.is-invalid').removeClass('is-invalid');
//             if (data.fail) {
//                 for (control in data.errors) {
//                     $('input[name=' + control + ']').addClass('is-invalid');
//                     $('#error-' + control).html(data.errors[control]);
//                 }
//             } else {
//                 $('#modalForm').modal('hide');
//                 ajaxLoad(data.redirect_url);
//             }
//         },
//         error: function (xhr, textStatus, errorThrown) {
//             alert("Error: " + errorThrown);
//         }
//     });
//     return false;
// });
 
</script>
          @endsection