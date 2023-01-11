@include('navbar.navbarOuvrier')

@section('title', 'ouvrier')

            <!-- General elements -->
    <h1>Renseigner votre domaine de travail et vos compétences</h1>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Mon métier :</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Donner votre métier"
                />
              </label>
            </div>

            <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Mes diplomes :</span>
            <input type="file"
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
              />
          </label>
            </div>
            <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Mon CV :</span>
            <input type="file"
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
              />
          </label>
            </div>
          <div
          class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Mes potentiels :</span>
              <textarea
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
                placeholder="Expliquer en quelques mot vos potentiels"></textarea>
            </label>
          </div>

