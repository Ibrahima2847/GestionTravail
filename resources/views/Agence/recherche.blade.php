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
                <h5>Mise en Relation</h5>
              </div>
            </h1>
            <div class="testbox">
                <form action="{{ route('rechercher',$ads->id) }}" method="GET" id="formSearch">
                    <div class="colums">
                        <div class="item">
                            <div class="input-group">
                                <input type="text" class="form-control" name="words" placeholder="Rechercher un métier">
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

                                            <td class="px-4 py-3">{{ $data->id }}</td>
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

{{-- </head>

<body>
    <div class="testbox">
        <form action="{{ route('rechercher', $ads->id) }}" method="GET" id="formSearch">
            <div class="banner">
                <h1>Mise en relation</h1>
            </div>
            <div class="colums">
                <div class="item">
                    <div class="input-group">
                        <input type="text" class="form-control" name="words">
                        <button type="submit" class="btn btn-primary">Rechercher</button>

                    </div>
                    <div id="results">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Profession</th>
                                    <th>Mettre en relation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_array($annonces) || is_object($annonces))
                                    @foreach ($annonces as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->prenom }}</td>
                                            <td>{{ $data->telephone }}</td>
                                            <td>{{ $data->profession }}</td>
                                        </tr>
        </form>
        <form action="{{ route('miseRelation', [$ads->id, $data->id]) }}" method="POST">
            @csrf
            <input type="submit" value="Relation" name="" id="">
        </form>
        </td>
        </tr>
        @endforeach
        @endif
        </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
</body>

</html> --}}

{{-- <script>
    const form = document.querySelector('form');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const query = this.words.value;

        axios.post('/rechercher', {
                words: query,
            })
            .then(function(response) {
                 console.log(response);
                const jobs = response.data;
                const results = document.querySelector('#results');
                // console.log(results);
                results.innerHTML = '';

                for (let i = 0; i < jobs.length; i++) {
                    let textBox = document.createElement('div')
                    let item = document.createElement('div')
                    let colums = document.createElement('div')
                    let table = document.createElement('table')

                    textBox.classList.add('testbox')
                    item.classList.add('item')
                    colums.classList.add('colums')
                    table.classList.add('table')

                    let thead = document.createElement('thead')
                    let tr = document.createElement('tr')
                    let th = document.createElement('th')
                    let tbody = document.createElement('tbody')
                    let td = document.createElement('td')
                    let tr2 = document.createElement('tr')

                    const nom =  document.createTextNode('Nom')
                    const prenom =  document.createTextNode('Prénom')
                    const telephone =  document.createTextNode('Téléphone')
                    const profession =  document.createTextNode('Profession')
                    const relation =  document.createTextNode('Mettre en Relation')

                    th.appendChild(nom)
                    th.appendChild(prenom)
                    th.appendChild(telephone)
                    th.appendChild(profession)
                    th.appendChild(relation)

                    tr.appendChild(th)
                    thead.appendChild(tr)
                    table.appendChild(thead)

                    let nomOuv = document.createElement('td')
                    let prenomOuv = document.createElement('td')
                    let telOuv = document.createElement('td')
                    let professionOuv = document.createElement('td')
                    let bouton = document.createElement('td')

                    nomOuv.innerHTML = jobs[i].name
                    prenomOuv.innerHTML = jobs[i].prenom
                    telOuv.innerHTML = jobs[i].telephone
                    professionOuv.innerHTML = jobs[i].profession
                    bouton.innerHTML = "";

                    td.appendChild(nomOuv)
                    td.appendChild(prenomOuv)
                    td.appendChild(telOuv)
                    td.appendChild(professionOuv)
                    td.appendChild(bouton)

                    tr2.appendChild(td)
                    tbody.appendChild(tr2)
                    table.appendChild(tbody)

                    // let nom = document.createElement('td')
                    // nom.innerHTML = jobs[i].name
                    item.appendChild(table)
                    colums.appendChild(item)
                    textBox.appendChild(colums)
                    results.appendChild(textBox)
                }
            })
            .catch(function(error) {
                console.error(error);
            });
    });

    // function search(event) {
    //     event.preventDefault();
    //     const words = document.querySelector('#words').value;

    //     const url = document.querySelector('#formSearch').getAttribute('action')

    //     axios.post(`${url}`, {
    //             words: words,
    //         })
    //         .then(function(response) {
    //             // console.log(response)
    //             const metier = response.data
    //             let results = document.querySelector('#results')
    //             results.innerHTML = ''
    //         })
    //         .catch(function(error) {
    //             console.log(error);
    //         });
    // }
</script> --}}
