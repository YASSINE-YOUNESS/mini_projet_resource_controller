<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   <!-- cdn bootsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- cdn sweet alert confirmaton de suppression -->

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



</head>
<body>
<h1>Post Page</h1>

<div class="container">
    <form method="post" action="{{route('posts.store')}}">
        @csrf
        Nom <input type ="text" name ="txt_nom" class="form-control w-50" >
        Prenom <input type ="text" name ="txt_prenom" class="form-control w-50">
        <button type="submit" class="btn btn-success mt-2">Ajouter</button>

    </form>

    <table class="table table-bordered w-50 mt-3">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Operation</th>

        </tr>

        @foreach($all_posts as $a)
            <tr>
                <td>{{$a->nom}}</td>
                <td>{{$a->prenom}}</td>
                <td>

                    <a  href="{{route('posts.edit',$a->id)}}"  class="btn btn-primary mt-2">afficher</a>
                </td>

                <td>
                    <form method="post" action="{{route('posts.destroy',$a->id)}}">
                        @csrf
                        @method('DELETE')
                        <!-- ==  APPEL FUNCTION confirmation code js sur button delete  = == -->
                        <button type="button" onclick="confirmation(event)" class="btn btn-danger mt-2">Supprimer</button>



                    </form>
                </td>


            </tr>
        @endforeach

    </table>
</div>




<!-- =============================    FUNCTION confirmation script  ============ -->

<!-- blastha katkon 9bal script w akher hajafl body  -->
<!-- =============================    FUNCTION confirmation script  ============ -->

<!-- blastha katkon 9bal script w akher hajafl body  -->
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var form = ev.currentTarget.parentNode; // Get the parent form
        var urlToRedirect = form.action;

        console.log(urlToRedirect);
        Swal.fire({
            title: "Confirmation Suppression ?",
            text: "Cet élément sera supprimé définitivement",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Oui, supprimer !",  // Customize the text for the confirmation button
            cancelButtonText: "Annuler"  // Customize the text for the cancel button
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit the form if the user confirms
            }
        });
    }
</script>




<!--  CDN JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
