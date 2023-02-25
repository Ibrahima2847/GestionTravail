@include('navbar.navbarChefAgence')

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
                <h5>Gestion des métiers</h5>
              </div>
            </h1>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="table" style="width:100%;">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Information</th>
                            <th></th>
                            <th>Accepter</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($metier as $ad)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"></td>
                                <td class="px-4 py-3 text-sm"></td>
                                <td class="px-4 py-3 text-sm">
                                    <a class="btn btn-success btn btn-primary btn-sm"
                                        href="{{ route('accepterMetier', $ad->id) }}">Oui</a>
                                    <a class="btn btn-danger btn btn-primary btn-sm"
                                        href="{{ route('refuserMetier', [$ad->id]) }}">Non</a>
                                </td>

                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><strong>Nom</strong></td>
                                <td class="px-4 py-3 text-sm">{{ $ad->name }}</td>
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
                                <td class="px-4 py-3 text-sm"><strong>Profession</strong></td>
                                <td class="px-4 py-3 text-sm">{{ $ad->profession }}</td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><strong>Potentiels</strong></td>
                                <td class="px-4 py-3 text-sm">{{ $ad->potentiel }}</td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><strong>Diplome</strong></td>
                                <td class="px-4 py-3 text-sm">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#diplome-modal">Afficher l'image</a>
                                    <div class="modal fade" id="diplome-modal" tabindex="-1" role="dialog" aria-labelledby="diplome-modal-label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="diplome-modal-label">Diplome</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('assets/img/' . $ad->diplome) }}" alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><strong>Curriculum Vitae</strong></td>
                                <td class="px-4 py-3 text-sm">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#cv-modal">Afficher l'image</a>
                                    <div class="modal fade" id="cv-modal" tabindex="-1" role="dialog" aria-labelledby="cv-modal-label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="cv-modal-label">CV</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('assets/img/' . $ad->cv) }}" alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><strong>Photo</strong></td>
                                <td class="px-4 py-3 text-sm">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#photo-modal">Afficher l'image</a>
                                    <div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="photo-modal-label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="photo-modal-label">Photo</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('assets/img/' . $ad->photo) }}" alt="Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"> </td>
                                {{-- <td class="px-4 py-3 text-sm">{{ $ad->email }}</td> --}}
                            </tr>


                            </tr>
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
