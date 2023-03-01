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
              <h5>Administrateur</h5>
            </div>
          </h1>
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                {{-- <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div> --}}
                <div>
                  <p style="color: #e21111" class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total clients
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$nbClient}}
                  </p>
                </div>
              </div>
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div>
                  <p style="color: #e21111" class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Ouvriers
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$nbOuvrier}}
                  </p>
                </div>
              </div>
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div>
                  <p style="color: #e21111" class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total chef d'agence
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$nbChef}}
                  </p>
                </div>
              </div>
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div>
                  <p style="color: #e21111" class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total agent
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$nbAgent}}
                  </p>
                </div>
              </div>
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div>
                  <p style="color: #e21111" class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total agence
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$nbAgence}}
                  </p>
                </div>
              </div>
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Chiffre d'affaire
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$nbMontant}}
                  </p>
                </div>
              </div>
            </div>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Nom</th>
                      <th class="px-4 py-3">Prénom</th>
                      <th class="px-4 py-3">Téléphone</th>
                      <th class="px-4 py-3">Email</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  @foreach ($client as $clients)
                  <tr>
                    <td class="px-4 py-3 text-sm">
                        {{$clients->name}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$clients->prenom}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$clients->telephone}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$clients->email}}
                    </td>
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
