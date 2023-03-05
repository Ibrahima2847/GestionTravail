 @include('navbar.navbarAgence')

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
                <h5>Les relations en cour</h5>
              </div>
            </h1>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="table" style="float: left; width:100%;">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Civilité</th>
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($relations as $rel)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">Titre</td>
                            <td class="px-4 py-3 text-sm">{{ $rel->titre }}</td>
                            <td class="px-4 py-3 text-sm">
                                <form action="{{ route('faireDevis', $rel->relation_id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">Faire le devis</button>
                                </form>
                            </td>
                        </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Nom</strong></td>
                                    <td class="px-4 py-3 text-sm">{{ $rel->name }}</td>
                                    <td class="px-4 py-3 text-sm">
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Prénom</strong></td>
                                    <td class="px-4 py-3 text-sm">{{ $rel->prenom }}</td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Téléphone</strong></td>
                                    <td class="px-4 py-3 text-sm">{{ $rel->telephone }}</td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Email</strong></td>
                                    <td class="px-4 py-3 text-sm">{{ $rel->email }}</td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Image</strong></td>
                                    <td class="px-4 py-3 text-sm">
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#photo1-modal">Afficher l'image</a>
                                        <div class="modal fade" id="photo1-modal" tabindex="-1" role="dialog" aria-labelledby="photo1-modal-label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="photo1-modal-label">Photo</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('assets/img/' . $rel->image) }}" alt="Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


            </tr>
            @endforeach
            </tbody>

            </table>
{{--
            <table class="table" style="float: left; width:50%;">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Annonce</th>
                        <th></th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                @foreach ($relation as $ouv)

                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <form action="{{route('devis',$ad->id)}}" method="GET">
                            @csrf
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><strong>Titre</strong></td>
                                <td class="px-4 py-3 text-sm">{{ $ouv->titre }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <a class="btn btn-success btn btn-primary btn-sm"
                                        href="{{ route('travailTerminer', $ouv->id) }}">Oui</a>
                                    <button type="submit" class="btn btn-primary btn-sm">devis</button>
                                </td>
                            </tr>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><strong>Région</strong></td>
                                <td class="px-4 py-3 text-sm">{{ $ouv->region }}</td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><strong>Département</strong></td>
                                <td class="px-4 py-3 text-sm">{{ $ouv->departement }}</td>
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"><strong>Statut</strong></td>
                                <td class="px-4 py-3 text-sm">{{ $ouv->statut }}</td>
                            </tr>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm"> </td>
                            </tr>

        </div>
        </tr>
        </tbody>
        @endforeach

        </table>
        </div>
    </div>
    </div>
</main>
</div>
</div>
</body>

</html> --}}
