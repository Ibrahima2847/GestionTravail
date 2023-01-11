@include('navbar.navbarOuvrier')
@extends('ouvriers.layout')

@section('title', 'ouvrier')

            <!-- General elements -->

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
              <span class="text-gray-700 dark:text-gray-400">Mes potentiels :</span>
              <textarea
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Expliquer en quelques mot vos potentiels"></textarea>
            </label>
          </div>

          <div
          class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Description :</span>
            <textarea
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              type="text"
            ></textarea>
          </label>
        </div>
