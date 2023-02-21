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
                        <h5>Gestion des Ouvriers</h5>
                      </div>
                    </h1>
                <!-- Cards -->
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                </div>
                <!-- New Table -->
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('create_ouvrier') }}"> Ajouter un Ouvrier </a>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Nom</th>
                                    <th class="px-4 py-3">Prenom</th>
                                    <th class="px-4 py-3">Telephone</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>

                            <body class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                @foreach ($ouvriers as $client)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">{{ $client->name }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $client->prenom }} </td>
                                        <td class="px-4 py-3 text-xs">{{ $client->telephone }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $client->email }}</td>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                        </table>



