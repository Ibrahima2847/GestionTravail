@include('navbar.navbarClient')

<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Titre</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($annonces as $gestAnnonce)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="./assets/img/{{ $gestAnnonce->image }}" alt=""
                                                loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $gestAnnonce->titre }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $gestAnnonce->region }},{{ $gestAnnonce->departement }}
                                            </p>
                                        </div>
                                    </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js">
// R??cup??ration des donn??es depuis l'API en utilisant une requ??te AJAX
$.ajax({
    url: '/pdf',
    success: function(data) {
        // G??n??ration du contenu PDF ?? partir des donn??es r??cup??r??es
        var content = 'Liste des donn??es :\n\n';
        data.forEach(function(item) {
            content += item.nom + ' ' + item.prenom + '\n';
        });

        // G??n??ration du fichier PDF ?? partir du contenu
        var doc = new jsPDF();
        doc.text(content, 10, 10);

        // Affichage ou t??l??chargement du fichier PDF g??n??r??
        doc.save('liste_des_donnees.pdf');
    }
});

</script>
