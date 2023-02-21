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
                <h5>Gestion des annonces</h5>
              </div>
            </h1>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Titre</th>
                            {{-- <th class="px-4 py-3">Message</th> --}}
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Statut</th>
                            <th class="px-4 py-3">Action</th>
                            {{-- <th class="px-4 py-3">Non publier</th>
                      <th class="px-4 py-3">Afficher</th>
                      <th class="px-4 py-3">Mise en relation</th> --}}
                            {{-- <th class="px-4 py-3">Date</th> --}}
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($annonces as $ad)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            {{-- <img
                              class="object-cover w-full h-full rounded-full"
                              src="{{ asset('./assets/img/')}}{{$ad->image}}"
                              alt=""
                              loading="lazy"
                            /> --}}
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $ad->titre }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $ad->region }},{{ $ad->departement }}
                                            </p>
                                        </div>
                                </td>
                                {{-- <td class="px-4 py-3 text-sm">
                        {{$ad->message}}
                      </td> --}}
                                <td class="px-4 py-3 text-sm">
                                    {{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $ad->statut }}
                                </td>
                                <div class="col-sm-3">
                                    <td class="px-4 py-3 text-xs">
                                        <a class="btn btn-success btn btn-primary btn-sm"
                                            href="{{ route('publier', $ad->id) }}"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>

                                        <a class="btn btn-danger btn btn-primary btn-sm"
                                            href="{{ route('nonPublier', $ad->id) }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>

                                        <a class="btn btn-info btn btn-primary btn-sm"
                                            href="{{ route('voir', $ad->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
