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
                <h5>Mise en Relationj</h5>
              </div>
            </h1>
            <div class="testbox">
                <form action="{{ route('rechercher',$ads->id) }}" method="GET" id="formSearch">
                    <div class="colums">
                        <div class="item">
                            <div class="input-group">
                                {{-- <input type="text" class="form-control" name="words" placeholder="Rechercher un métier"> --}}
                                <select  id="form3Example1c" class="form-control" name="words" placeholder="Rechercher un métier">
                                    <option value="Mécanicien">Mecanicien</option>
                                    <option value="Plombier">Plombier</option>
                                    <option value="Maçon">Maçon</option>
                                    <option value="Ménagére">Ménagére</option>
                                    <option value="Maçon">Electricien</option>
                                    <option value="Menuisier">Menuisier</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Rechercher</button>

                            </div>
                        </div>
                    </div>
                </form>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Nom</th>
                            <th class="px-4 py-3">Prénom</th>
                            <th class="px-4 py-3">Téléphone</th>
                            <th class="px-4 py-3">Profession</th>
                            <th class="px-4 py-3">Mettre en relation</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($annonces as $data)
                            <tr class="text-gray-700 dark:text-gray-400">

                                            <td class="px-4 py-3">{{ $data->id_Ouvrier }}</td>
                                            <td class="px-4 py-3">{{ $data->name }}</td>
                                            <td class="px-4 py-3">{{ $data->prenom }}</td>
                                            <td class="px-4 py-3">{{ $data->telephone }}</td>
                                            <td class="px-4 py-3">{{ $data->profession }}</td>

                                <div class="col-sm-3">
                                    <td class="px-4 py-3 text-xs">
                                        <form action="{{ route('miseRelation', [$ads->id, $data->id]) }}"
                                            method="POST">
                                            @csrf
                                            <input class="btn btn-success" type="submit" value="Relation" name="" id="">
                                        </form>
                                    </a>
                                    </td>
                                </div>
                            </tr>
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
{{--
<body>
    <div class="testbox">
        <form action="{{ route('rechercher',$ads->id) }}" method="GET" id="formSearch">
            <div class="banner">
                <h1>Mise en relation</h1>
            </div>
            <div class="colums">
                <div class="item">
                    <div class="input-group">
                        <input type="text" class="form-control" name="words" placeholder="Rechercher un métier">
                        <button type="submit" class="btn btn-primary">Rechercher</button>

                    </div >
                    <div id="results">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Profession</th>
                                    <th>Mettre en relation</th>
                                </tr>
                            </thead>
                            <tbody> --}}
                                {{-- @if (is_array($annonces) || is_object($annonces)) --}}
                                    {{-- @foreach ($annonces as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->prenom }}</td>
                                            <td>{{ $data->telephone }}</td>
                                            <td>{{ $data->profession }}</td>
                                            <td>
                                                <form action="{{ route('miseRelation', [$ads->id, $data->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="submit" value="Relation" name="" id="">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                {{-- @endif --}}
                            {{-- </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>  --}}

