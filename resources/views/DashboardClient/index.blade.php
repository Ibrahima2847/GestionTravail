@include('navbar.navbarClient')

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    @foreach ($annonceClients as $gestAnnonce)
    <div class="card mb-3" style="width: 100%;">
        <img class="card-img-left" src="./assets/img/{{$gestAnnonce->image}}" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">{{$gestAnnonce->titre}}</h2>
          <p class="card-text">{{$gestAnnonce->message}}</p>
          <small>{{$gestAnnonce->created_at}}</small>
        </div>
        <a href="#" class="btn btn-primary">Modifer</a>
          <a href="#" class="btn btn-primary">Annuler</a>
    </div>
      @endforeach
        </div>
    </div>
</div> --}}

        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Titre</th>
                      <th class="px-4 py-3">Message</th>
                      <th class="px-4 py-3">Date</th>
                      {{-- <th class="px-4 py-3">Date</th> --}}
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
        @foreach ($annonceClients as $gestAnnonce)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="./assets/img/{{$gestAnnonce->image}}"
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">{{$gestAnnonce->titre}}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{$gestAnnonce->region}},{{$gestAnnonce->departement}}
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$gestAnnonce->message}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{ Carbon\Carbon::parse($gestAnnonce->created_at)->diffForHumans() }}
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

