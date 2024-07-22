<p id="contact">Contacts</p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div><div class="alert alert-success">{{ session('success') }}</div></div>
@endif
<form action="{{ url('/send-email') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nom & Prénom(s)</label>
        <input type="text" name="name"
               class="form-control" id="exampleFormControlInput1" placeholder="Nom & Prénom(s)">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">N° de téléphone</label>
        <input type="text" name="telephone"
               class="form-control" id="exampleFormControlInput1" placeholder="N° de téléphone">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Votre Email</label>
        <input type="email" name="email"
               class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Objet</label>
        <input type="text" name="objet"
               class="form-control" id="exampleFormControlInput1" placeholder="Objet">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
        <textarea class="form-control" name="message"
                  id="exampleFormControlTextarea1" rows="3" placeholder="Votre message ici"></textarea>
    </div>

    <input class="btn btn-success" type="submit" value="Envoyer" />
</form>
