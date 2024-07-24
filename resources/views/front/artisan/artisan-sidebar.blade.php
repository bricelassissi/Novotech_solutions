@php
    // $clients = App\Models\MessageClient::where('user_id',Auth::user()->id)->get();
    $clients = App\Models\MessageClient::where('artisan_id',Auth::user()->id)->get();
@endphp

@section('customCss')
<style>
    .active-link {
        color: red; /* ou toute autre couleur que vous préférez */
        font-weight: bold; /* optionnel : rendre le lien en gras */
    }
    
</style>
@endsection

<div class="card border-0 shadow mb-4 p-3">
    <div class="s-body text-center mt-3">
        @if (Auth::user()->image_profile != '')
            <img src="{{ asset('profile_pic/'.Auth::user()->image_profile) }}" alt="avatar"  class="img-fluid" style="border: 1px solid #c2c2c2">
        @else
            <img src="{{ asset('assets/images/logo_black-white.png') }}" alt="avatar"   style="border: 1px solid #c2c2c2">
        @endif

        <h5 class="mt-3 pb-0" style="color: #A8DF8E;font-weight: 900;">{{$user->nom}} {{$user->prenom}}</h5>
        <p class="text-muted mb-1 fs-6">{{$user->type}}</p>
        <div class="d-flex justify-content-center mb-2">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Changer Photo de Profil</button>
        </div>
    </div>
</div>
<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{route('artisan.clients')}}"  class="{{ Request::is('artisan/client') ? 'active-link' : '' }}">Mes clients <span class="badge rounded-pill bg-secondary">{{$clients->count()}}</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{route('artisan.compte')}}" class="{{ Request::is('artisan/compte') ? 'active-link' : '' }}">Mon compte</a>
            </li>                                                     
        </ul>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title pb-0" id="exampleModalLabel">Ajouter un logo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="profilePicForm" name="profilePicForm" action="" method="post">
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Logo / image de profile</label>
                  <input type="file" class="form-control" id="image" name="image">
                  <p class="text-danger" id="image-error"></p>
              </div>
              <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mx-3">Ajouter</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              </div>            
          </form>
        </div>
      </div>
    </div>
  </div>


  @section('customSidebarJs')
<script>
    
        $("#profilePicForm").submit(function(e){
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route("account.updateProfilePic") }}',
                type: 'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.status == false) {
                        var errors = response.errors;
                        if (errors.image) {
                            $("#image-error").html(errors.image)
                        }
                    } else {
                        window.location.href = '{{ url()->current() }}';
                    }
                }
            });
        });
</script>
    
@endsection