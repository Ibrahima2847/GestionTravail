@include('navbar.navbarAgence')


<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h1
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
        href="#"
      >
        <div class="flex items-center">
          <svg
            class="w-5 h-5 mr-2"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
          </svg>
          <h5>Tableau de Bord Agent</h5>
        </div>
      </h1>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        </div>
        <!-- New Table -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('agence_create') }}"> Ajouter un Client </a>
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

                        @foreach ($clients as $client)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                alt=""loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner"aria-hidden="true">
                                            </div>
                                        </div>

                                        <div>
                                            <p class="font-semibold">{{ $client->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $client->prenom }} </td>
                                <td class="px-4 py-3 text-xs">{{ $client->telephone }}</td>
                                <td class="px-4 py-3 text-sm">{{ $client->email }}</td>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{-- <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                      <a class="btn btn-info" href="{{ route('cleints.show',$client->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('cleints.edit',$client->id) }}">Edit</a>
--}}
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                </table>

                {!! $clients->links() !!}
