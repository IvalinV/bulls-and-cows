@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-800 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            User
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Bulls Found
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Cows Found 
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Total Numbers Found
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($scores as $score)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-black whitespace-nowrap dark:text-white">
                                {{$score->user->name}}
                            </th>
                            <td class="py-4 px-6">
                                {{$score->bulls_found}}
                            </td>
                            <td class="py-4 px-6">
                                {{$score->cows_found}}
                            </td>
                            <td class="py-4 px-6">
                                {{$score->full_numbers_found}}
                            </td>
                        </tr>
                        @empty
                        
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection