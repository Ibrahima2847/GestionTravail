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
                        @foreach ($relation as $rel)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">Titre</td>
                            <td class="px-4 py-3 text-sm">{{ $rel->titre }}</td>
                            <td class="px-4 py-3 text-sm">
                                {{-- <form action="{{ route('faireDevis', $rel->relation_id) }}" method="GET">
                                    @csrf --}}
                                    <a class="btn btn-success btn btn-primary btn-sm" href="{{ route('travailTerminer', $rel->relation_id) }}">Terminer</a>
                                    {{-- <button type="submit" class="btn btn-primary btn-sm">Terminer</button> --}}
                                {{-- </form> --}}
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
                                    <td class="px-4 py-3 text-sm"><strong>Contrat client</strong></td>
                                    <td class="px-4 py-3 text-sm">
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#cv-modal">Afficher l'image</a>
                                        <div class="modal fade" id="cv-modal" tabindex="-1" role="dialog" aria-labelledby="cv-modal-label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cv-modal-label">Contrat Client</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{ asset('assets/img/' . $rel->contratClient) }}" width="100%" height="500"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"><strong>Contrat Ouvrier</strong></td>
                                    <td class="px-4 py-3 text-sm">
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#cv-modal2">Afficher l'image</a>
                                        <div class="modal fade" id="cv-modal2" tabindex="-1" role="dialog" aria-labelledby="cv-modal2-label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cv-modal2-label">Contrat Ouvrier</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{ asset('assets/img/' . $rel->contratOuvrier) }}" width="100%" height="500"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm"> </td>
                                </tr>


            </tr>
            @endforeach
            </tbody>

            </table>
