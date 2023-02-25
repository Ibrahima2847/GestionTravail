@include('navbar.navbarAdmin')
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
                <h5>Gestion des agences</h5>
              </div>
            </h1>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Nom de l'agence</th>
                            <th class="px-4 py-3">Localité</th>
                            <th class="px-4 py-3">Nom chef d'agence</th>
                            <th class="px-4 py-3">Prénom chef d'agence</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($agence as $ad)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $ad->nom }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $ad->localite }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $ad->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $ad->prenom }}
                                </td>
                                <div class="col-sm-3">
                                    <td class="px-4 py-3 text-xs">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i></button>
                                    </td>
                                </div>
            </div>
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
