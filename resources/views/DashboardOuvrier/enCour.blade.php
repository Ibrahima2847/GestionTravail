@include('navbar.navbarOuvrier')

<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h1
              class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
              href="#"  style="background-color: #e21111"
            >
              <div class="flex items-center">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                </svg>
                <h5>Les travaux en cour</h5>
              </div>
            </h1>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="table" style="float: left; width:50%;">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Civilité</th>
                            <th class="px-4 py-3">Client</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($requete as $ad)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Nom</strong></td>
                                    <td class="px-4 py-3 text-sm">{{ $ad->name }}</td>
                                    <td class="px-4 py-3 text-sm">
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Prénom</strong></td>
                                    <td class="px-4 py-3 text-sm">{{ $ad->prenom }}</td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Téléphone</strong></td>
                                    <td class="px-4 py-3 text-sm">{{ $ad->telephone }}</td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Email</strong></td>
                                    <td class="px-4 py-3 text-sm">{{ $ad->email }}</td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    {{-- <td class="px-4 py-3 text-sm"><strong>Email</strong></td> --}}
                                    <td class="px-4 py-3 text-sm"></td>
                                </tr>


            </tr>
            @endforeach
            </tbody>

            </table>

            <table class="table" style="float: left; width:50%;">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Annonce</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($requete as $ouv)
                {{-- <form action="{{route('devis')}}" method="POST"> --}}
                    @csrf
                             <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">{{ $ouv->titre }}</td>
                                <td class="px-4 py-3 text-sm">
                                    {{-- <button type="submit" class="btn btn-success btn btn-primary btn-sm">Faire le devis</button> --}}
                                {{-- <a class="btn btn-danger btn btn-primary btn-sm"href="#">Résilier</a> --}}
                                <form action="{{route('upload',$ouv->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="pdf">
                                    <button type="submit" class="btn btn-success btn btn-primary btn-sm">Joindre contrat</button>
                                </form>
                            </td>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">{{ $ouv->message }}</td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#image-modal">Afficher l'image</a>
                                    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="image-modal-label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="image-modal-label">Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('assets/img/' . $ouv->image) }}" alt="Image">
                                                    {{-- <img src="{{ asset('assets/img/' . $ad->photo) }}" alt="Image"> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">{{ $ouv->departement }}</td>
                                <tr class="text-gray-700 dark:text-gray-400">
                                </tr>
                            </tr>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"></td>
                            </tr>

        </div>
        </tr>
    </form>
        @endforeach
        </tbody>

        </table>
        </div>
    </div>
    </div>
</main>
</div>
</div>
</body>

</html>

<script>
    document.getElementById("show-image").addEventListener("click", function() {
        document.getElementById("image-container").style.display = "block";
    });
</script>

@if (session()->has('success'))
<script>
  toastr.success("{!! session()->get('success') !!}");
</script>
@endif

@if (session()->has('error'))
<script>
  toastr.error("{!! session()->get('success') !!}");
</script>
@endif
