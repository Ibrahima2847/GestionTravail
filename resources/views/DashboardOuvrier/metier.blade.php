@include('navbar.navbarOuvrier')

@section('title', 'ouvrier')

@foreach ($metiers as $metier)
@if (auth()->user()->id == $metier->ouvrier_id)

    <div class="alert alert-danger" role="alert">
        Désolé mais vous ne pouvez pas avoir deux comptes !!!
    </div>

@else

    <h1>Renseigner votre domaine de travail et vos compétences</h1>
    <form action="{{route('ouvrier.store')}}" method="POST">
        @csrf
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Donner votre métier :</span>
                <select
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="profession" id="profession">
                    <option value="Mécanicien">Mecanicien</option>
                    <option value="Plombier">Plombier</option>
                    <option value="Maçon">Maçon</option>
                </select>
            </label>
            </div>

            <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Mes diplomes :</span>
            <input type="file" name="diplome"
              class="form-control {{ $errors->has('diplome') ? 'is-invalid' : '' }} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
              />
          </label>
            @if ($errors->has('diplome'))
                <span class="invalid-feedback">{{ $errors->first('diplome') }}</span>
            @endif
            </div>
            <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Mon CV :</span>
            <input type="file" name="cv"
              class="form-control {{ $errors->has('cv') ? 'is-invalid' : '' }} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
              />
          </label>
            @if ($errors->has('cv'))
                <span class="invalid-feedback">{{ $errors->first('cv') }}</span>
            @endif
            </div>
            <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Ma photo :</span>
            <input type="file" name="photo"
              class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
              />
          </label>
            @if ($errors->has('photo'))
                <span class="invalid-feedback">{{ $errors->first('photo') }}</span>
            @endif
            </div>
          <div
          class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Mes potentiels :</span>
              <textarea name="potentiel"
                class="form-control {{ $errors->has('potentiel') ? 'is-invalid' : '' }} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
                placeholder="Expliquer en quelques mot vos potentiels"></textarea>
            </label>
            @if ($errors->has('potentiel'))
                <span class="invalid-feedback">{{ $errors->first('potentiel') }}</span>
            @endif
          </div>
          <input type="hidden" name="ouvrier_id" value="{{auth()->user()->id}}">
          <div class="px-6 my-6">
            <input type="submit" value="Soumettre"
              class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            />
          </div>
    </form>
    @endif
    @endforeach

